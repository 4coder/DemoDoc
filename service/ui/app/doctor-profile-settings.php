<?php 
   include("service/ui/common/header.php"); 
   
   ?>
<link rel="stylesheet" href="<?php echo WEB_ROOT?>service/public/css/setting_pg.css">
<script type='text/javascript' src='<?php echo WEB_ROOT?>service/public/js/doctor-profile-settings.js'></script>

<style>

.input-block {
    box-sizing: border-box;
    display: block;
    min-height: 40px;
    width: 100%;
}
.detail_box{
	float:left;
	width:80%;
}
.action_box{
		float:right;
		width:20%;
		margin-top:5%;
	}
</style>
<section  class="team-modern-12">
   <div class="container">
      <div class="dctr_mbr_mdl">
         <div class="dctr_mbr_lft">
            <div class="dctr_mbr_tbl">
               <ul class="nav1 nav-tabs tabs" id="docTab" style="list-style:none; padding:0; margin:0;">
                  <li class="active" ><a  href="#doc-profile">Edit Profile</a></li>
                  <li><a href="#doc-details">My Details</a></li>
                  <li><a href="#doc-pass1">Change Password</a></li>
                  <li><a href="#doc-imageupload">Upload Image/Video</a></li>
               </ul>
               <div class="tab-content">
                  <div class="tab-pane active" id="doc-profile">
                     <?php
                        $result = $scad->getUserDetails($_SESSION['userID']);
                        //print_r($result);
                        ?>
                     <!-- <div id="doc-setting-error" >no</div>-->
                     <form style="margin-top:20px;" id="doc-setting-form" name="doc-setting-form">
                        <div id="doc-success" style="display:none" class="alert alert-success">
                           <p align="center">Changes Saved!!</p>
                        </div>
                        <small class="subname2">  First Name </small> 
                        <input type="text" value="<?php echo $result['firstname'];?>" data-trigger="change" data-required="true" placeholder="First" name="firstname" id="" class=	"input-block-level" style="min-height:40px;" >
                        <small class="subname2">  Last Name </small> 
                        <input type="text" value="<?php echo $result['lastname'];?>" data-trigger="change" data-required="true" placeholder="First" name="lastname" id="" class="input-block-level" style="min-height:40px;" >
                        <small class="subname2">  Email </small> 
                        <input type="email" readonly value="<?php echo $result['email'];?>" data-type="email" data-trigger="change" data-required="true" class="input-block-level"  name="email"  id="email" style="min-height:40px;" >
                        <small class="subname2">  Zip code </small> 
                        <input type="text" value="<?php echo $result['zipcode'];?>" data-trigger="change" data-required="true" id="password" name="code" class="input-block-level" style="min-height:40px;" >
                        <div id="doc-setting" class="findDoctors">Save</div>
                     </form>
                  </div>
                  <div class="tab-pane" id="doc-details">
                  
                     <?php
                        $result = $scad->getUserDetails($_SESSION['userID']);
                        //print_r($result);
						
						if(empty($result)){
                        ?>
                     <!-- <div id="doc-setting-error" >no</div>-->
                     <form style="margin-top:20px;" id="doc-details-form" name="doc-setting-form" data-parsley-validate>
                        <div id="doc-success1" style="display:none" class="alert alert-success">
                           <p align="center">Changes Saved!!</p>
                        </div>
                        <div style="min-height:30px;">
                        <small class="subname2">  Speciality </small> <img class="addNewSpcl" title="Click to add more Languages" alt="Monday" style="cursor:pointer;float:right;" src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg"><br />
                        </div>
                        <div id="spcl">
                     <select name="docSpeciality[]" id="docSpeciality" class="input-block"  required>
                        <optgroup label="All">
                           <option value="" style="text-transform:lowercase;">Select a speciality</option>
                           <?php
                              $condition = 'category_id = 1';
                              $scad->listbox('speciality','id','name',$condition,'`id` ASC',$selected);?>
                        </optgroup>
                        <optgroup label="Therapist">
                           <?php
                              $condition = 'category_id = 2';
                              $scad->listbox('speciality','id','name',$condition,'`id` ASC',$selected);?>
                        </optgroup>
                        <optgroup label="Dental">
                           <?php
                              $condition = 'category_id = 3';
                              $scad->listbox('speciality','id','name',$condition,'`id` ASC',$selected);?>
                        </optgroup>
                        <optgroup label="Veterinary">
                           <?php
                              $condition = 'category_id = 4';
                              $scad->listbox('speciality','id','name',$condition,'`id` ASC',$selected);?>
                        </optgroup>
                     </select>
                     </div>
                     <div class="spcl-here"></div>
                        <small class="subname2">  Education </small> 
                        <textarea data-trigger="change" data-required="true" placeholder="Education" name="Education" id="" class=	"input-block-level" style="min-height:50px;" ></textarea>
                        <small class="subname2">  Hospital Affiliations </small> 
                        <input type="text" value="" data-trigger="change" data-required="true" placeholder="Hospital Affiliations" name="Hospital" id="" class="input-block-level" style="min-height:40px;" >
                           <input type="hidden" value="<?php echo $_SESSION['userID'];?>" data-trigger="change" data-required="true" id="password" name="doc-id" class="input-block-level" style="min-height:40px;" >
                           <div style="min-height:30px;">
                        <small class="subname2">  Languages Spoken </small> <img class="addNewLang" title="Click to add more Languages" alt="Monday" style="cursor:pointer;float:right;" src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg"><br />
                        </div>
                       <div id="lang">
                        <select class="input-block"  required name="Languages[]" >
                         <option value="">Select a Language</option>
                         <?php $scad->listbox('languages','id','name',$condition=NULL,'`name` ASC',$selected=NULL);?>
                        </select>
                        </div>
                        <div class="lang-here">
                        
                        </div>
                        <small class="subname2">  Board Certifications </small> 
                        <textarea data-trigger="change" data-required="true" placeholder="Board Certifications" name="Board" id="" class="input-block-level" style="min-height:50px;" ></textarea>
                        <small class="subname2">  Awards and Publications </small> 
                        <textarea data-trigger="change" data-required="true" placeholder="Awards and Publications" name="Awards" id="" class=	"input-block-level" style="min-height:50px;" ></textarea>
                         <small class="subname2">  Professional Memberships </small> 
                        <textarea data-trigger="change" data-required="true" placeholder="Professional Memberships" name="Memberships" id="" class=	"input-block-level" style="min-height:50px;" ></textarea>
                        <div style="min-height:30px;">
                        <small class="subname2">  In-Network Insurances </small> <img class="addNewInsurence" title="Click to add more Languages" alt="Monday" style="cursor:pointer;float:right;" src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg"><br />
                        </div>
                        <div class="insurence">
                     <select class="input-block" required name="insuranceSelect[]" id="insuranceSelect">
                        <option value="">Select Insurance</option>
                        <?php $scad->listbox('insurance','id','name','`parent_id`=0','`name` ASC',$selected=NULL); ?>
                     </select>
                  </div>
                  <div id="insurence-here"></div>
                        <div id="doc-detail" class="findDoctors">Save</div>
                     </form>
                     </div>
                     <?php } else{ ?>
                     <!-- not empty section for details tab -->
                       <div class="insurence" style="display:none">
                     <select class="input-block" required name="insuranceSelect[]" id="insuranceSelect">
                        <option value="">Select Insurance</option>
                        <?php $scad->listbox('insurance','id','name','`parent_id`=0','`name` ASC',$selected=NULL); ?>
                     </select>
                  </div>
                        <div id="lang" style="display:none">
                        <select class="input-block"  required name="Languages[]" >
                         <option value="">Select a Language</option>
                         <?php $scad->listbox('languages','id','name',$condition=NULL,'`name` ASC',$selected=NULL);?>
                        </select>
                        </div>
                        <div id="spcl" style="display:none">
                     <select name="docSpeciality[]" id="docSpeciality" class="input-block"  required>
                        <optgroup label="All">
                           <option value="" style="text-transform:lowercase;">Select a speciality</option>
                           <?php
                              $condition = 'category_id = 1';
                              $scad->listbox('speciality','id','name',$condition,'`id` ASC',$selected);?>
                        </optgroup>
                        <optgroup label="Therapist">
                           <?php
                              $condition = 'category_id = 2';
                              $scad->listbox('speciality','id','name',$condition,'`id` ASC',$selected);?>
                        </optgroup>
                        <optgroup label="Dental">
                           <?php
                              $condition = 'category_id = 3';
                              $scad->listbox('speciality','id','name',$condition,'`id` ASC',$selected);?>
                        </optgroup>
                        <optgroup label="Veterinary">
                           <?php
                              $condition = 'category_id = 4';
                              $scad->listbox('speciality','id','name',$condition,'`id` ASC',$selected);?>
                        </optgroup>
                     </select>
                     </div>
                     <form style="margin-top:20px;" id="doc-details-form1" name="doc-setting-form" data-parsley-validate>
                        <div id="doc-success11" style="display:none" class="alert alert-success">
                           <p align="center">Changes Saved!!</p>
                        </div>
                      
                        <div style="min-height:30px;">
                        <small class="subname2">  Speciality </small> <img class="addNewSpcl" title="Click to add more Languages" alt="Monday" style="cursor:pointer;float:right;" src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg"><br />
                        </div>
                        <?php 
						$spcl=$scad->getDocSpeciality($_SESSION['userID']);
						foreach($spcl as $keys=>$value){
							 $spcls[]=$value;
							}
							$spclen=count($spcls);
							?>
                        <div id="spcl1">
                        <?php for($i=0;$i<$spclen;$i++){
							 $selected=$spcls[$i][id];
							?>
                     <select name="docSpeciality[]" id="docSpeciality" class="input-block"  required>
                        <optgroup label="All">
                           <option value="" style="text-transform:lowercase;">Select a speciality</option>
                           <?php
                              $condition = 'category_id = 1';
                              $scad->listbox('speciality','id','name',$condition,'`id` ASC',$selected);?>
                        </optgroup>
                        <optgroup label="Therapist">
                           <?php
                              $condition = 'category_id = 2';
                              $scad->listbox('speciality','id','name',$condition,'`id` ASC',$selected);?>
                        </optgroup>
                        <optgroup label="Dental">
                           <?php
                              $condition = 'category_id = 3';
                              $scad->listbox('speciality','id','name',$condition,'`id` ASC',$selected);?>
                        </optgroup>
                        <optgroup label="Veterinary">
                           <?php
                              $condition = 'category_id = 4';
                              $scad->listbox('speciality','id','name',$condition,'`id` ASC',$selected);?>
                        </optgroup>
                     </select>
                     <?php } ?>
                     </div>
                     <div class="spcl-here"></div>
                        <small class="subname2">  Education </small> 
                        <textarea data-trigger="change" data-required="true" placeholder="Education" name="Education" id="" class=	"input-block-level" style="min-height:50px;" >
                        <?php echo $result[Education];?></textarea>
                        <small class="subname2">  Hospital Affiliations </small> 
                        <textarea data-trigger="change" data-required="true" placeholder="Hospital Affiliations" name="Hospital" id="" class=	"input-block-level" style="min-height:50px;" >
                        <?php echo $result[HospitalAffiliations];?></textarea>
                           <input type="hidden" value="<?php echo $_SESSION['userID'];?>" data-trigger="change" data-required="true" id="password" name="doc-id" class="input-block-level" style="min-height:40px;" >
                           <div style="min-height:30px;">
                        <small class="subname2">  Languages Spoken </small> <img class="addNewLang" title="Click to add more Languages" alt="Monday" style="cursor:pointer;float:right;" src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg"><br />
                        </div>
                       <div id="lang">
                       <?php 
						$spcl=$scad->getDocLang($_SESSION['userID']);
						//print_r($spcl);
						foreach($spcl as $keys=>$value){
							 $spcll[]=$value;
							}
							 $spclen=count($spcll);
							for($i=0;$i<$spclen;$i++){
							$selected=$spcll[$i][id];
							?>
                        <select class="input-block"  required name="Languages[]" >
                         <option value="">Select a Language</option>
                         <?php $scad->listbox('languages','id','name',$condition=NULL,'`name` ASC',$selected);?>
                        </select>
                        <?php } ?>
                        </div>
                        <div class="lang-here">
                        
                        </div>
                        <small class="subname2">  Board Certifications </small> 
                        <textarea data-trigger="change" data-required="true" placeholder="Board Certifications" name="Board" id="" class="input-block-level" style="min-height:50px;" ><?php echo $result[BoardCertifications];?></textarea>
                        <small class="subname2">  Awards and Publications </small> 
                        <textarea data-trigger="change" data-required="true" placeholder="Awards and Publications" name="Awards" id="" class=	"input-block-level" style="min-height:50px;" ><?php echo $result[Awards];?></textarea>
                         <small class="subname2">  Professional Memberships </small> 
                        <textarea data-trigger="change" data-required="true" placeholder="Professional Memberships" name="Memberships" id="" class=	"input-block-level" style="min-height:50px;" ><?php echo $result[ProfessionalMemberships];?></textarea>
                        <div style="min-height:30px;">
                        <small class="subname2">  In-Network Insurances </small> <img class="addNewInsurence" title="Click to add more Languages" alt="Monday" style="cursor:pointer;float:right;" src="<?php echo WEB_ROOT?>service/public/images/tab_clum2_icon4.jpg"><br />
                        </div>
                        <div class="insurence">
                        <?php
                        $spcl=$scad->getDocInsu($_SESSION['userID']);
						foreach($spcl as $keys=>$value){
							 $spcli[]=$value;
							}
							 $spclen=count($spcli);
							for($i=0;$i<$spclen;$i++){
							$selected=$spcli[$i][id];
							?>
                     <select class="input-block" required name="insuranceSelect[]" id="insuranceSelect">
                        <option value="">Select Insurance</option>
                        <?php $scad->listbox('insurance','id','name','`parent_id`=0','`name` ASC',$selected); ?>
                     </select>
                     <?php } ?>
                  </div>
                  <div id="insurence-here"></div>
                        <div id="doc-detail1" class="findDoctors">Save</div>
                     </form>
                     </div>
                     <?php } ?>
                  
                  <div class="tab-pane" id="doc-pass1">
                     <form style="margin-top:20px;" id="doc-setting-pass" name="doc-setting-form">
                        <div id="doc-pass-error1" style="display:none" class="alert alert-danger">
                           <p align="center">Failed to Upload</p>
                        </div>
                        <div id="doc-pass-error2" style="display:none" class="alert alert-danger">
                           <p align="center">Password Mismatch</p>
                        </div>
                        <div id="doc-pass-error3" style="display:none" class="alert alert-danger">
                           <p align="center">You are entered a <em>Wrong Password</em></p>
                        </div>
                        <div id="doc-pass-success" style="display:none" class="alert alert-success">
                           <p align="center">Changes Saved!!</p>
                        </div>
                        <small class="subname2">  Enter Current Password </small> 
                        <input type="password" placeholder="Current Password"  data-trigger="change" data-required="true" placeholder="First" name="cur_pass" id="cp" class="input-block-level" style="min-height:40px;" >
                        <small class="subname2">  Enter New Password </small> 
                        <input type="password" data-trigger="change" placeholder="New Password" data-required="true" placeholder="First" name="new_pass" id="p1" class="input-block-level" style="min-height:40px;" >
                        <small class="subname2">  Retype Password </small> 
                        <input type="password" data-trigger="change" placeholder="Retype Password" data-required="true" placeholder="First" name="re_pass" id="p2" class="input-block-level" style="min-height:40px;" >
                        <div id="doc-pass" class="findDoctors">Save</div>
                     </form>
                  </div>
                  <div class="tab-pane" id="doc-imageupload">
                     <div id="doc-success-pic" style="display:none;margin-top:20px;" class="alert alert-success">
                        <p align="center">Profile Picture Successfully Changed!!</p>
                     </div>
                     <div id="delete-img-info" class="alert alert-success" style="display:none;margin-top:20px;">
                        <p align="center">Image Successfully Removed</p>
                     </div>
                     
                     <table class="table table-striped" style="max-width:764px;margin-top:20px;">
                        <thead>
                           <tr>
                              <th>
                                 <p class="thtxt"> File </p>
                              </th>
                              <th>
                                 <p class="thtxt">  Profile picture </p>
                              </th>
                              <th>
                                 <p class="thtxt">  Remove </p>
                              </th>
                           </tr>
                        </thead>
                        <tbody class="">
                           <?php
                              //  print_r($userID);
                                //echo $userID['id'];

                        $condition="user_id=".$_SESSION['userID'];
                                $userID =  $scad->getDoctorImages('userimages',$condition);
                        $len=sizeof($userID);
                        if($len>0){
                     
                                foreach($userID as $keys=>$value){
                              
                              ?>
                           <tr class="imgrow">
                              <td>
                                 <p class="thtxt">
                                    <?php if ($value['type']==0){?>
                                    <img style="max-height:90px;max-width:80px" src="<?php echo WEB_ROOT?>service/public/z_uploads/doctor/thumbnail/<?php echo $value['name'];?>" />
                                    <?php } else {?>
                                    <img style="max-height:90px;max-width:80px" src="<?php echo WEB_ROOT?>service/public/images/video.jpg" />
                                    <?php } ?>
                                 </p>
                              </td>
                              <td>
                                 <p class="thtxt">
                                    <?php if ($value['set_profile']==1 && $value['type']==0){?>
                                    <button class="btn1 activate out btn-primary"  value="<?php echo $value['id'];?>"   >
                                    <span>Deactivate</span>
                                    </button>
                                    <?php } else{
                                       if($value['type']==0){?>
                                    <button class="btn1 btn-primary activate in"  value="<?php echo $value['id'];?>"   >
                                    <span>Activate</span>
                                    </button>
                                    <?php }} ?>
                                    </button>
                                 </p>
                              </td>
                              <td>
                                 <p class="thtxt">
                                    <button class="btn1 btn-danger delete1"  value="<?php echo WEB_ROOT?>index.php/service/public/z_uploads/?file=<?php echo $value['name'];?>&_method=DELETE">
                                    <i class="glyphicon glyphicon-trash"></i>
                                    <span>Delete</span>
                                    </button>
                                 </p>
                              </td>
                           </tr>
                           <?php } }?>
                        </tbody>
                     </table>
                           
                     <div class="st_btn_outr">
                        <form id="fileupload" action="" method="POST" enctype="multipart/form-data">
                           <!-- Redirect browsers with JavaScript disabled to the origin page 
                              <noscript><input type="hidden" name="redirect" value="http://blueimp.github.io/jQuery-File-Upload/"></noscript>-->
                           <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                           <!-- The table listing the files available for upload/download -->
                           <table role="presentation" class="table table-striped" style="max-width:764px;margin-top:20px;">
                              <tbody class="files"></tbody>
                           </table>
                           <div class="row fileupload-buttonbar">
                              <div style="float:left; width:500px;">
                                 <div class="col-lg-7">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <span class="btn1 btn-success fileinput-button">
                                    <span>Add files...</span>
                                    <input type="file" class="btn1" multiple="" name="files[]">
                                    </span>
                                    <button class="btn1 btn-primary start" type="submit">
                                    <i class="glyphicon glyphicon-upload"></i>
                                    <span>Start upload</span>
                                    </button>
                                    <button class="btn1 btn-warning cancel" type="reset">
                                    <i class="glyphicon glyphicon-ban-circle"></i>
                                    <span>Cancel upload</span>
                                    </button>
                                    <span class="fileupload-process"></span>
                                 </div>
                                 <div class="col-lg-5 fileupload-progress fade">
                                    <!-- The global progress bar -->
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                       <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                    </div>
                                    <!-- The extended global progress state -->
                                    <div class="progress-extended">&nbsp;</div>
                                 </div>
                              </div>
                        </form>
                        </div> 
                     </div>
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
               <a href="<?php echo WEB_ROOT;?>index.php/calendar-settings" class="dctr_br_side-nav-button"> <img src="<?php echo WEB_ROOT;?>service/public/images/user.png" alt=""><br> 
              Calendar Settings</a>
               <a href="#" class="dctr_br_side-nav-button active"> <img src="<?php echo WEB_ROOT;?>service/public/images/profile_setting.png" alt=""><br>Settings</a>
               <a href="<?php echo WEB_ROOT;?>index.php/signout" class="dctr_br_side-nav-button"> <img src="<?php echo WEB_ROOT;?>service/public/images/logout.png" alt=""><br> Logout </a>
            </nav>
         </div>
      </div>
   </div>
