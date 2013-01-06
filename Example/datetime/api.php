<?php
array(
	'A' => 'PM or AM',
	'l' => '英文周几：Tuesday',
	'w' => '星期中的第几天，0是Sunday',
	'd' => '一个月的第几天',
	'z' => '年份中的第几天',
	'L' => '闰年返回1',
	'h' => '12小时制的hour',
	't' => '本月总天数',
);
date('Y-m-d H:i:s', time());
date('Y-m-d H:i:s', mktime(0,0,0,10,3,1975));

//idate只接受一个字符的format参数
idate('L', $timestamp);

//返回时间戳
mktime($hour, $minute, $second, $month, $day, $year);

//return array('seconds'=>0, 'minutes'=>0, 'hours'=>0, ...)
getdate($timestamp);

//return timestamp
strtotime($time_string);