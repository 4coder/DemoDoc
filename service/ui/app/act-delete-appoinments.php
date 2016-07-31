<?php
include("./conf/config.inc.php");
$patientData = $_POST;
print_r($patientData);
if(!empty($patientData)){
		$Data= $patientData['id'];
		$condition="id=".$Data;
	echo	$userID =  $scad->delete('doctor_appointments',$condition);
	//echo 1;
//		ech$userID;
} else{
echo $errorflag = 0;
}
?>