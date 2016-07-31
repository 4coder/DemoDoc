<?php
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(1);
//error_reporting(1);
ini_set('display_errors', 'On');

define("APP_PATH", './'); 






//define("BASE_URL","http://localhost/scheduleadoc/service/ui/app/");  
//define('WEB_ROOT','http://localhost/scheduleadoc/');
//define('SLIM_ROOT','http://'.$_SERVER['HTTP_HOST'].'/scheduleadoc/');

define("BASE_URL","http://bookmydoctor.azurewebsites.net/service/ui/app/"); 
define('WEB_ROOT','http://bookmydoctor.azurewebsites.net/');
define('SLIM_ROOT','http://'.$_SERVER['HTTP_HOST']);

define("DB_PREFIX", 'scad_');

//Mail Server Setting
define("MAIL_USERNAME", 'no-reply@techware.co.in');
define("MAIL_PASSWORD", 'Golden_reply');
define("FROM_ADDRESS", 'no-reply@techware.co.in');
define("FROM_NAME", 'Scheduleadoc');




//$dbusername = 'root';
//$dbpassword = '';
//$hostname = 'localhost';

$dbusername = 'twmysql';
$dbpassword = 'Golden_123';
$hostname = '168.61.144.41';


$db = 'scheduleadoc_db';

define("host",$hostname); 
define("dbusername",$dbusername); 
define("dbname",$db);
define("dbpassword",$dbpassword); 

include_once APP_PATH."lib/ezSQL/ez_sql_core.php";
include_once APP_PATH."lib/ezSQL/ez_sql_mysql.php";
require_once APP_PATH."service/data/class.mysqldb.php";

$scad = new mysqldb();

?>