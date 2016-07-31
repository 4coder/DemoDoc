<?php
session_start();
require 'lib/Slim/Slim.php';

Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->config(array(
   //'templates.path' => 'templates'
   'templates.path' => 'service/ui/app'
));
$app->get('/', function () use ($app) {
	//echo "hello word";exit;
	include("conf/config.inc.php"); 
    $app->render('landingpage.php');
});

$app->get('/join', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('join.php');
});
$app->get('/terms', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('terms.php');
});

$app->get('/mailtest', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('test_mail.php');
});
$app->post('/testmail', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act_get_pdf_result.php',$postData); 
});

$app->get('/About', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('About.php');
});
$app->get('/Contact', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('Contact.php');
});

$app->get('/location', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('location.php');
});

$app->get('/insurance', function () use ($app) { 
 include("conf/config.inc.php");
 $app->render('insurance.php'); 
});


$app->get('/Careers', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('Careers.php');
});

$app->get('/join/patient', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('join-patient.php');
});
$app->post('/pdf', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act_get_pdf_result.php',$postData); 
});

$app->get('/pdf1/:dateCnt', function ($dateCnt) use ($app) {
  include("conf/config.inc.php");
  $app->redirect(WEB_ROOT.'/tcpdf/pdf/download_pdf.php?docID='.$dateCnt);
});

$app->get('/checkin-registration/:dateCnt', function ($dateCnt) use ($app) {
	$data['dateCnt'] = $dateCnt;
	$app->render('checkin_registration.php',$data);
});
$app->post('/checkin-registration-load-data', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act_fetch_checkin_registration.php',$postData); 
});
$app->post('/save-checkin-registration', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('save-checkin-registration.php',$postData); 
});
$app->post('/save-checkin-queries', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('save-checkin-queries.php',$postData); 
});
$app->get('/pdf1', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->redirect(WEB_ROOT.'index.php/tcpdf/pdf/download_pdf.php');
});
$app->post('/patient-registration', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act-join-patient.php',$postData); 
});
$app->post('/act-signin-book-doctor', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act-join-patient-book-doctor.php',$postData); 
});

$app->get('/checkin-queries', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('checkin_queries.php');
});
$app->post('/act-delete-appoinments', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act-delete-appoinments.php',$postData); 
});
$app->post('/checkin-queries-load-data', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act_fetch_checkin_queries.php',$postData); 
});

$app->post('/checkin-insurence-load-data', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act_fetch_checkin_insurence.php',$postData); 
});
$app->post('/search-Alpha', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post(); 
	$app->render('search-Alpha.php',$postData); 
});
$app->post('/save-checkin-insurence', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('save-checkin-insurence.php',$postData); 
});

$app->get('/save-checkin-details', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('save-checkin-details.php');
});

$app->get('/checkin-billing', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('checkin_billing.php');
});

$app->get('/join/learnmore', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('whyjoin.php');
});
$app->get('/join/doctor', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('join-doctor.php');
});
$app->post('/doctor-registration', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act-join-doctor.php',$postData); 
});
$app->get('/doctor/profile', function () use ($app) {
	 authenticate($app);										  
	 include("conf/config.inc.php");
	 if($_SESSION['userType']==1){
	 $app->render('doctor-profile.php');}
	 else{
		 $app->redirect(WEB_ROOT.'index.php/signin');}
		 });
$app->get('/patient/profile', function () use ($app) {
	 authenticate($app);
	 include("conf/config.inc.php");
	 if($_SESSION['userType']==2){
	 $app->render('patient-profile.php');}
	 else{
		 $app->redirect(WEB_ROOT.'index.php/signin');}
});
$app->post('/patient/profile/ratingaction', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post(); 
	$app->render('rating-data.php',$postData); 
});
$app->post('/patient/profile/ratingpopup', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post(); 
	$app->render('rating-popup.php',$postData); 
});
$app->post('/rating_pagination', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post(); 
	$app->render('pagination_data.php',$postData); 
});
$app->get('/signin', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('signin.php');
});
$app->post('/act-signin', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act-signin.php',$postData); 
});
$app->post('/load-data', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('load_data.php',$postData); 
});


$app->get('/search(/:seachData)', function ($seachData=NULL) use ($app) {
	 $data['searchData'] = 	$seachData;	
	 $app->render('search.php',$data);
});

$app->get('/book(/:doctorID)', function ($doctorID=NULL) use ($app) {
	 authenticate($app);													  
	 include("conf/config.inc.php");
	 $data['doctorID'] = 	$doctorID;	
	 $app->render('book-appointment.php',$data);
});

$app->get('/view-prrofile(/:doctorID)', function ($doctorID=NULL) use ($app) {
	 include("conf/config.inc.php");
	 $data['doctorID'] = $doctorID;
	 $app->render('view-prrofile.php',$data);
});

$app->post('/advanced-search', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$searchData =  $request->post();
	$app->render('advanced-search.php',$searchData); 
});

$app->post('/act-confirm-apnt', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$searchData =  $request->post();
	$app->render('act-confirm-apnt.php',$searchData); 
});

