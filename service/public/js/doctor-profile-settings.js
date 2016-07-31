// JavaScript Document
$(document).ready(function() {
						  
						  $(".change").click(function(){
													  $(this).parent().parent().hide();
													  $(this).parent().parent().next().show()
													  });
						  $(".change2").click(function(){
													   $(this).parent().parent().hide();
													   $(this).parent().parent().prev().show();
													   });
						  $(".addNew").click(function(){
													  var cls=$(this).attr("alt");
													  var data=$(this).parent().parent().next().html();		
													data= $("#"+cls).html()+data;
													$("#"+cls).html(data);
													  });
						  
						  $("#doc-detail1").click(function(){
														   
        $('#doc-details-form1').parsley('validate');
        var validation = $('#doc-details-form1').parsley('isValid');
        if (validation == true) {
            document.getElementById('doc-detail1').style.pointerEvents = 'none';
            $("#doc-detail").text('Processing...');
            document.getElementById("doc-detail1").disabled = true;
            var formData = $('#doc-details-form1').serialize();
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: SITEURL + 'doctor-update-details1',
                data: formData,
                success: function(res) {
                    if (res == 0) {
                        $("#doc_setting_error").fadeIn(3000);
                        $("#doc-setting-error").delay(1000).fadeOut(8000);
                        document.getElementById('doc-detail').style.pointerEvents = 'auto';
                        $("#doc-detail").text('Save');
                    } else {
						window.scrollTo(0,0);
                        $("#doc-success11").fadeIn(3000);
                        $("#doc-success11").delay(1000).fadeOut(8000);
                        $("#doc-detail1").text('Save');
                        document.getElementById('doc-detail1').style.pointerEvents = 'auto';
                        $("#doc-details-form1").find('input[type=text]').removeClass('parsley-success');
                        $("#doc-details-form1").find('select').removeClass('parsley-success');
						$("#doc-details-form1").find('textarea').removeClass('parsley-success');
                    }
                }
            });
        }
    
														   });
						  
						  $(".addNewInsurence").click(function(){
															   var data=$(".insurence").html();		
													data= $("#insurence-here").html()+data;
													$("#insurence-here").html(data);
															   });
						  $(".addNewSpcl").click(function(){
													var data=$("#spcl").html();		
													data= $(".spcl-here").html()+data;
													$(".spcl-here").html(data);
														 });
						  
						    $(".addNewLang").click(function(){
													var data=$("#lang").html();		
													data= $(".lang-here").html()+data;
													$(".lang-here").html(data);
														 });
						   $("#doc-detail").click(function() {
        $('#doc-details-form').parsley('validate');
        var validation = $('#doc-details-form').parsley('isValid');
        if (validation == true) {
            document.getElementById('doc-detail').style.pointerEvents = 'none';
            $("#doc-detail").text('Processing...');
            document.getElementById("doc-detail").disabled = true;
            var formData = $('#doc-details-form').serialize();
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: SITEURL + 'doctor-update-details',
                data: formData,
                success: function(res) {
                    if (res == 0) {
                        $("#doc_setting_error").fadeIn(3000);
                        $("#doc-setting-error").delay(1000).fadeOut(8000);
                        document.getElementById('doc-detail').style.pointerEvents = 'auto';
                        $("#doc-detail").text('Save');
                    } else {
                        $("#doc-success1").fadeIn(3000);
                        $("#doc-success1").delay(1000).fadeOut(8000);
                        $("#doc-detail").text('Save');
                        document.getElementById('doc-setting').style.pointerEvents = 'auto';
                        $("#doc-details-form").find('input[type=text]').removeClass('parsley-success');
                        $("#doc-details-form").find('select').removeClass('parsley-success');
						$("#doc-details-form").find('textarea').removeClass('parsley-success');
                    }
                }
            });
        }
    });
						   
						   
						   
    $('#docTab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
        $(this).addClass('active');
    });
    $("#doc-setting").click(function() {
        $('#doc-setting-form').parsley('validate');
        var validation = $('#doc-setting-form').parsley('isValid');
        if (validation == true) {
            document.getElementById('doc-setting').style.pointerEvents = 'none';
            $("#doc-setting").text('Processing...');
            document.getElementById("doc-setting").disabled = true;
            var formData = $('#doc-setting-form').serialize();
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: SITEURL + 'doctor-update-profile',
                data: formData,
                success: function(res) {
                    if (res == 0) {
                        $("#doc_setting_error").fadeIn(3000);
                        $("#doc-setting-error").delay(1000).fadeOut(8000);
                        document.getElementById('doc-setting').style.pointerEvents = 'auto';
                        $("#doc-setting").text('Save');
                    } else {
                        console.info(res);
                        $("#doc-success").fadeIn(3000);
                        $("#doc-success").delay(1000).fadeOut(8000);
                        $("#doc-setting").text('Save');
                        document.getElementById('doc-setting').style.pointerEvents = 'auto';
                        $("#doc-setting-form").find('input[type=text]').removeClass('parsley-success');
                        $("#doc-setting-form").find('input[type=email]').removeClass('parsley-success');
                    }
                }
            });
        }
    });
    $("#pat-setting").click(function() {
        $('#doc-setting-form').parsley('validate');
        var validation = $('#doc-setting-form').parsley('isValid');
        if (validation == true) {
            document.getElementById('pat-setting').style.pointerEvents = 'none';
            $("#doc-setting").text('Processing...');
            document.getElementById("pat-setting").disabled = true;
            var formData = $('#doc-setting-form').serialize();
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: SITEURL + 'patient-update-profile',
                data: formData,
                success: function(res) {
                    if (res == 0) {
                        $("#doc_setting_error").fadeIn(3000);
                        $("#doc-setting-error").delay(1000).fadeOut(8000);
                        document.getElementById('pat-setting').style.pointerEvents = 'auto';
                        $("#pat-setting").text('Save');
                    } else {
                        console.log(res);
                        $("#doc-success").fadeIn(3000);
                        $("#doc-success").delay(1000).fadeOut(8000);
                        $("#doc-setting").text('Save');
                        document.getElementById('pat-setting').style.pointerEvents = 'auto';
                        $("#doc-setting-form").find('input[type=text]').removeClass('parsley-success');
                        $("#doc-setting-form").find('input[type=email]').removeClass('parsley-success');
                    }
                }
            });
        }
    });
    $("#doc-pass").click(function() {
        $('#doc-setting-pass').parsley('validate');
        var validation = $('#doc-setting-pass').parsley('isValid');
        if (validation == true) {
            //document.getElementById('doc-pass').style.pointerEvents = 'none';
            $("#doc-pass").text('Processing...');
            //document.getElementById("doc-pass").disabled=true;
            var formData = $('#doc-setting-pass').serialize();
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: SITEURL + 'doctor-update-pass',
                data: formData,
                success: function(res) {
                    if (res == 0) {
                        $("#doc-pass-error1").fadeIn(3000);
                        $("#doc-pass-error1").delay(1000).fadeOut(8000);
                        document.getElementById('doc-pass').style.pointerEvents = 'auto';
                        $("#doc-pass").text('Save');
                    } else if (res == 12) {
                        $("#doc-pass-error2").fadeIn(3000);
                        $("#doc-pass-error2").delay(1000).fadeOut(8000);
                        $("#p1").addClass('parsley-error');
                        $("#p2").addClass('parsley-error');
                        document.getElementById('doc-pass').style.pointerEvents = 'auto';
                        $("#doc-pass").text('Save');
                    } else if (res == 14) {
                        $("#doc-pass-error3").fadeIn(3000);
                        $("#doc-pass-error3").delay(1000).fadeOut(8000);
                        $("#cp").addClass('parsley-error');
                        document.getElementById('doc-pass').style.pointerEvents = 'auto';
                        $("#doc-pass").text('Save');
                    } else {
                        $("#doc-pass-success").fadeIn(3000);
                        $("#doc-pass").text('Save');
                        $("#doc-pass-success").delay(1000).delay(1000).fadeOut(8000);
                        $("#doc-setting-pass").find('input[type=password]').removeClass('parsley-success');
                        document.getElementById('doc-pass').style.pointerEvents = 'auto';
                    }
                }
            });
        }
    });
    $(".delete1").click(function() {
        var i = $(this).val();

        var cr = $(this);
        //	alert(i);
        $(this).text('Processing...');
        $(this).disabled = true;
        var formData = i;
        $.ajax({
            type: 'POST',
            dataType: "json",
            url: i,
            data: formData,
            success: function(res) {
                $("#delete-img-info").fadeIn(3000);
                cr.parent().parent().parent().hide();
                $("#delete-img-info").delay(1000).fadeOut(8000);
            }
        });
    });

    $(".activate").click(function() {
        var i = $(this).val();
        var cur = $(this);
        //alert(i);
        $(this).text('Processing...');
        //$(this).attr("disabled", true);
        var formData = i;
        var u = SITEURL + 'doctor-set-profile-picture' + i;
        //			alert(u);
        $.ajax({
            type: 'GET',
            dataType: "json",
            url: SITEURL + 'doctor-set-profile-picture/' + i,
            success: function(res) {
                if (res == 0) {
                    $("#doc_setting_error").fadeIn(3000);
                    $("#doc-setting-error").delay(1000).fadeOut(8000);
                    cur.attr("disabled", false);
                    cur.text('Save');
                } else {
                    $("#doc-success-pic").fadeIn(3000);
                    $("#doc-success-pic").delay(1000).fadeOut(8000);
                    $(".out").removeClass("btn-danger");
                    $(".out").addClass("btn-primary");
                    $(".out").addClass("in");
                    $(".out").removeClass("out");
                    cur.removeClass("btn-primary");
                    cur.addClass("btn-danger");
                    cur.addClass("out");
                    cur.text("Deactivate");
                }
            }
        });
    });
});