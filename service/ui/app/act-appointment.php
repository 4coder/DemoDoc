<?php
include("./conf/config.inc.php");
$patientData = $_POST;
$apntData['apnt_starttime'] = $patientData['apntStart'];
$apntData['apnt_endtime'] =  $patientData['apntEnd'];
$apntData['apnt_date'] = $patientData['apntDate'];
$apntData['doctor_id'] = $doctorID;
$apntData['patient_id'] = $_SESSION['userID'];
$apntData['apnt_note'] =  $patientData['notes'];
$apntData['status'] = 0;
echo $userID =  $scad->insert('doctor_appointments',$apntData);
?>