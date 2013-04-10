<?php

class Sqlmap {

    public function __construct() {}

    public function launch($url , $options = null) {
        $returnList = array(
            'returnCode' => -1,
            'message' => ''
        );

        $option ='';

        if($options != null){
            foreach ($options as $key => $value) {
                $option .= $value["value"]." ";
            }
        }

        $cmd = "python ../modules/sqlmap/sqlmap.py -u \"".$url."\" --purge-output --dump-all " . $option . " --batch";
        //echo $cmd;

        $descriptorspec = array(
            0 => array("pipe", "r"),
            1 => array("pipe", "w"),
            2 => array("file", "../txt/error-output.txt", "a")
        );

        $process = proc_open($cmd, $descriptorspec, $pipes);
        if (is_resource($process)) {
            $returnList['message'] = nl2br(stream_get_contents($pipes[1]));
            fclose($pipes[1]);

            if(!strpos($returnList['message'], 'CRITICAL'))
                $returnList['returnCode'] = proc_close($process);
        }

        return $returnList;
    }
}
?>
