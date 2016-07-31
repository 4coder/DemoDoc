<?php
include("./conf/config.inc.php"); 
$result = $wrt->getUserExist($username,$password);
if(!empty($result)){
	  $usersessionID = $wrt->setUserserSsion($result['id']);
	  $data=array("success"=>"1","error"=>"0","userData"=>array("sessionID"=>$usersessionID['usersession_id']));
	  echo json_encode($data);
}else{
	  $data=array("success"=>"0","error"=>"User doesn't exist","userData"=>"");
	  echo json_encode($data);
}
?>