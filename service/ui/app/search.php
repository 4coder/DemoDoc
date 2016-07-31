<?php
   include ("service/ui/common/header.php");
   $searchTerms = base64_decode($searchData);
   parse_str($searchTerms);
   if ($searchData == 1) {
   		$docSpeciality = 5;
   } else if ($searchData == 2) {
   		$docSpeciality = 67;
   } else if ($searchData == 3) {
   		$docSpeciality = 75;
   } else if ($searchData == 4) {
   		$docSpeciality = 62;
   }
   if($docSpeciality){
   		$selected = $docSpeciality;
   }
   else{
   		$selected = NULL;
   }
 ?>
<input type="hidden" name="searchData" id="searchData" value="<?php echo $searchData;?>"/>
<script type="application/javascript" src="<?php echo WEB_ROOT?>service/public/js/search.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

<style>
/*.dr_pfl_map.affix2{
	top:20%;
	margin: 0 0 0 0;
	z-index:99;
	position:fixed;
	display:inline;
	}*/
	.dr_pfl_map.fixing{
	margin: 0 0 0 0;
	position:absolute;
	display:inline !important;
	margin-top:50%;
	}
	.dr_pfl_map.fixing1{
	margin: 0 0 0 0;
	position:absolute;
	display:inline !important;
	margin-top:17%;
	}
	.dr_pfl_nav.affix2{
	top:0px;
	margin: 0 0 0 0;
	z-index:99;
	position:fixed;
	width:87%;0
	}
	.dr_pfl_map.affix1{
	top:247px;
	margin: 0 0 0 0;
	position:fixed;
	display:inline !important;
	}
	body::-webkit-scrollbar {
    width: 1em;
}
	.before{
		left:40%;
		width:100%!important;height:100%!important;
		overflow: auto !important;
		}
	/*.after{
		left:40%;top:10%!important;width:822px;height:500px;
		overflow:hidden;
		padding:30px;
		}*/
		#bookModel{
			overflow:hidden;
			}
