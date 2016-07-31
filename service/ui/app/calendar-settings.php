<?php 
   include("service/ui/common/header.php"); 
   function is_multi($a) {
    $rv = array_filter($a,'is_array');
    if(count($rv)>0) return 1;
    return 0;
}
   ?><?php
                        $result = $scad->getUserDetails($_SESSION['userID']);
                        $br=$result['breaks'];
						$doc[]=json_decode($br,TRUE);
						$wrk=$result['working_plan'];
						$docwrk[]=json_decode($wrk,TRUE);
						$vecation=$result['vecation'];
						$vecation_arr[]=json_decode($vecation,TRUE);
						$day=array(Mon,Tue,Wed,Thu,Fri,Sat,Sun);
						$days=array(Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday);
                        ?>
<link rel="stylesheet" href="<?php echo WEB_ROOT?>service/public/css/setting_pg.css">
<script type='text/javascript' src='<?php echo WEB_ROOT?>service/public/js/doctor-profile-settings.js'></script>
<script type='text/javascript' src='<?php echo WEB_ROOT?>service/public/js/timepicker/jquery.timepicker.js'></script>
<link rel="stylesheet" href="<?php echo WEB_ROOT?>service/public/css/timepicker/jquery.timepicker.css">
<script>
$(document).ready(function(){
						   if($(".check1").is(':checked'))
													   {
														   $(this).parent().next().find("input").removeAttr("disabled");
														   $(this).parent().next().next().find("input").removeAttr("disabled");
													   }
													    else{
														   $(this).parent().next().find("input").attr("disabled","true");
														   $(this).parent().next().next().find("input").attr("disabled","true");
													   }
						   function allFunction(){
							   $(".savevecation").click(function(){
    var startdate = "";
    $(".startdate").each(function(){
										  var isDisabled = $(this).prop('disabled');
    
    if (isDisabled)
    {
        startdate += "none,";
    }else{
        startdate += $(this).val() + ",";
	}
    });
	var enddate = "";
    $(".enddate").each(function(){
										  var isDisabled = $(this).prop('disabled');
    
    if (isDisabled)
    {
        enddate += "none,";
    }else{
        enddate += $(this).val() + ",";
	}
    });
	var starttime = "";
    $(".starttime").each(function(){
										  var isDisabled = $(this).prop('disabled');
    
    if (isDisabled)
    {
        starttime += "none,";
    }else{
        starttime += $(this).val() + ",";
	}
    });
	var endtime = "";
    $(".endtime").each(function(){
										  var isDisabled = $(this).prop('disabled');
    
    if (isDisabled)
    {
        endtime += "none,";
    }else{
        endtime += $(this).val() + ",";
	}
    });
	//alert(startdate+"@"+enddate+"@"+starttime+"@"+endtime);
	$.ajax({
             type: 'POST',
             url: SITEURL + 'updateDrvecationTime',
			 data:{"drId":<?php echo $_SESSION['userID'];?>,"startdate":startdate,"enddate":enddate,"starttime":starttime,"endtime":endtime},
             success: function(res) {
                if(res==1){
					$("#update_succes2").fadeIn(500).delay(1000);
					$("#update_succes2").fadeOut(2500);
				}
				else{
					$("#update_error2").fadeIn(1000);
					$("#update_error2").fadeOut(1500);
				}
             }
         });
});
							   $(".save").click(function(){
    var Contain = "";
	var mon_len=$(".Monday").length;
	var tue_len=$(".Tuesday").length;
	var wed_len=$(".Wednesday").length;
	var thu_len=$(".Thursday").length;
	var fri_len=$(".Friday").length;
	var sat_len=$(".Saturday").length;
	var sun_len=$(".Sunday").length;
    $("#doc-pass1 :text").each(function(){
										  var isDisabled = $(this).prop('disabled');
    
    if (isDisabled)
    {
        Contain += "none,";
    }else{
        Contain += $(this).val() + ",";
	}
    });
	var total_count = mon_len+","+tue_len+","+wed_len+","+thu_len+","+fri_len+","+sat_len+","+sun_len;
	$.ajax({
             type: 'POST',
             url: SITEURL + 'updateDrBrkTime',
			 data:{"Contain": Contain,"drId":<?php echo $_SESSION['userID'];?>,"total_count":total_count},
             success: function(res) {
                if(res==1){
					$("#update_succes1").fadeIn(500).delay(1000);
					$("#update_succes1").fadeOut(2500);
				}
				else{
					$("#update_error1").fadeIn(1000);
					$("#update_error1").fadeOut(1500);
				}
             }
         });
   });
						   $(".change").click(function(){
									$(this).parent().parent().hide(500);
									$(this).parent().parent().next().show();
									//$(".show").slideDown();
									});
		$(".change2").click(function(){
									$(this).parent().parent().hide();
									$(this).parent().parent().prev().show(500);
									//$(".show").slideDown();
									});
		$(".addNew1").click(function(){
									var cls = $(this).attr("alt");
									html=''+'<div class="tab_clum2_frm show" ><div class="tab_clum2_frm_day"><input name="" class="check1 '+cls+'" type="checkbox" value="'+cls+'"> '+cls+' </div><div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1" name="text" id="text" style="min-height:30px;"></div><div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1'+cls+'" name="text" id="text" style="min-height:30px;"></div><div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg"  style="cursor:pointer;" class="save" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg" class="addNew1" style="cursor:pointer;" alt="'+cls+'"></div></div>';
									html = $("."+cls+"br").html()+html;
									$("."+cls+"br").html(html);
									allFunction();
									});
		$(function() {
                    $('.timeformat').timepicker({ 'timeFormat': 'H:i' ,'step': 60/*,'minTime': '2:00am',
    'maxTime': '11:00am'*/});
					 <?php
	 $k=0;
	 foreach($day as $value){
	 ?>
					$('.timeformat1<?php echo $days[$k];?>').timepicker({ 'timeFormat': 'H:i' ,'step': 30,'minTime': '<?php echo $docwrk[0][$value][start];?>',
    'maxTime': '<?php echo $docwrk[0][$value][ends];?>'});
					<?php $k++;  } ?>
                });
						   }
						   $(".check1").click(function(){
													   if($(this).is(':checked'))
													   {
														   $(this).parent().next().find("input").removeAttr("disabled");
														   $(this).parent().next().next().find("input").removeAttr("disabled");
													   }
													   else{
														   $(this).parent().next().find("input").attr("disabled","true");
														   $(this).parent().next().next().find("input").attr("disabled","true");
													   }
													   });
		$(".change").click(function(){
									$(this).parent().parent().hide();
									$(this).parent().parent().next().show();
									});
		$(".change2").click(function(){
									$(this).parent().parent().hide();
									$(this).parent().parent().prev().show();
									});
		$(".addNew").click(function(){
									var cls = $(this).attr("alt");
									html=''+'<div class="tab_clum2_frm show" ><div class="tab_clum2_frm_day"><input name="" class="check1 '+cls+'" type="checkbox" value="'+cls+'"> '+cls+' </div><div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1'+cls+'" name="text" id="text" style="min-height:30px;"></div><div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1'+cls+'" name="text" id="text" style="min-height:30px;"></div><div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg"  style="cursor:pointer;" class="save" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg" class="addNew1" style="cursor:pointer;" alt="'+cls+'"></div></div>';
									html = $("."+cls+"br").html()+html;
									$("."+cls+"br").html(html);
									allFunction();
									});
		$(".setVecation").click(function(){
									html=''+'<div class="tab_clum3_frm show" ><div class="tab_clum3_frm_day"> <input type="text" data-trigger="mouseleave" data-required="true" data-beatpicker="true" name="dob" id="dob" placeholder="DD-MM-YY" class="input-block-level startdate" style="min-height:30px;"/></div><div class="tab_clum3_frm_day"> <input type="text" data-trigger="mouseleave" data-required="true" data-beatpicker="true" name="dob" id="dob" placeholder="DD-MM-YY" class="input-block-level enddate" style="min-height:30px;"/></div><div class="tab_clum3_frm_day"> <input type="text" placeholder="" data-type="text" value="" data-trigger="change" data-required="true" class="input-block-level starttime timeformat" name="text" id="text" style="min-height:30px;"></div><div class="tab_clum3_frm_day"> <input type="text" placeholder="" data-type="text" value="" data-trigger="change" data-required="true" class="input-block-level endtime timeformat" name="text" id="text" style="min-height:30px;"></div><div class="tab_clum3_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg" style="cursor:pointer;" class="savevecation" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""></div></div>';
									html = $(".vecation").html()+html;
									$(".vecation").html(html);
									allFunction();
									var js = document.createElement('script');
js.setAttribute('type', 'text/javascript');
js.src = '<?php echo WEB_ROOT?>service/public/js/calander/BeatPicker.min.js';
document.body.appendChild(js);
									});
		$(".removeVecation").click(function(){
											if(confirm("Are you sure to remove the vecation period?")==true){
											$(this).parent().parent().next().remove();
										 $(this).parent().parent().remove();
										 
    var startdate = "";
    $(".startdate").each(function(){
										  var isDisabled = $(this).prop('disabled');
    
    if (isDisabled)
    {
        startdate += "none,";
    }else{
        startdate += $(this).val() + ",";
	}
    });
	var enddate = "";
    $(".enddate").each(function(){
										  var isDisabled = $(this).prop('disabled');
    
    if (isDisabled)
    {
        enddate += "none,";
    }else{
        enddate += $(this).val() + ",";
	}
    });
	var starttime = "";
    $(".starttime").each(function(){
										  var isDisabled = $(this).prop('disabled');
    
    if (isDisabled)
    {
        starttime += "none,";
    }else{
        starttime += $(this).val() + ",";
	}
    });
	var endtime = "";
    $(".endtime").each(function(){
										  var isDisabled = $(this).prop('disabled');
    
    if (isDisabled)
    {
        endtime += "none,";
    }else{
        endtime += $(this).val() + ",";
	}
    });
	//alert(startdate+"@"+enddate+"@"+starttime+"@"+endtime);
	$.ajax({
             type: 'POST',
             url: SITEURL + 'updateDrvecationTime',
			 data:{"drId":<?php echo $_SESSION['userID'];?>,"startdate":startdate,"enddate":enddate,"starttime":starttime,"endtime":endtime},
             success: function(res) {
                if(res==1){
					$("#update_succes2").fadeIn(500).delay(1000);
					$("#update_succes2").fadeOut(2500);
				}
				else{
					$("#update_error2").fadeIn(1000);
					$("#update_error2").fadeOut(1500);
				}
             }
         });
											}
											});
		$(".removeBreak").click(function(){
										 if(confirm("Are you sure to remove the break time?")==true){
										 $(this).parent().parent().next().remove();
										 $(this).parent().parent().remove();
										 
    var Contain = "";
	var mon_len=$(".Monday").length;
	var tue_len=$(".Tuesday").length;
	var wed_len=$(".Wednesday").length;
	var thu_len=$(".Thursday").length;
	var fri_len=$(".Friday").length;
	var sat_len=$(".Saturday").length;
	var sun_len=$(".Sunday").length;
    $("#doc-pass1 :text").each(function(){
										  var isDisabled = $(this).prop('disabled');
    
    if (isDisabled)
    {
        Contain += "none,";
    }else{
        Contain += $(this).val() + ",";
	}
    });
	var total_count = mon_len+","+tue_len+","+wed_len+","+thu_len+","+fri_len+","+sat_len+","+sun_len;
	//alert(total_count+"@"+Contain);
	$.ajax({
             type: 'POST',
             url: SITEURL + 'updateDrBrkTime',
			 data:{"Contain": Contain,"drId":<?php echo $_SESSION['userID'];?>,"total_count":total_count},
             success: function(res) {
                if(res==1){
					$("#update_succes1").fadeIn(500).delay(1000);
					$("#update_succes1").fadeOut(2500);
				}
				else{
					$("#update_error1").fadeIn(1000);
					$("#update_error1").fadeOut(1500);
				}
             }
         });
   
										 }});
		$(".savevecation1").click(function(){
    var startdate = "";
    $(".startdate").each(function(){
										  var isDisabled = $(this).prop('disabled');
    
    if (isDisabled)
    {
        startdate += "none,";
    }else{
        startdate += $(this).val() + ",";
	}
    });
	var enddate = "";
    $(".enddate").each(function(){
										  var isDisabled = $(this).prop('disabled');
    
    if (isDisabled)
    {
        enddate += "none,";
    }else{
        enddate += $(this).val() + ",";
	}
    });
	var starttime = "";
    $(".starttime").each(function(){
										  var isDisabled = $(this).prop('disabled');
    
    if (isDisabled)
    {
        starttime += "none,";
    }else{
        starttime += $(this).val() + ",";
	}
    });
	var endtime = "";
    $(".endtime").each(function(){
										  var isDisabled = $(this).prop('disabled');
    
    if (isDisabled)
    {
        endtime += "none,";
    }else{
        endtime += $(this).val() + ",";
	}
    });
	//alert(startdate+"@"+enddate+"@"+starttime+"@"+endtime);
	$.ajax({
             type: 'POST',
             url: SITEURL + 'updateDrvecationTime',
			 data:{"drId":<?php echo $_SESSION['userID'];?>,"startdate":startdate,"enddate":enddate,"starttime":starttime,"endtime":endtime},
             success: function(res) {
                if(res==1){
					$("#update_succes2").fadeIn(500).delay(1000);
					$("#update_succes2").fadeOut(2500);
				}
				else{
					$("#update_error2").fadeIn(1000);
					$("#update_error2").fadeOut(1500);
				}
             }
         });
});
		});

