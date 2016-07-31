<?php
include("conf/config.inc.php");
$currDate = date('Y-m-d');
$doc=$allDoctors;

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

	$result=$scad->getUserDetails($doc);
	$id[]= $result[id];
	 $t=$result[working_plan];
	 $b=$result[breaks];
	 $v=$result[vecation];
	 $docId[]=$result[id];
	$work[]=json_decode($t,TRUE);
	$break[]=json_decode($b,TRUE);
	$vecation[]=json_decode($v,TRUE);
$count=0;
foreach($docId as $value){
 	$apntdetails=$scad->getAppointmentDetails($value);
	foreach($apntdetails as $keey=>$valus){
		$apnts[]=array($valus[apnt_date]=>array($valus[doctor_id]=>array(start=>$valus[apnt_starttime],ends=>$valus[apnt_endtime],dates=>$valus[apnt_date])));
		$count++;
	}
	}
	foreach($vecation as $key=>$valueve){
			$leng=count($valueve);
		for($jk=0;$jk<$leng;$jk++){
			$valueve[$jk][startdate];
			$vecation_dates[] = GetDays($valueve[$jk][startdate], $valueve[$jk][enddate]);
			 $vecation_start = strtotime($valueve[$jk][starttime]);
		 $vecation_end = strtotime($valueve[$jk][endtime]);
		 $vecation_time=$vecation_start."-".$vecation_end;
		 while($vecation_time<$vecation_end){
				 $vecation_Time[] = date('H:i A', $vecation_time);
				$vecation_time = strtotime('+15 minutes', $vecation_time);
			}
			$ve_time[]=$vecation_Time;
		}}
		/*echo "<pre>";
		print_r($vecation_dates);*/
		$max=count($apnts);
	for($i=0;$i<1;$i++){
		if(empty($work[$i])){
					$Date = date('Y-m-d', strtotime($currDate. ' + 0 days'));
		echo get_error($Date,$work[$i],$break[$i],$id[$i],$apnts,$max);	
			}else{
	if($status == 'first'){
		$Date = date('Y-m-d', strtotime($currDate. ' + 0 days'));
		echo get_week_dates($Date,$work[$i],$break[$i],$id[$i],$apnts,$max,$ve_time,$vecation_dates);
	}else if($status == 'next'){
		$Date = date('Y-m-d', strtotime($dateCnt. ' + 7 days'));
		echo get_week_dates($Date,$work[$i],$break[$i],$id[$i],$apnts,$max,$ve_time,$vecation_dates);
	}else{
		$Date = date('Y-m-d', strtotime($dateCnt. ' - 7 days'));
		echo get_week_dates($Date,$work[$i],$break[$i],$id[$i],$apnts,$max,$ve_time,$vecation_dates);
		}
			}
}
	function calendarPeriod($firstTime,$lastTime,$breakTime,$res,$i,$apns,$max,$dateInc,$ve_time,$vecation_dates)
{

$time=$firstTime."-".$lastTime;
$ve_date_len=count($vecation_dates);
$breakmax=count($breakTime[$res]);
$breakMax=count($breakTime[$res],1);
if($breakMax > 2){
		for($j=0;$j<$breakmax;$j++){
		 $break_start = strtotime($breakTime[$res][$j]['start']);
		 $break_end = strtotime($breakTime[$res][$j]['ends']);
		 $break_time=$break_start."-".$break_end;
		 while($break_time<$break_end){
				 $brTime[] = date('H:i A', $break_time);
				$break_time = strtotime('+15 minutes', $break_time);
			}
		}
}
else{
	 $break_start = strtotime($breakTime[$res]['start']);
	 $break_end = strtotime($breakTime[$res]['ends']);
		 $break_time=$break_start."-".$break_end;
		 while($break_time<$break_end){
				 $brTime[] = date('H:i A', $break_time);
				$break_time = strtotime('+15 minutes', $break_time);
			}
}
/*echo "<pre>";
print_r($breakTime);
echo "<pre>";
echo $dateInc;
print_r($apns);*/
for($j=0;$j<$max;$j++){
		   $apnt_start = strtotime($apns[$j][$dateInc][$i]['start']);
		   $apnt_end = strtotime($apns[$j][$dateInc][$i]['ends']);
		 $apnt_time=$apnt_start."-".$apnt_end;
		 while($apnt_time<$apnt_end){
				 $apntTime[] = date('H:i A', $apnt_time);
				$apnt_time = strtotime('+15 minutes', $apnt_time);
			}
		}
		//print_r($apntTime);
	$html = '';
	while($time < $lastTime){
				 $Times[] = date('H:i A', $time);
				$time = strtotime('+15 minutes', $time);
			}
			$k=0;
			if($ve_date_len > 0){
	for($vei=0;$vei<$ve_date_len;$vei++){
			if(in_array($dateInc,$vecation_dates[$vei])){
		foreach($Times as $key=>$value)
		{
			if(in_array($value,$ve_time[$vei])){
			$tmpAry[$key]="vacation";
			}
		}
	}
	else{
		foreach($Times as $key=>$value){
			//echo $value."<br>";
			
		
			if(in_array($value,$brTime)){
				$tmpAry[$key]="Break";
			}elseif(in_array($value,$apntTime) ){
				$tmpAry[$key]="Booked";
			}

			}
		}
			}
			}
			else{
			foreach($Times as $key=>$value){
			if(in_array($value,$brTime)){
				$tmpAry[$key]="Break";
			}elseif(in_array($value,$apntTime) ){
				$tmpAry[$key]="Booked";
			}

			}
			}
			if(!empty($tmpAry)){
		$basket = array_replace($Times, $tmpAry);
			}
			else{
				$basket=$Times;
				}
			/*echo "<pre>";
			print_r($basket);*/
			$k=0;
			foreach($basket as $key=>$value){
			//echo $value;
				$k++;
				if($k == 6){
			$finalBorder = 'bottomBorder1';
		}
		elseif($k<6){
			$finalBorder = 'test1';
		}
		else{
			$finalBorder = 'test2';
		}
					if($k==6){
					$html .='<li  value="'.$i.'" class="'.$finalBorder.'  moreClk'.$i.'  appointDate1">More</li>';
					}else{
						if($value==end($Times)){
							if($value=="Break" || $value=="Booked" || $value=="vecation"){
										$html .='<li class="show'.$i.' '.$finalBorder.'">'.$value.'</li>';					
									}
									else{
				$html .='<li class="'.$finalBorder.' '.$i.' appointDate" id="'.$i.'_'.$res.' '.$dateInc.'_'.$value.'">'.$value.'</li>';
									}
							$html .='<li value="'.$i.'" class="'.$finalBorder.' more'.$i.' last show'.$i.' appointDate1">Less</li>';
						}else{
							if($k>6){
									if($value=="Break" || $value=="Booked" || $value=="vecation"){
										$html .='<li class="'.$finalBorder.' show'.$i.'">'.$value.'</li>';					
									}
									else{
				$html .='<li class="'.$finalBorder.' show'.$i.' appointDate" id="'.$i.'_'.$res.' '.$dateInc.'_'.$value.'">'.$value.'</li>';
									}				
							}else{
								if($value=="Break" || $value=="Booked" || $value=="vecation"){
										$html .='<li class="'.$finalBorder.' '.$i.'">'.$value.'</li>';					
									}
									else{
				$html .='<li class="'.$finalBorder.' '.$i.' appointDate" id="'.$i.'_'.$res.' '.$dateInc.'_'.$value.'">'.$value.'</li>';
									}
							}
						}
					}
					
			}
	return $html;
}
function get_error($Date,$work,$break,$id,$apns,$max)
{
	
		
			$data .= '<div class="" align="center" style="background: none repeat scroll 0 0 #ccc;width: 772px;text-align: center;line-height:198px;min-height: 208px;vertical-align: middle;color:blue;" >';
			$data .="No availability these days.";
			$data .= '</div>';
	return $data;
}
function get_week_dates($Date,$work,$break,$id,$apns,$max,$ve_time,$vecation_dates)
{
	$start = strtotime($Date);
	$data = '';
	//if(empty($work)){
		
		/*$data .= '<div class="calender_custom1">';
		$data .= '<div class="calender_custom1">';
		$data .= '<div class="calender_custom1">';*/
		//$data .= '<div class="calender_custom1cl">';

		//$data .= '<div class="" align="center" style="min-height:208px;background:red;width: 417px;text-align: center;vertical-align: middle;line-height: 200px;color:blue;" >Time Not Specified</div>';
		/*$data .= '</div>';
	$data .= '</div>';
	$data .= '</div>';*/
		//}else{
	
		for( $i = 0; $i < 7; $i++ )
	{
	$res = date( 'D' , ( $start + ( $i * ( 60 * 60 * 24 ) ) ) );
		 $breakTime = $break;
		 $breakMax = count($breakTime,1);
		 $startTime = $work[$res][start];
		 $endTime = $work[$res][ends];
		$res = date( 'D' , ( $start + ( $i * ( 60 * 60 * 24 ) ) ) );
		//echo $res;
		$dateInc = date( 'Y-m-d' , ( $start + ( $i * ( 60 * 60 * 24 ) ) ) );
		//for($i=0;$i<$max;$)
		/*$break_start = $breakTime[$res]['start'];
		echo $res."=>".$break_start."<br>";*/
	//echo  $break_end = $breakTime[$res]['ends'];
		$data .= '<div class="calender_custom_viewProf">';
		$data .= '<div class="calender_custom_viewProfcl">';
		$data .= '<input type="hidden" class="cldr_cstm_hdtxt2 firstDate_'.$i.'" value="'.$res." ".date( 'd-m-Y' , ( $start + ( $i * ( 60 * 60 * 24 ) ) ) ).'">';
			$data .= '<ul class="cellColor'.$id.' ul'.$i.'">';
			$data .='<li class="" style="border-top:1px solid #ccc">'.$res." ".date( 'd-m-Y' , ( $start + ( $i * ( 60 * 60 * 24 ) ) ) ).'</li>';
		$data .= calendarPeriod(strtotime($dateInc." ".$startTime),strtotime($dateInc." ".$endTime),$breakTime,$res,$id,$apns,$max,$dateInc,$ve_time,$vecation_dates);
				$data.= '</ul>';		
		$data .= '</div>';
		$data .= '</div>';
	//}
}
	return $data;
}
?>