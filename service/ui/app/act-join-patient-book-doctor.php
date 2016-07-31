<?php
include("./conf/config.inc.php");
$patientData = $_POST;
if(!empty($patientData)){
	$result = $scad->userExistancy($patientData['email']);	
	if($result==''){
		$patientData['password'] = md5($patientData['password']);
		$patientData['createdate'] = date('Y-m-d H:i:s');
		$patientData['usertype'] = 2;
		$patientData['status'] = 1;
		/*$data='';
		$data.='<small class="dr_apointsubname2">Insurance</small><div style="width:300px;">'.$patientData["insuranceSelect"].'</div>';
		$data.='<small class="dr_apointsubname2">Sub Insurance</small><div style="width:300px;">'.$patientData["subInsuranceSelect"].'</div>';
		$data.='<small class="dr_apointsubname2">Reason for your visit</small><div style="width:300px;">'.$patientData["srchReason"].'</div>';
		$data.='<small class="dr_apointsubname2">Patient Name</small><div style="width:300px;">'.$patientData["firstname"].' '.$patientData["lastname"].'</div>';
		$data.='<small class="dr_apointsubname2">Date of birth</small><div style="width:300px;">'.$patientData["dob"].'</div>';
		$data.='<small class="dr_apointsubname2">Gender</small><div style="width:300px;">'.$patientData["gender"].'</div>';
		$data.='<small class="dr_apointsubname2">Email</small><div style="width:300px;">'.$patientData["email"].'</div>';
		$data.='<small class="dr_apointsubname2">Appointment time </small><div style="width:300px;">'.$patientData["dateandtime"].'</div>';
		echo $data;*/
		unset($patientData['privacy']);
		$userID =  $scad->insert('users',$patientData);
		$_SESSION['userID'] = $userID;		
		echo $userID;
		$toMail  = $patientData['email'];
		$toName  = $patientData['firstname']." ".$patientData['lastname'];
		$subject = 'Welcome to Bookmydoc!';
		$mailTemplate = '<div><h3 style="padding:12px;">Congragulation...!</h3><div style="padding:12px;font-family:Arial, Helvetica, sans-serif;font-size:14px;">You are successfully registered with Bookmydoc.</div>';
		$scad->mailSending($toMail,$toName,$subject,$mailTemplate);	
	}else{	
		echo $errorflag = 0;
	}
}
?>