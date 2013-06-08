<?php

ini_set ('max_execution_time', 0);

require_once '../class/Sqlmap.class.php';
$sqlmap = new Sqlmap();
$res = $sqlmap->dork($_POST["url"], $_POST['options']);

if($res['returnCode'] < 0){
  $success = 0;
}else{
  $success = 1;
}

echo json_encode($res);
?>