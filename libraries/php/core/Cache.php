<?php

class Cache{

	const DURATION = 3600; // 1 hour

	private $filename;

	public function __construct($filename){
		$this->filename = $filename;
	}

	public function write($content){
		if(is_array($content)){
			$content = serialize($content);
		}
		file_put_contents(CACHE_DIR.'/'.$this->filename, $content);
	}

	public function read($array = false){
		$content = '';

		if(!file_exists(CACHE_DIR.'/'.$this->filename))
			return false;

		if(time() - filemtime(filename) > 3600)
			return false;

		if($array){
			$content = unserialize(file_get_contents(CACHE_DIR.'/'.$this->filename));
		}
		else{
			$content = file_get_contents(CACHE_DIR.'/'.$this->filename);
		}
		return $content;
	}

	public function delete(){
		if(file_exists(CACHE_DIR.'/'.$this->filename))
			unlink(CACHE_DIR.'/'.$this->filename);
	}

	public static function clear(){
		$files = glob(CACHE_DIR.'/*');
		foreach($files as $f){
			unlink($f);
		}
	}

}

?>