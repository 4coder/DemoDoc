<?php
include("./conf/config.inc.php");
$Data = $_POST;
//print_r($Data);
$result = $scad->userExistancy(base64_decode($Data['mail']));	
//print_r($result);exit;
	if(!empty($result)){

		$data['status']=1;
		$table='users';
		$where='mail='.base64_decode($Data['mail']).' and secret_key='.md5($Data['key']);
			$userID =  $scad->update($table, $data, $where);
			$_SESSION['userID'] = $result['id'];	
echo $result['usertype'];
	}
	else{
		echo 0;
		}
	
?>