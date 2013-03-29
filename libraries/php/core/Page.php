<?php

/**
 * Tells if the current request is an ajax request
 * @return boolean 
 */
function isAjax(){
	return (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
		&& $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest');
}

/**
 * Gets the parameter $key
 * @param string $key
 * @param string $default
 * @return string 
 */
function getParameter($key, $default = ''){
	$value = $default;

	if(isset($_POST[$key])){
		$value = $_POST[$key];
	}
	elseif(isset($_GET[$key])){
		$value = $_GET[$key];
	}

	return $value;
}

/**
 * Gets the controller
 * @return string 
 */
function getController(){
	return getParameter('ctl');
}

/**
 * Gets the action
 * @return string 
 */
function getAction(){
	return getParameter('act');
}

?>