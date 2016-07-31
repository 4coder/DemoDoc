<?php 
   include("service/ui/common/header.php");   
   $result = $scad->getUserDetails($_SESSION['userID']); 
   
   //print_r($result);exit;
   $resu = $scad->getDetails1($_SESSION['userID'],date("Y-m-d"));
	//echo "<pre>";print_r($resu);exit;
	foreach ($resu as $key => $value) {
	$ids[]=$value['doctor_id'];
    $res[]= $scad->getDocDetails($value['doctor_id']);
	}
  //  print_r($res);exit;
   ?>
   
   
   
   <script>
   $(document).ready(function(){
   			$(".delete_apt").click(function(){
   				df=$(this);
   				var id=$(this).attr("target");
   				$.ajax({
                type: 'POST',
                url: SITEURL + 'act-delete-appoinments',
                data: {"id":id},
                success: function(res) {
                    if (res == 0) {
                        $("#doc_setting_error").fadeIn(3000);
                        $("#doc-setting-error").delay(1000).fadeOut(8000);
                        document.getElementById('doc-detail').style.pointerEvents = 'auto';
                        $("#doc-detail").text('Save');
                    } else {
                        $("#apntEdit").show().delay(1000);
                        df.parent().parent().hide();
                        $("#apntEdit").fadeOut(1000);
                    }
                }
            });
   			});
   });
 </script>
 
 
 
 
 
 
 
   
   
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
      
      <div class="profile_banner">
     <div id="apntEdit" style="left:240px;position: absolute;top: 140px;width: 400px;z-index: 999999; display:none;" role="alert" class="alert alert-success">
                        Your changes saved successfully.
                        </div>
      	
<h1 style="color: #49a3df;font-size: 16px;" >Past appoinments</h1>

            <?php if(empty($resu)){ ?>
            <div style=" color:#ccc; font-size: 31px;text-align:center">No data to dispaly</div>
            <?php } else{?> 
       <div style="overflow-x:auto;height:500px">
      <table class="table  table-striped" >
      	

      		<tr>
<th colspan="">Doc Name</th>
<th colspan="">Illness</th>
<th colspan="">Appoinment Date</th>
<th colspan="">Edit</th>
<th colspan="">Download</th>
            </tr>

            
          <?php
                        $i=0;  
						foreach ($resu as $key => $val) {
							//echo $val['illness'];
							//print_r($val);
                        $res= $scad->getDocDetails($val['doctor_id']);
						
                       foreach ($res as $key => $value) {
                       	//echo $val['illness'];
							//print_r($val);exit;
                      //print_r($value);exit;
	                     ?>  
	                     
            <tr>	        
    <td style="color:#000;width:220px;"><?php echo $value['firstname']." ".$value['lastname'];?></td>						
    <td style="color:#666;" class="name"><?php  if(empty($val['illness'])){echo "No response";}else{echo $val['illness'];}?></td>
    
     <td style="width:220px;"><?php echo $newDate = date("d-m-Y", strtotime($val['apnt_date'])); ?></td>
     <td class="editthis" style="cursor:pointer"><a class="delete_apt" target="<?php echo $val['id'];?>">Delete</a></td>
     
     <?php
        	$download=$scad->getDownload($val['id']);

			?>
     <td class="editthis" style="cursor:pointer"><?php if(!empty($download)){?><a href="<?php echo WEB_ROOT;?>index.php/pdf1/<?php echo $download['id'];?>" target="_blank">Dowload Pdf</a><?php } ?></td>

</tr>
      	
<?php         	
	          }
$i++;}
            	?>
      </table> 
      
      <?php } ?>     	
            	</div>
      	</div>
      	</div>
      	</section>
      	
   
<?php include("service/ui/common/footer.php"); ?>

