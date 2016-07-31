<?php
   include(APP_PATH."service/ui/common/header.php");
   ?>
   <script type="text/javascript">
$(document).ready(function() {
	$('#camera_wrap_1').camera({
		thumbnails: true,
		time: 500,
		height: '510px'
	});
  });     
</script>
<style>

</style>
<div class="slider-area">
   <div class="camera_wrap camera_azure_skin" id="camera_wrap_1" >
      <div data-thumb="<?php echo APP_PATH;?>service/public/images/resource/thumb/slider1-thumb.jpg" data-src="<?php echo APP_PATH;?>service/public/images/resource/slider1.png">
      </div>
      <!-- 1st Slide -->
      <div data-thumb="<?php echo APP_PATH;?>service/public/images/resource/thumb/slider2-thumb.jpg" data-src="<?php echo APP_PATH;?>service/public/images/resource/dictate-slider2.jpg">
      </div>
      <!-- 2nd Slide -->
      <div data-thumb="<?php echo APP_PATH;?>service/public/images/resource/thumb/slider3-thumb.jpg" data-src="<?php echo APP_PATH;?>service/public/images/resource/dentist.jpg">
      </div>
      <!-- 3rd Slide -->
      <div data-thumb="<?php echo APP_PATH;?>service/public/images/resource/thumb/army.jpg" data-src="<?php echo APP_PATH;?>service/public/images/resource/army.jpg">
      </div>
      <!-- 4th Slide -->
      <div data-thumb="<?php echo APP_PATH;?>service/public/images/resource/thumb/indian-doc.jpg" data-src="<?php echo APP_PATH;?>service/public/images/resource/indian-doc.jpg">
      </div>
      <!-- 5th Slide -->
      <div data-thumb="<?php echo APP_PATH;?>service/public/images/resource/thumb/african-doc.jpg" data-src="<?php echo APP_PATH;?>service/public/images/resource/african-doc.jpg">
      </div>
      
      <div data-thumb="<?php echo APP_PATH;?>service/public/images/resource/thumb/therapist-thumb.jpg" data-src="<?php echo APP_PATH;?>service/public/images/resource/therapist.jpg">
      </div>
      
      <div data-thumb="<?php echo APP_PATH;?>service/public/images/resource/thumb/vetnerian1-thumb.jpg" data-src="<?php echo APP_PATH;?>service/public/images/resource/vetnerian1.jpg">
      </div>
      
      <div data-thumb="<?php echo APP_PATH;?>service/public/images/resource/thumb/cultural-thumb.jpg" data-src="<?php echo APP_PATH;?>service/public/images/resource/cultural.jpg">
      </div>
      <!-- 6th Slide -->
      <!-- <div data-thumb="<?php echo APP_PATH;?>service/public/images/resource/thumb/slider5-thumb.jpg" data-src="<?php echo APP_PATH;?>service/public/images/resource/dictate-slider5.jpg">-->
   </div>
   <!-- 5th Slide -->
</div>
<!-- FORMS STYLES -->
<div class="container">
   <div class="two-box column home-search-box">
      <div class="span5">
         <div class="searchbox">
            <div class="colorbox"></div>
            <div class="search">
            <h4 class="login-header"> Find a doctor and Schedule an appointment </h4>
            <small class="login-header" style="font-size:18px;"> Get Started </small>
               <form style="margin-top:15px;" id="findDoctor-form">
                  <div class="styled-selected">
                     <select name="docSpeciality" id="docSpeciality" class="spciality_search">
                        <optgroup label="All">
                           <option value="" style="text-transform:unset;">Select a Speciality</option>
                           <?php
                              $condition = 'category_id = 1';
                              $scad->listbox('speciality','id','name',$condition,'`name` ASC',$selected);?>
                        </optgroup>
                        <optgroup label="Therapists / Counselors">
                           <?php
                              $condition = 'category_id = 2';
                              $scad->listbox('speciality','id','name',$condition,'`name` ASC',$selected);?>
                        </optgroup>
                        <optgroup label="Dental">
                           <?php
                              $condition = 'category_id = 3';
                              $scad->listbox('speciality','id','name',$condition,'`name` ASC',$selected);?>
                        </optgroup>
                        <optgroup label="Veterinary">
                           <?php
                              $condition = 'category_id = 4';
                              $scad->listbox('speciality','id','name',$condition,'`name` ASC',$selected);?>
                        </optgroup>
                     </select>
                  </div>
                  <div class="hme_txtfm"> In </div>
                  <input type="text" placeholder="Enter your Zip" name="docZip" id="doc-zip" class="input-block-level" style="min-height:30px;" >
                  <div class="hme_txtfm"> Who participates in </div>
                  <div class="styled-selected">
                     <select class="input-block-level" name="insuranceSelect" id="insuranceSelect">
                        <option value="">Select Insurance</option>
                        <?php $scad->listbox('insurance','id','name','`parent_id`=0','`name` ASC',$selected=NULL); ?>
                     </select>
                  </div>
                  <div id="loading" style="display: none;    height: 30px;    margin: 11px 0 7px;"><img style=""  src="<?php echo WEB_ROOT?>service/public/images/loading.gif" /></div>
                  <div id="subInsurance" class="styled-selected" style="display:none;">
                     <select class="input-block-level" name="subInsuranceSelect" id="subInsuranceSelect"></select>
                  </div>
                  <div class="styled-selected" id="reason">
                  <div id="reason_loading" style="height: 30px; margin: 5px 5px 11px; display: none;">
