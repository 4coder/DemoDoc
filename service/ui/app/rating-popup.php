<?php
include("./conf/config.inc.php");
//$patientData = $_POST;
 $page     = $_POST['sum'];
 
$value = $scad->getUserDetails($page);
$img = $scad->getDocProImg($page);
$spcl = $scad->getDocSpeciality($page);

if(!empty($img[name])){
	$imageName = $img[name];
	}
	else{
		$imageName = 'no_image.jpg';
		}
?>

         <?php
        	$rtng=$scad->userting($_REQUEST['sum'],$_SESSION['userID']);
			?>



<div class="comnt_plftmain">
        	
        <form> 
        <div class="comnt_starmain"> <div class="comnt_startxt"> Overall Rating  </div>  
        <div class="comnt_starbx">
        <div class="cmnt_satr">
        <input type="hidden" class="dctid" value="<?php echo $page;   ?> "  id="dctid">		
        <div class="cmnt_rating">
        <input type="radio" <?php if($rtng['overall']==1){echo "checked ";} if($rtng>0){echo "disabled ";} ?>  name="rating" value="0" checked  /><span id="cmnt_hide"></span>
        <input type="radio" <?php if($rtng['overall']==1){echo "checked ";} if($rtng>0){echo "disabled ";} ?>  name="rating" value="1" /><span></span>
        <input type="radio" <?php if($rtng['overall']==2){echo "checked ";} if($rtng>0){echo "disabled ";} ?>  name="rating" value="2" /><span></span>
        <input type="radio" <?php if($rtng['overall']==3){echo "checked ";} if($rtng>0){echo "disabled ";} ?>  name="rating" value="3" /><span></span>
        <input type="radio" <?php if($rtng['overall']==4){echo "checked ";} if($rtng>0){echo "disabled ";} ?>  name="rating" value="4" /><span></span>
        <input type="radio" <?php if($rtng['overall']==5){echo "checked ";} if($rtng>0){echo "disabled ";} ?>  name="rating" value="5" /><span></span>
        </div>
        
        </div>
        </div>
        </div>
        
        
        <div class="comnt_starmain"> <div class="comnt_startxt"> Bedside Manner </div>  
        <div class="comnt_starbx">
        <div class="cmnt_satr">
        <input type="hidden" class="dctid" value="<?php  ?>"  >	
        <div class="cmnt2_rating">
        <input type="radio" <?php if($rtng['beside']==1){echo "checked ";} if($rtng>0){echo "disabled ";} ?> name="rating2" value="0" checked /><span id="cmnt2_hide"></span>
        <input type="radio" <?php if($rtng['beside']==1){echo "checked ";} if($rtng>0){echo "disabled ";} ?> name="rating2" value="1"  /><span></span>
        <input type="radio" <?php if($rtng['beside']==2){echo "checked ";} if($rtng>0){echo "disabled ";} ?> name="rating2" value="2"  /><span></span>
        <input type="radio" <?php if($rtng['beside']==3){echo "checked ";} if($rtng>0){echo "disabled ";} ?> name="rating2" value="3" /><span></span>
        <input type="radio" <?php if($rtng['beside']==4){echo "checked ";} if($rtng>0){echo "disabled ";} ?> name="rating2" value="4"  /><span></span>
        <input type="radio" <?php if($rtng['beside']==5){echo "checked ";} if($rtng>0){echo "disabled ";} ?> name="rating2" value="5"  /><span></span>
        </div>
        
        </div>
        </div>
        </div>
        
        <div class="comnt_starmain"> <div class="comnt_startxt"> Wait Time </div>  
        <div class="comnt_starbx">
        <div class="cmnt_satr">
        <input type="hidden" class="dctid" value="<?php  ?>" >		
        <div class="cmnt3_rating">
        <input type="radio" <?php if($rtng['waiting']==1){echo "checked ";} if($rtng>0){echo "disabled ";} ?> name="rating3" value="0" checked /><span id="cmnt3_hide"></span>
        <input type="radio" <?php if($rtng['waiting']==1){echo "checked ";} if($rtng>0){echo "disabled ";} ?> name="rating3" value="1"  /><span></span>
        <input type="radio" <?php if($rtng['waiting']==2){echo "checked ";} if($rtng>0){echo "disabled ";} ?> name="rating3" value="2" /><span></span>
        <input type="radio" <?php if($rtng['waiting']==3){echo "checked ";} if($rtng>0){echo "disabled ";} ?> name="rating3" value="3" /><span></span>
        <input type="radio" <?php if($rtng['waiting']==4){echo "checked ";} if($rtng>0){echo "disabled ";} ?> name="rating3" value="4" /><span></span>
        <input type="radio" <?php if($rtng['waiting']==5){echo "checked ";} if($rtng>0){echo "disabled ";} ?> name="rating3" value="5"  /><span></span>
        </div>
        </div>
        </div>
        </div>
        
          <div class="comnt_pop_cmntbx">
        <div class="comnt_pop_txtare"> Comments  </div>
        <textarea id="message" placeholder="Your Message to Us" name="message" class="comnt_pop_txtbx" style="min-height:70px; "></textarea>
        <label style="width: 160px; float: left;"> <input type="button" value="submit" class="cmnt_btn submit" <?php if($rtng>0){echo "disabled ";} ?> id="submit"></label>
        <label style="width: 160px; float: left;"> <input type="button" value="Cancel" class="cmnt_btn cancel" id="cancelRtg"></label>
        </div>
        </form>
        </div>
        
        
        <div class="comnt_pop_drmain">
        <ul>
        
        
        <li style=" width:338px; height: auto;   float:left; background:#fdfdfd; border:solid #e7e7e7 1px; margin:0px 8px 8px 0 ;  padding:8px 8px 8px 8px; ">
        <div class="comnt_pop_drmain_clm1">
        <img align="left" alt="" src="<?php echo WEB_ROOT;?>service/public/z_uploads/doctor/small/<?php echo $imageName;?>">

        
        
        <div class="comnt_pop_drmain_adrs"> 
        	
        	
        <h2>  <?php echo $value['firstname']." ".$value['lastname'];?> </h2>
        <p><b> <?php 
		$len=count($spcl);
		for($i=0;$i<$len;$i++){
		echo $spcl[$i][name];
		}?> </b> <br> <?php echo $value['address'];?> </p>
        </div>
        </div>
        
        <!--<div class="comt_pop_disc">
        
        <h2> Wednesday, July 16 - 1:00pm </h2>
        <h2> Patient </h2>
        <input type="hidden" class="userid" value="<?php echo $_SESSION['userID']; ?>"  id="userid">
        <p> <?php echo $result['firstname']." ".$result['lastname'];?></p>
        
        <h2> Reason for Visit</h2>
        <p> General Follow Up </p>
        
        </div>-->
        
        </li>
        </ul>
        </div>
