<?php
	session_start();
	require('Sys_Dev_Project\core\autoload.php');

	if(isset($_GET['lang'])){ 
		$lang = $_GET['lang'];
		setcookie("lang",$lang);
	}else
		$lang=(isset($_COOKIE["lang"])?$_COOKIE["lang"]:'en');
		$rootlang = preg_split('/_/', $lang);
		$rootlang = (is_array($rootlang)?$rootlang[0]:$rootlang);
		setlocale(LC_ALL, $rootlang.".UTF8");
		bindtextdomain($lang, "locale"); 
		textdomain($lang);
	