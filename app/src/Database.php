<?php

class Database{

	const DB_HOST = "localhost";
	const DB_USER = "root";
	const DB_PWD = "";
	const DB_NAME = "hotelsys";


	protected function db_connect(){
		$dsn = 'mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME;
		$pdo = new PDO($dsn, self::DB_USER, self::DB_PWD);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
			PDO::FETCH_ASSOC);
		return $pdo;
	}
}