<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//function md5+salt
function md5x($pass, $salt='aulssbe&opg&opflru@%%%^*asi$*pengaduan-ngadu@#%'){
	$pass = $salt.md5($pass);
	return md5($pass);
}
function server_info()
{
	global $_SERVER;
	#pre($_SERVER);
	$php_self	= isset($_SERVER['PHP_SELF'])? "http://".$_SERVER['SERVER_NAME'].
		$_SERVER['PHP_SELF']:'';
	$req_uri	= isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:'';
	$referer_page 	= (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']!="") ? 
		$_SERVER['HTTP_REFERER']:'';

	$remote_address = getRealIpAddr();//isset($_SERVER["REMOTE_ADDR"])?$_SERVER["REMOTE_ADDR"]:'';

	$arr_data = array(
		'referer_page'	=> $referer_page,
		'php_self'		=> $php_self,
		'req_uri'		=> $req_uri,
		'remote_address'=>$remote_address
	);

	return $arr_data;
}

function isCurl(){
    return function_exists('curl_version');
}
