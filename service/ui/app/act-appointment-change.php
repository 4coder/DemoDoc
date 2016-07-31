<?php
include("./conf/config.inc.php");
if($action == 'delete'){
	$condition="id=".$eventID;
	$scad->delete('doctor_appointments',$condition);
	echo 'deleted';
}else if($action == 'update'){
	$apntData['apnt_starttime'] = $start;
	$apntData['apnt_endtime'] = $end;
	$apntData['apnt_date'] = $apntDate;
	$condition="id=".$eventID."";		
	$scad->update('doctor_appointments',$apntData,$condition);
	echo 'updated';
}else if($action == 'unapprove'){
	$apntData['status'] = 2; 
	$condition="id=".$eventID."";		
	$scad->update('doctor_appointments',$apntData,$condition);
	echo 'unapproved';
}else{
	$apntData['status'] = 1; 
	$condition="id=".$eventID."";		
	$scad->update('doctor_appointments',$apntData,$condition);
	echo 'approved';
}
?>