<?php
include("./conf/config.inc.php");
$Data = $_POST;
$data=json_encode($Data);
$id3=$_SESSION[userID]."-user_insurence-".$_SESSION['regDocid'];
//setcookie($id3, $data, time()+3600);
if (setcookie($id3, $data, time()+3600))
  echo 1;
else
  echo 0;
?>