<?php
include("./conf/config.inc.php");
include("service/ui/common/header.php"); 

?>
<script type="text/javascript">
$(document).ready(function(){
	var formData=$("#verify").serialize();
	$.ajax({
                type: 'POST',
                url: SITEURL + 'act_verify_mail',
                data: formData,
                success: function(res) {
					console.log(res)
                    if (res == 2) {
						setTimeout(function(){
						     window.location.href = SITEURL + 'patient/profile';   
						   },5000);
                        $("#patient_error").show();
                        $("#continue").text('Countinue');
                    }
					else if (res == 1) {
						setTimeout(function(){
						     window.location.href = SITEURL + 'doctor/profile';   
						   },5000);
                        $("#patient_error").show();
                        $("#continue").text('Countinue');
                    } else {
                       // window.location.href = SITEURL + 'patient/profile';
					   setTimeout(function(){
						        $(".loader").hide();
								$("#error").show();
						   },5000);
					    
                    }
                }
            });
	})
</script>
<section  class="team-modern-12">
   <div class="container">
      <div class="span122">
      <form id="verify" style="display:none">
      <input type="hidden" name="mail" value="<?php echo $mail;?>">
      <input type="hidden" name="key" value="<?php echo $secret_key;?>">
      </form>
         <div class="loader" style="height:320px;">
         <img src="<?php echo WEB_ROOT;?>service/public/images/712.GIF" style="margin:4% 55%; max-width:100%"/>
         <p style="margin:-2% 9% 4px 47%; max-width:100%">
		 Please wait your account has been verified.
		 </p>
         </div>
         <div id="error" style="margin-top:20px;display:none;" class="alert alert-error">Verification failed.</div>
        </div>
       </div>
       </section>
<?php include("service/ui/common/footer.php"); ?>