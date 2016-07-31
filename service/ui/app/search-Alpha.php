<?php
include("./conf/config.inc.php");

$data=$_POST;
//print_r($data);exit;

$page = $_POST['page'];
$alpha=$_POST['letter'];
$cur_page = $page;
$page -= 1;
$per_page = 12;
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$start = $page * $per_page;

 $result1 = $scad->getAlpha($alpha);
 $result = $scad->getAlpha1($alpha,$start,$per_page);
 $end  = count($result1);

        	
      

      
         $count=count($result);
		 if(!empty($result))
		 {
			 $msg .= '<ul style="width:100%;" class="ser_pag">';
			 
         for($i=0;$i<$count;$i++)
		 {
			$img= $scad->getDocProImg($result[$i]['id']);
			$rat=$scad->getrting($result[$i]['id']);
			//print_r($rat);
			$len=count($rat);
			  for($j=0;$j<$len;$j++){
				  $overall[$result[$i]['id']][]=($rat[$j]['overall'] +$rat[$j]['beside'] +$rat[$j]['waiting'])/3  ;
				  }
			//print_r($overall);
			$rateval=0; 
			for($k=0;$k<count($overall[$result[$i]['id']]);$k++){
			  $rate = $overall[$result[$i]['id']][$k];
			 $rateval= $rateval+$rate;
			 }
			 $doc_rating = round($rateval/count($overall[$result[$i]['id']]));
			if ($img['name']) {
				$docImage = $img['name'];
			} else {
				$docImage = 'no_image.jpg';
			}
		  $msg .= '<li style="width:372px;">
   <div class="prlf_close"><a href="'.WEB_ROOT.'index.php/patient/profile"><img alt="" src="./Find a Doctor - Doctor Reviews &amp; Ratings   Book Online Instantly ? Bookmydoc_files/profile_close.png"></a></div>
   <div class="prlf_usrpic"><img alt="" src="'.WEB_ROOT.'service/public/z_uploads/doctor/small/'.$docImage.'""></div>
   <div class="prfle_clm3_cnt">
      <h2><a href="'.WEB_ROOT.'index.php/view-prrofile/'.$result[$i][id].'" target="_blank">'.$result[$i][firstname]." ".$result[$i][lastname].'</a></h2>
      <div class="drpfl_satr">
         <input type="hidden" id="userIdf" value="1">	 
         <div class="drpflrating">
            <input type="radio" name="rating'.$result[$i][id].'" value="0" disabled="" ';
			if($doc_rating==0){$msg .= 'checked';}
			$msg .= ' /><span id="drhide"></span>
            <input type="radio" name="rating'.$result[$i][id].'" value="1" disabled=""';
			if($doc_rating==1){$msg .= 'checked';}
			$msg .= '><span></span>
            <input type="radio" name="rating'.$result[$i][id].'" value="2" disabled=""';
			if($doc_rating==2){$msg .= 'checked';}
			$msg .= '><span></span>
            <input type="radio" name="rating'.$result[$i][id].'" value="3" disabled=""';
			if($doc_rating==3){$msg .= 'checked';}
			$msg .= '><span></span>
            <input type="radio" name="rating'.$result[$i][id].'" value="4" disabled=""';
			if($doc_rating==4){$msg .= 'checked';}
			$msg .= '><span></span>
            <input type="radio" name="rating'.$result[$i][id].'" value="5" disabled=""';
			if($doc_rating==5){$msg .= 'checked';}
			$msg .= '><span></span>
            <a target="1" datasrc="5" id="docid1" class="ratng" style="cursor:pointer"></a>
         </div>
         <div class="pfl_pnt_list">
            <ul>
               <a data-toggle="modal" href="'.WEB_ROOT.'index.php/view-prrofile/'.$result[$i]['id'].'" class="dr_bkonline"> Book Online </a>
               <li>'. $result[$i]['address'].'</li>
            </ul>
         </div>
      </div>
   </div>
</li>';
		/*$msg .=' <div class="" style="width:33%;float:left">
         <div class="doctrdetails1">
            <ul>' ;
			
			
$msg .='<li class="doctradrs"><a href="'.WEB_ROOT. 'view-prrofile/' .$result[$i]['id'] .'" style="font-size:16px">'. $result[$i]['firstname']." ".$result[$i]['lastname'].'</a></li>
               <li style="width:50%">'. $result[$i]['address'].'</li>		
		
			
	
            </ul>
		 
         </div>
      </div>';*/
		 }
		 	$msg .= '</ul>';
		 }
		 else
		 {
			 $msg .=' <div class="" style="width:100%;float:left; margin-left:35%; font-size:150%; height:100px; padding-top:35px;">No data to display </div>';
		 }


            	    	     
/* --------------------------------------------- */
//$query_pag_num = "SELECT COUNT(*) AS count FROM scad_speciality";

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
$msg .= " <div class='rvwpaginatin'><ul>";

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


$msg = $msg . "</ul>" . $goto . $total_string . "</div>";  // Content for pagination
echo $msg;
//echo $_POST['id'];

?>