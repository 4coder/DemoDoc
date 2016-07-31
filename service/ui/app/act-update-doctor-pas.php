<?php
include("./conf/config.inc.php");
$patientData = $_POST;
 if(!empty($patientData)){
		$Data['pass'] = $patientData['cur_pass'];
		$Data['new_pass'] = $patientData['new_pass'];
		$Data['pass2'] = $patientData['re_pass'];
		$condition=$_SESSION['userID'];
		$p1=$Data['new_pass'];
				  $p2=$Data['pass2'];
	$userID =  $scad->getUserDetails($condition);
$pass= $userID['password'];	$passc=md5($Data['pass']);
if($pass===$passc){
	if($p1===$p2){
		$condition="id=".$_SESSION['userID'];
		$Dat['password']=md5($p2);
		echo	$userID =  $scad->update('scad_users',$Dat,$condition);exit;
	}
	else{
		echo '12';
	}
}else{
	echo "14";
}
	
//		ech$userID;
} else{
echo $errorflag = 0;
}
?>