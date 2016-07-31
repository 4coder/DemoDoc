<?php
include("./conf/config.inc.php");
$Data = $_POST;
$data=json_encode($Data);
$id=$_SESSION[userID]."-user_registration-".$_SESSION['regDocid'];
//setcookie($id, $data, time()+3600);
if (setcookie($id, $data, time()+3600))
  echo 1;
else
  echo 0;
?>