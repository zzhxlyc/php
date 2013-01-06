<?php
is_numeric();
is_bool();
is_float();
is_int();
is_string();
is_object();
is_array();
is_null() == !isset($x);
defined();//常量是否已经定义
isset($a);
unset($a);

intval();
doubleval();
$array = array();
$obj = new stdClass();


?>

表达式             		gettype()		empty()			is_null()		isset()		boolean : if($x)
$x = "";		string			TRUE			FALSE			TRUE			FALSE
$x = NULL       NULL			TRUE			TRUE			FALSE			FALSE
var $x;			NULL			TRUE			TRUE			FALSE			FALSE
$x 尚未定义		NULL			TRUE			TRUE			FALSE			FALSE
$x = array();	array			TRUE			FALSE			TRUE			FALSE(*)
$x = false;		boolean			TRUE(*)			FALSE			TRUE			FALSE
$x = true;		boolean			FALSE			FALSE			TRUE			TRUE
$x = 1;			integer			FALSE			FALSE			TRUE			TRUE
$x = 42;		integer			FALSE			FALSE			TRUE			TRUE
$x = 0;			integer			TRUE(*)			FALSE			TRUE			FALSE
$x = -1;		integer			FALSE			FALSE			TRUE			TRUE
$x = "1";		string			FALSE			FALSE			TRUE			TRUE
$x = "0";		string			TRUE(*)			FALSE			TRUE			FALSE(*)
$x = "-1";		string			FALSE			FALSE			TRUE			TRUE
$x = "php";		string			FALSE			FALSE			TRUE			TRUE
$x = "true";	string			FALSE			FALSE			TRUE			TRUE
$x = "false";	string			FALSE			FALSE			TRUE			TRUE 