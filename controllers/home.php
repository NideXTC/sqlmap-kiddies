<?php

$act = getAction();

//die($act);

if($act == 'submit'){
	$optionList = array();

	$link = parseString(getParameter('link'));
	$optionList[] = '--dump-format='.parseString(getParameter('output-format'));
	$optionList[] = (parseString(getParameter('tor')) == 'on') ? '--tor' : '';
	$optionList[] = (parseString(getParameter('keep-alive')) == 'on') ? '--keep-alive' : '';
	$optionList[] = (parseString(getParameter('null-connection')) == 'on') ? '--null-connection' : '';
	$optionList[] = (parseString(getParameter('no-cast')) == 'on') ? '--no-cast' : '';
	$optionList[] = (parseString(getParameter('no-escape')) == 'on') ? '--no-escape' : '';
	$optionList[] = (parseString(getParameter('purge-output')) == 'on') ? '--purge-output' : '';
	$optionList[] = '--level='.parseInteger(getParameter('level'));
	$optionList[] = '--risk='.parseInteger(getParameter('risk'));

	$optionList = cleanArray($optionList);

	include('./models/SqlMap.php');

	$sqlMap = new SqlMap();
	$return = $sqlMap->exec($link, $optionList);

	echo json_encode($return);
}

if(isAjax()){
	exit(0);
}

include('./views/header.php');
include('./views/home.php');
include('./views/footer.php');

?>