<?php

function redirect($url){
	header("Location: $url");
	exit;
}

function time_redirect($url){
	header("refresh:3;url=$url");
	print('三秒后自动跳转~~~');
	exit;
}

function no_cache(){
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');
}

function _xxx(){
	header('HTTP/1.1 200 OK');
	header('HTTP/1.1 301 Moved Permanently');
	header('HTTP/1.1 304 Not Modified');
	header('HTTP/1.1 403 Forbidden');
	header('http/1.1 404 Not Found');
	header('Content-Type: text/plain');
}

function down_file($file){
	header("Location:$file");
	
	header("Content-Type: application/force-download");
	header('Content-type: application/x-gzip');
	header('Content-Disposition: attachment; filename='.$file);
	
    header('Content-Type: application/octet-stream');
	header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
}

function content_type(){
	header('Content-Type: text/html; charset=iso-8859-1');
	header('Content-Type: text/html; charset=utf-8');
	header('Content-Type: text/plain');
	header('Content-Type: image/jpeg');
	header('Content-Type: application/zip');
	header('Content-Type: application/pdf');
	header('Content-Type: audio/mpeg');
	header('Content-Type: application/x-shockwave-flash');
	header('Content-Type: application/octet-stream');
}
