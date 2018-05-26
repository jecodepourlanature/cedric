<?php
if (getenv("TEST") != 1) {
	echo "set env TEST = 1 to confirm\n";
	exit(1);
}
if (preg_match("/dbname=([a-zA-Z0-9]+)/", getenv('DATABASE_DSN'), $m)) {
	list(,$dbname) = $m;
	echo "db = $dbname\n";
	$connection = new PDO(getenv('DATABASE_DSN'), getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'));
	$connection->query('drop database cedric');
	$connection->query('create database cedric');
}
