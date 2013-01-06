<?php

Class Datebase{
	
	private $conn;

	function Datebase(){
		global $CONF; 
		$conn = mysql_connect($CONF->get('DATABASE_HOST'), 
			$CONF->get('DATABASE_USERNAME'), $CONF->get('DATABASE_PASSWORD'));
		if(!$conn){
			die("Can not connect : ".mysql_error());
		}
		$dbconn = mysql_select_db($CONF->get('DATABASE_NAME'));
		if(!$dbconn){
			die("Can not select this database : ".mysql_error($conn));
		}
		mysql_query("set names utf8");
		date_default_timezone_set('Asia/Shanghai');
		$this->conn = $conn;
	}
	
	function get_row($sql){
//		echo $sql.'<br>';
		$result = mysql_query($sql);
		return mysql_fetch_object($result);
	}
	
	function get_results($sql){
//		echo $sql.'<br>';
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);
		$list = array();
		for($i = 0;$i < $num;$i++){
			mysql_data_seek($result, $i);
			$data = mysql_fetch_object($result);
			$list[] = $data;
		}
		return $list;
	}
	
	function insert($sql){
//		echo $sql.'<br>';
		mysql_query($sql);
		return mysql_insert_id($this->conn);
	}
	
	function query($sql){
//		echo $sql.'<br>';
		mysql_query($sql);
		return mysql_affected_rows($this->conn);
	}

}