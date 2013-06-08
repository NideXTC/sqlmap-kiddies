<?php

class Sqlmap {

    public function __construct() {
        
    }

    public function launch($url, $options = null) {
        $returnList = array(
            'returnCode' => -1,
            'message' => ''
        );

        $option = '';

        
        if ($options != null) {
            foreach ($options as $key => $value) {
                $option .= $value["value"] . " ";
            }
        }
        
        $cmd = "python ../modules/sqlmap/sqlmap.py -u \"" . $url . "\" --purge-output --dump-all " . $option . " --batch";
        $returnList['message'] = nl2br(shell_exec($cmd));
        
        
        if (!strpos($returnList['message'], 'CRITICAL'))
            $returnList['returnCode'] = 1;

        return $returnList;
    }

    public function dork($url) {
        $returnList = array(
            'returnCode' => -1,
            'message' => ''
        );
        $cmd = "python ../modules/sqlmap/sqlmap.py -g \"" . $url . "\"  --dump-all  --batch";
        $returnList['message'] = nl2br(shell_exec($cmd));


        if (!strpos($returnList['message'], 'CRITICAL'))
            $returnList['returnCode'] = 1;

        return $returnList;
    }

}
?>