function Getbrvalue(){
    var Contain = "";
	var mon_len=$(".Monday").length;
	var tue_len=$(".Tuesday").length;
	var wed_len=$(".Wednesday").length;
	var thu_len=$(".Thursday").length;
	var fri_len=$(".Friday").length;
	var sat_len=$(".Saturday").length;
	var sun_len=$(".Sunday").length;
    $("#doc-pass1 :text").each(function(){
										  var isDisabled = $(this).prop('disabled');
    
    if (isDisabled)
    {
        Contain += "none,";
    }else{
        Contain += $(this).val() + ",";
	}
    });
	var total_count = mon_len+","+tue_len+","+wed_len+","+thu_len+","+fri_len+","+sat_len+","+sun_len;
	alert(total_count);
/*	$.ajax({
             type: 'POST',
             url: SITEURL + 'updateDrBrkTime',
			 data:{"Contain": Contain,"drId":<?php echo $_SESSION['userID'];?>,"total_count":total_count},
             success: function(res) {
                if(res==1){
					$("#update_succes1").fadeIn(500).delay(1000);
					$("#update_succes1").fadeOut(2500);
				}
				else{
					$("#update_error1").fadeIn(1000);
					$("#update_error1").fadeOut(1500);
				}
             }
         });*/
   }
function Getvalue(){
    var Contain = "";
    $("#doc-profile :text").each(function(){
										  var isDisabled = $(this).prop('disabled');
    
    if (isDisabled)
    {
        Contain += "none,";
    }else{
        Contain += $(this).val() + ",";
	}
    });
	$.ajax({
             type: 'POST',
             url: SITEURL + 'updateDrWorkTime',
			 data:{"Contain": Contain,"drId":<?php echo $_SESSION['userID'];?>},
             success: function(res) {
                if(res==1){
					$("#update_succes").fadeIn(500).delay(1000);
					$("#update_succes").fadeOut(2500);
				}
				else{
					$("#update_error").fadeIn(1000);
					$("#update_error").fadeOut(1500);
				}
             }
         });
}


  $(function() {
                    $('.timeformat').timepicker({ 'timeFormat': 'H:i' ,'step': 60/*,'minTime': '2:00am',
    'maxTime': '11:00am'*/});
					 <?php
	 $k=0;
	 foreach($day as $value){
	 ?>
					$('.timeformat1<?php echo $day[$k];?>').timepicker({ 'timeFormat': 'H:i' ,'step': 30,'minTime': '<?php echo $docwrk[0][$value][start];?>',
    'maxTime': '<?php echo $docwrk[0][$value][ends];?>'});
					<?php $k++;  } ?>
                });
		</script>
