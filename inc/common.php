<?php

// Turn on all errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

set_include_path(get_include_path() . PATH_SEPARATOR . 'E:/dev/php/classes');
set_include_path(get_include_path() . PATH_SEPARATOR . 'E:/dev/php/functions');

include("JAK/RelationalDatabase.php");
include("JAK/PdoQueryResult.php");
include("JAK/Printer.php");
include("utilities.php");

class Common
{
	public $pdo;
	
	public function &PDO()
	{
		if (!$this->pdo)
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=2d', 'root', '');
			
			if (!$this->pdo)
			{
				throw new Exception("Could not create PDO instance.");
			}
			
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		
		return $this->pdo;
	}
}

$common = new Common();

$path = pathinfo($_SERVER['PHP_SELF']);
$title = $path['filename'];
$title = preg_replace("/[^a-zA-Z0-9]/", " ", $title);
$title = preg_replace("/ +/", " ", $title);
$title = ucwords($title);

$page = (object)array();
$page->html = (object)array();
$page->html->title = $title;

// ini_set('display_errors', 'on');
// error_reporting(-1);

// session_start();

// function error_handler($errno, $errstr)
// {
	// // Suppressed warnings
	// if (!error_reporting())
	// {
		// return FALSE;
	// }
	
	// print_r(func_get_args());
	// return FALSE;
// }

// // set_error_handler('error_handler');

// set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '/../classes');
// require_once(__DIR__ . '/functions.php');

// // Base path of 
// $uri_base_path = $uri_base_path_h = '/j/2d/';

// require_once("Database.php");

// $db = new Database
// (
   // 'mysql:host=127.0.0.1;dbname=lovely25_metadb;',
   // 'lovely25_root',
   // '1pooponpsi'
// );

// $db->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
