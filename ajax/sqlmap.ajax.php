<?php

require_once '../class/Sqlmap.class.php';
$sqlmap = new Sqlmap(); 
$sqlmap->launch($_POST["url"]);

?>