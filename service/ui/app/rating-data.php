
 
<?php
include("./conf/config.inc.php");
$postData = $_POST;
 if(!empty($postData)){
	$result = $scad->userExistancy($postData['ratings']);	
	if($result==''){
		$Data['overall'] = $postData['ovrall'];
		$Data['beside'] = $postData['bsidemnr'];
		$Data['waiting'] = $postData['waiting'];
		$Data['message'] = $postData['msg'];
		$Data['userid'] = $postData['userget'];
		$Data['doctor_id'] = $postData['docId'];
		$userID =  $scad->insert('ratings',$Data);	
		 
	}
	else
	{	
		echo $errorflag = 0;
	}
} 
?> 




