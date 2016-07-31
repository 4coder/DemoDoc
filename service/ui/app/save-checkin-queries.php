<?php
include("./conf/config.inc.php");
//print_r($_POST);
$Data1 = $_POST;
$data1=json_encode($Data1);
$id1=$_SESSION[userID]."-user_queries-".$_SESSION['regDocid'];
//setcookie($id1, $data1, time()+3600);
//print_r($_COOKIE[$id1]);exit;
if (setcookie($id1, $data1, time()+3600))
  echo 1;
else
  echo 0;
?>