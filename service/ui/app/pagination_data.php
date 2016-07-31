<?php
   
include("./conf/config.inc.php");


$result = $scad->getUserDetails($_POST['id']);
//print_r($result);
if($_POST['page'])
{
$page = $_POST['page'];

$cur_page = $page;
$page -= 1;
$per_page = 3;
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$start = $page * $per_page;


$rating1 = $scad->getrting($_POST['id']);
$rating = $scad->ratinglimit($_POST['id'],$start,$per_page);
/*echo "<pre>";
print_r($rating1);
print_r($rating);*/
//exit;
$end  = count($rating1);

foreach($rating as $key=>$value){
    	/*echo "<pre>";
    	print_r($value);
		echo $value[userid];
		exit;*/
		
		$userresult = $scad->getUserDetails($value[userid]);
		$finalresult[]=$userresult;
		
    } 

                       
                        
                         	//echo$val['overall'];
                         	//$ra[] = $value[ra];
						 //print_r($val);

					         // echo $i;
							// echo round($ra[$i]);
  




 
   $msg .=   '<h1> Patient Reviews for '. $result["firstname"] .$result["lastname"].' </h1>
            
		    	<div class="dr_review">';
            
                
				$i=0; 
				if(!empty($rating)){
						foreach ($rating as $key => $val) {
							//echo $val;
						$userdetails = $scad->getUserDetails($val[userid]);
						//print_r($userdetails);
             $msg .= '<div class="dr_viw_clm2_rewclm">
                <h2>  '.$val['date'].' by, ' . $userdetails["firstname"] .$userdetails["lastname"].'  </h2>
                
                <div class="dr_viw_clm2_rate"><div class="dr_viw_clm2_rateclm">
                        <div class="dr_viw_satr"><div class="rating"><input type="radio" ';
                        if($val["overall"]==0)
                        { $msg.="checked ";} 
                        if($val>0){ $msg.="disabled ";} 
		 $msg.= " name='rating".$i."'  value='0'  /><span id='dr_viwhide'></span><input type='radio' ";
   
         if($val['overall']==1){$msg.="checked ";} if($val>0){ $msg.="disabled ";} 
		 $msg.= " name='rating".$i."'  value='1'  /><span></span><input type='radio' ";
		 
		 if($val['overall']==2){ $msg.="checked ";} if($val>0){ $msg.="disabled ";} 
		 $msg.= " name='rating".$i."' value='2'  /><span></span><input type='radio' ";
		 
		 if($val['overall']==3){$msg.="checked ";} if($val>0){ $msg.="disabled ";} 
		 $msg.= " name='rating".$i."'  value='3'  /><span></span><input type='radio' ";
		 
		 if($val['overall']==4){ $msg.="checked ";} if($val>0){ $msg.="disabled ";} 
		 $msg.= " name='rating".$i."'  value='4'  /><span></span><input type='radio' ";
		 
		 if($val['overall']==5){$msg.="checked ";} if($val>0){ $msg.="disabled ";} 
		  $msg.= " name='rating".$i."'  value='5'  /><span></span>";
              
			  
			   $msg .= '</div>
                </div>
                Overall Rating 
                </div>

            <div class="dr_viw_clm2_rateclm"><div class="dr_viw_satr"><div class="rating"><input type="radio" ';
				
               if($val['beside']==0){ $msg.="checked ";} if($val>0){$msg.="disabled ";} 
		 $msg.= " name='rating1".$i."'  value='0'  /><span id='dr_viwhide'></span><input type='radio' ";
	   
	     if($val['beside']==1){$msg.="checked ";} if($val>0){$msg.="disabled ";} 
		 $msg.= " name='rating1".$i."'  value='1'  /><span></span><input type='radio' ";
		 
		 if($val['beside']==2){ $msg.="checked ";} if($val>0){$msg.="disabled ";} 
		 $msg.= " name='rating1".$i."'  value='2'  /><span></span><input type='radio'";
		 
		 if($val['beside']==3){$msg.="checked ";} if($val>0){$msg.="disabled ";} 
		 $msg.= " name='rating1".$i."'  value='3'  /><span></span><input type='radio'";
		 
		 if($val['beside']==4){$msg.="checked ";} if($val>0){$msg.="disabled ";} 
		 $msg.= " name='rating1".$i."'  value='4'  /><span></span><input type='radio'";
		 
		  if($val['beside']==5){$msg.="checked ";} if($val>0){ $msg.="disabled ";} 
		 $msg.= " name='rating1".$i."'  value='5'  /><span></span>";
		 
		 
         $msg .= '       </div>
                </div>
                Beside Manner
                </div>
                
                <div class="dr_viw_clm2_rateclm">
                <div class="dr_viw_satr">
                <div class="rating"><input type="radio"';
				
         if($val['waiting']==0){$msg.="checked ";} if($val>0){$msg.= "disabled ";} 
		 $msg.= " name='rating2".$i."'  value='0'  /><span id='dr_viwhide'></span><input type='radio'";
	   
	     if($val['waiting']==1){ $msg.="checked ";} if($val>0){$msg.= "disabled ";} 
		 $msg.= " name='rating2".$i."'  value='1'  /><span></span><input type='radio'";
		 
		 if($val['waiting']==2){$msg.="checked ";} if($val>0){ $msg.="disabled ";} 
		 $msg.= " name='rating2".$i."'  value='2'  /><span></span><input type='radio'";
		 
		 if($val['waiting']==3){ $msg.="checked ";} if($val>0){$msg.= "disabled ";} 
		 $msg.= " name='rating2".$i."' value='3'  /><span></span><input type='radio'";
		 
		 if($val['waiting']==4){$msg.= "checked ";} if($val>0){$msg.= "disabled ";} 
		 $msg.= " name='rating2".$i."'  value='4'  /><span></span><input type='radio'";
		 
		 if($val['waiting']==5){$msg.="checked ";} if($val>0){$msg.= "disabled ";} 
		 $msg.= " name='rating2".$i."'  value='5'  /><span></span>";
		 
		 
               $msg .= ' </div>
                </div>
                Wait Time
                </div> 
                <p>'.$val[message].'</p>
                </div>
               </div>
      
      
      
        
           
         
      
          </div>';
               
                      	
	          
                      $i++;}
            	    	     
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
$msg .= "<div class='paginatin'><ul>";

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
        $msg .= "<li p='$i' style='color:#fff;background-color:#006699; width:10px;' class='activ'>{$i}</li>";
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
				}
				else{
					$msg .=   '<p style="text-align:center;margin-top:3%;">No data to display</p></div>';
				echo $msg;
					}
//echo $_POST['id'];
}
?>