$app->get('/calendar_events/(:doctorID)', function ($doctorID=NULL) use ($app) {
	$request	= \Slim\Slim::getInstance()->request();
	$data['doctorID'] = $request->params('doctorID');
	$data['start'] = $request->params('start');
	$data['end'] = $request->params('end');
	//print_r($data);
	$app->render('calendar-events.php',$data);
});



$app->get('/past_appoinments', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('past_appoinments.php');
	 
});

$app->get('/patient_settings', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('patient_settings.php');
	 
});

$app->get('/appointment-detail/(:groupID)', function ($groupID=NULL) use ($app) {
	//$groupID AppointmentID-doctorID-patientID
	$data['groupID'] = $groupID;
	$data['apntmnt'] = 1;
	$app->render('calendar-events.php',$data);
});

$app->get('/new-appointment', function () use ($app) {
	//$groupID AppointmentID-doctorID-patientID
	/*$data['groupID'] = $groupID;
	$data['apntmnt'] = 1;*/
	$app->render('new-appointment.php');
});

$app->post('/act-appointment/(:doctorID)', function ($doctorID) use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$postData['doctorID'] = $doctorID;
	$app->render('act-appointment.php',$postData); 
});
$app->post('/appointment/change', function () use ($app) {	
	include("conf/config.inc.php");											   
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act-appointment-change.php',$postData); 
});

$app->post('/doctor-update-details', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act-update-doctor-details.php',$postData); 
});


$app->post('/doctor-update-details1', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act-update-doctor-details1.php',$postData); 
});

//write by arrun begin
$app->post('/doctor-update-profile', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act-update-doctor.php',$postData); 
});

$app->post('/patient-update-profile', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act-update-patientr.php',$postData); 
});

$app->post('/doctor-update-pass', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act-update-doctor-pas.php',$postData); 
});
$app->post('/doctor-file-list', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act-doctor-file.php',$postData); 
});
$app->get('/doctor/profile/settings', function () use ($app) {
	 authenticate($app);										  
	 include("conf/config.inc.php");
	 if($_SESSION['userType']==1){
	 $app->render('doctor-profile-settings.php');}
	 else{
		 $app->redirect(WEB_ROOT.'index.php/signin');}
});
$app->post('/doctor/profile/upload', function () use ($app) {
	 include("conf/config.inc.php");
	 if($_SESSION['userType']==1){
	 $app->render('upload.php');}
	 else{
		 $app->redirect(WEB_ROOT.'index.php/signin');}
	 //$app->render('upload1.php');
	 //print_r($upload_handler);
	/*$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act-signin.php',$postData); */
});
$app->post('/multiple-marker', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('marker1.php');
});
$app->post('/multiple-marker-2', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('marker2.php',$postData); 
});
$app->post('/multiple-marker', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('marker1.php',$postData); 
});



$app->get('/searchBy-name', function () use ($app) {	
	include("conf/config.inc.php");
	$app->render('searchBy-name.php'); 
});


$app->get('/Procedures', function () use ($app) {	
	include("conf/config.inc.php");
	$app->render('Procedures.php'); 
});

$app->post('/search-Procedures', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post(); 
	$app->render('Procedures_data.php',$postData); 
});

$app->get('/Reviews', function () use ($app) { 
 include("conf/config.inc.php");
 $app->render('Reviews.php'); 
});

$app->post('/search-Reviews', function () use ($app) { 
 $request = \Slim\Slim::getInstance()->request();
 $postData =  $request->post(); 
 $app->render('Reviews_data.php',$postData); 
});

$app->get('/Languages', function () use ($app) { 
 include("conf/config.inc.php");
 $app->render('Languages.php'); 
});

$app->post('/search-Languages', function () use ($app) { 
 $request = \Slim\Slim::getInstance()->request();
 $postData =  $request->post(); 
 $app->render('Languages_data.php',$postData); 
});

$app->post('/search-insurance', function () use ($app) { 
 $request = \Slim\Slim::getInstance()->request();
 $postData =  $request->post(); 
 $app->render('insurance_data.php',$postData); 
});

$app->post('/search-location', function () use ($app) { 
 $request = \Slim\Slim::getInstance()->request();
 $postData =  $request->post(); 
 $app->render('location_data.php',$postData); 
});

$app->post('/updateDrWorkTime', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	//print_r($postData);
	$app->render('act-update-doctor-work-time.php',$postData); 
});

$app->post('/updateDrBrkTime', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	//print_r($postData);
	$app->render('act-update-doctor-break-time.php',$postData); 
});

$app->post('/updateDrvecationTime', function () use ($app) {	
	$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	//print_r($postData);
	$app->render('act-update-doctor-vecation-time.php',$postData); 
});

$app->post('/service/public/z_uploads/(:url)', function () use ($app) {
	include("conf/config.inc.php");
	$app->render('upload.php');
	//print_r($upload_handler);
	/*$request	= \Slim\Slim::getInstance()->request();
	$postData =  $request->post();
	$app->render('act-signin.php',$postData); */
});

