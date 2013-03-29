<?php

abstract class Log{

	const PADDING = 5;
	const ERROR = 'E';
	const INFO = 'I';
	const DEBUG = 'D';
	const WARNING = 'W';

	private static function write($message){
		$resource = fopen(LOG_FILE, 'a');
		if($resource != false){
			fwrite($resource, $message."\n");
			fclose($resource);
		}
	}

	private static function getId($type){
		$current = date_default_timezone_get();
		date_default_timezone_set('Europe/Paris');

		$date = date('Y-m-d H:i:s');

		date_default_timezone_set($current);
		return '['.$date.']['.$type.']';
	}

	/**
	 * Adds a message to the log file
	 * @param int $type
	 * @param string $message 
	 */
	public static function addMessage($type, $message){
		self::write(self::getId($type).' '.$message);
	}

	/**
	 * Adds an exception to the log file
	 * @param int $type
	 * @param Exception $exception
	 * @param boolean $trace
	 */
	public static function addException($type, Exception $exception, $trace = true){
		$message = self::getId($type).' '.$exception->getMessage();

		if($trace){
			$message .= "\n".'File: '.$exception->getFile();
			$message .= "\n".'Line: '.$exception->getLine();
			$message .= "\n\n".'Trace:'."\n";
			$message .= $exception->getTraceAsString();
		}

		$message = str_replace("\n", "\n".str_repeat(' ', self::PADDING), $message);
		self::write($message);
	}

}

?>