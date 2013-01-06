<?php

class DateCrossUtil{
	
	public static $timezone = 8;
	const DAY_TS = 86400;
	const WEEK_TS = 604800;
	const HOUR_TS = 3600;
	
	private static function day_start($ts){
		$time = date('Y-m-d 00:00:00', $ts);
		return strtotime($time);
	}
	
	public static function set_timezone($tz){
		self::$timezone = $tz;
		if($tz == 8){
			date_default_timezone_set('Asia/Shanghai');
		}
		else if($tz > 0){
			date_default_timezone_set("Etc/GMT+".$tz);
		}
		else if($tz < 0){
			date_default_timezone_set("Etc/GMT-".$tz);
		}
	}
	
	public static function today($return = 'str', $ts = null){
		if($ts == ''){
			$ts = time();
		}
		$from = self::day_start($ts);
		$to = $ts;
		if($return == 'str'){
			$from = date('Y-m-d H:i:s', $from);
			$to = date('Y-m-d H:i:s', $to);
		}
		return array($from, $to);
	}
	
	public static function yesterday_now($return = 'str', $ts = null){
		if($ts == ''){
			$ts = time();
		}
		$time = self::day_start($ts);
		$from = $time - self::DAY_TS;
		$to = $ts - self::DAY_TS;
		if($return == 'str'){
			$from = date('Y-m-d H:i:s', $from);
			$to = date('Y-m-d H:i:s', $to);
		}
		return array($from, $to);
	}
	
	public static function yesterday($return = 'str', $ts = null){
		if($ts == ''){
			$ts = time();
		}
		$time = self::day_start($ts);
		$from = $time - self::DAY_TS;
		$to = $time - 1;
		if($return == 'str'){
			$from = date('Y-m-d H:i:s', $from);
			$to = date('Y-m-d H:i:s', $to);
		}
		return array($from, $to);
	}
	
	public static function this_week($return = 'str', $ts = null){
		if($ts == ''){
			$ts = time();
		}
		$week_day = idate('w', $ts);
		$from = self::day_start($ts) - ($week_day - 0) * self::DAY_TS;
		$to = $ts;
		if($return == 'str'){
			$from = date('Y-m-d H:i:s', $from);
			$to = date('Y-m-d H:i:s', $to);
		}
		return array($from, $to);
	}
	
	public static function last_week($return = 'str', $ts = null){
		if($ts == ''){
			$ts = time();
		}
		$week_day = idate('w', $ts);
		$from = self::day_start($ts) - ($week_day - 0) * self::DAY_TS - self::WEEK_TS;
		$to = $from + self::WEEK_TS - 1;
		if($return == 'str'){
			$from = date('Y-m-d H:i:s', $from);
			$to = date('Y-m-d H:i:s', $to);
		}
		return array($from, $to);
	}
	
	public static function this_month($return = 'str', $ts = null){
		if($ts == ''){
			$ts = time();
		}
		$month_day = idate('d', $ts);
		$from = self::day_start($ts) - ($month_day - 1) * self::DAY_TS;
		$to = $ts;
		if($return == 'str'){
			$from = date('Y-m-d H:i:s', $from);
			$to = date('Y-m-d H:i:s', $to);
		}
		return array($from, $to);
	}
	
	public static function last_month($return = 'str', $ts = null){
		if($ts == ''){
			$ts = time();
		}
		$month_day = idate('d', $ts);
		$from_this_month = self::day_start($ts) - ($month_day - 1) * self::DAY_TS;
		$last_month_days = idate('t', $from_this_month - 1);
		$from = $from_this_month - self::DAY_TS * $last_month_days;
		$to = $from_this_month - 1;
		if($return == 'str'){
			$from = date('Y-m-d H:i:s', $from);
			$to = date('Y-m-d H:i:s', $to);
		}
		return array($from, $to);
	}
	
	public static function last_30_days($return = 'str', $ts = null){
		if($ts == ''){
			$ts = time();
		}
		$day_start = self::day_start($ts);
		$to = $day_start - 1;
		$from = $day_start - 30 * self::DAY_TS;
		if($return == 'str'){
			$from = date('Y-m-d H:i:s', $from);
			$to = date('Y-m-d H:i:s', $to);
		}
		return array($from, $to);
	}
	
	public static function this_year($return = 'str', $ts = null){
		if($ts == ''){
			$ts = time();
		}
		if($return == 'str'){
			$year = idate('Y', $ts);
			$from = $year.'-01-01 00:00:00';
			$to = date('Y-m-d H:i:s', $ts);
		}
		else if($return == 'timestamp'){
			$days = idate('z', $ts);
			$from = self::day_start($ts) - $days * self::DAY_TS;
			$to = $ts;
		}
		return array($from, $to);
	}
	
}

DateCrossUtil_test();


function DateCrossUtil_test(){

	DateCrossUtil::set_timezone(8);
	$ts = strtotime('2012-7-25 12:12:12');
	
//	$r1 = DateCrossUtil::today('str');
	
	$r1 = DateCrossUtil::today('str', $ts);
	$r2 = DateCrossUtil::today('timestamp', $ts);
	DateCrossUtil_check($r1, $r2, '2012-07-25 00:00:00');
	
	$r1 = DateCrossUtil::yesterday('str', $ts);
	$r2 = DateCrossUtil::yesterday('timestamp', $ts);
	DateCrossUtil_check($r1, $r2, '2012-07-24 00:00:00', '2012-07-24 23:59:59');
	
	$r1 = DateCrossUtil::this_week('str', $ts);
	$r2 = DateCrossUtil::this_week('timestamp', $ts);
	DateCrossUtil_check($r1, $r2, '2012-07-22 00:00:00');
	
	$r1 = DateCrossUtil::last_week('str', $ts);
	$r2 = DateCrossUtil::last_week('timestamp', $ts);
	DateCrossUtil_check($r1, $r2, '2012-07-15 00:00:00', '2012-07-21 23:59:59');
	
	$r1 = DateCrossUtil::this_month('str', $ts);
	$r2 = DateCrossUtil::this_month('timestamp', $ts);
	DateCrossUtil_check($r1, $r2, '2012-07-01 00:00:00');
	
	$r1 = DateCrossUtil::last_month('str', $ts);
	$r2 = DateCrossUtil::last_month('timestamp', $ts);
	DateCrossUtil_check($r1, $r2, '2012-06-01 00:00:00', '2012-06-30 23:59:59');
	
	$r1 = DateCrossUtil::last_30_days('str', $ts);
	$r2 = DateCrossUtil::last_30_days('timestamp', $ts);
	DateCrossUtil_check($r1, $r2, '2012-06-25 00:00:00', '2012-07-24 23:59:59');
	
	$r1 = DateCrossUtil::this_year('str', $ts);
	$r2 = DateCrossUtil::this_year('timestamp', $ts);
	DateCrossUtil_check($r1, $r2, '2012-01-01 00:00:00');
}

function DateCrossUtil_check($r1, $r2, $from, $to = null){
//	echo $r1[0].' '.$r1[1].'<br>';
//	echo date('Y-m-d H:i:s', $r2[0]).' '.date('Y-m-d H:i:s', $r2[1]);
	if($r1[0] == $from && date('Y-m-d H:i:s', $r2[0]) == $from){
		if($to){
			if($r1[1] == $to && date('Y-m-d H:i:s', $r2[1]) == $to){
				echo 'ok';
			}
			else{
				echo 'no';
			}
		}
		else{
			echo 'ok';
		}
	}
	else{
		echo 'no';
	}
	echo '<br>';
}