<?php

//转换文件大小单位
function changeFileSize($filesize){
	if($filesize >= 1073741824){
		$filesize = round($filesize / 1073741824  ,2) . ' Gb';
	} 
	else if($filesize >= 1048576){
		$filesize = round($filesize / 1048576 ,2) . ' Mb';
	} 
	else if($filesize >= 1024){
		$filesize = round($filesize / 1024, 2) . ' Kb';
	} 
	else{
		$filesize = $filesize . ' Bytes';
	}
	return $filesize;
}

//获取文件类型
function get_filetype($filename) {
	// Accepted MIME types are set here as PCRE unless provided.
	$mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg', 
        'gif' => 'image/gif', 
        'png' => 'image/png', 
        'bmp' => 'image/bmp', 
        'tif|tiff' => 'image/tiff', 
        'ico' => 'image/x-icon', 
        'asf|asx|wax|wmv|wmx' => 'video/asf', 
        'avi' => 'video/avi', 
        'divx' => 'video/divx', 
        'mov|qt' => 'video/quicktime', 
        'mpeg|mpg|mpe|mp4' => 'video/mpeg', 
        'txt|c|cc|h' => 'text/plain', 
        'rtx' => 'text/richtext', 
        'css' => 'text/css', 
        'htm|html' => 'text/html', 
        'mp3|m4a' => 'audio/mpeg', 
        'ra|ram' => 'audio/x-realaudio', 
        'wav' => 'audio/wav', 
        'ogg' => 'audio/ogg', 
        'mid|midi' => 'audio/midi', 
        'wma' => 'audio/wma', 
        'rtf' => 'application/rtf', 
        'js' => 'application/javascript', 
        'pdf' => 'application/pdf', 
        'doc|docx' => 'application/msword', 
        'pot|pps|ppt|pptx' => 'application/vnd.ms-powerpoint', 
        'wri' => 'application/vnd.ms-write', 
        'xla|xls|xlsx|xlt|xlw' => 'application/vnd.ms-excel', 
        'mdb' => 'application/vnd.ms-access', 
        'mpp' => 'application/vnd.ms-project', 
        'swf' => 'application/x-shockwave-flash', 
        'class' => 'application/java', 
        'tar' => 'application/x-tar', 
        'zip' => 'application/zip', 
        'gz|gzip' => 'application/x-gzip', 
        'exe' => 'application/x-msdownload', 
	// openoffice formats
        'odt' => 'application/vnd.oasis.opendocument.text', 
        'odp' => 'application/vnd.oasis.opendocument.presentation', 
        'ods' => 'application/vnd.oasis.opendocument.spreadsheet', 
        'odg' => 'application/vnd.oasis.opendocument.graphics', 
        'odc' => 'application/vnd.oasis.opendocument.chart', 
        'odb' => 'application/vnd.oasis.opendocument.database', 
        'odf' => 'application/vnd.oasis.opendocument.formula', 
	);

	$type = false;
	$ext = false;

	foreach ( $mimes as $ext_preg => $mime_match ) {
		$ext_preg = '!\.(' . $ext_preg . ')$!i';
		if ( preg_match( $ext_preg, $filename, $ext_matches ) ) {
			$type = $mime_match;
			$ext = $ext_matches[1];
			break;
		}
	}

	return array($ext, $type);
}