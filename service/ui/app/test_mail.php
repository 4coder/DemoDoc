<?php
include("./conf/config.inc.php");
include("service/ui/common/header.php"); 
?>
<script type="text/javascript">
$(document).ready(function(){
	alert("s");
	$("#click").click(function(){
		var formData=$("#mailtest").serialize();
		$.ajax({
                type: 'POST',
                url: SITEURL + 'testmail',
                data: formData,
                success: function(res) {
					console.log(res)
                    if (res == 0) {
                        $("#patient_error").show();
                        $("#continue").text('Countinue');
                    } else {
                       // window.location.href = SITEURL + 'patient/profile';
                    }
                }
            });
		});
	});
</script>
<form id="mailtest">
<input type="email" name="mail" />
</form>
<input type="button" id="click" name="click" value="click">
<?php include("service/ui/common/footer.php"); ?>