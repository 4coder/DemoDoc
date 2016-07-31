<?php
include("./conf/config.inc.php");
$patientData = $_POST;
if(!empty($patientData)){
$apntData['doctor_id'] = $patientData['doctor_id']; 
$apnttime = $patientData['apnttime'];
$time=explode(",",$apnttime);
$tim=explode(" ",$time[2]);
$time1=$tim[2];
$ti=strtotime($time1);
$apntData['patient_id'] = $patientData['patiendid'];
$apntData['apnt_note'] = $patientData['apnt_note'];
 $apntData['apnt_starttime'] = $time1; 
$apntData['apnt_date'] = date("Y-m-d", strtotime($time[0]));
$time2 = strtotime('+15 minutes', $ti);
$Times = date('H:i A', $time2);
$apntData['apnt_endtime'] = $Times; 

$result=$scad->getApntDetails($apntData['doctor_id'],date("Y-m-d", strtotime($time[0])),$time1,$apntData['patient_id']);

if(empty($result)){
 $userID =  $scad->insert('doctor_appointments',$apntData);
echo $_SESSION['apnt_ID']=$userID;
if(!empty($userID)){
		 $toMail  = $patientData['email'];
		$ma=base64_encode($toMail);
		$toName  = $patientData['name'];
		$subject = 'Appointment Conformation!';
		 $mailTemplate = '<div><img src="'.WEB_ROOT.'/service/public/images/logo.png" ><br/><br />
		<div style="padding:12px;font-family:Arial, Helvetica, sans-serif;font-size:14px;">
		<b>Confirm appointment with '.$patientData[docname].' has been scheduled for '.$patientData[apnttime].'.</b><br /><br />
		Book My Doc<br />
		To Me Today at '.date("H:i").' PM Book My Doc '.$patientData[docname].' on '.$patientData[apnttime].'.<br /><br/>
		Kind Regards,<br />
Your Book My Doc Team<br /><br />
<a href="'.WEB_ROOT.'index.php//patient/profile" target="_blank">My Dashboard</a> | <a target="_blank" href="'.WEB_ROOT.'index.php/past_appoinments">My Appointments</a>  | <a target="_blank" href="'.WEB_ROOT.'index.php//patient/profile">My Preferred Doctors</a>  |<a target="_blank" href="'.WEB_ROOT.'index.php/search"> Find Doctors</a> <br /><br />
Book My Doc Contact us at service@Bookmydoc.om<br />
1180 Spring Centre South Blvd. Suite 209, Altamonte Springs, FL 32714<br /><br />
Kind Regards,<br />
Your Book My Doc Team<br /><br />
		</div>';
		$scad->mailSending($toMail,$toName,$subject,$mailTemplate);	
	}
	}
	else{
		echo $errorflag=0;
		}

//echo 1;
}

else{
	echo $errorflag=0;
	}
?>