<?php

require_once '../class/Sqlmap.class.php';
$sqlmap = new Sqlmap();
$res = $sqlmap->launch($_POST["url"], $_POST["options"]);
var_dump($res);
echo json_encode($res);
?>