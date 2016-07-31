<?php
include("./conf/config.inc.php");
$postData=$_POST;
if(!empty($postData)){
	$Data = $postData['Contain'];	
	$id=$postData['drId'];
	$total_count=$postData['total_count'];
	$day=array(Mon,Tue,Wed,Thu,Fri,Sat,Sun);
	$st=explode(",",$Data);
	$datacount=count($st);
	$count=explode(",",$total_count);
	$len=count($count);
		//echo $count[$i]."<br>";
		for ($i=0;$i<$datacount;$i++){
    if (($i+2)%2==0) {
        $Arr3[]=$st[$i];
    }
    else {
        $Arr2[]=$st[$i];
    }
}
//print_r($Arr2);
//print_r($Arr3);
$t=0;
$s=0;
for ($i=0;$i<$len;$i++){
	if($count[$i]>1){
		$ne=$t+$count[$i];
		$tset=[];
	for ($j=$t;$j<$ne;$j++){		
		$tset[]=array("start"=>$Arr3[$j],"ends"=>$Arr2[$j]);
$result[$day[$i]]=$tset;
$t++;
}
	}
	else{
		$ne=$t+$count[$i];
		for($k=$t;$k<$ne;$k++){
	$result[$day[$i]]=array("start"=>$Arr3[$k],"ends"=>$Arr2[$k]);
	$t++;
		}
	}
}
$final['breaks'] = json_encode($result);
$condition="id=".$id;
$res=$scad->update('users',$final,$condition);
echo $re=1;
}
else{
	echo $error=0;
}
?>