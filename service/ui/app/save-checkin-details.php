<?php
include("./conf/config.inc.php");
$idr=$_SESSION[userID]."-user_registration-".$_SESSION['regDocid'];
$idq=$_SESSION[userID]."-user_queries-".$_SESSION['regDocid'];
$idi=$_SESSION[userID]."-user_insurence-".$_SESSION['regDocid'];
$table="checkin";
$data['user_id']=$_SESSION[userID];
$data['doctor_id']=$_SESSION[regDocid];
$data['reg_details']=$_COOKIE[$idr];
$data['medical_details']=$_COOKIE[$idq];
$data['insurence_details']=$_COOKIE[$idi];
$data['apnt_id']=$_SESSION['apnt_ID'];
$result=$scad->insert($table, $data);
if($result>0)
{
	echo 1;	
}
else{
	echo 0;
	}
?>