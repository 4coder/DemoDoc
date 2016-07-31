<?php
   include("service/ui/common/header.php"); 
     //echo '<pre>';
     $result = $scad->getUserDetails($doctorID);
     $resImage = $scad->getImages($doctorID);
     //print_r($result);
 ?>
<input type="hidden" name="doctorID" id="doctorID" value="<?php echo $doctorID?>"  />
<input type="hidden" name="patientID" id="patientID" value="<?php echo $_SESSION['userID']?>"  />
<input type="hidden" name="eventID" id="eventID" />
<link href='<?php echo WEB_ROOT;?>service/public/css/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo WEB_ROOT;?>service/public/css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='<?php echo WEB_ROOT;?>service/public/js/calander/moment.min.js'></script>
<script src='<?php echo WEB_ROOT;?>service/public/js/out/jquery-ui.js'></script>
<script src='<?php echo WEB_ROOT;?>service/public/js/calander/doc-custom-calendar.js'></script>
<script src='<?php echo WEB_ROOT;?>service/public/js/out/fullcalendar.js'></script>
<script type='text/javascript'>
   var date = new Date();
   		var d = date.getDate();
   		var m = date.getMonth();
   		var y = date.getFullYear();
   		var dateDis = new Date(y, m, d, 13, 0);
   var ytuyt =  [
   				
   				{
   					//start: new Date(y, m, d-1, 0, 0),
					start:'2014-08-01T13:15:00.000+10:00',
					end:'2014-08-01T14:15:00.000+10:00',
   					//end: new Date(y, m, d-1, 23, 59),
   					background: '#E7E7E7',// optional
   					cls: 'testCls'
   				},
   				{
   					start: new Date(y, m, d-2, 0, 0),
   					end: new Date(y, m, d-2, 23, 59),
   					background: '#E7E7E7',// optional
   					cls: 'testCls'
   				}
   			] ;
   
   	$(document).ready(function() {
   		var date = new Date();
   		var d = date.getDate();
   		var m = date.getMonth();
   		var y = date.getFullYear();
   		var dateDis = new Date(y, m, d, 13, 0);
   		$('#calendar').fullCalendar({
   			header: {
   				left: 'prev,next today',
                   center: 'title',
                   right: 'agendaDay,agendaWeek'
   			},		
   			defaultView: 'agendaWeek',
   			allDaySlot: false,
   			slotMinutes: 15,
   			firstHour: 10,
   			lastHour: 18,
   			firstDay: 1,
   			editable: true,
   			eventDurationEditable: true,
		   eventStartEditable: true,
		   selectable: true,
		   selectHelper: true,
   			weekNumbers: true,
   			events: SITEURL+'calendar_events/?doctorID=1',
   			annotations: ytuyt ,
   				loading: function(bool) {
   			if (bool) 
   				$('#load').show();
   			else 
   				$('#load').hide();
   			},			
   		 select: function( startDate, endDate, allDay, jsEvent, view) {
   			var startTime = moment(startDate).format();
   			var endTime = moment(endDate).format();
			var check = startTime;
			var today = $.fullCalendar.formatDate(new Date(),'yyyy-MM-dd');
			if(check < today)
			{
				//$(".fc-mon").addClass("fc-state-disabled");
				//alert("Cant");// Previous Day. show message if you want otherwise do nothing.
				// So it will be unselectable
			}
			else
			{
				$("#saveAppnt").show();
        
				$("#deleteAppnt").hide();
				$("#bookModel").modal("show");
				$(".fc-content").css("z-index","2");
				$("#approvedHead").hide();				
				$("#pendingHead").hide();
				$("#defaultHead").show();
				$("#patientApnt-form")[0].reset();
				$("#pop_load").show();
				appointmentScheduling(startTime,endTime);
			}
			
			
   			
   		},
   		eventClick: function(calEvent, jsEvent, view) {
   			$("#eventID").val(calEvent.id);
   			appntDetails(calEvent, jsEvent, view, 0);
   			$("#pop_load").show();
   		},
		eventDrop: function(event,dayDelta,minuteDelta,allDay,revertFunc) {
			$("#load").show();
			var newStartTime = getHoursAndMinutes(event.start);
			var newEndTime = getHoursAndMinutes(event.end);
			var statTime = event.start;
			var curMonth  = statTime.getMonth()+1;
			if(curMonth<10){
			 curMonth = "0"+curMonth;
			}
			var apntDate = statTime.getFullYear()+"-"+curMonth+"-"+statTime.getDate();
			updateEvents(event.id,apntDate,newStartTime,newEndTime);
  	  },
	  eventResize: function(event, delta, revertFunc) {
		$("#load").show();
		var newStartTime = getHoursAndMinutes(event.start);
		var newEndTime = getHoursAndMinutes(event.end);
		var statTime = event.start;
		var curMonth  = statTime.getMonth()+1;
		if(curMonth<10){
			curMonth = "0"+curMonth;
		}
		var apntDate = statTime.getFullYear()+"-"+curMonth+"-"+statTime.getDate();
		updateEvents(event.id,apntDate,newStartTime,newEndTime);
    },		
   		viewDisplay : function(view) {
   		var selectedWeekNumber = getWeekNumber(view.start);
           var currentWeekNumber = getWeekNumber(new Date());
   		var endWeekNumber = currentWeekNumber+4;
   		$('.fc-button-prev').addClass("fc-state-disabled");
   		if(selectedWeekNumber < currentWeekNumber){
   			$('.fc-button-prev').addClass("fc-state-disabled");
   			$('.fc-button-next').removeClass("fc-state-disabled");
   		}else if(selectedWeekNumber > currentWeekNumber){
   			$('.fc-button-prev').removeClass("fc-state-disabled");
   			$('.fc-button-next').removeClass("fc-state-disabled");
   		}
   		if(selectedWeekNumber == endWeekNumber){
   			$('.fc-button-next').addClass("fc-state-disabled");
   			$('.fc-button-prev').removeClass("fc-state-disabled");
   		}
   		},
   		/* viewDisplay   : function(view) {
         var now = new Date(); 
         var end = new Date();
         end.setMonth(now.getMonth() + 2); //Adjust as needed
   
         var cal_date_string = view.start.getMonth()+'/'+view.start.getFullYear();
         var cur_date_string = now.getMonth()+'/'+now.getFullYear();
         var end_date_string = end.getMonth()+'/'+end.getFullYear();
   
         if(cal_date_string == cur_date_string) { jQuery('.fc-button-prev').addClass("fc-state-disabled"); }
         else { jQuery('.fc-button-prev').removeClass("fc-state-disabled"); }
   
         if(end_date_string == cal_date_string) { jQuery('.fc-button-next').addClass("fc-state-disabled"); }
         else { jQuery('.fc-button-next').removeClass("fc-state-disabled"); }
       }*/
   		
       });
        $("#calanderLoading").hide();
     });
   	
   
