<?php 
   include("service/ui/common/header.php");   
   $result = $scad->getUserDetails($_SESSION['userID']); 
   $resu = $scad->getDetails($_SESSION['userID']);
	foreach ($resu as $key => $value) {
	$ids[]=$value['doctor_id'];
    $res[]= $scad->getDocDetails($value['doctor_id']);
	}
   ?>
   <style>

   </style>
   <script>
	$( document ).ready(function() {
		function test(){		
$(".submit").click(function(){ 
	//alert ("okkk");
//var n=$("#userIdf").val();
var i = $(this).parent().find("#userIdf").val();
//alert(i);	
	
	
	
	    var ovrall=$("input[name='rating']:checked").val();
	    // alert(ovrall);
	    var bsidemnr=$("input[name='rating2']:checked").val();
	    // alert(bsidemnr);
	    var waiting=$("input[name='rating3']:checked").val();
	    // alert(waiting);
	
	    var msg =$("#message").val();
	    var userget=$("#userid").val();
	    //alert(userget);
	    var docId=$("#dctid").val(); 
	    //alert(docId);
$.ajax({
				type: 'POST',	
								
				url: SITEURL+'patient/profile/ratingaction',
				data: {"ovrall":ovrall , "bsidemnr":bsidemnr , "waiting":waiting , "msg":msg , "userget":userget , "docId":docId },
				success: function(res)
				{
					 $("#rateModl").modal('hide');
							
				}
		
		});

//*ajax end 	



});

//id request 
$(".cancel").click(function(){
 	
 	
 $("#rateModl").modal('hide');
//alert ("ok");

});

}

	$(".ratng").click(function()
	{
	var sum= $(this).attr("target");
	
	// alert (sum);
	
	$.ajax({
				type: 'POST',				
				url: SITEURL+'patient/profile/ratingpopup',
				data: {"sum":sum},
				success: function(res)
				
				{
					 console.log(res);
					 
					 $("#rateModl").html(res);$('#rateModl').modal('show');				
$('.submit').show();
					 test();
					 /*if (res === 0) {
                        $("#error").fadeIn(1000);
                        document.getElementById('ratings').style.pointerEvents = 'auto';
                        $("#continue-join-patient").text('Countinue');
                    } else {
      
                        $("#abnt-form").fadeOut(1000);
      $(".here").html(res);
                    }*/
                }
				
		
		});

//submitclickaction();
//alert ("ok");	

});



});
	
