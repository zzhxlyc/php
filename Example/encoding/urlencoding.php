<?php

include('Util.php');

//utf-8字符串的urlencode，decode出来是utf-8字符串
$str = '%E6%9F%B3%E4%BA%91%E8%B6%85';	
echo 'utf8 string: '.urldecode($str);

echo '<br/>';

//gbk字符串的urlencode，decode出来是gbk字符串
$str = '%C1%F8%D4%C6%B3%AC';
echo 'gbk string: '.urldecode($str);

echo '<br/>';

echo 'URLDecodeToUTF8	: '.URLDecodeToUTF8($str);

function URLDecodeToUTF8($str){
	$temp = urldecode($str);
	if(is_utf8($temp)){
		return $temp;
	}
	else{
		return iconv("GBK","UTF-8",$temp);
	}
}

echo '<br/>';

$s = '柳云超';
//因为php文件用的utf-8编码，结果为utf-8编码的urlEncode	1个中文3个%XX
echo 'urlEncode UTF-8 : '.urlencode($s);	

echo '<br/>';

$s = iconv("UTF-8","GBK",$s);
//转换为gbk编码的中文字符串，于是结果为gbk编码的urlEncode	1个中文2个%XX
echo 'urlEncode GBK : '.urlencode($s);	