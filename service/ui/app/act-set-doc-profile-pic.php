<?php include("conf/config.inc.php");
$condition="id=".$imgID;
//echo $imgID;
 $data['set_profile']=1;
	//  echo $condition;
	$where="user_id=".$_SESSION['userID'];
	$res=$scad->checkProfileImageExist('userImages',$where);
//	print_r($res);
$data1['set_profile']=0;
$result = $scad->update('userimages',$data1,$where);
$result = $scad->update('userimages',$data,$condition);
echo $result;
//print_r(result);
//echo json_encode($responseArr);
?>
