<?php

function url_remove_unsafe($str, $add = array(), $sub = array()){
	$unsafe_array = array("'", '"', '<', '>', '\\');
	$unsafe_array = array_merge($unsafe_array, $add);
	$unsafe_array = array_diff($unsafe_array, $sub);
	$str = remove_magic_quotes_gpc($str);
	$len = strlen($str);
	$s = '';
	for($i = 0;$i < $len;$i++){
		$c = $str[$i];
		if(!in_array($c, $unsafe_array)){
			$s .= $c;
		}
	}
	return $s;
}

function escape_unsafe($str, $turn_html = 1, $turn_and = 0){
	$str = remove_magic_quotes_gpc($str);
	$len = strlen($str);
	$s = '';
	for($i = 0;$i < $len;$i++){
		if($str[$i] == '<' && $turn_html == 1){
			$s .= '&lt;';
		}
		else if($str[$i] == '>' && $turn_html == 1){
			$s .= '&gt;';
		}
		else if($str[$i] == "'"){
			$s .= '&#39;';
		}
		else if($str[$i] == '"'){
			$s .= '&quot;';
		}
		else if($str[$i] == '\\'){
			$s .= '&#92;';
		}
		else if($str[$i] == '&'){
			if($turn_and == 0){
				if($i + 3 < $len && $str[$i+1] == 'l' && $str[$i+2] == 't' && $str[$i+3] == ';'){
					$s .= '&';
					continue;
				}
				else if($i + 3 < $len && $str[$i+1] == 'g' && $str[$i+2] == 't' && $str[$i+3] == ';'){
					$s .= '&';
					continue;
				}
				else if($i + 4 < $len && $str[$i+1] == '#' && $str[$i+2] == '9' && $str[$i+3] == '2'
							 && $str[$i+4] == ';'){
					$s .= '&';
					continue;
				}
				else if($i + 5 < $len && $str[$i+1] == '#' && $str[$i+2] == '0' && $str[$i+3] == '3'
							 && $str[$i+4] == '9' && $str[$i+5] == ';'){
					$s .= '&';
					continue;
				}
				else if($i + 5 < $len && $str[$i+1] == 'q' && $str[$i+2] == 'u' && $str[$i+3] == 'o'
							 && $str[$i+4] == 't' && $str[$i+5] == ';'){
					$s .= '&';
					continue;
				}
			}
			$s .= '&amp;';
		}
		else{
			$s .= $str[$i];
		}
	}
	return $s;
}

//删除可能的对"自动加入的\, linux下
function remove_magic_quotes_gpc($content){
	if (get_magic_quotes_gpc()) {
		return stripslashes($content);
	}
	else{
		return $content;
	}
}

//生成唯一标示符
function create_unique() {
	$data = $_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'].time().rand();
	return sha1($data);
	//return md5(time().$data);
}

//指定长度的随机字符串, $numeric表示全由数字组成
function random_str($length, $numeric = 0) {
	$numeric = 1;
	PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
	if($numeric) {
		$hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
	} else {
		$hash = '';
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
		$max = strlen($chars) - 1;
		for($i = 0; $i < $length; $i++) {
			$hash .= $chars[mt_rand(0, $max)];
		}
	}
	return $hash;
}

//指定长度的随机中文字符串
function random_chstr($length = 5) {
	$string = '';
	for($i=0;$i < $length;$i++) {
		$string .= chr(rand(0xB0,0xF7)).chr(rand(0xA1,0xFE));
	}
	return $string;
}