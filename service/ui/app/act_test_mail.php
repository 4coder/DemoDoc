<?php
include("./conf/config.inc.php");
$patientData = $_POST;
 $random = substr(number_format(time() * mt_rand(),0,'',''),0,10);
 $Data['secret_key']=$random;
 $Data['status']=0;
 $ran=md5($random);
		$toMail  = $patientData['mail'];
		$toName  = "arun pandi";
		$subject = 'Welcome to Bookmydoc!';
		$mailTemplate = '<div><h3 style="padding:12px;">Congragulation...!</h3><div style="padding:12px;font-family:Arial, Helvetica, sans-serif;font-size:14px;">You are successfully registered with Bookmydoc.<br /><a href="http://demo.techware.co.in/Bookmydoc/verify_account/'.$ran.'">Click the here to verify your account</a></div>';
		if($userID =  $scad->insert('users',$Data)){
		echo $result= $scad->mailSending($toMail,$toName,$subject,$mailTemplate);	
		}
	
?>