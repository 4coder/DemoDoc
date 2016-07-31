<?php
session_start();
include("service/ui/common/header.php"); 
 $_SESSION['userID'];
?>
<section  class="team-modern-12">
   <div class="container">
      <div class="span122">
         <div style="float:right; width:300px; padding:130px 0 0 0;">
            <img src="<?php echo WEB_ROOT;?>service/public/images/form1.jpg" style="float:right; max-width:100%"/>
            <h1 class="dwnld_frmpic"> Bookmydoc is totally free. </h1>
            <h3 class="dwnld_frmpic"> Book online instantly, no credit card required. </h3>
            <!--<a href="<?php echo WEB_ROOT;?>index.php/mailtest">mail test</a>-->
         </div>
         <!-- FORMS STYLES -->
         <div class="container">
            <div class="two-box column home-search-box2">
               <div class="span55">
                  <div class="searchbox">
                     <div class="colorbox"></div>
                     <div class="search">
                        <h3 class="login-header"> Join Now </h3>
							<div id="patient_error" style="margin-top:20px;display:none;" class="alert alert-error">Email Already Exist.</div>
                            <div id="patient_success" style="margin-top:20px;display:none;" class="alert alert-success">Registration success .<br/>Pleasse verify your account.(check your mail)</div>
                        <form  style="margin-top:20px;" id="patient-form" name="patient-form">
                           <small class="subname2">  Email </small> 
                           <input type="email" placeholder="Email Address" data-type="email" data-trigger="change" data-required="true" class="input-block-level"  name="email"  id="email" style="min-height:40px;" >
                           <small class="subname2">  Create a Password </small> 
                           <input type="password" data-minlength="6" placeholder="Password" data-trigger="change" data-required="true" id="password" name="password" class="input-block-level" style="min-height:40px;" >
                           
                       <small class="subname2">  Name </small>
                       <input type="text" data-trigger="change" data-minlength="3" data-required="true" placeholder="First" name="firstname" id="" class="input-block-level" style="min-height:40px;" >
                       <input type="text" data-trigger="change" data-minlength="3" data-required="true" placeholder="Last" name="lastname" id="" class="input-block-level" style="min-height:40px;" >
                           
                        <small class="subname2">  Date of Birth </small>
                        
	<input type="text" data-trigger="mouseleave" data-required="true" data-beatpicker="true" name="dob" id="dob" placeholder="YY-MM-DD" class="input-block-level" style="min-height:40px;"/> 
    
     <fieldset>
                          <small class="subname2">  Sex </small>
                          <div class="card-type"> 
                             <input id="male" name="gender" value="1" data-required="true"   type="radio"> 
                             <label for="visa">Male</label> 
                             <input id="female" name="gender" value="2" data-required="true" type="radio">
                             <label for="mastercard">Female</label> 
                          </div>
                          
                        </fieldset>
                           
						<label class="checkbox"><input data-trigger="change" data-required="true" name="privacy" name="privacy" type="checkbox"><i><a href="<?php echo WEB_ROOT;?>index.php/terms">I agree to the Terms of Service</a></i></label>

                        <div class="clear"></div>
                        <div class="findDoctors" type="image" id="continue">Continue</div>

                    </form>
                     </div>
                     <div class="itsfree"></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- // FORMS STYLES ENDS-->
      </div>
   </div>
</section>
<?php include("service/ui/common/footer.php"); ?>