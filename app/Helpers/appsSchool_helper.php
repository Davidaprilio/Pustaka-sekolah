<?php 
function decodeToken($token, $privateKey)
{
	$data = base64_decode($token);
	$config         = new \Config\Encryption();
	$config->key    = $privateKey;
	$config->driver = 'OpenSSL';
	$encrypter = \Config\Services::encrypter($config);
	return $encrypter->decrypt($data);
}
function direct($url)
{
	header("Location: {$url}");
	exit(0);
}
function verifiToken($key)
{
	$token = ( isset($_COOKIE['tknUOauth']) ) ? $_COOKIE['tknUOauth'] : null;
	if (is_null($token)) {
		return false;
	} else {
		$tokenBin = base64_decode($token);
		$config         = new \Config\Encryption();
		$config->key    = $key;
		$config->driver = 'OpenSSL';
		$encrypter = \Config\Services::encrypter($config);
		$token = $encrypter->decrypt($tokenBin);
		return $token;
	}
}
function tokenImportan($key)
{
	$token = $_COOKIE['tknUOauth'];
	if (!is_null($token)) {
		$tokenBin = base64_decode($token);
		$config         = new \Config\Encryption();
		$config->key    = $key;
		$config->driver = 'OpenSSL';
		$encrypter = \Config\Services::encrypter($config);
		$token = $encrypter->decrypt($tokenBin);
		return $token;
	} else {
		return header("Location: http://davidweb.localhost/Akun/masuk/goback");
	}
}