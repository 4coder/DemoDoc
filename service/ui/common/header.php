<?php include("conf/config.inc.php");

function pr($arr){
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}
?>
<!DOCTYPE html><head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   <title>Find a Doctor - Doctor Reviews &amp; Ratings | Book Online Instantly � Bookmydoc </title>
   <link rel="shortcut icon" type="image/png" href="<?php echo WEB_ROOT?>service/public/images/favicon.png">
   <link href="<?php echo WEB_ROOT?>service/public/css/common.css" rel="stylesheet">
   <link href="<?php echo WEB_ROOT?>service/public/css/custom.css" rel="stylesheet">
   <link href="<?php echo WEB_ROOT?>service/public/css/style.css" rel="stylesheet">
   <link href="<?php echo WEB_ROOT?>service/public/css/blue.css"  rel="stylesheet">
   <link href="<?php echo WEB_ROOT?>service/public/css/responsive.css" rel="stylesheet">
   <link href="<?php echo WEB_ROOT?>service/public/css/BeatPicker.min.css" rel="stylesheet">
   <link href="<?php echo WEB_ROOT?>service/public/css/font-awesome/font-awesome.css" rel="stylesheet">
   <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700|Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Noto+Sans:400,400italic,700,700italic|PT+Sans+Caption:400,700|Lato:400,100,100italic,300,300italic,400italic,700,700italic|Roboto:400,100italic,100,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<!-- file upload css -->
<link rel="stylesheet" href="<?php echo WEB_ROOT?>service/public/css/fileupload/jquery.fileupload.css">
<link rel="stylesheet" href="<?php echo WEB_ROOT?>service/public/css/fileupload/jquery.fileupload-ui.css">
<!-- <link rel="stylesheet" href="<?php echo WEB_ROOT?>service/public/css/fileupload/jquery.blueimp-gallery.min.css">
CSS adjustments for browsers with JavaScript disabled -->


<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>
<!-- file upload css -->

   <script type='text/javascript' src='<?php echo WEB_ROOT?>service/public/js/jquery.min.js'></script>
 <!--  <script type="text/javascript" src="<?php echo WEB_ROOT?>service/public/js/script.js"></script>-->
   <script type='text/javascript' src='<?php echo WEB_ROOT?>service/public/js/bootstrap.min.js'></script>
   <script type='text/javascript' src='<?php echo WEB_ROOT?>service/public/js/jquery.bootpag.js'></script>

   
   <!-- Camera Slider -->
  <!-- <script type='text/javascript' src='<?php echo WEB_ROOT?>service/public/js/camera/jquery.easing.1.3.js'></script>-->
   <!--<script type='text/javascript' src='<?php echo WEB_ROOT?>service/public/js/camera/camera.min.js'></script>-->
   <!-- Round About Carousel -->
 <!--  <script type="text/javascript" src="<?php echo WEB_ROOT?>service/public/js/jquery.roundabout.min.js"></script>-->
   <!-- tiny carousel script -->
   <!--<script type="text/javascript" src="<?php echo WEB_ROOT?>service/public/js/jquery.tinycarousel.min.js"></script>-->
   <!-- lightbox Script -->
<!--   <script type="text/javascript" src="<?php echo WEB_ROOT?>service/public/js/html5lightbox.js"></script>-->
   <!---->
 <!--  <script type="text/javascript" src="<?php echo WEB_ROOT?>service/public/js/jquery.carouFredSel-6.2.1-packed.js"></script>--> <!--Who We Are Section Crousel  -->
 
	<!--<script type='text/javascript' src='jquery.min.js'></script>-->
    <script type='text/javascript' src='<?php echo WEB_ROOT?>service/public/js/slider/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='<?php echo WEB_ROOT?>service/public/js/slider/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='<?php echo WEB_ROOT?>service/public/js/slider/camera.min.js'></script> 
    
    
   <script type="text/javascript" src="<?php echo WEB_ROOT?>service/public/js/jquery.mousewheel.min.js"></script>
   <script type="text/javascript" src="<?php echo WEB_ROOT?>service/public/js/jquery.touchSwipe.min.js"></script>
   <script type="text/javascript" src='<?php echo WEB_ROOT;?>service/public/js/jquery.base64.min.js'></script>
   <script type="text/javascript" src="<?php echo WEB_ROOT?>service/public/js/parsley.min.js"></script>
   <script type="text/javascript" src="<?php echo WEB_ROOT?>service/public/js/scadcustom.js"></script>
   <!--Date Picker-->
   <link rel="stylesheet" href="<?php echo WEB_ROOT?>service/public/css/BeatPicker.min.css"/>
   <script src="<?php echo WEB_ROOT?>service/public/js/calander/BeatPicker.min.js"></script>
