<?php

$act = getAction();

if($act == 'submit'){
	$link = parseString(getParameter('link'));

	include('./models/SiteMapGenerator.php');

	$siteMap = new SiteMapGenerator($link);

	$return = $siteMap->getLinkList();

	echo json_encode($return);
}

if(isAjax()){
	exit(0);
}

include('./views/header.php');
include('./views/fullsite.php');
include('./views/footer.php');

?>