</script>
<section class="team-modern-12">
   <div class="container">
      <div class="dr_book_clm1">
      
    <div class="clndr_clr">
       <div class="clndr_aprv"> <div class="clndr_aprv1"></div>  <div class="clndr_aprv2"> Approved </div> </div>
  <div class="clndr_pndg"> <div class="clndr_pndg1"></div>  <div class="clndr_pndg2"> Pending </div> </div>
        <div class="clndr_cncl"> <div class="clndr_cncl1"></div>  <div class="clndr_cncl2"> Cancelled </div> </div>
      </div>
    
         <div style="width:784px;height:631px;float:left;">
            <div class="dr_book_calender">
               <div class="dr_calender_outr" id="load">
                  <div class="dr_calender_load"></div>
               </div>
    <div id="apntEdit" style="left:257px;position: absolute;top: 365px;width: 400px;z-index: 999999; display:none;" role="alert" class="alert alert-success">
    	Your changes saved successfully.
    </div>
               <div id='calendar'></div>
            </div>
         </div>
         <div class="dr_book_clm_rht">
            <div class="dr_book_list">
               <ul>
                  <li>
                     <div class="dr_book_list_clm1">
                        <img src="<?php echo WEB_ROOT;?>service/public/images/dct_prfle_image.jpg" align="left" alt="">
                        <div class="dr_book_list_adrs">
                           <h1>Dr. <?php echo $result['firstname']." ".$result['lastname']?> </h1>
                           <p><b> <?php $res = $scad->getSpeciality($result['speciality']); echo $res['name'];?> </b> <br> <?php echo $result['address'];?> </p>
                        </div>
                     </div>
                     <div class="dr_book_list_clm2">
                        <!--<div class="dr_satr">
                           <div class="rating">
                              <input type="radio" name="rating" value="0" checked /><span id="drhide"></span>
                              <input type="radio" name="rating" value="1" /><span></span>
                              <input type="radio" name="rating" value="2" /><span></span>
                              <input type="radio" name="rating" value="3" /><span></span>
                              <input type="radio" name="rating" value="4" /><span></span>
                              <input type="radio" name="rating" value="5" /><span></span>
                           </div>
                           </div>-->
                        <p><?php $str = substr($result['description'], 0, 150) . '...<a id="description" style="cursor:pointer;">Read More</a>';				echo $str; ?></p>
                     </div>
                  </li>
               </ul>
            </div>
            <div class="dr_book_map"><img src="<?php echo WEB_ROOT;?>service/public/images/dr_book_map.jpg" alt=""></div>
         </div>
      </div>
   </div>
