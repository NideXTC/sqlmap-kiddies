<?php

abstract class Command{

	private static $results;
	private static $return;

	/**
	 * Exexcutes a command
	 * @param string $command 
	 */
	public static function execute($command){
		self::$results = array();
		exec($command, self::$results, self::$return);
	}

	/**
	 * Gets the last result
	 * @return array 
	 */
	public static function getLastResults(){
		return self::$results;
	}

	/**
	 * Gets the last return value
	 * @return string 
	 */
	public static function getLastReturn(){
		return self::$return;
	}

}

?>