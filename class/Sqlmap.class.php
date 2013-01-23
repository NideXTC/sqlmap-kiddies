<?php

class Sqlmap {

    public function __construct() {}

    public function launch($url) {
        
        $cmd = "python modules/sqlmap/sqlmap.py -u " . $url;
        
        $descriptorspec = array(
            0 => array("pipe", "r"), // stdin
            1 => array("pipe", "w"), // stdout
            2 => array("file", "txt/error-output.txt", "a") // stderr
        );

        $process = proc_open($cmd, $descriptorspec, $pipes);
        if (is_resource($process)) {
            do {
                $state = proc_get_status($process);
                //file_put_contents("txt/output-stream.txt", stream_get_contents($pipes[1]));
                proc_terminate($process);
                fclose($pipes[1]);
                $return_value = proc_close($process);
                
                echo stream_get_contents($pipes[1]);
                
            } while ($state['running']);
            exit(0);
        } else {
            return "Not a process ";
        }
    }

}

?>