<img src="<?php echo WEB_ROOT;?>service/public/images/loading.gif" style="">
</div>
                     <select id="srchReason" name="srchReason" class="select2_dr">
                        <option value="0" class="parent-346">Reason for Visit</option>
                        <option class="parent-346" value="other">Other </option>
                     </select>
                     
                  </div><input type="text" placeholder="Reason for visit" id="srchReasontxt" name="srchReason1" style="display:none"><div class="smalbut">Options</div>
                  <div class="styled-selected">
                     <select id="srchLanguage" name="language" class="select2_dr">
						<option value="0">Select a Language</option>
						<?php $scad->listbox('languages','id','name',$condition=NULL,'`name` ASC',$selected=NULL);?>
                     </select>
                  </div>
                  <div class="styled-selected">
                     <select class="select2_dr" name="gender" id="gender">
                        <option value="0">Doctor Gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                     </select>
                  </div>
                  <div  id="findDoctorBtn" class="findDoctors">Find Doctors </div>
               </form>
               <!-- <p class="text-center"> <a href="#" class="advancedsearch"><i class="theme-icon user"></i> Advanced Search </a></p>-->
            </div>
            <div class="itsfree"><img src="<?php echo WEB_ROOT?>service/public/images/free.png" alt="" /></div>
         </div>
      </div>
   </div>
</div>
<!-- // FORMS STYLES ENDS-->
<section  class="team-modern-1">
   <div class="container">
      <div class="row-fluid">
         <div class="span12">
            <img src="<?php echo WEB_ROOT?>service/public/images/mobileanimation.png" style="float:right; max-width:100%"/>
            <h1 class="download-part">Healthcare at your demand! </h1>
            <h3 class="download-part">Find a nearby doctor or dentist and book an appointment instantly. And it's free!</h3>
            <h4 class="download-part">Features:</h4>
            <div class="download-part">
               <ul>
                  <li>	View a map of doctors in your insurance network.</li>
                  <li>    Read patient reviews to help you choose the right doctor.</li>
                  <li>    See any doctor's available times and click to book instantly!</li>
               </ul>
            </div>
            <h4 class="download-part">Get The App:</h4>
            <img src="<?php echo WEB_ROOT?>service/public/images/apple.png" width="240" style="margin-left:35px;" alt=""/> <img src="<?php echo WEB_ROOT?>service/public/images/googleplay.png" width="240" alt=""/>
         </div>
      </div>
   </div>
