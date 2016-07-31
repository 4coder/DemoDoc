 $(document).ready(function() {
	searchDisplay();
     var nextDate = '';
	 
  //alert("Top: " + x.top + " Left: " + x.left);


	
	
     $("#next").click(function() {
         var allDoctors = $(".allDoctors").val();
         $(".calender_custom").fadeIn(2000);
         var firstDate = $("#firstDate0").text();
		 $('.reset').css('min-height',208);
		 $('.reset').css('position','relative');
		 $('.reset').css('margin-top','1');
         miniCalendar(firstDate, allDoctors, 'next');
     });
     $("#prev").click(function() {
         var allDoctors = $(".allDoctors").val();
         var firstDate = $("#firstDate0").text();
		 $('.reset').css('min-height',208);
		 $('.reset').css('position','relative');
		 $('.reset').css('margin-top','1');
         miniCalendar(firstDate, allDoctors, 'prev');
     });

     function miniCalendar(dateCnt, allDoctors, status) {
         $.ajax({
             type: 'GET',
             url: SITEURL + 'minicalendar/' + dateCnt + '/' + allDoctors + '/' + status,
             success: function(res) {
                 //$(".calender_custom").slideUp();
                 $(".calender_custom").html(res);
                 $("#firstDate0").text($(".firstDate_0").val());
                 $("#firstDate1").text($(".firstDate_1").val());
                 $("#firstDate2").text($(".firstDate_2").val());
                 $(".test2").hide();
                 myfunction();
                 appointMentRedirect();
				// modalPopup();
				 //$("#bookModel").modal("show");
                 //$(".calender_custom").slideDown(2000);
             }
         });
     }


   function map(){
   var alld=$(".allDoctors").val();
   var arr1=JSON.parse(alld);
   var alls=$(".allDoctors1").val();
   var arr=JSON.parse(alls);
   var slen=arr.length;
   
   var test=$(".allzips").val();
   var test1=JSON.parse(test);
  var len=test1.length;
     var tes=$(".allzips1").val();
   var test2=JSON.parse(tes);
    var locations = test1;
	  var loc_len=locations.length;
	  //console.log(loc_len);
   var len2=test2.length;
var iconURLPrefix = SITEURL1+'service/public/images/';
   var icons=[iconURLPrefix + '1.png',
   iconURLPrefix + '2.png',
   iconURLPrefix + '3.png',
   iconURLPrefix + '4.png',
   iconURLPrefix + '5.png'];
 //  var arr = [ "4", "Pete", "8", "John" ];
//var arr1 = ["4", "John"];
var arr2 = arr;
var arr3 = []

/* for(var j=0; j<arr.length; j++) {
  if((jQuery.inArray( arr1[j], arr )) != '-1' ) {
  arr3.push(jQuery.inArray( arr1[j], arr ))
  arr2[jQuery.inArray( arr1[j], arr )] = iconURLPrefix + '1.png';
  }
}
for(var i=0; i<arr2.length; i++) {
 if((jQuery.inArray( i, arr3 )) == -1 ) {
 arr2[i] = iconURLPrefix + '2.png';
 }
}*/
   /*for(var j=0;j<slen;j++){
   if(array1[j] in array2){
	  // alert(j);
	   //alert(array2[j]);
	    var s = array2.indexOf(array1[j]);
		
	  // icons.splice(s, 0,iconURLPrefix + '1.png' );
	  icons[s]=iconURLPrefix + '1.png';
   }
   else{
	    var s = array1.indexOf(array2[j]);
                //icons.splice(s, 0,iconURLPrefix + '2.png' );
				icons[s]=iconURLPrefix + '2.png';
			}
			
   }
   console.log(icons); */console.log(icons); 
   alert(icons);
    var shadow = {
      anchor: new google.maps.Point(15,33),
      url: iconURLPrefix + 'msmarker.shadow.png'
    };
if(loc_len > 1){
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(61.2, -149.853),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      mapTypeControl: false,
      streetViewControl: false,
      panControl: false,
      zoomControlOptions: {
         position: google.maps.ControlPosition.LEFT_TOP
      }
    });
}
else{
var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(locations[0][1], locations[0][2]),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      mapTypeControl: false,
      streetViewControl: false,
      panControl: false,
      zoomControlOptions: {
         position: google.maps.ControlPosition.LEFT_TOP
      }
    });
}
Array.prototype.compare = function(testArr) {
    if (this.length != testArr.length) return false;
    for (var i = 0; i < testArr.length; i++) {
        if (this[i].compare) { 
            if (!this[i].compare(testArr[i])) return false;
        }
        if (this[i] !== testArr[i]) return false;
    }
    return true;
}
    var infowindow = new google.maps.InfoWindow({
      maxWidth: 260,disableAutoPan: true,alignBottom:true
    });

    var marker;
    var markers = new Array();
    
    // Add the markers and infowindows to the map

    for (var i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon : icons[i],
        shadow: shadow
      });

      markers.push(marker);
      google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
	  google.maps.event.addListener(marker, 'mouseout', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.close(map, marker);
        }
      })(marker, i));
      
    /*  iconCounter++;

      // We only have a limited number of possible icon colors, so we may have to restart the counter

      if(iconCounter >= icons_length){
       iconCounter = 0;
      }*/
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
if(loc_len > 1){
   AutoCenter();
}
   }
     var Data = $("#searchData").val();

     function loadData(page) {
         $("#searchLoading").show();
         var allDoctors = $("#allDoctors").val();
         //miniCalendar(0, allDoctors, 'first');
         $(".calender_custom").hide();
         $.ajax({
             type: "POST",
             url: SITEURL + "load-data",
             data: {
                 "page": page,
                 "search": Data
             },
             success: function(msg) {

                 $(".dr_pfl_thumb").html(msg);
                 searchDisplay();

                 var allZipData = $(".allzips").val();
                 var allDoctors = $(".allDoctors").val();
                 if (allZipData == 'none') {
                     $(".dr_pfl_map").hide();
                     $(".calender_custom").hide();
                     $(".dr_pfl_clndr_hd").hide();
                     $(".pagination").hide();
                 } else {
                     $(".dr_pfl_map").show();
                     $(".calender_custom").show();
                     $(".dr_pfl_clndr_hd").show();
                     map();
                     miniCalendar(0, allDoctors, 'first');
					 modalPopup();
                 }

                 //$(".calender_custom").show();
                 //$("#nextPrev").show();
                 $("#searchLoading").hide();
                 window.scrollTo(0, 0);
             }
         });
     }
     loadData(1); // For first time page load default results
     $('.dr_pfl_thumb .pagination li.acti').live('click', function() {
         var page = $(this).attr('p');
         loadData(page);
     });
     $('.dr_pfl_nav').affix({
         offset: {
             top: $('header').height()
         }
     });
	/* $('.dr_pfl_map').affix({
         offset: {
             top: $('header').height()
         }
     });*/

 

 });
 
   function modalPopup(){
	$(".dr_bkonline").click(function(){
									 var x=$(this).position();
    //alert("Top position: " + x.top + " Left position: " + x.left);
									 $(".con").html('');
									 $(".popup_load").show();
		var docID = $(this).attr("target");
		 $.ajax({
             type: 'GET',
             url: SITEURL + 'bookonline/' + docID,
             success: function(res) {
				var outData = JSON.parse(res);
				//console.log(outData);
				var profIMage = SITEURL+'service/public/z_uploads/doctor/small/'+outData.imageName;
				var html = '';
				//html += '<div class="bkng_online_popupmain " style="background-color:#FFF; border-radius:6px;position:absolute;">';
				//html +='<div class="popup_load" style="z-index:999;"></div>';
				html +='<div class="show2" style="">';
				html += '<div class="bkng_online_popup_clm1">'; 
				//html += '<div id="apntPop" class="bkng_popup_close"></div>';
				html += '<div class="bkng_online_popup_drdtls">';
				html += '<div class="bkng_popup_adrs_mainn">';
				html += '<img src="'+SITEURL+'service/public/z_uploads/doctor/small/'+outData.imageName+'" align="left" alt="">';
				html += '<div class="bkng_popup_adrs">';
				html += '<h1>'+outData.firstname+' '+outData.lastname+'</h1>';
				html += '<p><b> '+outData.speciality+' </b> <br> '+outData.address+' </p>';
				html += '</div>';
				html += '</div>';
				html += '</div>';       
				html += '<div id="popMap" class="bkng_online_popup_map"></div>';
				html += '</div>';
				html += '<div style="float:left; height:30px; background:#fff;">';
				html += '<div class="dr_profle_clndr_prv"> <a id="prev1" style="cursor:pointer;"> Pre </a>  </div>';
				html += '<div class="dr_profle_clndr_adrs"> '+outData.address+'  </div>';
				html += '<div class="dr_profle_clndr_nxt"> <a id="next1" style="cursor:pointer;"> Next </a>  </div>';
				html += '</div>';
				html += '<div class="calender" ></div>';
				html += '<div class="clearfix"></div>';
				html +='</div>';
				html +='<input type="hidden" class="docidpop" value="'+outData.id+'" />';
				//html += '</div>';
				setTimeout(function(){$(".popup_load").hide();$(".con").html(html);poupupClose();
				mapMArking(outData.address,outData.latitude,outData.longitude);
				miniCalendar1(0,outData.id,'first');}, 3000);
				//$(".con").html(html);
				//console.log(outData.address,outData.latitude,outData.longitude);
				
             }
         });
	$("#bookModel").modal("show");
	 $("#apntPop").show();
	});
}
function calevents(){
	$("#next1").click(function(){
							  var allDoctors = $(".docidpop").val();
		var firstDate=$(".firstDate_0").val();
		res=firstDate.split(" ");
		miniCalendar1(res[1],allDoctors,'next');
	});
	$("#prev1").click(function(){
							  var allDoctors = $(".docidpop").val();
		var firstDate=$(".firstDate_0").val();
		res=firstDate.split(" ");
		miniCalendar1(res[1],allDoctors,'prev');
	});	
	}
function poupupClose(){
		$("#apntPop").click(function(){
		$("#bookModel").modal("hide");
		$("#apntPop").hide();
	});
}
function mapMArking(address,latitude,longitude){
		//var locations = [[address+','+latitude+','+longitude+','+4]];
		var locations = [[address,latitude,longitude,4]];
		var map = new google.maps.Map(document.getElementById('popMap'), {
		zoom: 10,
		center: new google.maps.LatLng(latitude,longitude),
		mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
		icon: SITEURL+'service/public/images/1.png'
      });

      google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }

}
function miniCalendar1(dateCnt,allDoctors,status){
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
				calevents();
				myfunction();
				appointMentRedirect();
			//$(".calender_custom").slideDown(2000);
		}
	});
}
	 function appointMentRedirect(){
   	 $(".appointDate").click(function(){
   		var data = $.base64.encode(this.id);
   		//window.location.href = SITEURL + 'appointment/fixing/'+data;
		window.location.href = SITEURL + 'appointment/fixing/'+data+'/0/0/0';
   	 });	
   }
