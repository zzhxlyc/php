<?php

//UTF-8字符串截取
function subString($str, $allow){
	$l = strlen($str);
	$length = 0;
	$i = 0;
	for(;$i < $l;$i++){
		$c = $str[$i];
		$n = ord($c);
		if(($n >> 7) == 0){			//0xxx xxxx, asci, single
			$length += 0.5;
		}
		else if(($n >> 4) == 15){ 	//1111 xxxx, first in four char
			if(isset($str[$i + 1])){
				$i++;
				if(isset($str[$i + 1])){
					$i++;
					if(isset($str[$i + 1])){
						$i++;
					}
				}
			}
			$length++;
		}
		else if(($n >> 5) == 7){ 	//111x xxxx, first in three char
			if(isset($str[$i + 1])){
				$i++;
				if(isset($str[$i + 1])){
					$i++;
				}
			}
			$length++;
		}
		else if(($n >> 6) == 3){ 	//11xx xxxx, first in two char
			if(isset($str[$i + 1])){
				$i++;
			}
			$length++;
		}
		if($length >= $allow) break;
	}
	$ret = substr($str, 0, $i + 1);
	if($i + 1 < $l) $ret .= '...';
	return $ret;
}

//英文标题的正确大写
function title_upcase($str) {
	//将全部单词首字大写 

	$str = ucwords($str);
	//返回一个数组，包含字符串里的所有单词，并且以单词在字符串里的位置作为索引 

	$wordlist = str_word_count($str,2);
	//排除数组里第一个和最后一个元素，因为不需要改变为小写 

	$wordlist = array_slice($wordlist,1,-1,true);
	//如果包含下列单词，则全部小写 

	foreach ($wordlist as $position => $word) {
		switch ($word) {
			case 'A':
			case 'An':
			case 'The':
			case 'But':
			case 'As':
			case 'If':
			case 'And':
			case 'Or':
			case 'Nor':
			case 'Of':
			case 'By':
				$lower = strtolower($word);
				$str{$position} = $lower{0};
		}
	}
	return $str;
}