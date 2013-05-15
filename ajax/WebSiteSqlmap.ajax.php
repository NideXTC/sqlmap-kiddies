<?php

ini_set ('max_execution_time', 0);

require_once '../class/Sqlmap.class.php';
$sqlmap = new Sqlmap();
$res = $sqlmap->launch($_POST["url"], $_POST['options']);

if($res['returnCode'] < 0){
  $success = 0;
}else{
  $success = 1;
}

$file_db = new PDO('sqlite:../db/history.sqlite3');
// Insertion query
$qry = $file_db->prepare('INSERT INTO links VALUES (null, ?, ?, ?)');
$qry->execute(array($_POST['url'], $_POST['web_site_id'], $success));

echo json_encode($res);
?>