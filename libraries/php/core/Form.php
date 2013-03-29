<?php

/**
 * Tests if $value1 equals to $value2 then returns $ok, otherwise $ko
 * @param mixed $value1
 * @param mixed $value2
 * @param string $ok
 * @param string $ko
 * @return string 
 */
function test($value1, $value2, $ok, $ko = ''){
	return ($value1 == $value2) ? $ok : $ko;
}

/** ALIAS * */
function select($value1, $value2){
	echo test($value1, $value2, ' selected="selected"');
}

function check($value1, $value2){
	echo test($value1, $value2, ' checked="checked"');
}

function disable($value1, $value2){
	echo test($value1, $value2, ' disabled="disabled"');
}

?>