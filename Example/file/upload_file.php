<?php

class UploadFile {
	
	public static $SEP = DIRECTORY_SEPARATOR;
	
	public static function getUploadDir($BASE_DIR){
		$year = date('Y');
		$month = date('m');
		$first = $BASE_DIR.'/'.$year;
		$second = $first.'/'.$month;
		if(!file_exists($first) || !is_dir($first)){
			mkdir($first, 0664);
		}
		if(!file_exists($second) || !is_dir($second)){
			mkdir($second, 0664);
		}
		return $year . UploadFile::$SEP . $month;
	}
}