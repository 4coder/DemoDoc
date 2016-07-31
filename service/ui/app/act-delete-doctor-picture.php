<?php
include("./conf/config.inc.php");
$patientData = $_POST;
print_r($patientData);
 if(!empty($patientData)){
		echo $Data= $patientData['formData'];
		$condition="id=".$Data;
	echo	$userID =  $scad->delete('scad_userimages',$condition);exit;
//		ech$userID;
} else{
echo $errorflag = 0;
}
?>