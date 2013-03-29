<?php

function stripslashesDeep($value){
	return is_array($value) ?
		array_map('stripslashesDeep', $value) :
		stripslashes($value);
}

function initializeSystem(){
	$_GET = stripslashesDeep($_GET);
	$_POST = stripslashesDeep($_POST);

	$host = $_SERVER['HTTP_HOST'];
	$url = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

	$GLOBALS['_path'] = 'http://'.$host.$url;

	session_start();
}

function error($exception = null){
	include('./views/error.php');
	exit(1);
}

function createUrl($ctl, $act = '', $ids = 0, $parameters = array()){
	$url = 'index.php?ctl='.$ctl;

	if(!empty($act)){
		$url .= '&act='.$act;
	}

	if(is_array($ids)){
		foreach($ids as $key => $value){
			$url .= '&'.$key.'='.$value;
		}
	}
	else{
		if($ids > 0){
			$url .= '&id='.$ids;
		}
	}

	if(is_array($parameters)){
		foreach($parameters as $key => $value){
			$url .= '&'.$key.'='.$value;
		}
	}

	return $url;
}

function createUrlRW($ctl, $act = '', $ids = 0, $parameters = array()){
	$url = $GLOBALS['_path'];
	$url .= '/'.$ctl;

	if(!empty($act)){
		$url .= '/'.$act;
	}

	if(is_array($ids)){
		foreach($ids as $key => $value){
			$url .= '/'.$key.'/'.$value;
		}
	}
	else{
		if($ids > 0){
			$url .= '/'.$ids;
		}
	}

	if(is_array($parameters)){
		foreach($parameters as $key => $value){
			$url .= '/'.$key.'/'.$value;
		}
	}

	return $url;
}

function redirect($ctl, $act = '', $ids = 0, $parameters = array()){
	$url = createUrl($ctl, $act, $ids, $parameters);

	if(isAjax()){
		echo '<script type="text/javascript">window.location.href = "'.$url.'";</script>';
	}
	else{
		header('Location: '.$GLOBALS['_path'].'/'.$url);
	}
	exit(0);
}

function redirectRW($ctl, $act = '', $ids = 0, $parameters = array()){
	$url = createUrlRW($ctl, $act, $ids, $parameters);

	if(isAjax()){
		echo '<script type="text/javascript">window.location.href = "'.$url.'";</script>';
	}
	else{
		header('Location: '.$url);
	}
	exit(0);
}

function paging($numberOfPages, $position = 1){
	$list = array();
	$length = 4;

	$a = 1 + $length;
	$b = $position - $length + 1;
	$c = $position + $length - 1;
	$d = $numberOfPages - $length;

	$current = '';
	for($i = 1; $i <= $numberOfPages; $i++){
		if(($i < $a) || ($i > $d) || ($i > $b && $i < $c)){
			$current = $i;
			$list[] = $i;
		}
		else{
			if($current != 0){
				$current = 0;
				$list[] = $current;
			}
		}
	}

	return $list;
}

?>