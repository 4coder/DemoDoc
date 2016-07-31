<style>
.find_foot{
	cursor:pointer;
	}
	.zip_foot{
	cursor:pointer;
	}
	.spcl_foot{
	cursor:pointer;
	}
	
</style>

<footer class="footer">
   <div class="container">
      <div class="widget">
         <h3 class="footer-title">Book My <span>doc</span></h3>
         <div class="quick-menu">
            <ul>
               <li><a href="<?php echo WEB_ROOT;?>index.php/About" title="">About</a></li>
               <li><a href="<?php echo WEB_ROOT;?>index.php/Contact" title="">Contact</a></li>
               <li><a href="<?php echo WEB_ROOT;?>index.php/Careers" title="">Careers</a></li>
               <li><a href="#" title="">Answers</a></li>
               <li><a href="#" title="">Faqs</a></li>
               <li><a href="#" title="">Blog</a></li>
               <li><a href="#" title="">Doctor Blog</a></li>
            </ul>
         </div>
      </div>
      <!-- Quick Menu -->
      <div class="widget">
         <h3 class="footer-title">Our <span>Location</span></h3>
         <div class="location">
            <p>Make appointments on the go, right from your smartphone, with our top-rated mobile app. </p>
            <ul>
               <li><i class="theme-icon email"></i><span class="source">by e-mail;</span> <span class="detail"><a href="#" title="">info@Bookmydoc.com</a></span> </li>
               <li><i class="theme-icon phone"></i><span class="source">by phone;</span> <span class="detail"><a href="#" title="">+000 -12601</a></span> </li>
               <li><i class="theme-icon home"></i><span class="source">Address;</span> <span class="detail"><a href="#" title="">121, honey Street, Home City, USA</a></span> </li>
            </ul>
         </div>
      </div>
      <!-- Location -->
      <div class="widget-1">
         <h3 class="footer-title">Search <span> By</span></h3>
         <div class="searchby">
            <ul>
               <li><a href="<?php echo WEB_ROOT;?>index.php/searchBy-name">Doctor Name</a></li>
               <li><a href="#">Practice Name</a></li>
               <li><a href="<?php echo WEB_ROOT;?>index.php/Procedures">Procedure</a></li>
               <li><a href="<?php echo WEB_ROOT;?>index.php/Languages">Language</a></li>
               <li><a  href="<?php echo WEB_ROOT;?>index.php/location">Location</a></li>
               <li><a class="find_foot">Hospital</a></li>
               <li><a href="<?php echo WEB_ROOT;?>index.php/insurance">Insurance</a></li>
            </ul>
         </div>
      </div>
      <!--Search By -->
      <form style="margin-top:15px;display:none" id="hiddenform">
                  <div class="styled-selected">
                     <select name="docSpeciality" id="docSpeciality_foot">
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
                  <input type="text" placeholder="Enter your Zip" name="docZip" id="doc-zip-foot" class="input-block-level" style="min-height:30px;" >
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
                  <div class="styled-selected">
                     <select id="srchReason" name="srchReason" class="select2_dr">
                        <option value="0" class="parent-346">Reason for Visit</option>
                        <option value="1" class="parent-346">Hearing Problems / Ringing in Ears</option>
                        <option value="2" class="parent-346">Damage to the Ear and Disease of the Ear</option>
                        <option value="3" class="parent-346">Dizziness / Vertigo</option>
                        <option value="4" class="parent-346">Ear Infection</option>
                        <option value="5" class="parent-346">Evaluation for Cochlear Implant</option>
                        <option value="6" class="parent-346">Hearing Test</option>
                        <option value="7" class="parent-346">Multiple Sclerosis</option>
                        <option value="8" class="parent-346">Family History of Hearing Loss</option>
                        <option value="9" class="parent-346">Pediatric Audiology</option>
                        <option value="10" class="parent-346">Problem with Balance</option>
                        <option value="11" class="parent-346">Problem with Hearing Aid</option>
                        <option value="12" class="parent-346">Stroke</option>
                        <option value="13" class="parent-346">Tumor Affecting Hearing (Acoustic Neuroma, Meningioma, Astrocytoma)</option>
                     </select>
                  </div>
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
      <div class="widget-1">
         <h3 class="footer-title">Cities <span></span></h3>
         <div class="searchby">
            <ul>
               <li><a class="zip_foot" id="32701">Altamonte Springs</a></li>
               <li><a class="zip_foot" id="32703">Apopka </a></li>
               <li><a class="zip_foot" id="32707">Casselberry </a></li>
               <li><a class="zip_foot" id="34747">Celebration </a></li>
               <li><a class="zip_foot" id="33755">Clearwater </a></li>
               <li><a class="zip_foot" id="34711">Clermont </a></li>
               <li><a class="city_more1" id="">more... </a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="52801">Davenport </a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="32114">Daytona Beach </a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="32713">Debary </a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="32730">Fern Park</a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="33301">Fort Lauderdale</a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="34741">Kissimmee</a></li>
               
               
               <li class="hi_city1"><a class="zip_foot hi_city1" id="32746">Lake Mary</a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="20175">Leesburg</a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="32750">Longwood</a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="32751">Maitland</a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="32901">Melbourne</a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="92093">Ocoee</a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="34761">Orange City</a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="32801">Orlando</a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="34758">Poinciana</a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="32771">Sanford</a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="56301">St. Cloud</a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="34216">St. Petersburg, Sarasota</a></li>
               
               <li class="hi_city1"><a class="zip_foot hi_city1" id="33601">Tampa</a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="34777">Winter Garden</a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="33880">Winter Haven</a></li>
               <li class="hi_city1"><a class="zip_foot hi_city1" id="32789">Winter Park</a></li>
               <li class="hi_city1"><a class="city_less1" id="" style="display:none;cursor:pointer;">less... </a></li>
