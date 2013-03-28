<?php

require_once '../class/Sqlmap.class.php';
$sqlmap = new Sqlmap();
$res = $sqlmap->launch($_POST["url"], $_POST["options"]);
echo json_encode($res);
?>