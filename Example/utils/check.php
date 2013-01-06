<?php
function check_email($email){
	$chars = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i";
	if(strpos($email, '@') !== false && strpos($email, '.') !== false) {
		if(preg_match($chars, $email)){
			return true;
		}
		return false;
	}
	return false;
}

function check_url($str){
	return preg_match("/^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"])*$/", $str);
}


function check_time($time){
	$ret = strtotime($time);
	if($ret == false || $ret == -1) return false;
	else return true;
}

function check_qq($str){
	return preg_match("/^[1-9]\d{4,9}$/", $str);
}