</script>
<section  class="team-modern-12">
   <div class="container">
      <div class="profile_nav1">
         <ul>
            <li><a href="#"> <img src="<?php echo WEB_ROOT;?>service/public/images/profile_team.png"  alt=""> <br> Medical Team </a>  </li>
            <li><a href="<?php echo WEB_ROOT;?>index.php/past_appoinments"> <img src="<?php echo WEB_ROOT;?>service/public/images/profile_appointment.png"  alt=""> <br>  Past Appointment </a>  </li>
            <li><a href="#"> <img src="<?php echo WEB_ROOT;?>service/public/images/profile_notification.png"  alt=""> <br> Notification </a>  </li>
            <li><a href="<?php echo WEB_ROOT;?>index.php/patient_settings"><img src="<?php echo WEB_ROOT;?>service/public/images/profile_setting.png"  alt=""> <br> Settings </a></li>
			<li><a href="<?php echo WEB_ROOT;?>index.php/signout"> <img src="<?php echo WEB_ROOT;?>service/public/images/logout.png"  alt=""> <br> Logout </a></li>
         </ul>
      </div>
      <div class="profile_banner">
         <div class="prfl_bnr_lft">
            <div class="prfl_bnr_lft_clm1">
               <h1> Welcome, <?php echo $result['firstname']." ".$result['lastname'];?> </h1>
               <p> More than 5 million patients use Bookmydoc to find doctors every month. Let them book appointments with you instantly. </p>
                <a class="btn" href="<?php echo WEB_ROOT;?>index.php/search">Search</a>
            </div>
            <div class="prfl_bnr_lft_clm1_sdw">  </div>
         </div>
         <div class="prfl_bnr_rht"><img src="<?php echo WEB_ROOT;?>service/public/images/pic123.jpg" alt=""></div>
      </div>
      <div class="comment_popup modal fade test" id="rateModl"  tabindex="-1" role="dialog" >
        
        <!--<div cass="comment_popup">-->
        
     
        </div>

        <div class="clearfix"></div> 
         
      <div class="prflpg_clm3">
         <div class="pfl_clm3_lft">
            <ul>
            <?php
                        $i=0;  
						foreach ($resu as $key => $val) {
                        $res= $scad->getDocDetails($val['doctor_id']);
	$rat=$scad->getrting($val['doctor_id']);
			$len=count($rat);
			  for($j=0;$j<$len;$j++){
				  $overall[$val['doctor_id']][]=($rat[$j]['overall'] +$rat[$j]['beside'] +$rat[$j]['waiting'])/3  ;
				  }
			//print_r($overall);
			$rateval=0; 
			for($k=0;$k<count($overall[$val['doctor_id']]);$k++){
			  $rate = $overall[$val['doctor_id']][$k];
			 $rateval= $rateval+$rate;
			 }
			 $doc_rating = round($rateval/count($overall[$val['doctor_id']]));
                       foreach ($res as $key => $value) {
                         	
                         	//$ra[] = $value[ra];
							//echo "<pre>";
							 $img= $scad->getDocProImg($value['id']);
							 //print_r($img);
							 if ($img['name']) {
                    $docImage = $img['name'];
                } else {
                    $docImage = 'no_image.jpg';
                }

					   // echo $i;
							// echo round($ra[$i]);
                       ?>
               <li>
                  <h1> Book a Primary care physician </h1>
                  <div class="prlf_close"><a href="#"><img src="<?php echo WEB_ROOT;?>service/public/images/profile_close.png"  alt=""></a></div>
                  <div class="prlf_usrpic"><img src="<?php echo WEB_ROOT;?>service/public/z_uploads/doctor/small/<?php echo $docImage ?>"  alt=""></div>
                  <div class="prfle_clm3_cnt">
                          
              
                  		<h2> <?php echo $value['firstname']." ".$value['lastname'];?> <!--<span class="dr_text"> MD </span>--></h2>
                        <div class="drpfl_satr">
                         <input type="hidden" value="<?php echo $val['doctor_id'];?>" id="userIdf">	 
                        <div class="drpflrating">
                        <input type="radio" <?php if($doc_rating==0){echo "checked ";}  ?> disabled="disabled" /><span id="drpflhide"></span>
                        <input type="radio" <?php if($doc_rating==1){echo "checked ";}  ?> disabled="disabled" value="1" name="rating<?php echo $i; ?>"><span></span>
                        <input type="radio" <?php if($doc_rating==2){echo "checked ";}  ?> disabled="disabled" value="2" name="rating<?php echo $i; ?>"><span></span>
                        <input type="radio" <?php if($doc_rating==3){echo "checked ";}  ?> disabled="disabled" value="3" name="rating<?php echo $i; ?>"><span></span>
                        <input type="radio" <?php if($doc_rating==4){echo "checked ";}  ?> disabled="disabled" value="4" name="rating<?php echo $i; ?>"><span></span>
                        <input type="radio" <?php if($doc_rating==5){echo "checked ";}  ?> disabled="disabled" value="5" name="rating<?php echo $i; ?>"><span></span>
                        
                        <?php
                         
                        $count=$scad->getratingDetails($val['doctor_id']);
                      //print_r($count);
                       $c=count($count);
					  // echo $c;
                        if($c==0)
						
						
                        {
                        	
						
                        ?>
                       
                        <a  class="ratng" style="cursor:pointer" id="docid" datasrc="5" target="<?php echo $val['doctor_id'] ;?>"> Rate</a>
                        <?php 
                        
                        }
						
						else 
						{
						?>
						<a style="cursor:pointer"  class="ratng" id="docid1" datasrc="5" target="<?php echo $val['doctor_id'] ;?>"> Rated</a>
						
						<?php
							
						}
						
						?>
						
						
                        
                        </div>
                        <?php
                        
                        $co=$scad->AppoinmentCount($val['doctor_id']);
						//foreach ($co as $key => $value) {
							//echo "<pre>";
						//print_r($co);
						$totl= $co[0]["count(doctor_id)"];	
						//echo $totl;
						
                        ?>
                        <div class="pfl_pnt_list">
                        <ul>
                        <li> <a href="#"> <div class="pfl_pnt_apnum"> <?php echo $totl; ?> </div> Appointments </a></li>
                        <li> <a href="#"> <img src="<?php echo WEB_ROOT;?>service/public/images/dr_pfl_bookagain.png"  alt=""> Book Again </a></li>
                        <li>999 555 1111</li>
                        
                        </ul>
                        </div>
                        
                        
                        
                        </div>
                      
                  </div>
               </li>
                 <?php         	
	          }
$i++;}
            	?>
               <li id="findDocli">
                  <div class="pfl_adddctr" id="findDoc">
                   <a href="#"> <img src="<?php echo WEB_ROOT;?>service/public/images/profile_add_dctr.png" alt=""> <br> Find a Docotor </a>
                   </div>
               </li>
               <li id="bookDocli" style="display:none;">
                  <div class="pfl_opt">
                     <h1> Book an Appointment </h1>
                     <form style="margin-top:10px;">
                        <select class="select2">
                           <option val="">Select a Speciality</option>
                            <?php $scad->listbox('speciality','id','name',$condition=NULL,'`name` ASC',$selected=NULL); ?>
                        </select>
                        <a class="btn" href="<?php echo WEB_ROOT;?>index.php/search">Search</a>
                     </form>
                  </div>
               </li>
            </ul>
         </div>
         <?php
		 $res=$scad->getUpcomingEvents($_SESSION['userID'],date("Y-m-d"));
		 /*echo "<pre>";
		 print_r($res);*/
		 ?>
         <div class="pfl_clm3_rht" style="overflow-x:auto;height:372px">
            <h1> <img src="<?php echo WEB_ROOT;?>service/public/images/profile_upcmg_icon.png" alt=""> Upcoming Events </h1>
            <div class="pfl_evnts">
               <ul>
               <?php 
			   if(!empty($res)){
			   $len=count($res);
			   for($i=0;$i<$len;$i++){
				 $user=$scad->getUserDetails($res[$i][doctor_id]);
			   ?>
                  <div class="pfl_evntss">
                     <a href="#">
                        <h1> <?php echo $user[firstname]." ".$user[lastname];?> </h1>
                        <?php echo $res[$i][apnt_date].$res[$i][apnt_starttime]; ?> <br> <?php echo $res[$i][apnt_note];?> 
                     </a>
                  </div>
                  <?php } }else{?>
                  <div class="pfl_evntss" style="height:300px"><p style="margin: 53% 28%;">No data to dispaly</p></div>
                  <?php } ?>
                  <!--<li>
                     <div class="pfl_evnts_click">
                        <p> 2620  W 26 Mile <br>
                           Suite 205 <br>
                           Southfield, MI <br>
                           <a href="#"> Map </a>
                        </p>
                        <p> 9999 5555 666 </p>
                        999 5555 666 </p>
                        <div class="pfl_upcmg_ftr">
                           <ul>
                              <li><a href="#"> <img src="<?php echo WEB_ROOT;?>service/public/images/profile_calender.png" alt=""> Add to Calender </a> </li>
                              <li><a href="#"> <img src="<?php echo WEB_ROOT;?>service/public/images/profile_print.png" alt=""> Print Reminder </a> </li>
                              <li><a href="#"> <img src="<?php echo WEB_ROOT;?>service/public/images/profile_reshedule.png" alt=""> Reschedule </a> </li>
                              <li><a href="#"> <img src="<?php echo WEB_ROOT;?>service/public/images/profile_cancel.png" alt=""> Cancel </a> </li>
                           </ul>
                        </div>
                     </div>
                  </li>-->
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<?php include("service/ui/common/footer.php"); ?>