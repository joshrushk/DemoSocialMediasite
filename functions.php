<?php
function htmluret($degistir) {
	$degistir=iconv("UTF-8","ISO-8859-9",$degistir);
    $degistir = preg_replace('\.', '', $degistir);
    $degistir = preg_replace('\?', '', $degistir);
    $degistir = preg_replace('#', '', $degistir);
    $degistir = preg_replace(',', '', $degistir);
    $degistir = preg_replace('/', '', $degistir);
    $degistir = preg_replace(';', '', $degistir);
	$degistir = preg_replace(':', '', $degistir);
    $degistir=trim($degistir);
	$degistir=strtolower($degistir);
    $degistir = preg_replace(' ', '-', $degistir);
	$degistir = preg_replace('\)', '', $degistir);
	$degistir = preg_replace('\(', '', $degistir);
    $degistir = preg_replace('\'', '', $degistir);
    return strtolower($degistir);
}
function db_connect() {
		include('../config.php');
		$connection = mysql_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD);
		mysql_query("SET NAMES utf8");
		if(!$connection || !mysql_select_db(DATABASE_NAME, $connection))
		{
			return false;
		}
		return $connection;
}
function db_result_to_array($result) {
		$res_array = array();
		
		$count = 0;
		while($row = @mysql_fetch_array($result))
		{
			$res_array[$count] = $row;
			$count++;
		}
		return $res_array;
}
function get_time($youtube_time) {
    preg_match_all('/(\d+)/',$youtube_time,$parts);

    // Put in zeros if we have less than 3 numbers.
    if (count($parts[0]) == 1) {
        array_unshift($parts[0], "0", "0");
    } elseif (count($parts[0]) == 2) {
        array_unshift($parts[0], "0");
    }

    $sec_init = $parts[0][2];
    $seconds = $sec_init%60;
    $seconds_overflow = floor($sec_init/60);

    $min_init = $parts[0][1] + $seconds_overflow;
    $minutes = ($min_init)%60;
    $minutes_overflow = floor(($min_init)/60);

    $hours = $parts[0][0] + $minutes_overflow;

    if($hours != 0) {
        return $hours.':'.$minutes.':'.$seconds;
	} else {
        return $minutes.':'.$seconds;
	}
}
function get_settings() {
		db_connect();
		
		$query = ("SELECT * FROM settings LIMIT 1");
		
		$result = mysql_query($query);
		
		$row = mysql_fetch_array($result);
		
		return $row;
}
function get_members($id) {
		db_connect();
		
		$query = ("SELECT * FROM users WHERE username='".$id."' OR email='".$id."' OR id='".$id."' ");
		
		$result = mysql_query($query);
		
		$row = mysql_fetch_array($result);
		
		return $row;
}
$settings = get_settings();
$members = get_members($_SESSION['id']);
?>