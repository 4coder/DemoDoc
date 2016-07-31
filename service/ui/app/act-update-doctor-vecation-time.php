<?php
include("./conf/config.inc.php");
$postData=$_POST;
if(!empty($postData)){
	 $startdate = $postData['startdate'];	
	 $enddate = $postData['enddate'];	
	 $starttime = $postData['starttime'];	
	 $endtime = $postData['endtime'];	
	 $id=$postData['drId'];
	$sd=explode(",",$startdate);
	$ed=explode(",",$enddate);
	$st=explode(",",$starttime);
	$et=explode(",",$endtime);
$len=count($sd);
for($i=0;$i<$len;$i++){
	if(!empty($sd[$i])){
	$result[]=array("startdate"=>date("Y-m-d", strtotime($sd[$i])),"enddate"=>date("Y-m-d", strtotime($ed[$i])),"starttime"=>date("Y-m-d", strtotime($st[$i])),"endtime"=>date("Y-m-d", strtotime($et[$i])));
	}
}
$final['vecation'] = json_encode($result);
$condition="id=".$id;
$res=$scad->update('users',$final,$condition);
echo $re=1;
}
else{
	echo $error=0;
}
?>