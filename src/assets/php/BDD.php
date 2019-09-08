<?php

	define('HOST','localhost');
	define('DB_NAME','beyserv_minecraft');
	define('USER','root');
	define('PASS','');

	try{
		$db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOexpton $e){echo $e;}