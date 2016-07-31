<?php 
include("service/ui/common/header.php"); 

?>
<section  class="team-modern-12">
   <div class="container">
      <div class="signup_nw_top">
         <div class="signup_nw_top_hd"> <a href="<?php echo WEB_ROOT;?>index.php/join/patient">Not a Doctor or Dentist? Click here </a></div>
      </div>
      <div class="span122">
         <div class="signup_nw">
            <h1> You’ll love being on Bookmydoc </h1>
            <ul>
               <li>
                  <h2> You’ll love being on Bookmydoc </h2>
                  Access Bookmydoc network of more than 5 million patients. 
               </li>
               <li>
                  <h2> You’ll love being on Bookmydoc </h2>
                  Let patients schedule appointments with you instantly, 24-7, from Bookmydoc and from your practice website.
               </li>
               <li>
                  <h2> You’ll love being on Bookmydoc </h2>
                  Access Bookmydoc network of more than 5 million patients. 
               </li>
               <li>
                  <h2> You’ll love being on Bookmydoc  </h2>
                  Access Bookmydoc network of more than 5 million patients. 
               </li>
               <li>
                  <h2> You’ll love being on Bookmydoc  </h2>
                  Let patients schedule appointments with you instantly, 24-7, from Book My Doc.com and from your practice website.
               </li>
            </ul>
         </div>
         <!-- FORMS STYLES -->
         <div class="container">
            <div class="two-box column home-search-box2">
               <div class="span55">
                  <div class="searchbox">
                     <div class="colorbox"></div>
                     <div class="search">
                        <h3 class="login-header"> Let's get started!</h3>
						<div id="doc_error" style="margin-top:20px;display:none;" class="alert alert-error">Email Already Exist.</div>
                        <div id="doc_success" style="margin-top:20px;display:none;" class="alert alert-success">Registration success .<br/>Pleasse verify your account.(check your mail)</div>
                        <form style="margin-top:20px;" name="doctor-form" id="doctor-form">
                           <small class="subname2">  Name </small>
                       <input type="text" data-trigger="change" data-required="true"  placeholder="First" data-minlength="3"  name="firstname" id="" class="input-block-level" style="min-height:40px;" >
                       <input type="text" data-trigger="change" data-required="true" placeholder="Last" data-minlength="3" name="lastname" id="" class="input-block-level" style="min-height:40px;" >
                           <small class="subname2">  Email </small> 
                           <input type="email" placeholder="Email Address" data-type="email" data-trigger="change" data-required="true" class="input-block-level"  name="email"  id="email" style="min-height:40px;" >
						   <small class="subname2">  Password </small> 
                          <input type="password" placeholder="Password" data-minlength="6" data-trigger="change" data-required="true" id="password" name="password" class="input-block-level" style="min-height:40px;" >
                           <input name="phone" type="text" data-trigger="change" data-minlength="10" data-required="true" placeholder="Phone" class="input-block-level" style="min-height:40px;" >
                           <small class="subname2">  Practice ZIP Code </small> 
                           <input name="zipcode" id="zipcode" type="text" data-minlength="5" data-trigger="change" data-required="true" placeholder="ZIP" class="input-block-level" style="min-height:40px;" >
                           <div>
                              <select data-trigger="change" data-required="true"  style="height: 40px;  padding: 10px; width: 390px;"  name="speciality" id="speciality">
							  <option value="0">Select Speciality</option>
							  <?php $scad->listbox('speciality','id','name',$condition=NULL,'`name` ASC',$selected=NULL); ?></select>
                           </div>
                           <label class="checkbox"><input data-trigger="change" data-required="true" name="privacy" name="privacy" type="checkbox"><i><a href="<?php echo WEB_ROOT;?>index.php/terms">I agree to the Terms of Service</a></i></label>
                           <div class="clear"></div>
                          <div href="#" id="doc-continue" class="findDoctors ctn_btn"> Continue</div>
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