<!--<a id="45201" class="zip_foot">Cincinnati</a>
</li>
<li>
<a id="48201" class="zip_foot">Detroit</a>
</li>
<li>
<a id="68022" class="zip_foot">Omaha</a>
</li>
<li>
<a id="32801" class="zip_foot">Orlando</a>
</li>
<li>
<a id="15201" class="zip_foot">Pittsburgh</a>
</li>
<li>
<a id="92093" class="zip_foot">San Diego</a>
</li>
<li>
<a id="33601" class="zip_foot">Tampa</a>
</li>-->
            </ul>
         </div>
      </div>
      <!-- Cities -->
      <?php
				  $result=$scad->getAllData("speciality");
				  /*echo "<pre>";
				  print_r($result);*/
				  $len=count($result);
				  ?>
      <div class="widget-1">
         <h3 class="footer-title">Specialties <span></span></h3>
         <div class="searchby">
            <ul>
            <?php
					 	for($i=0;$i<$len;$i++){
							if($i<6){
                     ?>
                        <li><a class="spcl" id='<?php echo $result[$i]['id']; ?>'><?php echo $result[$i]['name']; ?></a></li>
                        <?php }
						elseif($i==6){?>
                        <li><a class=" more_specl1" id=''>more...</a></li>
						<?php
                        }
						
						else{
							?>
							<li class="hi_specl1"><a class="spcl hi_specl1" id='<?php echo $result[$i]['id']; ?>'><?php echo $result[$i]['name']; ?></a></li>
							<?php }
							if($i==($len-1)){
								?>
								<li class="less_specl1"><a class=" hi_specl1 less_specl1" id='' style="cursor:pointer">less...</a></li>
								<?php 
								}
						} ?>
               <!--<li><a class="spcl_foot" id="9">Chiropractors</a></li>
               <li><a class="spcl_foot" id="40">Dentists</a></li>
               <li><a class="spcl_foot" id="11">Dermatologists</a></li>
               <li><a class="spcl_foot" id="17">Eye Doctors</a></li>
               <li><a class="spcl_foot" id="18">Family Physicians </a></li>
               <li><a class="spcl_foot" id="21">Hearing Specialists</a></li>
               <li><a class="spcl_foot" id="48">Psychiatrists</a></li>-->
            </ul>
         </div>
      </div>
      <!-- Specialties -->
   </div>
</footer>
<!-- Footer -->
<div class="bottom-footer">
   <div class="container">
      <p>@ Copyright 2014 Book My Doc , Inc. Bookmydoc is a registered trademark of Book My Doc.<br>
         <a href="#">Privacy Policy</a> and <a href="#">Terms of Use</a>
      </p>
      <div class="footer-social-icons">
         <ul>
            <li><a href="#" title=""><i class="theme-icon skype"></i></a></li>
            <li><a href="#" title=""><i class="theme-icon facebook"></i></a></li>
            <li><a href="#" title=""><i class="theme-icon twitter"></i></a></li>
            <li><a href="#" title=""><i class="theme-icon linkedin"></i></a></li>
         </ul>
      </div>
   </div>
</div>
</div>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo WEB_ROOT?>service/public/js/fileupload/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="<?php echo WEB_ROOT?>service/public/js/fileupload/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="<?php echo WEB_ROOT?>service/public/js/fileupload/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="<?php echo WEB_ROOT?>service/public/js/fileupload/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<!-- blueimp Gallery script -->
<script src="<?php echo WEB_ROOT?>service/public/js/fileupload/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo WEB_ROOT?>service/public/js/fileupload/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo WEB_ROOT?>service/public/js/fileupload/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo WEB_ROOT?>service/public/js/fileupload/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo WEB_ROOT?>service/public/js/fileupload/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo WEB_ROOT?>service/public/js/fileupload/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo WEB_ROOT?>service/public/js/fileupload/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo WEB_ROOT?>service/public/js/fileupload/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo WEB_ROOT?>service/public/js/fileupload/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="<?php echo WEB_ROOT?>service/public/js/fileupload/main.js"></script>
<!--
<script src="<?php echo WEB_ROOT?>service/public/js/fileupload/multiple_resolution.js"></script>
--></body>
</html>

