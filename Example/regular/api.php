<?php
function remove_example($content){
	$pattern = '/\[caption[\s\S]*\[\/caption\]/i';
	return preg_replace($pattern, '', $content);
}

function check_valid_example($str){
	//check QQ
	return preg_match("/^[1-9]\d{4,9}$/", $str);
}

function find_example(){
	$url = 'http://item.taobao.com/item.htm?id=14485653769';
	preg_match("/id=([\d]+)/", $url, $matches);
	$iid = $matches[1];
}