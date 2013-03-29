<?php

function createPattern($value){
	$list = array();
	foreach(explode('*', $value) as $element){
		$list[] = preg_quote($element);
	}

	return '`'.implode('.*', $list).'$`s';
}

function getSXEString($value){
	return (string) $value;
}

function getSXEBoolean($value){
	return (getSXEString($value) == 'true');
}

function getLastElementFromPath($path){
	$element = '';

	$position = strrpos($path, '/');
	if($position !== false){
		$element = substr($path, $position + 1);
	}

	return $element;
}

function getFilenameFromPath($path){
	$filename = '';

	$position = strrpos($path, '/');
	if($position !== false){
		$path = substr($path, $position + 1);
	}

	$position = strpos($path, '.');
	if($position !== false){
		$filename = substr($path, 0, $position);
	}
	return $filename;
}

function getExtensionFromPath($path){
	$extension = '';

	$position = strrpos($path, '/');
	if($position !== false){
		$path = substr($path, $position + 1);
	}

	$position = strpos($path, '.');
	if($position !== false){
		$extension = strtolower(substr($path, $position + 1));
	}
	return $extension;
}

function endWith($path, $end){
	return (substr($path, -strlen($end)) === $end);
}

function startWith($path, $start){
	return (substr($path, 0, strlen($start)) === $start);
}

function getFileSizeFromBytes($bytes){
	if($bytes < 1024)
		return ($bytes).'B';
	elseif($bytes < 1048576)
		return round($bytes / 1024, 2).'KB';
	elseif($bytes < 1073741824)
		return round($bytes / 1048576, 2).'MB';
	elseif($bytes < 1099511627776)
		return round($bytes / 1073741824, 2).'GB';
	else
		return round($bytes / 1099511627776, 2).'TB';
}

function replaceTags($var, $tagMap){
	foreach($tagMap as $tag => $value){
		$var = str_replace($tag, $value, $var);
	}

	return $var;
}

function generateName(){
	return date('Ymd-His');
}

function generateToken(){
	return sha1(time() * rand(10));
}

function getLastWorkingDay($day = 0){
	if($day == 0){
		$day = mktime(0, 0, 0);
	}

	$offset = 86400;
	$w = date('w', $day);
	if($w == 0){
		$offset *= 2;
	}
	elseif($w == 1){
		$offset *= 3;
	}

	return $day - $offset;
}

?>