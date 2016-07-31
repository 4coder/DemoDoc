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
   	 <div class="profile_nav1">
         <ul>
            <li><a href="<?php echo WEB_ROOT;?>index.php/patient/profile"> <img src="<?php echo WEB_ROOT;?>service/public/images/profile_team.png"  alt=""> <br> Medical Team </a>  </li>
            <li><a href="<?php echo WEB_ROOT;?>index.php/past_appoinments"> <img src="<?php echo WEB_ROOT;?>service/public/images/profile_appointment.png"  alt=""> <br>  Past Appointment </a>  </li>
            <li><a href="#"> <img src="<?php echo WEB_ROOT;?>service/public/images/profile_notification.png"  alt=""> <br> Notification </a>  </li>
            <li><a href="<?php echo WEB_ROOT;?>index.php/patient_settings"> <img src="<?php echo WEB_ROOT;?>service/public/images/profile_setting.png"  alt=""> <br> Settings </a></li>
			<li><a href="<?php echo WEB_ROOT ?>signout"> <img src="<?php echo WEB_ROOT;?>service/public/images/logout.png"  alt=""> <br> Logout </a></li>
         </ul>
      </div>
      <div class="dctr_mbr_mdl">
         <div class="dctr_mbr_lft">
            <div class="dctr_mbr_tbl">
               <ul class="nav1 nav-tabs tabs" id="docTab" style="list-style:none; padding:0; margin:0;">
                  <li class="active" ><a  href="#doc-profile">Edit Profile</a></li>
                  
                  <li><a href="#doc-pass1">Change Password</a></li>
                  
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
                         <small class="subname2">  Date of Birth </small>
                        
	                    <input type="text"value="<?php echo $result['dob'];?>" data-trigger="mouseleave" data-required="true" data-beatpicker="true" name="dob" id="dob" placeholder="YY-MM-DD" class="input-block-level" style="min-height:40px;"/> 
    
                        <div id="pat-setting" class="findDoctors">Save</div>
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
             <button class="btn1 btn-primary activate"  value="{%=file.name%}"   >
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