</section>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
   {% for (var i=0, file; file=o.files[i]; i++) { %}
       <tr class="template-upload fade">
           <td>
               <span class="preview"></span>
           </td>
           <td>
               <p class="size">Processing...</p>
               <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
           </td>
           <td>
               {% if (!i && !o.options.autoUpload) { %}
                   <button class="btn1 btn-primary start" disabled>
                       <i class="glyphicon glyphicon-upload"></i>
                       <span>Start</span>
                   </button>
               {% } %}
               {% if (!i) { %}
                   <button class="btn1 btn-warning cancel">
                       <i class="glyphicon glyphicon-ban-circle"></i>
                       <span>Cancel</span>
                   </button>
               {% } %}
           </td>
       </tr>
   {% } %}
</script>
<!-- The template to display files available for download -->
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
   //alert(file.thumbnailUrl);
   {% for (var i=0, file; file=o.files[i]; i++) { %}
       <tr class="template-download fade">
           <td>
               <span class="preview">
                   {% if (file.thumbnailUrl) { %}
                       <a  href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}" style="max-height:90px;max-width:80px"></a>
                   {% } %}
               </span>
           </td>
   
           <td>       
             <button class="btn1 btn-primary activate"  value="{%=file.id%}"   >
                                           <span>Activate</span>
                                           </button>
   		  {% if (file.error) { %}         <div><span class="label label-danger">Error</span> {%=file.error%}</div>
               {% } %}
           </td>
           <td>
               {% if (file.deleteUrl) { %}
                   <button class="btn1 btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                       <i class="glyphicon glyphicon-trash"></i>
                       <span>Delete</span>
                   </button>
               {% } else { %}
                   <button class="btn1 btn-warning cancel">
                       <i class="glyphicon glyphicon-ban-circle"></i>
                       <span>Cancel</span>
                   </button>
               {% } %}
           </td>
       </tr>
   {% } %}
</script>     
<?php include("service/ui/common/footer.php"); ?>