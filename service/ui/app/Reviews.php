

<?php include("service/ui/common/header.php"); ?>
<script type="text/javascript">
   $(document).ready(function(){
   function procedures(){
							   $(".spcl_foot1").click(function(){
													 var zip=$(this).attr("id");
													 //alert(zip);
													 $("#srchLanguage").val(zip);
													 var formData = $('#hiddenform').serialize();
													 //console.log(formData);
        var data = $.base64.encode(formData);
        window.location.href = SITEURL + 'search/' + data;
													 });
							   }
   function loadData(page,letter){
	   $(".ser_pag").hide();   
   					$(".outr_load").show();                 
                       $.ajax
                       ({
                           type: "POST",
                           url: SITEURL+'search-Reviews',
   						data:{"page":page,"letter":letter},
                           success: function(msg)
                           {
                               //console.log(msg);
                                   
                                   $(".ser_pag").html(msg);
								   procedures();
								   $(".outr_load").hide();                 
								   $(".ser_pag").show();
                           }
                       });
                   }
   setTimeout(function(){loadData(1,'a')}, 3000);  // For first time page load default results
   $(".alphabets").click(function(){
	   $(".ser_pag").hide();
	   $(".outr_load").show(); 
	   $(".alpha").removeClass("active");
	   $(this).parent().addClass("active");
                       var the_letter = $(this).attr("target");
   					//alert(the_letter);
					setTimeout(function(){loadData(1,the_letter)}, 3000);
                      
                   });
   				
   				
   				
                   $('.ser_pag .rvwpaginatin li.activ').live('click',function(){
					   $(".ser_pag").hide();
	   $(".outr_load").show(); 
                       var page = $(this).attr('p');
					   var the_letter =  $(".alpha").val();
                       setTimeout(function(){loadData(page)}, 3000);
                       
                   });   
   $('#go_btn').live('click',function(){
	   					$(".dr_pfl_outr_load").show();
                       var page = parseInt($('.goto').val());
                       var no_of_pages = parseInt($('.total').attr('a'));
                       if(page != 0 && page <= no_of_pages){
                           loadData(page);
                       }else{
                           alert('Enter a PAGE between 1 and '+no_of_pages);
                           $('.goto').val("").focus();
                           return false;
                       }
                       
                   });
               			
   });
   
   
</script><form style="margin-top:15px;display:none" id="hiddenform">
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
<section class="team-modern-12" >
   <div class="container">
      <div class="container1">
         <div class="jumbotron">
            <h1> Find Doctors by Recent Reviews  </h1>
         </div>
         <div class="doctorsearchbox">
            <div class="bluebox">
               <form class="texlab">
                  <ul>
                     <li><label class="searchname" style="font-size:16px;">Find a Doctor or Dentist Near You </label></li>
                     
                  </ul>
                  <div class="docsearchbtn" style="margin-top:-4%;">
                  <a href="<?php echo WEB_ROOT;?>index.php/search" class="searchbtn" >Search</a>
                  </div>
               </form>
            </div>
         </div>
         <!--<div class="menuicons" style="margin-left: 2%;">
            <ul>
               <li><a target="Z" class="alphabets">Z</a></li>
               <li><a target="Y" class="alphabets">Y</a></li>
               <li class="alpha"><a target="X" class="alphabets" href="">X</a></li>
               <li class="alpha"><a target="W" class="alphabets">W</a></li>
               <li class="alpha"><a target="V" class="alphabets">V</a></li>
               <li class="alpha"><a target="U" class="alphabets">U</a></li>
               <li class="alpha"><a target="T" class="alphabets">T</a></li>
               <li class="alpha"><a target="S" class="alphabets">S</a></li>
               <li class="alpha"><a target="R" class="alphabets">R</a></li>
               <li class="alpha"><a target="Q" class="alphabets">Q</a></li>
               <li class="alpha"><a target="P" class="alphabets">P</a></li>
               <li class="alpha"><a target="O" class="alphabets">O</a></li>
               <li class="alpha"><a target="N" class="alphabets">N</a></li>
               <li class="alpha"><a target="M" class="alphabets">M</a></li>
               <li class="alpha"><a target="L" class="alphabets">L</a></li>
               <li class="alpha"><a target="K" class="alphabets">K</a></li>
               <li class="alpha"><a target="J" class="alphabets">J</a></li>
               <li class="alpha"><a target="I" class="alphabets">I</a></li>
               <li class="alpha"><a target="H" class="alphabets">H</a></li>
               <li class="alpha"><a target="G" class="alphabets">G</a></li>
               <li class="alpha"><a target="F" class="alphabets">F</a></li>
               <li class="alpha"><a target="E" class="alphabets">E</a></li>
               <li class="alpha"><a target="D" class="alphabets">D</a></li>
               <li class="alpha"><a target="C" class="alphabets">C</a></li>
               <li class="alpha"><a target="B" class="alphabets">B</a></li>
               <li class="alpha active"><a target="A" class="alphabets">A</a></li>
               <!--<li class="recent"><a target="" class="alphabets">RECENT</a></li>-->
            </ul>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="prflpg_clm" style="width:100%;">
      <div class="outr_load"></div>
         <div class="pfl_clm_lft ser_pag" style="width:100%;">
              
         </div>
        <!-- <div class="rvwpaginatin"><ul>
               <li p="1" class="inactiv">First</li>
               <li class="inactiv">Prev</li>
               <li p="1" style="color:%23fff;background-color:%23006699; width:10px;" class="activ">1</li>
               <li p="2" class="activ">2</li>
               <li p="3" class="activ">3</li>
               <li p="4" class="activ">4</li>
               <li p="5" class="activ">5</li>
               <li p="6" class="activ">6</li>
               <li p="7" class="activ">7</li>
               <li p="2" class="activ">Next</li>
               <li p="417" class="activ">Last</li>
            </ul>
         </div>-->
      </div>
   </div>
</section>
<?php include("service/ui/common/footer.php"); ?>