.test{
	
	background-color:#093}
.after{
    overflow: auto !important;
	left:40%;top:10%!important;
	width:822px;height:500px;
	padding:30px;
}
</style>
<section  class="team-modern-12">
   <div class="container">
      <div class="dr_pfl_nav">
         <form id="advanceSearch-form" name="advanceSearch-form" >
            <div class="dr_pfl_nav_lft">
               <div class="drcolorbox"></div>
               <div class="dr_frm_tp">
                  <div class="dr_frm">
                     <div class="subname33">  Specialty (Dermatologist, Dentist, etc.)   </div>
                     <div class="styled-select">
                        <select id="srchSpeciality" class="advanceSearch" name="srchSpeciality">
                           <optgroup label="All">
                              <option value="" style="text-transform:unset;">Select a Speciality</option>
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
                  <div class="dr_frm">
                     <div class="subname33">   Location (Zip, City, State)   </div>
                     <input type="text" id="srchZipcode" name="srchZipcode" placeholder="Zip, City, State" value="<?php echo $docZip;?>" class="input-block-level" style="min-height:36px;" >
                  </div>
                  <div class="dr_frm">
                     <div class="subname33">  Insurance Plan </div>
                     <div class="styled-select">
                        <select name="insuranceSelect" class="advanceSearch" id="insuranceSelect">
                           <option value="">Select Insurance</option>
                           <?php if($insuranceSelect){$selected = $insuranceSelect;}else{$selected = NULL;}  $scad->listbox('insurance','id','name','`parent_id`=0','`name` ASC',$selected); ?>
                        </select>
                     </div>
                  </div>
                  <div class="dr_frm" id="loading" style="display: none;z-index:99">
                     <img style="margin: 34px 0 0 5px;"  src="<?php echo WEB_ROOT?>service/public/images/loading.gif" />
                  </div>
                  <div class="dr_frm" id="subInsurance">
                     <div class="subname33">  Insurance </div>
                     <div class="styled-select" >
                        <select name="subInsuranceSelect" class="advanceSearch" id="subInsuranceSelect">
                           <option value="">Select Insurance</option>
                           <?php if($subInsuranceSelect){$selected = $subInsuranceSelect;}else{$selected = NULL;}  $scad->listbox('insurance','id','name',$condition=NULL,'`name` ASC',$selected); ?>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="dr_frm_tp">
                  <div class="dr_frm">
                  <div class="subname33">  Reason for Visit  </div>
                     <div class="pfl_opt_dr">
                     <div id="reason_loading" style="height: 30px; width: 180px;margin: 5px 5px 11px; display: none;">
<img src="<?php echo WEB_ROOT;?>service/public/images/loading.gif" style="">
</div>
                     <?php
					 if($srchReason1){?>
						 <input type="text" placeholder="Reason for visit" id="srchReasontxt" name="srchReason1" value="<?php echo $srchReason1;  ?> "><div class="smalbut" style="display:block ">Options</div>
						 <?php }else{
					 ?>
                        <select class="select2_dr" name="srchReason" id="srchReason">
                           <option class="parent-346" value="0">Reason for Visit</option>
                           <?php $condition = '`speciality_id`="'.$docSpeciality.'"';if($srchReason){$selected = $srchReason;}else{$selected = NULL;}  $scad->listbox('reasonforvisit','id','name',$condition,'`name` ASC',$selected); ?>
                           <option class="parent-346" value="other">Other </option>
                          <!-- <option class="parent-346" value="7">Multiple Sclerosis</option>
                           <option class="parent-346" value="8">Family History of Hearing Loss</option>
                           <option class="parent-346" value="9">Pediatric Audiology</option>
                           <option class="parent-346" value="10">Problem with Balance</option>
                           <option class="parent-346" value="11">Problem with Hearing Aid</option>
                           <option class="parent-346" value="12">Stroke</option>
                           <option class="parent-346" value="13">Tumor Affecting Hearing (Acoustic Neuroma, Meningioma, Astrocytoma)</option>-->
                        </select>
                        <?php } ?>
                     </div>
                     <input type="text" placeholder="Reason for visit" id="srchReasontxt" name="srchReason1" style="display:none"><div class="smalbut">Options</div>
                  </div>
                  <div class="dr_frm">
                  <div class="subname33">  Who Speaks  </div>
                     <div class="pfl_opt_dr">
                        <select class="select2_dr" name="language" id="srchLanguage">
                        	<option value="0">Select a Language</option>
                        	<?php $scad->listbox('languages','id','name',$condition=NULL,'`name` ASC',$selected=NULL);?>
                        </select>
                     </div>
                  </div>
                  <div class="dr_frm">
                  <div class="subname33">  Gender  </div>
                     <div class="pfl_opt_dr">
                        <select id="gender" name="gender" class="select2_dr">
                           <option value="0">Doctor Gender</option>
                           <option value="1">Male</option>
                           <option value="2">Female</option>
                        </select>
                     </div>
                  </div>
                  <div class="dr_frm">
                     <div class="dr_srch">
                        <div class="btn" id="advanceSearchBtn" name="advanceSearchBtn" style="margin-top:27px;"><a> Search </a></div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
         <div id="searchCriteria" class="dr_pfl_msg"></div>
         <div class="dr_pfl_clndr_hd">
            <div class="dr_pfl_clndr_hd_main">
               <div class="dr2_prv"><a style="cursor:pointer;" id="prev"> Pre </a></div>
               <div class="dr_pfl_clndr_hd_dte" id="firstDate0"></div>
               <div class="dr_pfl_clndr_hd_dte" id="firstDate1"></div>
               <div class="dr_pfl_clndr_hd_dte" id="firstDate2"></div>
               <div class="dr2_nxt"><a style="cursor:pointer;" id="next"> Next </a></div>
            </div>
         </div>
      </div>
      <div class="dr_pfl_clm1">
         <div class="dr_pfl_outr" id="searchLoading" style="display:none;z-index:99;">
            <div class="dr_pfl_outr_load"></div>
         </div>
         <div class="dr_pfl_clm1_left">
            <div class="dr_pfl_thumb">
               <ul id="searchContent">
               </ul>
            </div>
            <div style="float:left; width:418px; margin:0 0 0 0px; position:relative;">
               <div class="calender_custom">
               </div>
            </div>
            <div style="float:right;margin-right:12px;">
               <p class="demo demo1"></p>
            </div>
         </div>
         <div></div>
         <div class="dr_pfl_map sidebar" >
            <div id="map" style="height:370px;width:333px;">
            </div>
            <div style="height:72px;;text-align:center;border:1px solid #ccc"><h4>Find Doctors and Make Appointments Online</h4></div>
         </div>
         </div>
   </div>
   </div>
</section>

<div id="apntPop" class="bkng_popup_close">
<div id="bookModel" class="before modal fade "   role="dialog" data-toggle="modal" style="display:none;">
<div class="bkng_online_popupmain " style="background-color:#FFF; border-radius:6px;position:absolute;">
<div class="popup_load" style="display:none;z-index:999;"></div>
<div class="con"></div>
</div>
</div>
</div>
<?php include("service/ui/common/footer.php"); ?>
