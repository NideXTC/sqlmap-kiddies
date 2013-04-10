<?php

class SqlMap{

	public $binaryPath = './libraries/python/sqlmap/sqlmap.py';

	public function __construct($binaryPath = './libraries/python/sqlmap/sqlmap.py'){
		$this->binaryPath = $binaryPath;
	}

	public function exec($targetUrl, $optionList = array()){
		$list = array(
			'returnCode' => -1,
			'returnValue' => '',
			'returnCmdLine' => '',
			'returnExitLine' => '',
			'outputFile' => ''
		);
		$optionString = implode(' ', $optionList);

		if($targetUrl != ''){
			$cmdLine = 'python '.$this->binaryPath.' -u "'.$targetUrl.'" '.$optionString.' --dump-all --batch';

			Command::execute($cmdLine);

			$outputList = Command::getLastResults();
			// On va dire que cette ligne contient normalement le dernier output de sqlmap.py
			$exitLine = $outputList[count($outputList) - 4];
			$exitLine2 = $outputList[count($outputList) - 5];
			$outputLine = 'toto';

			foreach(Command::getLastResults() as $line)
				$list['returnValue'] .= trim($line).'<br />';

			$list['returnCmdLine'] = $cmdLine;
			$list['returnExitLine'] = $exitLine;

			if(!strpos($exitLine, 'CRITICAL') && !strpos($exitLine2, 'WARNING')){
				$list['returnCode'] = 0;
				preg_match("/'(.+)'/", $exitLine, $pregList);
				//$list['outputData'] = $pregList[1];

				// Il faut tar là
				$outputFile = 'data/output/'.uniqid().'.tar.gz';
				Command::execute('tar -zcvf '.$outputFile.' '.$pregList[1]);
				$list['outputFile'] = $outputFile;
			}
		}
		else{
			$list['returnValue'] = 'A link must be provided';
		}

		return $list;
	}

}

?>