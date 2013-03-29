<?php

$messageMap = array();

function addMessage($type, $id, $message){
	global $messageMap;
	if(!isset($messageMap[$type])){
		$messageMap[$type] = array();
	}

	$messageMap[$type][$id] = $message;
}

function getNumber($type){
	global $messageMap;

	$number = 0;
	if(isset($messageMap[$type])){
		$number = count($messageMap[$type]);
	}

	return $number;
}

function displayMessages($type){
	global $messageMap;
	if(getNumber($type) > 0){

		$html = '<div class="'.$type.'Box"><ul>';
		foreach($messageMap[$type] as $id => $message){
			$html .= '<li>'.$message.'</li>';
		}

		$html .= '</ul></div>';
		echo $html;
	}
}

function displayMessage($type, $id){
	global $messageMap;
	if(isset($messageMap[$type][$id])){
		echo '<span class="'.$type.'">'.$messageMap[$type][$id].'</span>';
	}
}

/* Alias */

function addError($id, $message){
	addMessage('error', $id, $message);
}

function getNumberOfErrors(){
	return getNumber('error');
}

function displayError($id){
	displayMessage('error', $id);
}

function displayErrors(){
	displayMessages('error');
}

function addSuccess($id, $message){
	addMessage('success', $id, $message);
}

function getNumberOfSuccesses(){
	return getNumber('success');
}

function displaySuccess($id){
	displayMessage('success', $id);
}

function displaySuccesses(){
	displayMessages('success');
}

?>