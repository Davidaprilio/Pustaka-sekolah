<?php 
function randomString($length=6,$charPermited='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789')
{
	$charLength = strlen($charPermited);
	$strRandom = '';
	for ($i=0; $i < $length; $i++) { 
		$charRandom = $charPermited[mt_rand(0, $charLength - 1)];
		$strRandom .= $charRandom;
	}
	return $strRandom;
}

function saveString($str)
{
	//not allow ',`,--,//,/*,*/,#,*,<,>,|
	$char = ["'", "`", "--", "//", "/*", "*/", "#", "*", "<", ">", "|", "="];
	$newStr = str_replace($char, '', htmlspecialchars($str, ENT_QUOTES ) );
	if ( $newStr == $str ) {
		return $newStr;
	} else {
		return false;
	}
}

function tgl_Id($tanggal){
	$bulan = array ( 1 => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
	$pecahkan = explode('-', $tanggal); 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
function direct($url)
{
	header("Location: {$url}");
	exit(0);
}
function getSession($nameS, $nameV=null, $param = true)
{
	if ($param) {
		session_name($nameS);
		session_start();
	}
	if (is_null($nameV)) {
		return isset($_SESSION) ? $_SESSION : null;
	} else {
		return isset($_SESSION[$nameV]) ? $_SESSION[$nameV] : null;
	}
	
}

function curl_getAPI(string $url, bool $arr = false)
{
	$curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    if ($arr) {
	    return json_decode($result, true);
    } else {
	    return $result;
    }
}

function createDateInt($time)
{
	list($hours, $minutes, $seconds) = sscanf($time, '%d:%d:%d');
	$interval = sprintf('PT%dH%dM%dS', $hours, $minutes, $seconds);
	$tim = new DateInterval($interval);
	return $tim;
}