</section>
<section class="cols">
   <!--<section class="cols">-->
   <div class="container">
      <div class="row-fluid">
         <div class="business-block span9">
            <!-- Doctors list -->
            <div class="finddoctor">
               <div class="directoriesInner">
                  <h3 class="simple-title">Find Doctors by...</h3>
                  <!-- City -->
                  <div class="business-block span3">
                     <h3 class="simple-title-inner"><i class="icon-map-marker"></i>  City</h3>
                     <ul>
                        <li><a class="zip_foot" id="32701">Altamonte Springs</a></li>
               <li><a class="zip_foot" id="32703">Apopka </a></li>
               <li><a class="zip_foot" id="32707">Casselberry </a></li>
               <li><a class="zip_foot" id="34747">Celebration </a></li>
               <li><a class="zip_foot" id="33755">Clearwater </a></li>
               <li><a class="zip_foot" id="34711">Clermont </a></li>
               <li><a class="zip_foot " id="52801">Davenport </a></li>
               <li><a class="zip_foot " id="32114">Daytona Beach </a></li>
               <li><a class="zip_foot " id="32713">Debary </a></li>
               <li><a class="zip_foot " id="32730">Fern Park</a></li>
               <li><a class="zip_foot " id="33301">Fort Lauderdale</a></li>
               <li><a class="zip_foot " id="34741">Kissimmee</a></li>
               <li><a class="city_more" id="">more... </a></li>
               
               <li><a class="zip_foot hi_city" id="32746">Lake Mary</a></li>
               <li><a class="zip_foot hi_city" id="20175">Leesburg</a></li>
               <li><a class="zip_foot hi_city" id="32750">Longwood</a></li>
               <li><a class="zip_foot hi_city" id="32751">Maitland</a></li>
               <li><a class="zip_foot hi_city" id="32901">Melbourne</a></li>
               <li><a class="zip_foot hi_city" id="92093">Ocoee</a></li>
               <li><a class="zip_foot hi_city" id="34761">Orange City</a></li>
               <li><a class="zip_foot hi_city" id="32801">Orlando</a></li>
               <li><a class="zip_foot hi_city" id="34758">Poinciana</a></li>
               <li><a class="zip_foot hi_city" id="32771">Sanford</a></li>
               <li><a class="zip_foot hi_city" id="56301">St. Cloud</a></li>
               <li><a class="zip_foot hi_city" id="34216">St. Petersburg, Sarasota</a></li>
               
               <li><a class="zip_foot hi_city" id="33601">Tampa</a></li>
               <li><a class="zip_foot hi_city" id="34777">Winter Garden</a></li>
               <li><a class="zip_foot hi_city" id="33880">Winter Haven</a></li>
               <li><a class="zip_foot hi_city" id="32789">Winter Park</a></li>
               <li><a class="city_less" id="" style="display:none;cursor:pointer;">less... </a></li>
                     </ul>
                  </div>
                  <!-- // City -->
                  <!-- Specialty -->
                  <?php
				  $result=$scad->getAllData("speciality");
				  /*echo "<pre>";
				  print_r($result);*/
				  $len=count($result);
				  ?>
                  <div class="business-block span4">
                     <h3 class="simple-title-inner"><i class="icon-hospital"></i>  Specialty</h3>
                     <ul>
                     <?php
					 	for($i=0;$i<$len;$i++){
							if($i<12){
                     ?>
                        <li><a class="spcl" id='<?php echo $result[$i]['id']; ?>'><?php echo $result[$i]['name']; ?></a></li>
                        <?php }
						elseif($i==12){?>
                        <li><a class=" more_specl" id=''>more...</a></li>
						<?php
                        }
						
						else{
							?>
							<li><a class="spcl hi_specl" id='<?php echo $result[$i]['id']; ?>'><?php echo $result[$i]['name']; ?></a></li>
							<?php }
							if($i==($len-1)){
								?>
								<li><a class=" hi_specl less_specl" id='' style="cursor:pointer">less...</a></li>
								<?php 
								}
						} ?>
                     </ul>
                  </div>
                  <!-- // Specialty -->
                  <!-- Insurance -->
                  <?php
				  $result=$scad->getAllData("insurance");
				  /*echo "<pre>";
				  print_r($result);*/
				  $len=count($result);
				  ?>
                  <div class="business-block span4">
                     <h3 class="simple-title-inner"><i class="icon-table"></i>  Insurance</h3>
                     <ul>
                        <?php
					 	for($i=0;$i<$len;$i++){
							if($i<12){
                     ?>
                        <li><a class="insurence" id='<?php echo $result[$i]['id']; ?>'><?php echo $result[$i]['name']; ?></a></li>
                        <?php }
						elseif($i==12){?>
                        <li><a class=" more_insurence" id=''>more...</a></li>
						<?php
                        }
						
						else{
							?>
							<li><a class="insurence hi_insurence" id='<?php echo $result[$i]['id']; ?>'><?php echo $result[$i]['name']; ?></a></li>
							<?php }
							if($i==($len-1)){
								?>
								<li><a class=" hi_insurence less_insurence" id='' style="cursor:pointer">less...</a></li>
								<?php 
								}
						} ?>
                     </ul>
                  </div>
                  <!-- // Insurance -->
                  <div class="clearfix"></div>
                  <hr/>
                  <span class="othersearch"><span style="font-size:15px; font-weight:bold;">Search by </span><a href="<?php echo WEB_ROOT;?>index.php/searchBy-name" class="serachbymethods">Doctor Name</a><a href="#"  class="serachbymethods">Practice Name</a> <a href="<?php echo WEB_ROOT;?>index.php/Procedures" class="serachbymethods" >Procedures</a><a href="<?php echo WEB_ROOT;?>index.php/Reviews" class="serachbymethods">Reviews</a><a href="<?php echo WEB_ROOT;?>index.php/Languages" class="serachbymethods">Languages</a></span>
               </div>
            </div>
            <!-- // Doctor List -->
         </div>
         <div class="business-block span3">
            <!-- lOOKING FOR DOCTOR AND CLININC -->
            <div class="findspecialist">
               <h3>Are your Looking For Health Specialist?</h3>
               <p>Book My Doc is the best way to see new patients and build your practice.</p>
               <p style="margin-top:10px;"> <a href="<?php echo WEB_ROOT;?>index.php/join/patient" class="registration">Registration</a></p>
            </div>
            <div class="findspecialist-1">
               <h3 >Are your Looking For Client? </h3>
               <p>Book My Doc is the best way to see new patients and build your practice. </p>
               <p style="margin-top:10px;"><a href="<?php echo WEB_ROOT;?>index.php/join/doctor" class="registration">Registration</a></p>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="cols">
   <div class="container">
      <div class="row-fluid">
         <div class="span12 footer-top-banner">
            <div class="span4">
               <h3 class="helptext">Need help booking online?</h3>
            </div>
            <div class="span4">
               <h3  class="helptext-phone"><i class="icon-phone"></i> (855) 962-3621 </h3>
            </div>
            <div class="span4">
               <h3  class="helptext-mail"><i class="icon-envelope"></i> <a href="#">service@Bookmydoc.com</a> </h3>
            </div>
         </div>
      </div>
   </div>
</section>
<?php include(APP_PATH."service/ui/common/footer.php"); ?>
