<?php include("conf/config.inc.php");
Function GetDays($sStartDate, $sEndDate){  
  $sStartDate = gmdate("Y-m-d", strtotime($sStartDate));  
  $sEndDate = gmdate("Y-m-d", strtotime($sEndDate));  
  $aDays[] = $sStartDate;  
  $sCurrentDate = $sStartDate;  
  while($sCurrentDate < $sEndDate){  
    $sCurrentDate = gmdate("Y-m-d", strtotime("+1 day", strtotime($sCurrentDate)));  
    $aDays[] = $sCurrentDate;  
  }  
  return $aDays;  
}  
//print_r(GetDays('2007-01-01', '2007-01-02'));exit;
//print_r($data);exit;
//$sql = "SELECT * FROM " . DB_PREFIX . "doctor_appointments` WHERE  apnt_date between ";			
			//$apntmnt= $this->db->get_results($sql,ARRAY_A);
if($apntmnt){
	$resID = explode("_",$groupID);
	$apntID = $resID['0'];
	$doctorID = $resID['1'];
	$patientID = $resID['2'];
	$result = $scad->getDisplayEvents($apntID,$doctorID,$patientID);
	echo json_encode($result);
}else{
	$result = $scad->getDoctorEvents($doctorID);
	//print_r($result);exit;
	$responseArr = array();
	$j=0;
	foreach($result as $key=>$value){
		$responseArr[$key]['id'] = $value['id']."_".$value['doctor_id']."_".$value['patient_id'];
		$responseArr[$key]['title'] = $value['apnt_note'];
		$responseArr[$key]['start'] = $value['apnt_date']."T".$value['apnt_starttime'];
		$responseArr[$key]['end'] = $value['apnt_date']."T".$value['apnt_endtime'];
		$responseArr[$key]['allDay'] = false;
		if($value['status'] == '0'){
			$responseArr[$key]['className'] =	'customRequest test';
		}else if($value['status'] == '1'){
			$responseArr[$key]['className'] =	'customApproved test';		
		}else{
			$responseArr[$key]['className'] =	'customCancelled test';
		}
		$j++;
	}
	echo json_encode($responseArr);
	/*$result=$scad->getUserDetails($doctorID);
	$vecation=$result[vecation];
	$vecationtime=json_decode($vecation,true);
	$len=count($vecationtime);
	//echo "len=".
	//echo "j=".$j;
	//echo "total=".($len+$j);
	$i=$j;
	$k=0;
	$z=0;
	for($i=$j;$i<$len+$j;$i++){
		$ve_dates=GetDays($vecationtime[$k][startdate], $vecationtime[$k][enddate]);
		$vec_dates[]=GetDays($vecationtime[$k][startdate], $vecationtime[$k][enddate]);
		$cot=count($ve_dates);
		$starttime=$vecationtime[$k][starttime];
		$endtime=$vecationtime[$k][endtime];
		for($l=$z,$y=0;$l<$r+$cot;$l++,$y++){
			$g=$l;
		$responseArr1['id'] = '';
		$responseArr1['title'] = 'vacation';
		$responseArr1['start'] = $ve_dates[$y]."T".$starttime;
		$responseArr1['end'] = $ve_dates[$y]."T".$endtime;
		$responseArr1['allDay'] = false;
		$responseArr1['className'] =	'vecation';
		array_push($responseArr,$responseArr1);
		  $z++;
		}
		$r = $z;
		$k++;
		}
		$vec_count=count($vec_dates);
		$date=date('Y-m-d');
		$Date1 = date('Y-m-d', strtotime($dateCnt. ' + 90 days'));
		$br_dates=GetDays($date, $Date1);
		$br_count=count($br_dates);
 $breaks=$result[breaks];
	$breaktime=json_decode($breaks,true);
	for($m=0;$m<$br_count;$m++){
		$day=date('D',strtotime($br_dates[$m]));
		$responseArr2['id'] = '';
		$responseArr2['title'] = 'BreakTime';
		$responseArr2['start'] = $br_dates[$m]."T".$breaktime[$day][start];
		$responseArr2['end'] = $br_dates[$m]."T".$breaktime[$day][ends];
		$responseArr2['allDay'] = false;
		$responseArr2['className'] =	'breaks';
		array_push($responseArr,$responseArr2);
	}
echo json_encode($responseArr);		*/
}
?>
