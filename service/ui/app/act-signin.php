<?php
include("./conf/config.inc.php");
$patientData = $_POST;
//print_r($patientData);
if(!empty($patientData)){
	$result = $scad->userDeatails($patientData['email'],$patientData['password']);
	//print_r($result);exit;
	if(!empty($result)){
	if($result['status']==0){
		echo 3;
		}
	else{
	
		$_SESSION['userID'] = $result['id'];	
		$_SESSION['userType'] = $result['usertype'];
		echo $redirectlag =$result['dob'].",".$result['gender'].",".$result['id'].",".$result['usertype'];
	}
	}else{
		echo $redirectlag = '0';
	
	}
}
?>