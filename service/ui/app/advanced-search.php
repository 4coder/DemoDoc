<?php
include("./conf/config.inc.php");
if($_POST['page'])
{
	
parse_str($search);
//srchSpeciality=&srchZipcode=&insuranceSelect=&subInsuranceSelect=&srchReason=0&language=0&gender=0
$page = $_POST['page'];
$cur_page = $page;
$page -= 1;
$per_page = 5;
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$start = $page * $per_page;

	   $result = $scad->searchDoctorLimit($srchSpeciality,$srchZipcode,$insuranceSelect,$subInsuranceSelect,$srchReason,$language,$gender,$start,$per_page);
	   $result1 = $scad->searchDoctor($srchSpeciality,$srchZipcode,$insuranceSelect,$subInsuranceSelect,$srchReason,$language,$gender);
   //print_r($result);exit;
 $end= count($result);
 $end1=count($result);
 if(!empty($result1)){
   foreach ($result as $key => $value) {
				$val1  = $scad->getLnt($value['address']);
               // print_r($result1);
                //echo $value['address']."<br>";
                if ($value['imageName']) {
                    $docImage = $value['imageName'];
                } else {
                    $docImage = 'no_image.jpg';
                }
				$id1[]=$value['doctorID'];
                $userImg = WEB_ROOT . "service/public/z_uploads/doctor/small/" . $docImage;
                $wid1     = "100px";
                $img1     = "<img src=" . $userImg . " width=" . $wid1 . ">";
                $lat1[]   = $val1['lat'];
                $lng1[]   = $val1['lng'];
                $city1[]  = "<div style=" . "width:100%" . "><div style=" . "width:47%;" . "float:left" . ">" . $img1 . " </div><div style=" . "width:53%;" . "float:left" . ">" . $value['firstname'] . " " . $value['lastname'].$value['zipcode']."</div><div>".$value['address']."</div><a href=" . WEB_ROOT . "view-prrofile/" . $value['doctorID'] . " style="."padding:3px 13px"." class="."dr_bkonline"."> Book Online </a></div>";
			}
			for ($i = 0; $i < $end; $i++) {
                $mapData1[] = array(
                    $city1[$i],
                    $lat1[$i],
                    $lng1[$i]
                );
			}
	}
for($i=0;$i<$end;$i++);
{
    $msg="";
	//$msg.="<div style=\"border:solid #CCC 1px; float:left; height:30px; width:1170px;\"> </div>";
				if(!empty($result)){
					$kk = 0;
					
					foreach ($result as $key => $value){
						$kk++;
						$rat=$scad->getrting($value['doctorID']);
			$len=count($rat);
			  for($j=0;$j<$len;$j++){
				  $overall[$value['doctorID']][]=($rat[$j]['overall'] +$rat[$j]['beside'] +$rat[$j]['waiting'])/3  ;
				  }
			//print_r($overall);
			$rateval=0; 
			for($k=0;$k<count($overall[$value['doctorID']]);$k++){
			  $rate = $overall[$value['doctorID']][$k];
			 $rateval= $rateval+$rate;
			 }
			$doc_rating = round($rateval/count($overall[$value['doctorID']]));
						$spec = $scad->getSpeciality($value['specilaityID']);
						$val = $scad->getLnt($value['address']);
						//echo $value['address']."<br>";
						if($value['imageName']){
							$docImage = $value['imageName'];	
						}else{
							$docImage =  'no_image.jpg';
						}
						$id[]=$value['doctorID'];
						 $userImg=WEB_ROOT."service/public/z_uploads/doctor/small/".$docImage;
 $wid="100px";
 $img="<img src=".$userImg." width=".$wid.">";
 $lat[]=$val['lat'];
 $lng[]= $val['lng'];
 if($value['description']){
	 $desc = "<p>'".substr($value['description'], 0, 180). '...'."'</p>";
	  }
 $city[]="<div style="."width:100%"."><div style="."width:40%;"."float:left".">".$img." </div><div style="."width:40%;"."float:right".">".$value['firstname'].$value['lastname'].$value['address'].$value['zipcode']."</div><a href=" . WEB_ROOT . "view-prrofile/" . $value['doctorID'] . " style="."padding:3px 13px"." class="."dr_bkonline"."> Book Online </a></div>";
 $msg.="<li class='Doc".$value['doctorID']."' style='min-height:208px;margin-top: 1px; position:relative;'>
                     <div class=\"dr_pfl_thumbli_clm1\">
					  <div class=\"dr_prfl_crcl\">".$kk."</div>
                     
                        <img src=".WEB_ROOT."service/public/z_uploads/doctor/small/".$docImage." align=\"left\" alt=\"\">
                        <div class=\"dr_pfl_thumbli_adrs\">
                           <h1>Dr. ".$value['firstname'].$value['lastname']." <span class=\"dr_text\"> <!--MD--> </span></h1>
                           <p><b>". $spec['name']." </b> <br>".$value['address']."</p>
                        </div>
                        <div class=\"dr_pfl_btn\">
                           <a href=".WEB_ROOT."index.php/view-prrofile/".$value['doctorID']." class=\"dr_view\">View profile</a>
                          <a data-toggle=\"modal\" class=\"dr_bkonline\" target=" . $value['doctorID'] ."> Book Online </a>
                        </div>
                     </div>
                     <div class=\"dr_pfl_thumbli_clm2\">
                        <div class=\"dr_satr\">
                           <div class=\"rating\">
                              <input type=\"radio\" name=\"rating".$value['doctorID']."\" value=\"0\" ";
			if($doc_rating==0){$msg .= 'checked';}
			$msg .= " /><span id=\"drhide\"></span>
                              <input type=\"radio\" name=\"rating".$value['doctorID']."\" value=\"1\" ";
			if($doc_rating==1){$msg .= 'checked';}
			$msg .= " /><span></span>
                              <input type=\"radio\" name=\"rating".$value['doctorID']."\" value=\"2\" ";
			if($doc_rating==2){$msg .= 'checked';}
			$msg .= " /><span></span>
                              <input type=\"radio\" name=\"rating".$value['doctorID']."\" value=\"3\" ";
			if($doc_rating==3){$msg .= 'checked';}
			$msg .= "/><span></span>
                              <input type=\"radio\" name=\"rating".$value['doctorID']."\" value=\"4\" ";
			if($doc_rating==4){$msg .= 'checked';}
			$msg .= "/><span></span>
                              <input type=\"radio\" name=\"rating".$value['doctorID']."\" value=\"5\" ";
			if($doc_rating==5){$msg .= 'checked';}
			$msg .= "/><span></span>
                           </div>
                        </div>
                     </div>
					  $desc
                  </li>";
				}			
 for($i=0;$i<$end1;$i++){
$mapData[] = array($city[$i], $lat[$i], $lng[$i]);
 }
//print_r($allAddress);
 $jsonAddr = json_encode($mapData);
			$jsonAddr1 = json_encode($mapData1);
$jsonId=json_encode($id);
$jsonId1=json_encode($id1);
            $msg .= "<input type='hidden' value='" . $jsonAddr . "' class='allzips'>";
			$msg .= "<input type='hidden' value='" . $jsonAddr1 . "' class='allzips1'>";
			$msg.="<input type='hidden' value='".$jsonId."' class='allDoctors' name='allDoctors'>";
			$msg.="<input type='hidden' value='".$jsonId1."' class='allDoctors1' name='allDoctors1'>";
              $msg.=" 
            </div>
         </div>
         
         </div>
      </div>";

				}else{
					
                    $msg .="<li style=\" padding: 100px; width: 970px;z-index:3\">
                        <div class=\"alert alert-block alert-error fade in\">
                           <h4 class=\"alert-heading\">No results found.</h4>
                            <p>There are no search results for the requested search. Perform the search option with different search conditions</p>
                            <p>
                            </p>
                        </div>
                        </li>";
						$msg.="<input type='hidden' value='none' class='allzips'>";
				}}

$msg = "<div class='data'><ul>" . $msg . "</ul></div>"; // Content for Data


/* --------------------------------------------- */
/*$query_pag_num = "SELECT COUNT(*) AS count FROM us_zip_codes";
$result_pag_num = mysql_query($query_pag_num);
$row = mysql_fetch_array($result_pag_num);
$count = $row['count'];*/
$no_of_paginations = ceil($end / $per_page);

/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
if ($cur_page >= 7) {
    $start_loop = $cur_page - 3;
    if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > 7)
        $end_loop = 7;
    else
        $end_loop = $no_of_paginations;
}
/* ----------------------------------------------------------------------------------------------------------- */
$msg .= "<div class='pagination'><ul>";

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' class='activ'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactiv'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre' class='activ'>Prev</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactiv'>Prev</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' style='color:#fff;background-color:#006699;' class='activ'>{$i}</li>";
    else
        $msg .= "<li p='$i' class='activ'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' class='activ'>Next</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactiv'>Next</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' class='activ'>Last</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactiv'>Last</li>";
}
//$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
//$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
//$msg = $msg . "</ul>" . $goto . $total_string . "</div>";  // Content for pagination
echo $msg;
}
?>
