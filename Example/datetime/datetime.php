<?php

function output_select_year($c, $begin = 1978, $end = 2030){
	for($year = $begin;$year <= $end;$year++){
		if(intval($c) == $year){
			printf('<option value="%d" selected="selected">%d</option>', $year, $year);
		}
		else{
			printf('<option value="%d">%d</option>', $year, $year);
		}
	}
}

function output_select_month($c){
	for($month = 1;$month <= 12;$month++){
		if(intval($c) == $month){
			printf('<option value="%d" selected="selected">%d</option>', $month, $month);
		}
		else{
			printf('<option value="%d">%d</option>', $month, $month);
		}
	}
}

function output_select_day($c){
	for($day = 1;$day <= 31;$day++){
		if(intval($c) == $day){
			printf('<option value="%d" selected="selected">%d</option>', $day, $day);
		}
		else{
			printf('<option value="%d">%d</option>', $day, $day);
		}
	}
}

function get_one_month_ago_date(){
	$ts = time() - 3600 * 24 * 30;
	$date = date('Y-m-d H:i:s', $ts);
	return $date;
}

function get_days_before($days){
	$ts = time() - 3600 * 24 * $days;
	$date = date('Y-m-d H:i:s', $ts);
	return $date;
}