<?php

$act = getAction();

if($act == 'create'){
	$db = $GLOBALS['db'];

	$sql = file_get_contents('./scripts/create.sql');

	$db->exec($sql);

	redirect('history');
}

if(isAjax()){
	exit(0);
}

include('./views/header.php');
include('./views/history.php');
include('./views/footer.php');

?>