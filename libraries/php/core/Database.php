<?php

function initializeDatabase(){
	$GLOBALS['db'] = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')
	);

	$GLOBALS['db']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$GLOBALS['db']->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
	$GLOBALS['db']->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}

function executeSQL($sql){
	try{
		$GLOBALS['db']->exec($sql);
	}
	catch(Exception $exception){
		error($exception);
	}
}

function getSQLList($sql){
	$list = array();
	try{
		$statement = $GLOBALS['db']->query($sql);
		foreach($statement as $row){
			$list[] = $row;
		}
	}
	catch(Exception $exception){
		error($exception);
	}
	return $list;
}

function getSQLOne($sql){
	$one = null;
	try{
		$statement = $GLOBALS['db']->query($sql);
		$tmp = $statement->fetch();
		if(!empty($tmp)){
			$one = $tmp;
		}
	}
	catch(Exception $exception){
		error($exception);
	}
	return $one;
}

function getSQLMap($sql, $column){
	$list = array();
	try{
		$statement = $GLOBALS['db']->query($sql);
		foreach($statement as $row){
			$list[$row->$column] = $row;
		}
	}
	catch(Exception $exception){
		error($exception);
	}
	return $list;
}

?>