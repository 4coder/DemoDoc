<?php 
include ("service/ui/common/header.php"); 
$apntDetails = base64_decode($apntDetails);
$allData = explode("_",$apntDetails);
$doctorID  = $allData[0];
$_SESSION['regDocid']=$doctorID;
$date	   = $allData[1];
$time 	   = $allData[2];
$insuranceSelect = $ins;
 $search = $search;
$subInsuranceSelect = $subins;
$result = $scad->getUserDetails($doctorID);
$resImage = $scad->getImages($doctorID);
$userdetails=$scad->getUserDetails($_SESSION[userID]);
?>

<style>
.check_button{
	
	background-color: #ffffff;
    background-image: linear-gradient(to bottom, #fe6afe, #f819f8);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    border-radius: 6px;
    color: #ffffff;
    cursor: pointer;
    font-family: roboto;
    font-size: 19px;
    font-weight: 700;
    padding: 12px 19px;
    position: relative;
    text-align: center;
    text-decoration: none;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);}
	.check_button1{
	
    background-color: #ccc;
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    border-radius: 6px;
    color: #ffffff;
    cursor: pointer;
    font-family: roboto;
    font-size: 19px;
    font-weight: 700;
    padding: 12px 19px;
    position: relative;
    text-align: center;
    text-decoration: none;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);}
	.active-nav {
	background: none repeat scroll 0 0 #2a9cdc;
    color: #fff;
    float: left;
    height: 50px;
    line-height: 50px;
    text-align: center;
    width: 20%;
}
.inactive-nav {
	background: none repeat scroll 0 0 #ccc;
    color: #fff;
    float: left;
    height: 50px;
    line-height: 50px;
    text-align: center;
    width: 20%;
}



/* Form Progress */
.progress1 {
  width: 1000px;
  margin:0px auto 50px auto	;
  text-align: center;
}
.progress1 .circle,
.progress1 .bar {
  display: inline-block;
  background: #fff;
  width: 40px; height: 38px;
  border-radius: 40px;
  border: 1px solid #d5d5da;
}
.progress1 .bar {
  position: relative;
  width: 180px;
  height: 6px;
margin: 0 -5px 2px;
  border-left: none;
  border-right: none;
  border-radius: 0;
}
.progress1 .circle .label1 {
  display: inline-block;
  width: 32px;
  height: 32px;
  line-height: 32px;
  border-radius: 32px;
  margin-top: 3px;
  color: #b5b5ba;
  font-size: 17px;
}
.progress1 .circle .title1 {
  color: #b5b5ba;
  font-size: 13px;
  line-height: 18px;
  margin-left: -5px;
  text-align:left;
}

