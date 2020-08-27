<?php

	define('HOST','');
	define('DB_NAME','');
	define('USER','');
	define('PASS','');

	try{
		$db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOexpton $e){echo $e;}
