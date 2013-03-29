<?php

$currentPage = 'fullsite';
$act = getAction();

if($act == 'submit'){
	$link = parseString(getParameter('link'));

	$return = array(
		'returnCode' => -1,
		'siteMap' => array()
	);

	if(filter_var($link, FILTER_VALIDATE_URL)){
		include('./models/SiteMapGenerator.php');

		$siteMap = new SiteMapGenerator($link);

		$return['returnCode'] = 0;
		$return['siteMap'] = $siteMap->getLinkList();
	}

	echo json_encode($return);
}

if(isAjax()){
	exit(0);
}

include('./views/header.php');
include('./views/fullsite.php');
include('./views/footer.php');

?>