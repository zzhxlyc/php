<?php
function array_to_map($list, $field = 'id'){
	$ret = array();
	foreach($list as $obj){
		$ret[$obj->$field] = $obj;
	}
	return $ret;
}

//$list是一个obj的list，obj带id属性
function get_map_by_id($list){
	$ret = array();
	foreach($list as $obj){
		$ret[$obj->id] = $obj;
	}
	return $ret;
}

//将list按照$field_list的顺序排列
//@param field_list 数组or逗号分隔的字符串
function sort_as_field($list, $field_list, $field = 'id'){
	if(!is_array($list)) return $list;
	if(is_string($id_list)){
		$id_list = explode(',', $id_list);
	}
	$t = array();
	$s = array();
	foreach($list as $l){
		$t[$l->$field_list] = $l;
	}
	foreach($id_list as $field){
		$s[] = $t[$field];
	}
	return $s;
}

function sort_as_ids($list, $id_list){
	if(!is_array($list)) return $list;
	if(is_string($id_list)){
		$id_list = explode(',', $id_list);
	}
	$t = array();
	$s = array();
	foreach($list as $l){
		$t[$l->id] = $l;
	}
	foreach($id_list as $id){
		$s[] = $t[$id];
	}
	return $s;
}

//$list是一个obj的list, obj带parent属性
//返回$root为根id数组，$map为所有带有子节点的节点映射[$id]=>array()
function get_root_children_cat($list){
	$root = array();
	$map = array();
	foreach($list as $obj){
		if($obj->parent == 0){
			$root[] = $obj->id;
		}
		else{
			$map[$obj->parent][] = $obj->id;
		}
	}
	return array($root, $map);
}

//返回附属于$id的所有id的数组, $self表示是否包括带子节点的这个节点
function get_belong_to_cat($id, $map, $self){
	$ret = array();
	$is_parent = array_key_exists($id, $map);
	if(!$is_parent || $self) $ret[] = $id;
	if($is_parent){
		$a = $map[$id];
		if(is_array($a)){
			foreach($a as $aa){
				$rr = get_belong_to_cat($aa, $map, $self);
				$ret = array_merge($ret, $rr);
			}
		}
		else{
			$ret[] = $a;
		}
	}
	return $ret;
}


//数组转换成XML格式
function array_Xml($array, $keys = ''){
	$elementLevel = 0;
	if(!is_array($array)){
		if($keys == ''){
			return $array;
		}else{
			return "\n<$keys>" . $array . "</$keys>";
		}
	}
	else{
		foreach ($array as $key => $value){
			$haveTag = true;
			if (is_numeric($key)){
				$key = $keys;
				$haveTag = false;
			}
			/**
			 * The first element
			 */
			if($elementLevel == 0 ){
				$startElement = "<$key>";
				$endElement = "</$key>";
			}
			$text .= $startElement."\n";
			/**
			 * Other elements
			 */
			if(!$haveTag){
				$elementLevel++;
				$text .= "<$key>" . array_Xml($value, $key). "</$key>\n";
			}
			else{
				$elementLevel++;
				$text .= array_Xml($value, $key);
			}
			$text .= $endElement."\n";
		}
	}
	return $text;
}
