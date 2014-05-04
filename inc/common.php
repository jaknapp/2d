<?php

ini_set('display_errors', 'on');
error_reporting(-1);

session_start();

function error_handler($errno, $errstr)
{
	// Suppressed warnings
	if (!error_reporting())
	{
		return FALSE;
	}
	
	print_r(func_get_args());
	return FALSE;
}

// set_error_handler('error_handler');

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '/../classes');
require_once(__DIR__ . '/functions.php');

// Base path of 
$uri_base_path = $uri_base_path_h = '/j/2d/';

require_once("Database.php");

$db = new Database
(
   'mysql:host=127.0.0.1;dbname=lovely25_metadb;',
   'lovely25_root',
   '1pooponpsi'
);

$db->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
