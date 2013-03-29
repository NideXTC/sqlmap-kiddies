<?php

function parseString($value){
	return htmlspecialchars(trim($value));
}

function parseInteger($value){
	return intval($value);
}

function parseId($value){
	$tmp = intval($value);
	if($tmp < 0){
		$tmp = 0;
	}

	return $tmp;
}

function parseArray($value){
	$tmp = array();
	if(is_array($value)){
		$tmp = $value;
	}

	return $tmp;
}

function parseIdArray($value){
	$list = array();
	if(is_array($value)){
		foreach($value as $element){
			$id = intval($element);
			if($id >= 0){
				$list[] = $id;
			}
		}
	}

	return $list;
}

function parseFloat($value){
	return floatval($value);
}

function parseDate($value){
	$today = mktime(0, 0, 0);

	if($value == 'Today'){
		return date('Y-m-d', $today);
	}
	elseif($value == 'Yesterday'){
		return date('Y-m-d', getLastWorkingDay());
	}
	else{
		$tmp = explode('-', $value);

		if(count($tmp) != 3){
			return '';
		}

		if(!checkdate($tmp[1], $tmp[2], $tmp[0])){
			return '';
		}

		return $tmp[0].'-'.$tmp[1].'-'.$tmp[2];
	}
}

function checkInteger($value){
	return is_numeric($value);
}

function formatNumber($value){
	return number_format($value);
}

function formatDate($value){
	return date(DATE_FORMAT, $value);
}

function formatText($value){
	return nl2br($value);
}

function cleanArray($array){
	foreach($array as $k => $v)
		if(empty($v))
			unset($array[$k]);

	return $array;
}

?>