</head>
<!-- Head Ends -->
<body>
   <div class="theme-layout">
   <!--<header class="header2 transparent">-->
   <header class="header2 ">
      <div class="container">
         <div class="logo">
            <a class="active" href="<?php echo WEB_ROOT?>" title=""><img src="<?php echo WEB_ROOT?>service/public/images/logo1.png" alt="" /></a>
         </div>
         <!-- Logo --> 
         <div style="float:right; display:table-cell;padding-top:20px" class='head_logo_right'>
            <div id="fb-like_fblike"  data-hide="true" ></div>
            <ul>
                  <li>
            <input type="button" class="button large darkblue" style=" margin-right:10px;font-family:roboto;font-size:16px;font-weight:bold;" value="FRENCH"/>
          </li>
            <?php if($_SESSION['userID']){ 
               if($_SESSION['userType'] == 1){
               	echo '<a href="'.WEB_ROOT.'index.php/doctor/profile" class="button large orange-1">My Account</a>';
               }else{
               	echo '<a href="'.WEB_ROOT.'index.php/patient/profile" class="button large orange-1">My Account</a>';
               }
                } else {		  ?>
                  <li>
                 <a href="<?php echo WEB_ROOT?>index.php/signin" class="button large "><img src="<?php echo WEB_ROOT?>service/public/images/login.png" alt="">Sign In</a>
               </li><li>
                 <a href="<?php echo WEB_ROOT?>index.php/join" class="button large "><img src="<?php echo WEB_ROOT?>service/public/images/join.png" alt="">Join Now</a>
               </li>
             <?php   }?>
           </ul>
         </div>
      </div>
      
      
      
            <div class="menu-strip">
      <div class="nav_contaner">

      
      <div class="nav">
      <ul>
      <li> <a href="<?php echo WEB_ROOT;?>index.php/search/1" title=""><img src="<?php echo WEB_ROOT?>service/public/images/header/head1.png" alt=""><p> Medical <br> Appointment </p>  </a></li>
      <li> <a href="<?php echo WEB_ROOT;?>index.php/search/2" title=""><img src="<?php echo WEB_ROOT?>service/public/images/header/head2.png" alt=""><p> Dental <br> Appointment </p>  </a></li>
      <li> <a href="<?php echo WEB_ROOT;?>index.php/" title=""><img src="<?php echo WEB_ROOT?>service/public/images/header/head3.png" alt=""><p> Veteran <br> Appointment </p>  </a></li>
      <li> <a href="<?php echo WEB_ROOT;?>index.php/search/4" title=""><img src="<?php echo WEB_ROOT?>service/public/images/header/head4.png" alt=""><p> Therapist <br> Counselor </p>  </a></li>
      <li> <a href="<?php echo WEB_ROOT;?>index.php/search/3" title=""><img src="<?php echo WEB_ROOT?>service/public/images/header/head5.png" alt=""><p> Veterinary <br> Appointments </p>  </a></li>
      <li> <a href="#" title=""><img src="<?php echo WEB_ROOT?>service/public/images/header/head9.png" alt=""><p> Hospital / Clinics <br> Appointments </p>  </a></li>
      <li > <a href="#" title=""><img src="<?php echo WEB_ROOT?>service/public/images/header/head6.png" alt=""><p> Discounted Medical <br> Supplies / Equipments </p>  </a></li>
      <li > <a href="#" title=""><img src="<?php echo WEB_ROOT?>service/public/images/header/head7.png" alt=""><p> Discount <br> Pharmacy </p>  </a></li>
      <li style="border:none;height:103px;"> <a href="#" title=""><img src="<?php echo WEB_ROOT?>service/public/images/header/head8.png" alt=""><p class='tele'> Telehealth <br> </p>  </a></li>
      </ul>
      </div><!-- Menu -->
      
      </div>
      </div>
     
     
     
      <!-- Select Navigation On Responsive Version -->
   </header>
   <!-- Header -->