<?php
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(1);
//error_reporting(1);
ini_set('display_errors', 'On');

define("APP_PATH", './'); 
define("BASE_URL","http://demo.techware.co.in/Bookmydoc/service/ui/app/"); 
define('WEB_ROOT','http://demo.techware.co.in/Bookmydoc/');
define('SLIM_ROOT','http://'.$_SERVER['HTTP_HOST'].'/Bookmydoc/');
define("DB_PREFIX", 'scad_');

//Mail Server Setting
define("MAIL_USERNAME", 'no-reply@techware.co.in');
define("MAIL_PASSWORD", 'Golden_reply');
define("FROM_ADDRESS", 'no-reply@techware.co.in');
define("FROM_NAME", 'Bookmydoc');



$dbusername = 'clicks6j_schadoc';
$dbpassword = 'WCBNLPdKydG4';
$hostname = 'localhost';
$db = 'clicks6j_Bookmydoc_db';

define("host",$hostname); 
define("dbusername",$dbusername); 
define("dbname",$db);
define("dbpassword",$dbpassword); 

include_once APP_PATH."lib/ezSQL/ez_sql_core.php";
include_once APP_PATH."lib/ezSQL/ez_sql_mysql.php";
require_once APP_PATH."service/data/class.mysqldb.php";

$scad = new mysqldb();

?>