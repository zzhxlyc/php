<?php

explode($split, $string);
implode($split, $array);

ord($string);	//返回字符串第一个字符的 ASCII 值
chr($ascii);	//从指定的 ASCII 值返回字符

//将查询字符串key=value导入变量符号表
parse_str($string);
//将查询字符串key=value导入数组 
parse_str($string, $array);

sha1($string);
md5($string);

str_replace($search, $replace, $string);
str_ireplace($search, $replace, $string); //大小写不敏感

//返回第一次出现的位置
$pos = strpos($string, $search);
$pos = stripos($string, $search);
if ($pos === false) {}	//not found

//最后一次出现位置
$pos = strrpos($string, $find);
$pos = strripos($string, $find);
if ($pos === false) {}	//not found

//返回找到后之后全部的字符串
strstr($string, $search);
stristr($string, $search);

strlen($string);
substr($string, $start, $length);

strtolower($string);
strtoupper($string);

//反转
strrev($string);

str_repeat($string, $num);

ucfirst($string);	//第一个字符大写
ucwords($string);	//每个词第一个字符大写

$str = iconv('in_charset', 'out_charset', $str);

strip_tags();
nl2br();
addslashes();			stripslashes();
htmlentities();			html_entity_decode();
htmlspecialchars();		htmlspecialchars_decode();