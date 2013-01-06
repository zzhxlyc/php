<?php
array_key_exists($key, $array);
in_array($value, $array);

//返回所有键、值
array_keys($array);
array_values($array);

array_merge($array1 ,$array2, $array3);
array_diff($array1 ,$array2, $array3);

array_shift($array);	//删除第一个元素并返回

$array1 = array_unique($array1);

$ret = array_reverse($array);

//return array('var1'=>1, 'var2'=>2, 'var3'=>3);
compact($var1, $var2, $var3);
//将数组key=>value导入变量符号表
extract($array);

