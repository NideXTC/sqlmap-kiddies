<?php

class Sqlmap {

    public function __construct() {}

    public function launch($url , $options = null) {
        
        $option ='';
        
        if($options != null){
            foreach ($options as $key => $value) {
                $option .= $value["value"]." ";
            }
        }
        
        $cmd = "python ../modules/sqlmap/sqlmap.py --batch " . $option . " -u " . $url;

        $descriptorspec = array(
            0 => array("pipe", "r"), 
            1 => array("pipe", "w"), 
            2 => array("file", "../txt/error-output.txt", "a") 
        );

        $process = proc_open($cmd, $descriptorspec, $pipes);
        if (is_resource($process)) {
            echo nl2br(stream_get_contents($pipes[1]));
            fclose($pipes[1]);
            $return_value = proc_close($process);
        }
    }
}
?>
