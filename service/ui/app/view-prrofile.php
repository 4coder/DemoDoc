<?php 
   include("service/ui/common/header.php");
   
   include("./conf/config.inc.php");
//$patientData = $_POST;

 

    
 
	
 //print_r($resu);
 
    $result = $scad->getUserDetails($doctorID);
    $resImage = $scad->getImages($doctorID);
	//print_r($result);
	$rating = $scad->getrting($doctorID);
	
	
	//echo "<pre>";
    
    foreach($rating as $key=>$value){
    	//echo "<pre>";
    	//print_r($value);
		//echo $value[userid];
		$userresult = $scad->getUserDetails($value[userid]);
		$finalresult[]=$userresult;
		
		
    } 
	//echo "<pre>";
  //  print_r($finalresult);
    
$val = $scad->getLnt($result['zipcode']);
   ?>
   <input type="hidden" value="<?php echo $doctorID;?>" class="allDoctors" />
   <script type="text/javascript" src="<?php echo WEB_ROOT?>service/public/js/light/jquery.js"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT?>service/public/js/light/html5lightbox.js"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT?>service/public/js/jquery.base64.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT?>service/public/css/light/thumbelina.css" />
<script type="text/javascript" src="<?php echo WEB_ROOT?>service/public/js/light/thumbelina.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
   $(function(){
       $(document).ready(function(){
								  $("#new").hide();
								  $("#old2").hide();
								  
       var nextDate = '';
	   
								var allDoctors = $(".allDoctors").val();
								miniCalendar(0,allDoctors,'first');
	/*function myfunction(){
		$(".bottomBorder").click(function(){
											var cls=$(this).val();
											$(".moreClk"+cls).hide();
											$('.show'+cls).slideDown(500,function(){
											$('.Doc'+cls).removeAttr('style');
											var height1=$(".cellColor"+cls).height();
											$('.Doc'+cls).css('min-height',height1-14);
																				   });
										  });
		$(".last").click(function(){
										  	var cls=$(this).val();
											$(".moreClk"+cls).show();
											$('.show'+cls).slideUp(1000);
											$('.Doc'+cls).css('min-height',208);
										  });
	}*/
	$("#next").click(function(){
							  var allDoctors = $(".allDoctors").val();
							  $(".calender_custom").fadeIn(2000);
		var firstDate=$(".firstDate_0").val();
		res=firstDate.split(" ");
		miniCalendar(res[1],allDoctors,'next');
	});
	$("#prev").click(function(){
							  var allDoctors = $(".allDoctors").val();
		var firstDate=$(".firstDate_0").val();
		res=firstDate.split(" ");
		miniCalendar(res[1],allDoctors,'prev');
	});	
	function miniCalendar(dateCnt,allDoctors,status){
		$("#searchLoad").show();
		$.ajax({
			type: 'GET',	
			url: SITEURL+'single_minicalendar/'+dateCnt+'/'+allDoctors+'/'+status,
			success: function(res){
				//$(".calender_custom").slideUp();
				$(".calender").html(res);
				$("#firstDate0").text($(".firstDate_0").val());
				$("#firstDate1").text($(".firstDate_1").val());
				$("#firstDate2").text($(".firstDate_2").val());
					$(".test2").hide();
	                 myfunction();
					 appointMentRedirect1();
					 $("#searchLoad").hide();
				//$(".calender_custom").slideDown(2000);
			}
		});
	}
    
								  $("#old1").click(function(){
											$("#new").fadeIn(1000);				   
											$("#old1").hide();
											$("#old2").show();
										});
								  $("#old2").click(function(){
											$("#new").fadeOut(1000);
											$("#old2").hide();
											$("#old1").show();
										});
								  });
       $('#slider1').Thumbelina({
           $bwdBut:$('#slider1 .leftt'),    // Selector to left button.
           $fwdBut:$('#slider1 .rightt')    // Selector to right button.
       });
     
           function loading_show(){
                    $('#loading').html("<img src='images/loading.gif'/>").fadeIn('fast');
                }
                function loading_hide(){
                    $('#loading').fadeOut('fast');
                }
                               
                function loadData(page){
                    loading_show();                    
                    $.ajax
                    ({
                        type: "POST",
                        url: SITEURL+'rating_pagination',
                        data: {"page":page,"id" :<?php echo $doctorID;?>},
                        success: function(msg)
                        {
                            //console.log(msg);
                                loading_hide();
                                $(".dr_viw_clm2_rew").html(msg);
                        }
                    });
                }
                loadData(1);  // For first time page load default results
                $('.dr_viw_clm2_rew .paginatin li.activ').live('click',function(){
                    var page = $(this).attr('p');
                    loadData(page);
                    
                });           
                $('#go_btn').live('click',function(){
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
</script>     
<style type="text/css">
   /* Some styles for the containers */
   #slider1 {
   position:relative;  /* Containers need relative or absolute position. */
   margin-left:10px;
   width:160px;
   height:56px;
   /*border-top:1px solid #aaa;
   border-bottom:1px solid #aaa;*/
   }
   #html5-watermark {
   visibility: hidden;
   }
    .dr_viw_clm2_rew .paginatin ul li.inactiv,
            .dr_viw_clm2_rew .paginatin ul li.inactiv:hover{
                background-color:#ededed;
                color:#bababa;
                border:1px solid #bababa;
                cursor: default;
            }
            .dr_viw_clm2_rew .data ul li{
                list-style: none;
                font-family: verdana;
                margin: 5px 0 5px 0;
                color: #000;
                font-size: 13px;
            }

            .dr_viw_clm2_rew .paginatin{
                
                height: 25px;
            }
            .dr_viw_clm2_rew .paginatin ul li{
                list-style: none;
                float: left;
                border: 1px solid #006699;
                padding: 2px 6px 2px 6px;
                margin: 0 3px 0 3px;
                font-family: arial;
                font-size: 14px;
                color: #006699;
                font-weight: bold;
                background-color: #f2f2f2;
            }
            .dr_viw_clm2_rew .paginatin ul li:hover{
                color: #fff;
                background-color: #006699;
                cursor: pointer;
            }
			.go_button
			{
			background-color:#f2f2f2;border:1px solid #006699;color:#cc0000;padding:2px 6px 2px 6px;cursor:pointer;position:absolute;margin-top:-1px;
			}
			.total
			{
			float:right;font-family:arial;color:#999;
			}

</style>
<section  class="team-modern-12"> 
   <div class="container">
      <div class="dr_viw_clm1">
      
      
      
         <div class="dr_viw_clm_lft">
         <!-- profile --->
            <div class="dr_viw_bnr">
               <div class="drcolorbox"></div>
               <div class="dr_viw_photemian">
                  
                  <div class="dr_viw_prfimg"> 
                  <?php if(!empty($resImage)){
                     foreach($resImage as $keys=>$value){
                     if($value['set_profile']==1){
                        $profileImage = $value['name'];
                     }
                     else{ 
                            		$imageName = 'no_image.jpg';
                     } 
                     }?>
                  <?php 
                     if(empty($profileImage)){
                     ?>
                     <img  src="<?php echo WEB_ROOT?>service/public/z_uploads/doctor/<?php 
                        echo $imageName;?>" alt="">
                     <?php }else{?>
                       <a href="<?php echo WEB_ROOT;?>index.php/service/public/z_uploads/doctor/<?php echo $profileImage;?>" class="html5lightbox" data-group="mygroup" data-thumbnail="<?php echo WEB_ROOT?>service/public/z_uploads/doctor/<?php echo $profileImage;?>" ><img src="<?php echo WEB_ROOT?>service/public/z_uploads/doctor/thumbnail/<?php echo $profileImage;?>" /></a>
                     <?php } } else {?>
                     <img  src="<?php echo WEB_ROOT?>service/public/z_uploads/doctor/no_image.jpg" alt="">
                     <?php } ?>
                  </div>
                  <?php if(!empty($resImage)){?>
                  <div id="slider1">
                     <div class="thumbelina-but horiz leftt"><a href="#"> <img src="<?php echo WEB_ROOT?>service/public/images/thumb_arow_lft.png" alt=""></a> </div>
                     <ul>
                        <?php
                           foreach($resImage as $keys=>$value){
                           ?>
                        <li> 
                           <?php
                              if($value['type']==0 && $value['set_profile']!=1){
                              	?>
                        <li>
                           <a href="<?php echo WEB_ROOT;?>index.php/service/public/z_uploads/doctor/<?php echo $value['name'];?>" class="html5lightbox" data-group="mygroup" data-thumbnail="<?php echo WEB_ROOT?>service/public/z_uploads/doctor/<?php echo $value['name'];?>" ><img src="<?php echo WEB_ROOT?>service/public/z_uploads/doctor/thumb/<?php echo $value['name'];?>" /></a>
                           <?php }else {
							   if($value['type']==1){
							   ?>
                           <a href="<?php echo WEB_ROOT;?>index.php/service/public/z_uploads/doctor/<?php echo $value['name'];?>" class="html5lightbox" data-group="mygroup" data-thumbnail="<?php echo WEB_ROOT?>service/public/images/video.jpg" ><img src="<?php echo WEB_ROOT?>service/public/images/video.jpg" style="height:40px;width:42px;" /></a>
                           <?php } } ?>
                        </li>
                        <?php } ?>
                     </ul>
                     <div class="thumbelina-but horiz rightt"><a href="#"><img src="<?php echo WEB_ROOT?>service/public/images/thumb_arow.png" alt=""></a></div>
                  </div>
                  <?php } ?>
               </div>
               <div class="dr_viw_dtail">
                  <div class="dr_viwbnr_name">
                     <h1>
                        <?php echo $result['firstname']." ".$result['lastname'];?> <!--<span class="dr_text"> MD </span>-->
                     </h1>
                     <p><?php $res = $scad->getSpeciality($result['speciality']); echo $res['name']; ?></p>
                  </div>
                  <div class="dr_viw_bkb"> <!--<a href="<?php echo WEB_ROOT;?>index.php/book/<?php echo $result['id'];?>" class="dr_bkonline"> Book Online </a>--> </div>
                  <div class="dr_viwbnr_disc">
                     <?php 				
					 if(!empty($result['description'])){
                        $str = substr($result['description'], 0, 350) ;				echo $str;
						$str1=substr($result['description'], 350);echo "<font id='new'>$str1</font>";
                        ?><b id='old1'>...<a id='description' style='cursor:pointer;'>Read More</a></b>
                        <b id='old2'>...<a id='description' style='cursor:pointer;'>Read Less</a></b>
                        <?php } ?>
                  </div>
               </div>
            </div>
            
            <!-- map --->
            
            <div class="dr_viw_clm_rht">
            <div class="dr_viw_clm2_map">
             <div id="map" style="width: 443px; height: 294px;"></div></div>
            
         </div>
         </div>
         
         
         
                 				   <!-- Calender Section-->
                            <div class="dr_profle_clndr">
                            
                            <div class="dr_profle_clndr_rht">
                            
                            <div class="dr_profle_clndr_rhtfrm">
                            <h1> Book an Appointment </h1>
                             <small class="subname2"> Will you use insurance?  </small>
                             <div class="styled-select">
                     <select name="insuranceSelect" class="advanceSearch" id="insuranceSelect">
                      <option value="">Select Insurance</option>
                     <?php if($insuranceSelect){$selected = $insuranceSelect;}else{$selected = NULL;}  $scad->listbox('insurance','id','name','`parent_id`=0','`name` ASC',$selected); ?>
                     </select>
                  </div>
                         <small class="subname2"> Insurance </small>
                  <div class="styled-select" >
                     <select name="subInsuranceSelect" class="advanceSearch" id="subInsuranceSelect">
                      <option value="">Select Insurance</option>
                     <?php if($subInsuranceSelect){$selected = $subInsuranceSelect;}else{$selected = NULL;}  $scad->listbox('insurance','id','name',$condition=NULL,'`name` ASC',$selected); ?>
                     </select>
                  </div>
                  
             <div style="width:100%;"> 
              <div class="dr_frm" id="loading" style="display: none;z-index:99">
                  <img src="<?php echo WEB_ROOT?>service/public/images/loading.gif" />
               </div>
             </div>
                            <small class="subname2"> What's the reason for your visit? </small>
                            <div class="styled-select">
                            <select id="srchReason" name="srchReason" class="dr_profle_clndrselect2">
                           <option class="parent-346" value="0">Reason for Visit</option>
                    <option class="parent-346" value="1">Hearing Problems / Ringing in Ears</option>
                    <option class="parent-346" value="2">Damage to the Ear and Disease of the Ear</option>
                    <option class="parent-346" value="3">Dizziness / Vertigo</option>
                    <option class="parent-346" value="4">Ear Infection</option>
                    <option class="parent-346" value="5">Evaluation for Cochlear Implant</option>
                    <option class="parent-346" value="6">Hearing Test</option>
                    <option class="parent-346" value="7">Multiple Sclerosis</option>
                    <option class="parent-346" value="8">Family History of Hearing Loss</option>
                    <option class="parent-346" value="9">Pediatric Audiology</option>
                    <option class="parent-346" value="10">Problem with Balance</option>
                    <option class="parent-346" value="11">Problem with Hearing Aid</option>
                    <option class="parent-346" value="12">Stroke</option>
                    <option class="parent-346" value="13">Tumor Affecting Hearing (Acoustic Neuroma, Meningioma, Astrocytoma)</option>
                            </select>
                            </div>
                            
                            <small class="subname2"> Click a time in the calendar to book</small>
                            </div>
                            </div>
                            
                            <div style="float:left; height:30px; background:#fff;">
                            <div class="dr_profle_clndr_prv"> <a id="prev" style="cursor:pointer;"> Pre </a>  </div>
                            <div class="dr_profle_clndr_adrs"> 247 Third Ave, Suite 304, New York, NY, 10010  </div>
                            <div class="dr_profle_clndr_nxt"> <a id="next" style="cursor:pointer;"> Next </a>  </div>
                            </div>
                            
                            <!-- Calender-->
                            <div style="float:left;" class="calender">
                            
                            
                            
                            </div>
                            <!-- End Calender-->
                            
                            </div>
                            <!-- END Calender Section-->
         
         
         
         
          <div class="dr_viw_clm_lft">
          
              <!-- Education --->
         <div class="dr_viw_edct">
               <div class="dr_viw_edct_wrap">
                  <div class="dr_vw_edcn_main">
                  <?php 
				  $spcl=$scad->getDocLang($_SESSION['userID']);$spcl1=$scad->getDocInsu($_SESSION['userID']);
						if(empty($result[Education]) && empty($result[HospitalAffiliations]) && empty($result[BoardCertifications]) && empty($result[Awards]) && empty($result[ProfessionalMemberships]) && empty($spcl) && empty($spcl1) ){
						?>
                        <div style="color:#CCC;font-size: 31px;
    margin-left: 32%;
    margin-top: 23%;margin-bottom:23%;">No data to display</div>
                        <?php }else { ?>
                  		<?php 
						if(!empty($result[Education])){
						?>
                     <div class="dr_vw_edn_clm">
                        <div class="dr_vw_edn_clmlft"> Education </div>
                        <div class="dr_vw_edn_clmrht"> 
                        <?php echo $result[Education];?>
                        </div>
                     </div>
                     <?php } ?>
                     
                     <?php
					 if(!empty($result[HospitalAffiliations])){
					 ?>
                     <div class="dr_vw_edn_clm">
                        <div class="dr_vw_edn_clmlft"> Hospital Affiliations  </div>
                        <div class="dr_vw_edn_clmrht"> 
                        <?php echo $result[HospitalAffiliations];?>
                        </div>
                     </div>
                     <?php } ?>
                     
                     <?php
					 $spcl=$scad->getDocLang($_SESSION['userID']);
					 if(!empty($spcl)){
					 ?>
                     <div class="dr_vw_edn_clm">
                        <div class="dr_vw_edn_clmlft"> Languages Spoken </div>
                        <div class="dr_vw_edn_clmrht"> 
                        <?php 
						foreach($spcl as $keys=>$value){
							 $spcll[]=$value;
							}
							 $spclen=count($spcll);
							for($i=0;$i<$spclen;$i++){
							echo $selected=$spcll[$i][name]."<br>";
							}?>
                        </div>
                     </div>
                     <?php } ?>
                     
                     <?php 
					 if(!empty($result[BoardCertifications])){
					 ?>
                     <div class="dr_vw_edn_clm">
                        <div class="dr_vw_edn_clmlft"> Board Certifications </div>
                        <div class="dr_vw_edn_clmrht"> 
                           <?php echo $result[BoardCertifications];?>
                        </div>
                     </div>
                     <?php } ?>
                     
                     <?php 
					 if(!empty($result[Awards])){
					 ?>
                     <div class="dr_vw_edn_clm">
                        <div class="dr_vw_edn_clmlft"> Awards and Publications  </div>
                        <div class="dr_vw_edn_clmrht"> 
                           <?php echo $result[Awards];?>
                        </div>
                     </div>
                     <?php } ?>
                     
                     <?php 
					 if(!empty($result[ProfessionalMemberships])){
					 ?>
                     <div class="dr_vw_edn_clm">
                        <div class="dr_vw_edn_clmlft"> Professional Memberships   </div>
                        <div class="dr_vw_edn_clmrht"> 
                           <?php echo $result[ProfessionalMemberships ];?>
                        </div>
                     </div>
                     <?php } ?>
                     
                     <?php 
                        $spcl=$scad->getDocInsu($_SESSION['userID']);
					 if(!empty($spcl)){
					 ?>
                     <div class="dr_vw_edn_clm">
                        <div class="dr_vw_edn_clmlft"> In-Network Insurances </div>
                        <div class="dr_vw_edn_clmrht"> 
                           <?php
						foreach($spcl as $keys=>$value){
							 $spcli[]=$value;
							}
							 $spclen=count($spcli);
							for($i=0;$i<$spclen;$i++){
							echo $selected=$spcli[$i][name];
							}
							?>
                        </div>
                     </div>
                  </div>
                  <?php } }?>
               </div>
            </div>
                  <!-- review --->
         
                     
        <div class="dr_viw_clm2_rew">
               <!--   <h1> Patient Reviews for <?php  echo $result['firstname']." ".$result['lastname'];?>, MD </h1> --->
               
        </div></div>
               
            </div>
         
            </div>
            
            
            
         
      </div>
   </div>
</section>
<script type="text/javascript">
    // Define your locations: HTML content for the info window, latitude, longitude
    var locations = [
      ['<div style=\"width:100%\"><?php echo $result['address'];?></div>', <?php echo $val['lat'];?>, <?php echo $val['lng'];?>]/*,
      ['<h4>Coogee Beach</h4>', -33.923036, 151.259052],
      ['<h4>Cronulla Beach</h4>', -34.028249, 151.157507],
      ['<h4>Manly Beach</h4>', -33.80010128657071, 151.28747820854187],
      ['<h4>Maroubra Beach</h4>', -33.950198, 151.259302]*/
    ];
    
    // Setup the different icons and shadows
    var iconURLPrefix = '<?php echo WEB_ROOT;?>service/public/images/';
    
    var icons = [
      iconURLPrefix + '1.png'
    ]
    var icons_length = icons.length;
    
    
    var shadow = {
      anchor: new google.maps.Point(15,33),
      url: iconURLPrefix + 'msmarker.shadow.png'
    };

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: new google.maps.LatLng(<?php echo $val['lat'];?>, <?php echo $val['lng'];?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      mapTypeControl: false,
      streetViewControl: false,
      panControl: false,
      zoomControlOptions: {
         position: google.maps.ControlPosition.LEFT_BOTTOM
      }
    });

    var infowindow = new google.maps.InfoWindow({
      maxWidth: 160
    });

    var marker;
    var markers = new Array();
    
    var iconCounter = 0;
    
    // Add the markers and infowindows to the map
    for (var i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon : icons[iconCounter],
        shadow: shadow
      });

      markers.push(marker);

      google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
      
      iconCounter++;
      // We only have a limited number of possible icon colors, so we may have to restart the counter
      if(iconCounter >= icons_length){
      	iconCounter = 0;
      }
    }

    function AutoCenter() {
      //  Create a new viewpoint bound
      var bounds = new google.maps.LatLngBounds();
      //  Go through each...
      $.each(markers, function (index, marker) {
        bounds.extend(marker.position);
      });
      //  Fit these bounds to the map
      map.fitBounds(bounds);
    }
    //AutoCenter();
  </script> 
<?php include("service/ui/common/footer.php"); ?>

