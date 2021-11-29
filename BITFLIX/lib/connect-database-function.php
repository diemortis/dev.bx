<?php

function connectDatabase(array $config_db): mysqli
{
	extract($config_db, EXTR_OVERWRITE);
	$mysqli = mysqli_init();
	if (!$mysqli->real_connect($hostname, $username, $password, $dataBaseName)){
		trigger_error('connection failed');
	}
	if ($mysqli->set_charset('utf8mb4_unicode_ci')){
		trigger_error('encoding setup failed');
	}
	return $mysqli;
}
