/<?php

class Model{
	
	protected static function _convert($obj, $std){
		if(is_object($std) || is_array($std)){
			foreach($std as $n => $v){
				$obj->$n = $v;
			}
		}
		return $obj;
	}
	
	public static function get($table, $id){
		global $DB;
		if(!is_int($id)){
			die('id is not int');
		}
		$sql = "SELECT * FROM `$table` WHERE id = $id";
		return $DB->get_row($sql);
	}
	
	public static function get_row($table, $condition = '', $order = ''){
		global $DB;
		$sql = "SELECT * FROM `$table`";
		if($condition != ''){
			$sql .= " WHERE $condition";
		}
		if($order != ''){
			$sql .= " ORDER BY $order";
		}
		$sql .= ' LIMIT 1';
		return $DB->get_row($sql);
	}

	public static function get_list($table, $condition, $order, $limit){
		global $DB;
		$sql = "SELECT * FROM `$table` ";
		if($condition != ''){
			$sql .= " WHERE $condition";
		}
		if($order != ''){
			$sql .= " ORDER BY $order";
		}
		if($limit != ''){
			$sql .= " LIMIT $limit";
		}
		return $DB->get_results($sql);
	}

	public static function delete($table, $id){
		global $DB;
		if(!is_array($id)){
			if(!is_int($id)) die('id is not int');
			$sql = "DELETE FROM `$table` WHERE id = $id";
		}
		else if(is_array($id)){
			$sql = "DELETE FROM `$table` WHERE id in (".implode(',', $id).')';
		}
		return $DB->query($sql);
	}
	
	public static function update($table, $set, $condition){
		global $DB;
		$sql = "UPDATE `$table` SET $set ";
		if($condition != ''){
			$sql .= "WHERE $condition";
		}
		return $DB->query($sql);
	}
	
	public static function query($sql){
		global $DB;
		return $DB->query($sql);
	}
	
	public static function select($sql){
		global $DB;
		return $DB->get_row($sql);
	}
	
	public static function get_count($table, $condition){
		global $DB;
		$sql = 'SELECT count(*) as num FROM '.$table.' WHERE '.$condition;
		return $DB->get_row($sql)->num;
	}
}