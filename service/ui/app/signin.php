<?php include("service/ui/common/header.php"); ?>
<section  class="team-modern-12">
   <div class="container">
      <div class="ptent_dctr_main">
         <h1 class="joiintnow"> Sign In </h1>		 
		 
         <div class="signin_page">
         <div id="email_error" style="margin-top:20px;display:none;" class="alert alert-error">Email not verified.</div>
		 <div id="signin_error" style="margin-top:20px;display:none;" class="alert alert-error">Invalid Login.</div>
            <form style="margin-top:20px;" id="signin-form" name="signin-form">
               <small class="subname2">  Email </small> 
               <input type="email" placeholder="Email Address" data-type="email" data-trigger="change" data-required="true" class="input-block-level"  name="email"  id="email" style="min-height:40px;" >
               <small class="subname2">  Password </small> 
                <input type="password" placeholder="Password" data-trigger="change" data-required="true" id="password" name="password" class="input-block-level" style="min-height:40px;" >
               <small class="forgot_pass">  <a href="#"> Forgot your password? </a></small>
               <div id="signinBtn" class="findDoctors">Sign In</div>
            </form>
         </div>
         <div class="dctrmain">
            <h1 class="patient"> I'm a new patient </h1>
            <p> Sign up for a Book My Doc account to book an appointment right now!</p>
            <div class="dctr_lrnmore"> <a href="<?php echo WEB_ROOT;?>index.php/join/patient">Join Now</a></div>
         </div>
      </div>
   </div>
</section>
<?php include("service/ui/common/footer.php"); ?>