<style>
.setWrkTime{
background-color: #ffffff;
    background-image: linear-gradient(to bottom, #fe6afe, #f819f8);
    /*background-repeat: repeat-x;*/
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    border-radius: 6px;
    color: #ffffff;
    cursor: pointer;
    font-family: roboto;
    font-size: 19px;
    font-weight: 700;
    padding: 12px 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    width: 100%;
}

</style>
<section  class="team-modern-12">
   <div class="container">
      <div class="dctr_mbr_mdl">
         <div class="dctr_mbr_lft">
            <div class="dctr_mbr_tbl">
               <ul class="nav1 nav-tabs tabs" id="docTab" style="list-style:none; padding:0; margin:0;">
                  <li class="active" ><a  href="#doc-profile">Work Plan</a></li>
                  <li><a href="#doc-pass1">Breaks</a></li>
                  <li><a href="#doc-imageupload">Vacations</a></li>
               </ul>
               <div class="tab-content">
                  <div class="tab-pane active" id="doc-profile">
                     
                     <!-- <div id="doc-setting-error" >no</div>-->
                           
     <!-- First  -->
     <div id="update_error" style="margin-top:20px;display:none;text-align:center;" class="alert alert-error">Update Failed.</div>
     <div id="update_succes" style="margin-top:20px;display:none;text-align:center;" class="alert alert-success">Successfully Updated.</div>
     <div class="tab_clum1">
     <h1> Day </h1>
     <h1> Start </h1>
     <h1> End </h1>
     <?php
	 $k=0;
	 foreach($day as $value){
	 ?>
     <div class="tab_clum1_frm">
     <div class="tab_clum1_frm_day"> <input name="" class="check1" <?php if(!($docwrk[0][$value][start]==none)) echo "checked"; ?>   type="checkbox" value="<?php echo $days[$k]; ?>"> <?php echo $days[$k]; ?> </div>
     <div class="tab_clum1_frm_day"> <input type="text" placeholder="" data-type="text" value="<?php echo $docwrk[0][$value][start];?>" <?php if($docwrk[0][$value][start]==none) echo "disabled"; ?> data-trigger="change" data-required="true" class="input-block-level timeformat" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum1_frm_day"> <input type="text" placeholder="" data-type="text" value="<?php echo $docwrk[0][$value][ends];?>" <?php if($docwrk[0][$value][ends]==none) echo "disabled"; ?> data-trigger="change" data-required="true" class="input-block-level timeformat" name="text" id="text" style="min-height:30px;"></div>
     </div>
     <?php $k++; } ?>
   
     </div>
     <!-- END First  --><button class="setWrkTime" onclick="Getvalue()">Enable</button>
                  </div>
                  <div class="tab-pane" id="doc-pass1">
                     <!-- Second  --><div id="update_error1" style="margin-top:20px;display:none;text-align:center;" class="alert alert-error">Update Failed.</div>
     <div id="update_succes1" style="margin-top:20px;display:none;text-align:center;" class="alert alert-success">Successfully Updated.</div>
     <div class="tab_clum2">
     <h1> Day </h1>
     <h1> Start </h1>
     <h1> End </h1>
     <h1> Actions </h1>
     <?php 
	 if(empty($doc[0][Mon])){
	 ?>
     <div class="tab_clum2_frm show">
     <div class="tab_clum2_frm_day"> <input name="" class="check1 Monday"  type="checkbox" value=""> Monday </div>
     <div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Mon" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Mon" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg" onclick="Getbrvalue()" style="cursor:pointer;" class="change1" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg" class="addNew" style="cursor:pointer;" alt="Monday"></div>
     </div><div class="Mondaybr"></div>
         <?php
	 }else{
		$ar=$doc[0][Mon];
	  $b=is_multi($doc[0][Mon]);
						if($b==1){
	 foreach($ar as $key=>$value){
		 $start[]=$value[start];
		 $ends[]=$value[ends];
	 //	print_r($value);
	 }}
	 else{
		 $start[]=$ar[start];
		 $ends[]=$ar[ends];
		 }
		 $len=count($start);
	 ?>
       <?php for($i=0;$i<$len;$i++){ ?> 
     <div class="tab_clum2_frm exist">
     <div class="tab_clum2_frm_day"> <input name=""  type="checkbox" value=""> Monday </div>
    
     <div class="tab_clum2_frm_day"> <?php echo $start[$i]?> </div>
     
     <div class="tab_clum2_frm_day"> <?php echo $ends[$i]?> </div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon1.jpg" style="cursor:pointer;" class="change" alt=""> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" class="removeBreak" style="cursor:pointer;" alt=""><?php
	 if($i==($len-1))
	 {
	?> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg"  class="addNew" style="cursor:pointer;" alt="Monday"><?php
	 }
	 ?>
     </div>
     </div>
     
      <div class="tab_clum2_frm show" style="display:none">
     <div class="tab_clum2_frm_day"> <input name="" class="check1 Monday" <?php if(!($start[$i]=='none')){echo "checked";} ?> type="checkbox" value=""> Monday </div>
     <div class="tab_clum2_frm_day"> <input type="text" value="<?php echo $start[$i]?>" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Mon" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_day"> <input type="text" value="<?php echo $ends[$i]?>" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Mon" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg" onclick="Getbrvalue()" style="cursor:pointer;" class="change1" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""></div>
     </div>
     <?php
	 if($i==($len-1))
	 {
	?>
     <div class="Mondaybr"></div><?php
	 }
	 ?>
     <?php }} ?>
    
   <?php 
	 if(empty($doc[0][Tue])){
	 ?>
     <div class="tab_clum2_frm show">
     <div class="tab_clum2_frm_day"> <input name="" class="check1 Tuesday"  type="checkbox" value=""> Tuesday </div>
     <div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Thu" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Thu" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg" onclick="Getbrvalue()" style="cursor:pointer;" class="change1" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg" class="addNew" style="cursor:pointer;" alt="Tuesday"></div>
     </div><div class="Tuesdaybr"></div>
         <?php
	 }else{
		 $ar=$doc[0][Tue];
	  $b=is_multi($doc[0][Tue]);
						if($b==1){
	 foreach($ar as $key=>$value){
		 $starttu[]=$value[start];
		 $endstu[]=$value[ends];
	 //	print_r($value);
	 }}
	 else{
		 $starttu[]=$ar[start];
		 $endstu[]=$ar[ends];
		 }
		 $len=count($starttu);
	 ?>
       <?php for($i=0;$i<$len;$i++){ ?> 
     <div class="tab_clum2_frm exist">
     <div class="tab_clum2_frm_day"> <input name=""  type="checkbox" value=""> Tuesday </div>
    
     <div class="tab_clum2_frm_day"> <?php echo $starttu[$i]?> </div>
     
     <div class="tab_clum2_frm_day"> <?php echo $endstu[$i]?> </div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon1.jpg" style="cursor:pointer;" class="change" alt=""> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" class="removeBreak" style="cursor:pointer;" alt=""><?php
	 if($i==($len-1))
	 {
	?> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg" class="addNew" style="cursor:pointer;" alt="Tuesday"><?php
	 }
	 ?>
     
     </div>
     </div>
     
      <div class="tab_clum2_frm show" style="display:none">
     <div class="tab_clum2_frm_day"> <input name="" class="check1 Tuesday" <?php if(!($starttu[$i]=='none')){echo "checked";} ?> type="checkbox" value=""> Tuesday </div>
     <div class="tab_clum2_frm_day"> <input type="text" value="<?php echo $starttu[$i]?>" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Tue" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_day"> <input type="text" value="<?php echo $endstu[$i]?>" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Tue" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg" onclick="Getbrvalue()" style="cursor:pointer;" class="change1" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""></div>
     </div><?php
	 if($i==($len-1))
	 {
	?>
     <div class="Tuesdaybr"></div><?php
	 }
	 ?>
     <?php }} ?>
     
      <?php 
	 if(empty($doc[0][Wed])){
	 ?>
     <div class="tab_clum2_frm show">
     <div class="tab_clum2_frm_day"> <input name="" class="check1 Wednesday"  type="checkbox" value=""> Wednesday </div>
     <div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Wed" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Wed" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg" onclick="Getbrvalue()" style="cursor:pointer;" class="change1" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg" class="addNew" style="cursor:pointer;" alt="Wednesday"></div>
     </div><div class="Wednesdaybr"></div>
         <?php
	 }else{
		$ar=$doc[0][Wed];
	  $b=is_multi($doc[0][Wed]);
						if($b==1){
	 foreach($ar as $key=>$value){
		 $startw[]=$value[start];
		 $endsw[]=$value[ends];
	 //	print_r($value);
	 }}
	 else{
		 $startw[]=$ar[start];
		 $endsw[]=$ar[ends];
		 }
		 $len=count($startw);
	 ?>
       <?php for($i=0;$i<$len;$i++){ ?> 
     <div class="tab_clum2_frm exist">
     <div class="tab_clum2_frm_day"> <input name="" type="checkbox" value=""> Wednesday </div>
    
     <div class="tab_clum2_frm_day"> <?php echo $startw[$i]?> </div>
     
     <div class="tab_clum2_frm_day"> <?php echo $endsw[$i]?> </div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon1.jpg" style="cursor:pointer;" class="change" alt=""> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" class="removeBreak" style="cursor:pointer;" alt=""><?php
	 if($i==($len-1))
	 {
	?> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg" style="cursor:pointer;" class="addNew" alt="Wednesday"><?php
	 }
	 ?></div>
     </div>
     
      <div class="tab_clum2_frm show" style="display:none">
     <div class="tab_clum2_frm_day"> <input name="" class="check1 Wednesday" <?php if(!($startw[$i]=='none')){echo "checked";} ?>  type="checkbox" value=""> Wednesday </div>
     <div class="tab_clum2_frm_day"> <input type="text" value="<?php echo $startw[$i]?>" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Wed" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_day"> <input type="text" value="<?php echo $endsw[$i]?>" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Wed" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg" onclick="Getbrvalue()" style="cursor:pointer;" class="change1" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""></div>
     </div><?php
	 if($i==($len-1))
	 {
	?> 
     <div class="Wednesdaybr"></div>
     <?php }}} ?>
     
      <?php 
	 if(empty($doc[0][Thu])){
	 ?>
     <div class="tab_clum2_frm show">
     <div class="tab_clum2_frm_day"> <input name="" class="check1 Thursday"  type="checkbox" value=""> Thursday </div>
     <div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Thu" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Thu" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg" onclick="Getbrvalue()" style="cursor:pointer;" class="change1" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg" class="addNew" style="cursor:pointer;" alt="Thursday"></div>
     </div><div class="Thursdaybr"></div>
         <?php
	 }else{
		$ar=$doc[0][Thu];
	  $b=is_multi($doc[0][Thu]);
						if($b==1){
	 foreach($ar as $key=>$value){
		 $startt[]=$value[start];
		 $endst[]=$value[ends];
	 //	print_r($value);
	 }}
	 else{
		 $startt[]=$ar[start];
		 $endst[]=$ar[ends];
		 }
		 $len=count($startt);
	 ?>
       <?php for($i=0;$i<$len;$i++){ ?> 
     <div class="tab_clum2_frm exist">
     <div class="tab_clum2_frm_day"> <input name="" type="checkbox" value=""> Thursday </div>
    
     <div class="tab_clum2_frm_day"> <?php echo $startt[$i]?> </div>
     
     <div class="tab_clum2_frm_day"> <?php echo $endst[$i]?> </div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon1.jpg" style="cursor:pointer;" class="change" alt=""> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" class="removeBreak" style="cursor:pointer;" alt=""><?php
	 if($i==($len-1))
	 {
	?> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg" class="addNew" style="cursor:pointer;" alt="Thursday"><?php
	 }
	 ?></div>
     </div>
     
      <div class="tab_clum2_frm show" style="display:none">
     <div class="tab_clum2_frm_day"> <input name="" type="checkbox" class="check1 Thursday" <?php if(!($startt[$i]=='none')){echo "checked";} ?>  value=""> Thursday </div>
     <div class="tab_clum2_frm_day"> <input type="text" value="<?php echo $startt[$i]?>" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Thu" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_day"> <input type="text" value="<?php echo $endst[$i]?>" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Thu" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg" onclick="Getbrvalue()" style="cursor:pointer;" class="change1" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""></div>
     </div><?php
	 if($i==($len-1))
	 {
	?>
     <div class="Thursdaybr"></div>
     <?php }} } ?>
     
        <?php 
	 if(empty($doc[0][Fri])){
	 ?>
     <div class="tab_clum2_frm show">
     <div class="tab_clum2_frm_day"> <input name="" class="check1 Friday"  type="checkbox" value=""> Friday </div>
     <div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Fri" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Fri" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg" onclick="Getbrvalue()" style="cursor:pointer;" class="change1" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg" class="addNew" style="cursor:pointer;" alt="Friday"></div>
     </div><div class="Fridaybr"></div>
         <?php
	 }else{
		$ar=$doc[0][Fri];
	  $b=is_multi($doc[0][Fri]);
						if($b==1){
	 foreach($ar as $key=>$value){
		 $startf[]=$value[start];
		 $endsf[]=$value[ends];
	 //	print_r($value);
	 }}
	 else{
		 $startf[]=$ar[start];
		 $endsf[]=$ar[ends];
		 }
		 $len=count($startf);
	 ?>
       <?php for($i=0;$i<$len;$i++){ ?> 
     <div class="tab_clum2_frm exist">
     <div class="tab_clum2_frm_day"> <input name="" type="checkbox" value=""> Friday </div>
    
     <div class="tab_clum2_frm_day"> <?php echo $startf[$i]?> </div>
     
     <div class="tab_clum2_frm_day"> <?php echo $endsf[$i]?> </div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon1.jpg" style="cursor:pointer;" class="change" alt=""> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" class="removeBreak" style="cursor:pointer;" alt=""><?php
	 if($i==($len-1))
	 {
	?> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg" class="addNew" style="cursor:pointer;" alt="Friday"><?php
	 }
	 ?></div>
     </div>
     
      <div class="tab_clum2_frm show" style="display:none">
     <div class="tab_clum2_frm_day"> <input name="" type="checkbox" class="check1 Friday" <?php if(!($startf[$i]=='none')){echo "checked";} ?>  value=""> Friday </div>
     <div class="tab_clum2_frm_day"> <input type="text" value="<?php echo $startf[$i]?>" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Fri" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_day"> <input type="text" value="<?php echo $endsf[$i]?>" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Fri" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg" onclick="Getbrvalue()" style="cursor:pointer;" class="change1" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""></div>
     </div><?php
	 if($i==($len-1))
	 {
	?>
     <div class="Fridaybr"></div>
     <?php }} }?>
     
     <?php 
	 if(empty($doc[0][Sat])){
	 ?>
     <div class="tab_clum2_frm show">
     <div class="tab_clum2_frm_day"> <input name="" class="check1 Saturday"  type="checkbox" value=""> Saturday </div>
     <div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Sat" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Sat" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg" onclick="Getbrvalue()" style="cursor:pointer;" class="change1" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg" class="addNew" style="cursor:pointer;" alt="Saturday"></div>
     </div><div class="Saturdaybr"></div>
         <?php
	 }else{
		$ar=$doc[0][Sat];
	  $b=is_multi($doc[0][Sat]);
						if($b==1){
	 foreach($ar as $key=>$value){
		 $startsa[]=$value[start];
		 $endssa[]=$value[ends];
	 //	print_r($value);
	 }}
	 else{
		 $startsa[]=$ar[start];
		 $endssa[]=$ar[ends];
		 }
		 $len=count($startsa);
	 ?>
       <?php for($i=0;$i<$len;$i++){ ?> 
     <div class="tab_clum2_frm exist">
     <div class="tab_clum2_frm_day"> <input name="" type="checkbox" value=""> Saturday </div>
    
     <div class="tab_clum2_frm_day"> <?php echo $startsa[$i]?> </div>
     
     <div class="tab_clum2_frm_day"> <?php echo $endssa[$i]?> </div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon1.jpg" style="cursor:pointer;" class="change" alt=""> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" class="removeBreak" style="cursor:pointer;" alt=""><?php
	 if($i==($len-1))
	 {
	?> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg" class="addNew" style="cursor:pointer;" alt="Saturday"><?php
	 }
	 ?></div>
     </div>
     
      <div class="tab_clum2_frm show" style="display:none">
     <div class="tab_clum2_frm_day"> <input name="" type="checkbox" class="check1 Saturday" <?php if(!($startsa[$i]=='none')){echo "checked";} ?>  value=""> Saturday </div>
     <div class="tab_clum2_frm_day"> <input type="text" value="<?php echo $startsa[$i]?>" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Sat" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_day"> <input type="text" value="<?php echo $endssa[$i]?>" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Sat" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg" onclick="Getbrvalue()" style="cursor:pointer;" class="change1" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""></div>
     </div>
     <?php
	 if($i==($len-1))
	 {
	?>
     <div class="Saturdaybr"></div>
     <?php }}} ?>
     
     <?php 
	 if(empty($doc[0][Sun])){
	 ?>
     <div class="tab_clum2_frm show">
     <div class="tab_clum2_frm_day"> <input name="" class="check1 Sunday"  type="checkbox" value=""> Sunday </div>
     <div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Sun" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_day"> <input type="text" value="" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Sun" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg" onclick="Getbrvalue()" style="cursor:pointer;" class="change1" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg" class="addNew" style="cursor:pointer;" alt="Sunday"></div>
     </div><div class="Sundaybr"></div>
         <?php
	 }else{
		$ar=$doc[0][Sun];
	  $b=is_multi($doc[0][Sun]);
						if($b==1){
	 foreach($ar as $key=>$value){
		 $startsu[]=$value[start];
		 $endssu[]=$value[ends];
	 //	print_r($value);
	 }}
	 else{
		 $startsu[]=$ar[start];
		 $endssu[]=$ar[ends];
		 }
		 $len=count($startsu);
	 ?>
       <?php for($i=0;$i<$len;$i++){ ?> 
     <div class="tab_clum2_frm exist">
     <div class="tab_clum2_frm_day"> <input name="" type="checkbox"  value=""> Sunday </div>
    
     <div class="tab_clum2_frm_day"> <?php echo $startsu[$i]?> </div>
     
     <div class="tab_clum2_frm_day"> <?php echo $endssu[$i]?> </div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon1.jpg" style="cursor:pointer;" class="change" alt=""> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" class="removeBreak" style="cursor:pointer;" alt=""><?php
	 if($i==($len-1))
	 {
	?> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg" class="addNew" style="cursor:pointer;" alt="Sunday"><?php
	 }
	 ?></div>
     </div>
     
      <div class="tab_clum2_frm show" style="display:none">
     <div class="tab_clum2_frm_day"> <input name="" type="checkbox" class="check1 Sunday" <?php if(!($startsu[$i]=='none')){echo "checked";} ?>  value=""> Sunday </div>
     <div class="tab_clum2_frm_day"> <input type="text" value="<?php echo $startsu[$i]?>" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Sun" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_day"> <input type="text" value="<?php echo $endssu[$i]?>" placeholder="" data-type="text" data-trigger="change" data-required="true" class="input-block-level timeformat1Sun" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum2_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg" onclick="Getbrvalue()" style="cursor:pointer;" class="change1" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""></div>
     </div><?php
	 if($i==($len-1))
	 {
	?>
     <div class="Sundaybr"></div>
     <?php }}} ?>
     
     
     </div>
     <!-- END Second  --><!--<button class="setWrkTime">set</button>-->
                  </div>
                  
                  <div class="tab-pane" id="doc-imageupload">
                   	<!-- Second  --><div id="update_error2" style="margin-top:20px;display:none;text-align:center;" class="alert alert-error">Update Failed.</div>
     <div id="update_succes2" style="margin-top:20px;display:none;text-align:center;" class="alert alert-success">Successfully Updated.</div>
     <div class="tab_clum3">
     <!--<h1> Day </h1>-->
     <h1> Start Date </h1>
     <h1> End Date </h1>
     <h1> Start Time </h1>
     <h1> End Time </h1>
     <h1> Actions </h1>
     
        <div class="vecation">
        
        </div>
        <?php 
		if(!empty($vecation)){
		foreach($vecation_arr as $key=>$value){
			$leng=count($value);
		}
		for($jk=0;$jk<$leng;$jk++){
		?>
     <div class="tab_clum3_frm">
     <!--<div class="tab_clum2_frm_day"> <input name="" type="checkbox" value=""> Monday </div>-->
     <div class="tab_clum3_frm_day"> <?php echo $value[$jk][startdate]; ?> </div>
     <div class="tab_clum3_frm_day"><?php echo $value[$jk][enddate]; ?> </div>
     <div class="tab_clum3_frm_day"> <?php echo $value[$jk][starttime]; ?>  </div>
     <div class="tab_clum3_frm_day"> <?php echo $value[$jk][endtime]; ?>  </div>
     <div class="tab_clum3_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon1.jpg" style="cursor:pointer;" class="change" alt=""> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" class="removeVecation" style="cursor:pointer;" alt=""><?php
	 if($i==($leng-1))
	 {
	?><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg" class="setVecation" style="cursor:pointer;" alt="Sunday">
    <?php } ?></div>
     </div>
     
      <div class="tab_clum3_frm show" style="display:none">
     <!--<div class="tab_clum2_frm_day"> <input name="" type="checkbox" value=""> Sunday </div>-->
     <div class="tab_clum3_frm_day"> <input type="text" value="<?php echo $value[$jk][startdate]; ?>" data-trigger="mouseleave" data-required="true" data-beatpicker="true" name="dob" id="dob" placeholder="DD-MM-YY" class="input-block-level startdate" style="min-height:30px;"/> </div>
     <div class="tab_clum3_frm_day"> <input type="text" value="<?php echo $value[$jk][enddate]; ?>" data-trigger="mouseleave" data-required="true" data-beatpicker="true" name="dob" id="dob" placeholder="DD-MM-YY" class="input-block-level enddate" style="min-height:30px;"/></div>
     <div class="tab_clum3_frm_day"> <input type="text" value="<?php echo $value[$jk][starttime]; ?>" placeholder="" data-type="text" value="" data-trigger="change" data-required="true" class="input-block-level starttime timeformat" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum3_frm_day"> <input type="text" value="<?php echo $value[$jk][endtime]; ?>" placeholder="" data-type="text" value="" data-trigger="change" data-required="true" class="input-block-level endtime timeformat" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum3_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg" style="cursor:pointer;" class="savevecation1" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg"  style="cursor:pointer;margin-left:3px;" class="change2" alt=""></div>
     </div>
     <?php }
	 } else {?>
     <div class="tab_clum3_frm show" >
     <!--<div class="tab_clum2_frm_day"> <input name="" type="checkbox" value=""> Sunday </div>-->
     <div class="tab_clum3_frm_day"> <input type="text"  data-trigger="mouseleave" data-required="true" data-beatpicker="true" name="dob" id="dob" placeholder="DD-MM-YY" class="input-block-level startdate" style="min-height:30px;"/> </div>
     <div class="tab_clum3_frm_day"> <input type="text"  data-trigger="mouseleave" data-required="true" data-beatpicker="true" name="dob" id="dob" placeholder="DD-MM-YY" class="input-block-level enddate" style="min-height:30px;"/></div>
     <div class="tab_clum3_frm_day"> <input type="text"  placeholder="" data-type="text" value="" data-trigger="change" data-required="true" class="input-block-level starttime timeformat" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum3_frm_day"> <input type="text"  placeholder="" data-type="text" value="" data-trigger="change" data-required="true" class="input-block-level endtime timeformat" name="text" id="text" style="min-height:30px;"></div>
     <div class="tab_clum3_frm_action"> <img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon5.jpg" style="cursor:pointer;" class="savevecation1" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon2.jpg" style="cursor:pointer;margin-left:3px;" class="change2" alt=""><img src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg" class="setVecation" style="cursor:pointer;" alt="Sunday"></div>
     </div>
     
     <?php }?>
     </div>
     
     <!-- END Second <button class="setVecation"> Add New Vecation </button> -->
                  </div>
               </div>
            </div>
            <!--<div class="dctr_mbr_pgnationmn">
               <nav class="dctr_mbr_pgnation">
                  <a href="#" class="prev">&lt;</a>
                  <span>1</span>
                  <a href="#">2</a>
                  <a href="#">3</a>
                  <a href="#">4</a>                  
                  <a href="#">5</a>
                  <a href="#" class="next">&gt;</a>
               </nav>
               </div>-->
         </div>
         <div class="dctr_mbr_rht">
            <nav class="dctr_br_side-nav">
               <a href="<?php echo WEB_ROOT;?>index.php/doctor/profile" class="dctr_br_side-nav-button"> <img src="<?php echo WEB_ROOT;?>service/public/images/appointment.png" alt=""><br>Appointment </a>
               <a href="#" class="dctr_br_side-nav-button active"> <img src="<?php echo WEB_ROOT;?>service/public/images/user.png" alt=""><br> 
              Calendar Settings</a>
               <a href="<?php echo WEB_ROOT;?>index.php/doctor/profile/settings" class="dctr_br_side-nav-button "> <img src="<?php echo WEB_ROOT;?>service/public/images/profile_setting.png" alt=""><br>Settings</a>
               <a href="<?php echo WEB_ROOT;?>index.php/signout" class="dctr_br_side-nav-button"> <img src="<?php echo WEB_ROOT;?>service/public/images/logout.png" alt=""><br> Logout </a>
            </nav>
         </div>
      </div>
   </div>
</section>

<?php include("service/ui/common/footer.php"); ?>