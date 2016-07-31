<?php
include("./conf/config.inc.php");
$postData=$_POST;
if(!empty($postData)){
	 $Data = $postData['Contain'];	
	 $id=$postData['drId'];
	$day=array(Mon,Tue,Wed,Thu,Fri,Sat,Sun);
	$st=explode(",",$Data);

for ($i=0;$i<count($st);$i++){
    if (($i+2)%2==0) {
        $Arr3[]=$st[$i];
    }
    else {
        $Arr2[]=$st[$i];
    }
}
for ($i=0;$i<count($day);$i++){
$result[$day[$i]]=array("start"=>$Arr3[$i],"ends"=>$Arr2[$i]);
}
$final['working_plan'] = json_encode($result);
$condition="id=".$id;
$res=$scad->update('users',$final,$condition);
echo $re=1;
}
else{
	echo $error=0;
}
?>