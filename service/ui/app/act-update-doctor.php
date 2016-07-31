<?php
include("./conf/config.inc.php");
$patientData = $_POST;
 if(!empty($patientData)){
		$Data['email'] = $patientData['email'];
		$Data['firstname'] = $patientData['firstname'];
		$Data['lastname'] = $patientData['lastname'];
		$Data['zipcode'] = $patientData['code'];
		$condition="id=".$_SESSION['userID'];
	echo	$userID =  $scad->update('scad_users',$Data,$condition);
//		ech$userID;
} else{
echo $errorflag = 0;
}
?>