</section>
<div id="bookModel" class="modal fade"  tabindex="-1" role="dialog">
   <form class="basic-grey" id="patientApnt-form">
      <h3 id="defaultHead" align="center" style="font-size:16px; margin:0; padding:0; text-align:center; font-family: roboto; display:none;">Create a new Appointment</h3>
      <h3 id="pendingHead" align="center" style="font-size:16px; margin:0; padding:0; text-align:center; font-family: roboto;color:#F49B44; display:none;">Waiting for doctor approval</h3>
      <h3 id="approvedHead" align="center" style="font-size:16px; margin:0; padding:0; text-align:center; font-family: roboto;color:#A4D250; display:none;">Approved appointment</h3>
      <h3 id="cancelledHead" align="center" style="font-size:16px; margin:0; padding:0; text-align:center; font-family: roboto;color:#ff5183; display:none;">Cancelled Appointment</h3>
      <div class="pop_outr" id="pop_load">
         <div class="pop_load"></div>
      </div>
      <div class="rm_popup"> <label> <span class="frm_txtp">Name :</span> <input type="text"  name="patName" id="patName"> </label>  </div>
      <div style="width:250px; float:left;">
      </div>
      <div class="rm_popup"> <label> <span class="frm_txtp">Email :</span> <input type="text" name="patEmail" id="patEmail"> </label>  </div>
      <div class="rm_popup"> <label> <span class="frm_txtp">Phone :</span> <input type="text" name="patPhone" id="patPhone"> </label>  </div>
      <div class="rm_popup"> <label> <span class="frm_txtp">Date :</span> <input type="text" name="apntDate" id="apntDate" > </label>  </div>
      <div style="width:250px; float:left;">
         <div class="rm_popup"> <label> <span class="frm_txtp">Time :</span> 
            <input type="time" name="apntStart" id="apntStart"> 
            <input type="time" name="apntEnd" id="apntEnd"> </label>  
         </div>
      </div>
      <!--<div class="rm_popup">
         <label>
            <span class="frm_txtp">Insurance :</span>
            <select name="selection">
               <option value="Job Inquiry">Insurance 1</option>
               <option value="General Question">Insurance 2</option>
            </select>
         </label>
         </div>-->
      <div class="rm_popup">
         <label> <span class="frm_txtp"> Notes :</span><textarea name="notes" id="notes"></textarea></label>
      </div>
      <div class="rm_popup">
         <label><input id="saveAppnt" type="button" value="Save" class="button"></label>
         <label><input id="deleteAppnt" type="button" value="Delete" class="button"></label>
         <label><input id="cancelAppnt" type="button" value="Close" class="button2"></label>         
      </div>
      <div class="clearfix"></div>
   </form>
</div>
<?php include("service/ui/common/footer.php"); ?>