$(document).ready(function() {

    $("#deleteAppnt").click(function() {
		var answer=confirm("Are you sure you want to delete appointment??");
		if (answer==true)
		{
			var eventID = $("#eventID").val();
			var res = eventID.split("_");
			//alert(res[0]);
			$.ajax({
				type: 'POST',
				url: SITEURL + 'appointment/change',
				data: {
					'eventID': res[0],
					'action': 'delete'
				},
				success: function(res) {
					$("#bookModel").modal('hide');
					$("#calendar").fullCalendar('removeEvents',eventID);
					$("#load").hide();
					$("#apntEdit").show();
					$("#apntEdit").fadeOut(3000);
				}
			});
		}
		else
		{
			return false;
		}
  
       
    });
    $("#cancelAppnt").click(function() {
        $("#bookModel").modal('hide');
    });
    $("#saveAppnt").click(function() {
        var formData = $("#patientApnt-form").serialize();
        var doctorID = $("#doctorID").val();
        appointmentProcess(formData, doctorID);
    });
	$("#approveAppnt").click(function() {
	var eventID = $("#eventID").val();
	var res = eventID.split("_");
		$.ajax({
		type: 'POST',
		url: SITEURL + 'appointment/change',
		data: {
			'eventID': res[0],
			'action': 'approve'
		},
		success: function(res) {
			
			var startDate = $("#apntDate").val();
            var startTime = $("#apntStart").val();
            var startTimeData = startDate + 'T' + startTime;
            var endTime = $("#apntEnd").val();
            var endTimeData = startDate + 'T' + endTime;
            var title = $("#notes").val();
		$("#calendar").fullCalendar('removeEvents',eventID);
		$("#calendar").fullCalendar('renderEvent', {
                    id:eventID,
                    title: title,
                    start: startTimeData,
                    end: endTimeData,
					allDay:false,
                    className: 'customApproved test',
                },
                true);
		$("#bookModel").modal('hide');
			$("#load").hide();
			$("#apntEdit").show();
			$("#apntEdit").delay(1000).fadeOut(4000);			
		}
	});
		
		    
    });

});


function appntDetails(calEvent, jsEvent, view,docview) {
	$(".fc-content").css("z-index", "2");
    $("#bookModel").modal("show");
    $("#saveAppnt").hide();
	$("#approveAppnt").hide();
    $.ajax({
        type: 'GET',
        url: SITEURL + 'appointment-detail/' + calEvent.id,
        success: function(res) {
			
            var apntObj = jQuery.parseJSON(res);
            $("#patName").val(apntObj.patFname + ' ' + apntObj.patLname);
            $("#patEmail").val(apntObj.Email);
            $("#patPhone").val(apntObj.phone);
            $("#apntDate").val(apntObj.apntDate);
            $("#apntStart").val(apntObj.apntStart);
            $("#apntEnd").val(apntObj.apntEnd);
            //$("#patPhone").val(apntObj.phone);				
            $("#notes").val(apntObj.notes);
            $("#pop_load").hide();
            if (apntObj.status == 0) {
                $("#approvedHead").hide();
                $("#defaultHead").hide();
                $("#cancelledHead").hide();
                $("#pendingHead").show();
				if(docview == 1){
					$("#deleteAppnt").hide();
					$("#approveAppnt").show();
				}
            } else if (apntObj.status == 2) {
                $("#approvedHead").hide();
                $("#defaultHead").hide();
                $("#pendingHead").hide();
                $("#cancelledHead").show();
				if(docview == 1){
					$("#approveAppnt").hide();
					$("#deleteAppnt").show();
				}
            } else {
                $("#pendingHead").hide();
                $("#defaultHead").hide();
                $("#cancelledHead").hide();
                $("#approvedHead").show();
				if(docview == 1){
					$("#approveAppnt").hide();
					$("#deleteAppnt").show();
				}
            }
		  }
		
    });
    
}

function appointmentScheduling(startTime, endTime) {
    //console.log("start "+startTime+" End "+endTime); 
    $.ajax({
        type: 'GET',
        url: SITEURL + 'new-appointment',
        success: function(res) {
            /*if(res == null){
				
				}*/
            var apntObj = jQuery.parseJSON(res);
            $("#patName").val(apntObj.firstname + ' ' + apntObj.lastname);
            $("#patEmail").val(apntObj.email);
            $("#patPhone").val(apntObj.phone);
            $("#apntDate").val(dateTimetoTime(startTime, 1));
            $("#apntStart").val(dateTimetoTime(startTime, 0));
            $("#apntEnd").val(dateTimetoTime(endTime, 0));
            $("#pop_load").hide();
        }
    });

}

function appointmentProcess(formData, doctorID) {

    $.ajax({
        type: 'POST',
        dataType: "json",
        url: SITEURL + 'act-appointment/' + doctorID,
        data: formData,
        success: function(res) {
            var startDate = $("#apntDate").val();
            var startTime = $("#apntStart").val();
            var startTimeData = startDate + 'T' + startTime;
            var endTime = $("#apntEnd").val();
            var endTimeData = startDate + 'T' + endTime;
            var title = $("#notes").val();
            var patientID = $("#patientID").val();
            $("#calendar").fullCalendar('renderEvent', {
                    id: res + "_" + doctorID + "_" + patientID,
                    title: title,
                    start: startTimeData,
                    end: endTimeData,
					allDay:false,
                    className: 'customRequest test',
                },
                true);
            $("#bookModel").modal("hide");

        }
    });
}

function updateEvents(eventID,apntDate,newStartTime,newEndTime){
	var res = eventID.split("_");
	$.ajax({
		type: 'POST',
		url: SITEURL + 'appointment/change',
		data: {
			'eventID': res[0],
			'apntDate':apntDate,
			'start':newStartTime,
			'end':newEndTime,
			'action': 'update'
		},
		success: function(res) {
			$("#load").hide();
			$("#apntEdit").show();
			$("#apntEdit").delay(1000).fadeOut(4000);			
		}
	});
}

function dateTimetoTime(startTime, format) {
    var str = startTime;
    var res = str.split("T");
    var time = res[1].split("+");
    if (format == 1) {
        return res[0];
    } else {
        return time[0];
    }
}

function getWeekNumber(d) {
    // Copy date so don't modify original
    d = new Date(d);
    d.setHours(0, 0, 0);
    // Set to nearest Thursday: current date + 4 - current day number
    // Make Sunday's day number 7
    d.setDate(d.getDate() + 4 - (d.getDay() || 7));
    // Get first day of year
    var yearStart = new Date(d.getFullYear(), 0, 1);
    // Calculate full weeks to nearest Thursday
    var weekNo = Math.ceil((((d - yearStart) / 86400000) + 1) / 7)
        // Return array of year and week number
    return weekNo;
}
function getHoursAndMinutes(dateTime){
	var hour 	 = dateTime.getHours();
	var minutes  = dateTime.getMinutes();
	if(minutes === 0){
		minutes = '00';
	}
	return hour+":"+minutes+":00";
}