/* Done / Active */
.progress1 .bar.done,
.progress1 .circle.done {
  background: #eee;
}
.progress1 .bar.active {
  background: linear-gradient(to right, #EEE 40%, #FFF 60%); 
}
.progress1 .circle.done .label1 {
  color: #FFF;
  background: #8bc435;
  box-shadow: inset 0 0 2px rgba(0,0,0,.2);
}
.progress .circle.done .title1 {
  color: #444;
}
.progress1 .circle.active .label1 {
  color: #FFF;
  background: #2a9cdc;
  box-shadow: inset 0 0 2px rgba(0,0,0,.2);
}
.progress1 .circle.active .title1 {
  color: #0c95be; 
} 
.job{ width:120px; float:left; text-align:center; font-size:12px; margin:5px 0 0 -35px;white-space: nowrap; }

</style>
<section  class="team-modern-12">
   <div class="container">

            <!--  Appointment -->
            <div class="dr_apoint_dtl">
            <div class="progress1">
  <div class="circle apnt_fixing active">
    <span class="label1 apnt_fixing_label">1</span>
    <span class="job ">Review Patient Appointment </span>
  </div>
  <span class="bar apnt_fixing_bar "></span>
  <div class="circle apnt_details">
    <span class="label1 apnt_details_label">2</span>
    <span class="job ">Enter Patient Details  </span>
  </div>
  <span class="bar apnt_details_bar"></span>
  <div class="circle check_in_details ">
    <span class="label1 check_in_details_label">3</span>
    <span class="job ">Check-In Details </span>
  </div>
  <span class="bar check_in_details_bar"></span>
  <div class="circle finish_step">
    <span class="label1 finish_step_label">4</span>
    <span class="job ">Finished!</span>
  </div>
 
  
</div>
            
            <!--  Colum 1 -->
            <div class="dr_apoint_dtl_clm1">
            <h1> Doctor Details  </h1>
            
            
            <div class="dr_appointment_fx_lft">
            <ul>
            <li>
            <div class="dr_appointment_fx_lft_clm1">
           <?php 
		   if(!empty($resImage)){
                     foreach($resImage as $keys=>$value){
                     if($value['set_profile']==1){
                        $profileImage = $value['name'];
                     }
                      
                     }
		   }else{ 
                            		$imageName = 'no_image.jpg';
                     }
		   if(!empty($profileImage)){ $imageName = $profileImage; }
			?>
            <img align="left" alt="" src="<?php echo WEB_ROOT;?>service/public/z_uploads/doctor/small/<?php echo $imageName;?>">
            <div class="dr_appointment_fx_lft_adrs"> 
            <h1> <?php echo $result['firstname']." ".$result['lastname'];?><!--<span class="dr_appointment_fx_lft_text"> MD </span>--></h1>
            <p><b> <?php $res = $scad->getSpeciality($result['speciality']); echo $res['name']; ?> </b> <br> <?php echo $result['address']?> </p>
            </div>
            
            <!--<div class="dr_ap_fx_jn_txt2">
            <hr />
            <h1> Wednesday, August 20 - 12:00 PM </h1>
            <p><b>  Patient </b>  <br>
            TBD </p>
            
            <h1> Reason for Visit </h1>
            <p>  Illness </p>
            
            
            </div>-->
            
            
            </div>
            
            <div class="dr_appointment_fx_lft_clm2">
            
            </div>
            </li>
            </ul>
            </div>
            <div>
            <h1> Appointment time  </h1>
             <h5 id="apnttime"> 
             <?php 
			 $days = explode(" ",$date);
			 $timestamp=strtotime($date);
			echo  $day = date('l', $timestamp).",".date('F', $timestamp)." ".date('d',$timestamp).",".date('Y', $timestamp)." at ".$time;
			 ?>
             <input type="hidden" class="time" value="<?php echo $day;?>">
              </h5>
            </div>
            </div>
            <!-- End Colum 1 -->
            
            
                        <!--  Colum 2 -->
                        <div id="apnt-success" style="display:none">
                        <div  style="margin-top:20px;float:right;width:63%;text-align:center;" class="alert alert-success">Your appointment booked successfully!<br /></div>
                        <div  align="center">
                        <a href="<?php echo WEB_ROOT;?>index.php/checkin-registration/<?php echo $date." ".$time;?> " class="check_button">Check-in online</a> 
                        <a style="cursor:pointer;" class="check_button1">No thanks</a>  
                        </div>
                        </div>
                        
                        <div id="apnt-confirm-success" style="display:none">
                        <div  style="margin-top:20px;float:right;width:63%;text-align:center;" class="alert alert-success"> Your appointment booked successfully!<br /><a href="<?php echo WEB_ROOT;?>index.php/past_appoinments" >Click here to proceed.</a></div>
                        </div>
                        
            <div class="apnt_book">
            
            <div class="apnt_msg"> <h1>Appointment  details </h1>
            <input type="hidden" class="doc_name" value="<?php echo $result['firstname']." ".$result['lastname'];?>">
            <p> Dr. <?php echo $result['firstname']." ".$result['lastname'];?> accepts patient check-in forms online. No more papers to fill out! </p>
            <input type="hidden" id="userid" value='<?php echo $_SESSION[userID]?>' />
            
            <div class="apnt_pdtls">
            
            <div class="apnt_pdtls_main">
            <div class="apnt_pdtls1"> Patient Name: </div>
            <div class="apnt_pdtls2 patientname">  </div> 
            </div>
            
            <div class="apnt_pdtls_main">
            <div class="apnt_pdtls1"> Insurance:  </div>
            <div class="apnt_pdtls2 insurence">    </div> 
            </div>
            
            <div class="apnt_pdtls_main">
            <div class="apnt_pdtls1"> Reason for Visit:  </div>
            <div class="apnt_pdtls2 reason">   </div> 
            </div>
            
            <div class="apnt_pdtls_main dob-hide">
            <div class="apnt_pdtls1"> Date of Birth: </div>
            <div class="apnt_pdtls2 dat-o-b">  </div> 
            </div>
            
            <div class="apnt_pdtls_main gen-hide">
            <div class="apnt_pdtls1"> Gender: </div>
            <div class="apnt_pdtls2 sex">  </div> 
            </div>
            
            <div class="apnt_pdtls_main">
            <div class="apnt_pdtls1"> Appointment time : </div>
            <div class="apnt_pdtls2 apnttime">  </div> 
            </div>
            
            <div style="float:left; width:100%; "> 
            <div class="apnt_approve" type="image" id="Approved"> Confirm </div>
            </div>
            
            </div>
            </div>
            
            </div>
            <!-- End Colum 2 -->
            <!--  Colum 2 -->
            <div class="dr_apoint_dtl_clm2 " id="abnt-form">
            <h1> Patient Information  </h1>
            
            <small class="dr_apointsubname2"> Will you use insurance?  </small>
            <div style="width:500px;"> 
                <div class="dr_frm">
                  <div class="styled-select">
                     <select name="insuranceSelect" class="advanceSearch" id="insuranceSelect">
                      <option value="">Select Insurance</option>
                     <?php if(!empty($insuranceSelect)){$selected = $insuranceSelect;}else{$selected = NULL;}  $scad->listbox('insurance','id','name','`parent_id`=0','`name` ASC',$selected); ?>
                     </select>
                  </div>
                </div>
               <div class="dr_frm" id="subInsurance">
                  <div class="subname33">  Insurance </div>
                  <div class="styled-select" >
                     <select name="subInsuranceSelect" class="advanceSearch" id="subInsuranceSelect">
                      <option value="">Select Insurance</option>
                     <?php if(!empty($subInsuranceSelect)){$selected = $subInsuranceSelect;}else{$selected = NULL;}  $scad->listbox('insurance','id','name',$condition=NULL,'`name` ASC',$selected); ?>
                     </select>
                  </div>
               </div>
            </div>
             <div style="width:100%;"> 
              <div class="dr_frm" id="loading" style="display: none;z-index:99">
                  <img src="<?php echo WEB_ROOT?>service/public/images/loading.gif" />
               </div>
             </div>
            
            <div style="width:300px; margin:0 0 0 4px;">
            <small class="dr_apointsubname2"> What's the reason for your visit?   </small>
             <div class="styled-select srchReason" >
                <select class="select2_dr" name="srchReason" id="srchReason">
                    <option class="parent-346" value="0" <?php if($search==0) echo "selected"; ?>>Reason for Visit</option>
                    <option class="parent-346" value="1" <?php if($search==1) echo "selected"; ?>>Hearing Problems / Ringing in Ears</option>
                    <option class="parent-346" value="2" <?php if($search==2) echo "selected"; ?>>Damage to the Ear and Disease of the Ear</option>
                    <option class="parent-346" value="3" <?php if($search==3) echo "selected"; ?>>Dizziness / Vertigo</option>
                    <option class="parent-346" value="4" <?php if($search==4) echo "selected"; ?>>Ear Infection</option>
                    <option class="parent-346" value="5" <?php if($search==5) echo "selected"; ?>>Evaluation for Cochlear Implant</option>
                    <option class="parent-346" value="6" <?php if($search==6) echo "selected"; ?>>Hearing Test</option>
                    <option class="parent-346" value="7" <?php if($search==7) echo "selected"; ?>>Multiple Sclerosis</option>
                    <option class="parent-346" value="8" <?php if($search==8) echo "selected"; ?>>Family History of Hearing Loss</option>
                    <option class="parent-346" value="9" <?php if($search==9) echo "selected"; ?>>Pediatric Audiology</option>
                    <option class="parent-346" value="10" <?php if($search==10) echo "selected"; ?>>Problem with Balance</option>
                    <option class="parent-346" value="11" <?php if($search==11) echo "selected"; ?>>Problem with Hearing Aid</option>
                    <option class="parent-346" value="12" <?php if($search==12) echo "selected"; ?>>Stroke</option>
                    <option class="parent-346" value="13" <?php if($search==13) echo "selected"; ?>>Tumor Affecting Hearing (Acoustic Neuroma, Meningioma, Astrocytoma)</option>
                    <option class="parent-346" value="other" >Other</option>
                </select>
                
            </div>
            <input type="text" placeholder="Reason for visit" id="srchReasontxt" name="srchReason" style="display:none"><div class="smalbut">Options</div>
            </div>
            
            <small class="dr_apointsubname2"> Existing Patient: </small>
            <div style="padding:0 0 10px 0; line-height:22px;">
            <input name="regStatus" id="newSch" type="radio" value=""> I'm new to Bookmydoc <br>
            <input name="regStatus" id="nextSh" type="radio" value=""> I've used Bookmydoc before
            
            
            
            <div id="error" style="margin-top:20px;display:none;" class="alert alert-error">Email Already Exist.</div>
            <div id="errorlogin" style="margin-top:20px;display:none;" class="alert alert-error">Username or password is Incorrect.</div>
            <div id="emaillogin" style="margin-top:20px;display:none;" class="alert alert-error">Email not verified.</div>
            <div id="register" class="dr_appointment_fx_joint" style="display:none;">
            
            <form name="patient-form" id="patient-form" style="margin-top:20px;">
            <small class="subname2">  Email </small> 
            <input type="email" style="min-height:40px;" id="email" name="email" class="input-block-level" data-required="true" data-trigger="change" data-type="email" placeholder="Email Address">
            <small class="subname2">  Create a Password </small> 
            <input type="password" style="min-height:40px;" class="input-block-level" name="password" id="password" data-required="true" data-trigger="change" placeholder="Password">
            
            <small class="subname2">  Name </small>
            <input type="text" style="min-height:40px;" class="input-block-level" id="firstname-reg" name="firstname" placeholder="First" data-required="true" data-trigger="change">
            <input type="text" style="min-height:40px;" class="input-block-level" id="lastname-reg" name="lastname" placeholder="Last" data-required="true" data-trigger="change">
            
            <small class="subname2">  Date of Birth </small>
            <div class="input-parent input-container"><input type="text" style="min-height: 40px; background-image: url(&quot;&quot;);" class="input-block-level beatpicker-input beatpicker-inputnode" placeholder="YY-MM-DD" id="dob" name="dob" data-beatpicker="true" data-required="true" data-trigger="mouseleave" data-beatpicker-id="beatpicker-0"><button class="beatpicker-clear beatpicker-clearButton button">Clear</button></div> 
            
            <fieldset>
            <small class="subname2">  Sex </small>
            <div class="card-type"> 
            <input type="radio" checked="checked" value="1" name="gender" id="male"> 
            <label for="visa">Male</label> 
            <input type="radio" value="2" name="gender" id="female">
            <label for="mastercard">Female</label> 
            </div>
            
            </fieldset>
            
            <label class="checkbox"><input type="checkbox" name="privacy" data-required="true" data-trigger="change"><i></i>I agree to the Terms of Service</label>
            
            <div class="clear"></div>
            <div id="continue-join-patient" type="image" class="findDoctors">Continue</div>
            
            </form>
            
            </div>
            <div id="login" class="dr_appointment_fx_joint" style="display:none;">
            <form name="patient-signin-form" id="patient-signin-form" style="margin-top:20px;">
            <small class="subname2">  Email </small> 
            <input type="email" style="min-height:40px;" id="email-login" name="email" class="input-block-level" data-required="true" data-trigger="change" data-type="email" placeholder="Email Address">
            <small class="subname2"> Password </small> 
            <input type="password" style="min-height:40px;" class="input-block-level" name="password" id="password-LOGIN" data-required="true" data-trigger="change" placeholder="Password">
             <div class="clear"></div>
            <div id="continue-patient-signin" type="image" class="findDoctors">Continue</div>

            </form>
            
            </div>
            
            
            
            </div>
            
            
            <!--<div class="dr_apoint_dtlsectn">
            
            
            <form style="margin-top:0px;">
            <small class="dr_apointsubname2"> Is this appointment for you or for someone else?  </small>
            <div style="padding:0 0 10px 0; line-height:22px;">
            <input name="" type="radio" value=""> For me <br>
            <input name="" type="radio" value=""> For someone else
            </div>
            
            <div style="width:300px;">
            <small class="dr_apointsubname2"> Patient Name: </small>
            <input type="text" style="min-height:40px; " class="input-block-level" placeholder="Email Address"> 
            </div>
            
            <div style="width:300px;">
            <small class="dr_apointsubname2"> Patient Email: </small>
            <input type="text" style="min-height:40px; " class="input-block-level" placeholder="Email Address"> 
            </div>
            
            
            <small class="dr_apointsubname2"> Patient Gender: </small>
            <div style="padding:0 0 10px 0; line-height:22px;">
            <input name="" type="radio" value=""> Male <br>
            <input name="" type="radio" value=""> Female 
            </div>
            
            
            <div style="width:300px;">
            <small class="dr_apointsubname2"> Cell Phone: </small>
            <input type="text" style="min-height:40px; " class="input-block-level" placeholder="Email Address"> 
            </div>
            
            
            <div style="width:300px;">
            <small class="dr_apointsubname2"> Zip Code: </small>
            <input type="text" style="min-height:40px; " class="input-block-level" placeholder="Email Address"> 
            </div>
            
            </p>
            
            </div>
            </div>-->
            <!-- End Colum 2 -->
            
            
            
            <!--  Colum 3 -->
            <div class="dr_apoint_dtl_clm1">
            
           <!-- <small class="dr_apointsubname2"> Existing Patient: </small>
            <div style="padding:0 0 10px 0; line-height:22px;">
            <input name="" type="radio" value=""> I am a new patient at this location <br>
            <input name="" type="radio" value=""> I am an existing patient at this location 
            </div>-->
            
            <!--<div style="width:300px;">
            <small class="dr_apointsubname2"> Reason for Appointment: </small>
            <textarea style="min-height:70px; " class="dr_apoint_dtl_clm1_msg" name="message" placeholder="Your Message to Us" id="message"></textarea>
            </div>
            
            <h1> Insurance Information  </h1>
            
           
            
            <div style="padding:20px 0 0 0;">
            <div name="advanceSearchBtn" id="advanceSearchBtn" class="dr_appointment_btn"><a> Confirm Appointment</a></div>
            </div>
            </form>
            </div>
            <!-- End Colum 3 -->
            
            </div> 
            <input type="hidden" class="sess" value="<?php echo $_SESSION['userID']; ?>" />
            <input type="hidden" class="name" value="<?php echo $userdetails['firstname'].$userdetails['lastname']; ?>" />
            <input type="hidden" class="email" value="<?php echo $userdetails['email']; ?>" />
            <input type="hidden" class="dob" value="<?php echo $userdetails['dob']; ?>" />
            <!--  End Appointment -->       

        </div>
        	<div id="docnurseImg"><img src="<?php echo WEB_ROOT;?>service/public/images/pic12.jpg" /></div>
        <div class="dr_apoint_dtl_clm1" id="conform-div">
        
        </div>
        </section>     
        <script type="text/javascript">
		$(document).ready(function(){
								   $(".apnt_book").hide();
			$("#newSch").click(function(){
				$("#login").hide();
				$("#register").show();
				$("#register").slideDown(1000);
			});
			$("#nextSh").click(function(){
				$("#register").hide();	
				var ses=$(".sess").val();
				if(ses==''){
				$("#login").show();
				}
				else{
					$("#docnurseImg").hide();
					var formData = $("#patient-form").serialize();
			var ins=$( "#insuranceSelect option:selected" ).text();
			var subins=$( "#subInsuranceSelect option:selected" ).text();
			var txt=$("#srchReasontxt").val();
			if(txt==''){
			var srchins=$( "#srchReason option:selected" ).text();
			}
			else{
				var srchins=txt;
				}
			var gender=$("input[name='gender']:checked").val();
			if(gender==1){
				var gen="male";
				}else{
					var gen="female";
				}
				
				var dob=$(".dob").val();
				var email=$(".email").val();
				var apnttime=$("#apnttime").text();
				var name=$(".name").val();
				var insu=ins+"-"+subins;
				$("#abnt-form").hide();
						$(".patientname").text(name);
						$(".insurence").text(insu);
						$(".reason").text(srchins);
						$(".dat-o-b").text(dob);
						$(".sex").text(gen);
						$(".apnttime").text(apnttime);
						$(".apnt_book").show();
					}
					
					$(".apnt_fixing").removeClass("active");
					$(".apnt_fixing").addClass("done");
					$(".apnt_details").addClass("active");
					$(".apnt_fixing_label").html("&#10003;");
					$(".apnt_fixing_bar").css("background","#2a9cdc");
			});
			
			$("#continue-join-patient").click(function() {
													   var htmlData = '';
        $('#patient-form').parsley('validate');
        var validation = $('#patient-form').parsley('isValid');
        if (validation == true) {
            document.getElementById('continue-join-patient').style.pointerEvents = 'none';
            $("#continue-join-patient").text('Processing...');
            var formData = $("#patient-form").serialize();
			var ins=$( "#insuranceSelect option:selected" ).text();
			var subins=$( "#subInsuranceSelect option:selected" ).text();
			var srchins=$( "#srchReason option:selected" ).text();
			var gender=$("input[name='gender']:checked").val();
			if(gender==1){
				var gen="male";
				}else{
					var gen="female";
				}
				var firstname=$("#firstname-reg").val();
				var lastname=$("#lastname-reg").val();
				var dob=$("#dob").val();
				var email=$("#email").val();
				$(".email").val(email);
				var apnttime=$("#apnttime").text();
				var name=firstname+" "+lastname;
				var insu=ins+"-"+subins;
			$.ajax({
                type: 'POST',
                dataType: 'json',
                url: SITEURL + 'act-signin-book-doctor',
                data: formData,
                success: function(res) {
					console.log(res);
                    if (res === 0) {
                        $("#error").fadeIn(1000);
                        document.getElementById('continue-join-patient').style.pointerEvents = 'auto';
                        $("#continue-join-patient").text('Countinue');
                    } else {
						$("#docnurseImg").hide();
                        $("#abnt-form").fadeOut();
						$(".patientname").text(name);
						$(".insurence").text(insu);
						$(".reason").text(srchins);
						$(".dat-o-b").text(dob);
						$(".sex").text(gen);
						$(".apnttime").text(apnttime);
						$(".apnt_book").show();
                    }
                }
            });
        }
    });
			$("#continue-patient-signin").click(function() {
													   var htmlData = '';
        $('#patient-signin-form').parsley('validate');
        var validation = $('#patient-signin-form').parsley('isValid');
        if (validation == true) {
            document.getElementById('continue-patient-signin').style.pointerEvents = 'none';
            $("#continue-patient-signin").text('Processing...');
            var formData = $("#patient-signin-form").serialize();
			var ins=$( "#insuranceSelect option:selected" ).text();
			var subins=$( "#subInsuranceSelect option:selected" ).text();
			var txt=$("#srchReasontxt").val();
			if(txt==''){
			var srchins=$( "#srchReason option:selected" ).text();
			}
			else{
				var srchins=txt;
				}
			var gender=$("input[name='gender']:checked").val();
			var email=$("#email-login").val();
			var apnttime=$("#apnttime").text();
				var insu=ins+"-"+subins;
			$.ajax({
                type: 'POST',
                url: SITEURL + 'act-signin',
                data: formData,
                success: function(res) {
					console.log(res);
                    if (res == 0) {
                        $("#errorlogin").fadeIn(1000);
                        document.getElementById('continue-patient-signin').style.pointerEvents = 'auto';
                        $("#continue-patient-signin").text('Countinue');
						$("#email-login").removeClass("parsley-success");
						$("#email-login").addClass("parsley-error");
						$("#password-LOGIN").removeClass("parsley-success");
						$("#password-LOGIN").addClass("parsley-error");
                    }
					else if(res==3){
						$("#emaillogin").fadeIn(500);
                        document.getElementById('continue-patient-signin').style.pointerEvents = 'auto';
                        $("#continue-patient-signin").text('Countinue');
						$("#email-login").removeClass("parsley-success");
						$("#email-login").addClass("parsley-error");
						$("#emaillogin").delay(1000).fadeOut(1500);
						} 
					else {
						var respon=res.split(",");
						if(respon[1]==0){
						var sex="--";
						}
						else if(respon[1]==1){
						var sex="male";
						}
						else{
							var sex="female";
						}
						$("#abnt-form").fadeOut(500);
						$(".patientname").text(email);
						$(".insurence").text(insu);
						$(".reason").text(srchins);
						$(".dat-o-b").text(respon[0]);
						$(".sex").text(sex);
						$("#userid").val(respon[2]);
						$(".apnttime").text(apnttime);
						$(".apnt_book").show(1000);
						$("#docnurseImg").hide();
						
                    }
                }
            });
        }
    });
			//approve function
			$("#Approved").click(function() {
        document.getElementById('Approved').style.pointerEvents = 'none';
            $("#Approved").text('Processing...');
										  var doctor_id = <?php echo $doctorID;?>;
										  var apnttime = $(".time").val();	
										  var patiendid = $("#userid").val();
										  var apnt_note = $(".reason").text();
										  var email=$(".email").val();	
										  var name=$(".patientname").text();	
										  var docname=$(".doc_name").val();				
			$.ajax({
                type: 'POST',
                url: SITEURL + 'act-confirm-apnt',
                data: {"doctor_id":doctor_id,"apnttime":apnttime,"patiendid":patiendid,"apnt_note":apnt_note,"email":email,"name":name,"docname":docname,},
                success: function(res) {
                    if (res === 0) {
						$("#error").show();
                    } else {
						document.getElementById('Approved').style.pointerEvents = 'auto';
                        $("#Approved").text('Confirm');
						$(".apnt_book").slideUp(500);
						$("#apnt-success").fadeIn(1500);
						$(".apnt_details").removeClass("active");
					$(".apnt_details").addClass("done");
					$(".apnt_fixing_bar").css("background","#8bc435");
					$(".check_in_details").addClass("active");
					$(".apnt_details_label").html("&#10003;");
					$(".apnt_details_bar").css("background","#2a9cdc");
                    }
                }
            });
    });
			
			$(".check_button1").click(function(){
											   $("#apnt-success").hide();
											   $("#apnt-confirm-success").show();
											   $(".check_in_details").removeClass("active");
					$(".check_in_details").addClass("done");
					$(".apnt_details_bar").css("background","#8bc435");
					$(".finish_step").addClass("active");
					$(".check_in_details_label").html("&#10003;");
					$(".check_in_details_bar").css("background","#2a9cdc");
											   });
		}); 
        </script>

<?php include("service/ui/common/footer.php"); ?>