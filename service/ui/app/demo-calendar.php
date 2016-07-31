<?php
	include("service/ui/common/header.php");
	$date = date('Y-m-d');
	$ids=array(1);
	$idf=json_encode($ids);
?>
<input type="text" name="allDoctors" id="allDoctors" value="<?php echo $idf;?>" />
<script type="text/javascript">
$(document).ready(function(){
	var allDoctors = $("#allDoctors").val();
	miniCalendar(0,allDoctors,'first');					   
	var nextDate = '';
	$("#next").click(function(){
		var firstDate=$(".firstDate_0").text();
		var res = firstDate.split(" ");
		miniCalendar(res[2],allDoctors,'next');
	});	
	$("#prev").click(function(){
		var firstDate=$(".firstDate_0").text();
		
		var res = firstDate.split(" ");		
		miniCalendar(res[2],allDoctors,'prev');
	});	
	function miniCalendar(dateCnt,allDoctors,status){
		$.ajax({
			type: 'GET',	
			url: SITEURL+'minicalendar/'+dateCnt+'/'+allDoctors+'/'+status,
			success: function(res){
				$(".calender_custom").html(res);
			}
		});
	}
});
</script>
<section class="team-modern-12">
   <div class="container">
      <div style="float:left; width:400px;">
         <div class="calender_custom_nxt"> <a style="cursor:pointer;" id="next"> Next </a></div>
         <div class="calender_custom_prv"> <a style="cursor:pointer;" id="prev"> Pre </a></div>
         <div class="calender_custom">
			
         </div>
      </div>
   </div>
</section>
<?php

include("service/ui/common/footer.php"); ?>