$app->get('/doctor-set-profile-picture/:imgID', function ($imgID=NULL) use ($app) {
 // $request = \Slim\Slim::getInstance()->request();
 $data['imgID'] = $imgID;
 //echo $imgID;
 //print_r($request->params());
 $app->render('act-set-doc-profile-pic.php',$data);
});

//write by arun end
$app->get('/calendar/test', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->render('demo-calendar.php');
});

$app->get('/single_minicalendar/:dateCnt/:allDoctors/:status', function ($dateCnt,$allDoctors,$status) use ($app) {
	$data['dateCnt'] = $dateCnt;
	$data['status'] = $status;
	$data['allDoctors'] = $allDoctors;
	$app->render('single_calender.php',$data);
});
$app->get('/minicalendar/:dateCnt/:allDoctors/:status', function ($dateCnt,$allDoctors,$status) use ($app) {
	$data['dateCnt'] = $dateCnt;
	$data['status'] = $status;
	$data['allDoctors'] = $allDoctors;
	$app->render('minicalendar.php',$data);
});

$app->get('/appointment/fixing/:apntDatetime/:ins/:subins/:search', function ($apntDatetime,$ins,$subins,$search) use ($app) {
	$data['apntDetails'] = $apntDatetime;	
	$data['ins'] = $ins;	
	$data['subins'] = $subins;	
	$data['search'] = $search;	
	$app->render('schedule-appointment.php',$data);
});

$app->get('/calendar-settings', function () use ($app) {
	$app->render('calendar-settings.php');
});

$app->get('/bookonline/:doctorID', function ($doctorID) use ($app) {
	$data['doctorID'] = $doctorID;						 
	$app->render('bookonline.php',$data);
});

$app->get('/visit-reason/(:specialityID)', function ($specialityID=NULL) use ($app) {
	 include("conf/config.inc.php");
	 $condition = '`speciality_id`="'.$specialityID.'"';
	 $scad->listbox('reasonforvisit','id','name',$condition,'`name` ASC',$selected=NULL);
});


$app->get('/test', function () use ($app) {
	 include("conf/config.inc.php");
	 /*$timeFrame = array(array("1"=>array("start"=>"10:00:00","end"=>"11:00:00")),array("5"=>array("start"=>"01:00:00","end"=>"03:00:00")),array("6"=>array("start"=>"10:00:00","end"=>"12:00:00")),array("7"=>array("start"=>"18:00:00","end"=>"23:00:00")));*/
	 $timeFrame["1"] = array(array("start"=>"10:00:00","end"=>"11:00:00"),array("start"=>"01:00:00","end"=>"03:00:00"),array("start"=>"09:00:00","end"=>"18:00:00"));
	 $timeFrame["5"] = array(array("start"=>"10:00:00","end"=>"11:00:00"),array("start"=>"01:00:00","end"=>"03:00:00"),array("start"=>"09:00:00","end"=>"18:00:00"));
	 $timeFrame["6"] = array(array("start"=>"10:00:00","end"=>"11:00:00"),array("start"=>"01:00:00","end"=>"03:00:00"),array("start"=>"09:00:00","end"=>"18:00:00"));
	 $timeFrame["7"] = array(array("start"=>"10:00:00","end"=>"11:00:00"),array("start"=>"01:00:00","end"=>"03:00:00"),array("start"=>"09:00:00","end"=>"18:00:00"));
	 echo '<pre>';
	 print_r($timeFrame);
	 /*$toMail  = 'aneesh@techware.co.in';
	 $toName  = 'Aneesh';
	 $subject = 'Welcome to Bookmydoc!';
	 $mailTemplate = '<b>Congragulations....!</b>';
	 $scad->mailSending($toMail,$toName,$subject,$mailTemplate);*/
});
$app->get('/sub-insurace-plans/:inuranceID', function ($inuranceID) use ($app) {
	 include("conf/config.inc.php");
	 $scad->listbox('insurance','id','name','`parent_id`='.$inuranceID,'`name` ASC',$selected=NULL);
});

$app->get('/sub-insurace-plans/:inuranceID', function ($inuranceID) use ($app) {
	 include("conf/config.inc.php");
	 $scad->listbox('insurance','id','name','`parent_id`='.$inuranceID,'`name` ASC',$selected=NULL);
});

$app->get('/pdf', function () use ($app) {
	 include("conf/config.inc.php");
	 $app->redirect(WEB_ROOT.'index.php/tcpdf/examples/example_048.php');
});


$app->get('/signout', function () use ($app) {
	 include("conf/config.inc.php");
	 session_destroy();
	 $app->redirect(WEB_ROOT.'index.php/signin');
});

$app->notFound(function() use($app) { 
  $app->render('error.php');
});

function authenticate($app){
	include("conf/config.inc.php");
	if (!isset($_SESSION['userID'])) {
	$app->redirect(WEB_ROOT.'index.php/signin');	
	}
}
$app->run();
?>
