<?php
$docid=$_GET['docID'];
$hostname="localhost";
$user="root";
$password="";
$database="scheduleadoc_db";
$con=mysql_connect($hostname,$user,$password) or die("database not connect");
 mysql_select_db($database,$con) or die("could not select db");
 $res=mysql_query("select * from scad_checkin where id='$docid'");
 $result=mysql_fetch_array($res);

/* echo "<pre>";
 print_r($result);*/
 $regis=json_decode($result['reg_details'],true);
  $medical=json_decode($result['medical_details'],true);
  $insurence=json_decode($result['insurence_details'],true);
/*  print_r($regis);
  print_r($medical);
  print_r($insurence);
  echo $regis['apnt_time'];*/
require_once('tcpdf_include.php');
ob_clean();
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Patient Registration Form');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData('', '', "Patient Registration Form",'Name - '.$regis['fname'].' '.$regis['mname'].' '.$regis['lname'].' ,Date - '.$regis['apnt_time']);

/*// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));*/

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 10);

// add a page
$pdf->AddPage();
//$pdf->Write(0, 'Patient Information', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------
$tbl = <<<EOD
<h1>Patient Information</h1>
<table cellspacing="0" cellpadding="1">
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

<tr >
	<td  colspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">Patients first name<br /><label style="color:#0080FF">$regis[fname]</label></td>
	<td colspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">Patients middle name<br /><label style="color:#0080FF">$regis[mname]</label></td>
	<td colspan="2" style="border-bottom: solid 1pt #ccc;border-top: solid 1pt #ccc;">Patients last name<br /><label style="color:#0080FF">$regis[lname]</label></td>
</tr>

<tr>
	<td style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;">Sex <br /><label style="color:#0080FF">$regis[gender]</label></td>
	<td style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;">Marital Status<br /><label style="color:#0080FF">$regis[marital]</label></td>
	<td colspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;">Date of Birth  <br /><label style="color:#0080FF">$regis[Birthday_day] $regis[Birthday_Month] $regis[Birthday_Year]</label></td>
	<td colspan="2" style="border-bottom: solid 1pt #ccc;">Social Security Number <br /><label style="color:#0080FF">$regis[ssn]</label></td>
</tr>

<tr >
	<td  colspan="3" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">Patient Address <br /><label style="color:#0080FF">$regis[pAddress]</label></td>
	<td  style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">City<br /><label style="color:#0080FF">$regis[pCity]</label></td>
	<td  style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">State<br /><label style="color:#0080FF">$regis[pstate]</label></td>
	<td  style="border-bottom: solid 1pt #ccc;border-top: solid 1pt #ccc;">Zip<br /><label style="color:#0080FF">$regis[pPin]</label></td>
</tr>

<tr >
	<td  colspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;">Home Phone <br /><label style="color:#0080FF">$regis[hnum]</label></td>
	<td colspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;">Mobile Phone<br /><label style="color:#0080FF">$regis[pnum]</label></td>
	<td colspan="2" style="border-bottom: solid 1pt #ccc;">Email Address<br /><label style="color:#0080FF">$regis[email]</label></td>
</tr>

<tr >
	<td   style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">Pharmacy<br /><label style="color:#0080FF">$regis[phar]</label></td>
	<td  colspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">Pharmacy Phone<br /><label style="color:#0080FF">$regis[phnum]</label></td>
	<td  colspan="3" style="border-bottom: solid 1pt #ccc;border-top: solid 1pt #ccc;">Pharmacy Address<br /><label style="color:#0080FF">$regis[phAddress]</label></td>
</tr>

<tr >
	<td  colspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;">Referred by <br /><label style="color:#0080FF">$regis[reff]</label></td>
	<td colspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;">Primary Care Physician<br /><label style="color:#0080FF">$regis[pcp]</label></td>
	<td colspan="2" style="border-bottom: solid 1pt #ccc;">Primary Care Physician Phone<br /><label style="color:#0080FF">$regis[pcpn]</label></td>
</tr>

<tr>
	<td colspan="6" style="border-bottom: solid 1px;"><br /><b>Patient Employer/School Information</b><br /></td>
</tr>



<tr>
	<td  colspan="3" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">Occupation <br /><label style="color:#0080FF">$regis[occupation]</label></td>
	<td  style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">City<br /><label style="color:#0080FF">$regis[pCity]</label></td>
	<td  style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">State<br /><label style="color:#0080FF">$regis[pstate]</label></td>
	<td  style="border-bottom: solid 1pt #ccc;border-top: solid 1pt #ccc;">Zip<br /><label style="color:#0080FF">$regis[pPin]</label></td>
</tr>



</table>


EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
// Billing and Insurance

$tbl = <<<EOD
<h1>Billing and Insurance</h1>
<table cellspacing="0" cellpadding="1">
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
	<td colspan="6" style="border-bottom: solid 1px;"><br /><b>Primary Health Insurance</b><br /></td>
</tr>

<tr >
	<td  colspan="3" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">Insurance Company<br /><label style="color:#0080FF">$insurence[Company_name]</label></td>
	<td colspan="3" style="border-bottom: solid 1pt #ccc;border-top: solid 1pt #ccc;">Plan<br /><label style="color:#0080FF">$insurence[plan]</label></td>
</tr>

<tr>
	<td colspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;">Plan Number <br /><label style="color:#0080FF">$insurence[plan_num]</label></td>
	<td colspan="4" style="border-bottom: solid 1pt #ccc;">Group Number <br /><label style="color:#0080FF">$insurence[GROUP_NUM]</label></td>
</tr>

<tr>
	<td colspan="3" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;">Insureds Name  (as it appears on insurance card or ID) <br /><label style="color:#0080FF">$insurence[employer]</label></td>
	<td colspan="3" style="border-bottom: solid 1pt #ccc;">Insureds Phone Number <br /><label style="color:#0080FF">$insurence[insurednum]</label></td>
</tr>

<tr>
	<td  colspan="3" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">Insureds Address <br /><label style="color:#0080FF">$insurence[iAddress]</label></td>
	<td  style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">City<br /><label style="color:#0080FF">$insurence[bCity]</label></td>
	<td  style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">State<br /><label style="color:#0080FF">$insurence[bstate]</label></td>
	<td  style="border-bottom: solid 1pt #ccc;border-top: solid 1pt #ccc;">Zip<br /><label style="color:#0080FF">$insurence[bPin]</label></td>
</tr>

<tr >
	<td  colspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">Insureds Social Security Number<br /><label style="color:#0080FF">$regis[ssn]</label></td>
	<td colspan="4"   style="border-bottom: solid 1pt #ccc;border-top: solid 1pt #ccc;">Insureds Birthdate<br /><label style="color:#0080FF">$insurence[insureddob]</label></td>
</tr>

<tr>
	<td colspan="6" style="border-bottom: solid 1px;"><br /><b>Secondary Health Insurance</b><br /></td>
</tr>

<tr >
	<td  colspan="3" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">Insurance Company<br /><label style="color:#0080FF">$insurence[sCompany_name]</label></td>
	<td colspan="3" style="border-bottom: solid 1pt #ccc;border-top: solid 1pt #ccc;">Plan<br /><label style="color:#0080FF">$insurence[splan]</label></td>
</tr>

<tr>
	<td colspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;">Plan Number <br /><label style="color:#0080FF">$insurence[splan_num]</label></td>
	<td colspan="4" style="border-bottom: solid 1pt #ccc;">Group Number <br /><label style="color:#0080FF">$insurence[sGROUP_NUM]</label></td>
</tr>

<tr>
	<td colspan="3" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;">Insureds Name  (as it appears on insurance card or ID) <br /><label style="color:#0080FF">$insurence[semployer]</label></td>
	<td colspan="3" style="border-bottom: solid 1pt #ccc;">Insureds Phone Number <br /><label style="color:#0080FF">$insurence[sinsurednum]</label></td>
</tr>

<tr>
	<td  colspan="3" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">Insureds Address <br /><label style="color:#0080FF">$insurence[siAddress]</label></td>
	<td  style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">City<br /><label style="color:#0080FF">$insurence[sbCity]</label></td>
	<td  style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">State<br /><label style="color:#0080FF">$insurence[sbstate]</label></td>
	<td  style="border-bottom: solid 1pt #ccc;border-top: solid 1pt #ccc;">Zip<br /><label style="color:#0080FF">$insurence[sbPin]</label></td>
</tr>

<tr >
	<td  colspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">Insureds Social Security Number<br /><label style="color:#0080FF">$regis[ssn]</label></td>
	<td colspan="4"  style="border-bottom: solid 1pt #ccc;border-top: solid 1pt #ccc;">Insureds Birthdate<br /><label style="color:#0080FF">$insurence[sinsureddob]</label></td>
</tr>


</table>


EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
$tbl = <<<EOD
<br/>
<br/>
<br/>
<br/><br/>
<br/>
<br/><br/>
<br/>
<br/><br/>
<br/>
<br/>
<br/>
<br/>

<table style="margin-top:100px;">
<tr>
<td>Signature of Patient or Authorized Guardian</td>
<td>Date</td>
</tr>
</table>

EOD;
$pdf->writeHTML($tbl, true, false, false, false, '');
// -----------------------------------------------------------------------------
// Billing and Insurance


$tbl = <<<EOD
<h1>Reason for Visit</h1>
<table cellspacing="0" cellpadding="1">
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>


<tr >
	<td  colspan="3" rowspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">What brings you to the office today<br /><label style="color:#0080FF">$medical[reason]</label></td>
	<td colspan="3" style="border-bottom: solid 1pt #ccc;border-top: solid 1pt #ccc;">How is your general health<br /><label style="color:#0080FF">$medical[health]</label></td>
</tr>

<tr >
	<td colspan="3"  style="border-bottom: solid 1pt #ccc;border-top: solid 1pt #ccc;">Do you have any other concerns you would like to address?<br /><label style="color:#0080FF">$medical[concerns]</label></td>
</tr>


<tr>
  <td colspan="3" style="border-bottom: solid 1px;" ><br /><b>Current Medications</b><br /></td>
  <td colspan="3" style="border-bottom: solid 1px;"><br /><b>Allergies</b><br /></td>
</tr>

<tr >
	<td  colspan="3" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">What medications are you currently taking?<br />Name-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="color:#0080FF">$medical[medicine]</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dosage-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="color:#0080FF">$medical[dosage]</label>Frequency-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="color:#0080FF">$medical[Frequency]</label></td>
	<td colspan="3" style="border-bottom: solid 1pt #ccc;border-top: solid 1pt #ccc;">Are you allergic to any of the following?<br /><label style="color:#0080FF">$medical[allergies]</label></td>
</tr>



<tr>
  <td colspan="6" style="border-bottom: solid 1px;"><br /><b>Past Medical History</b><br /></td>
</tr>

<tr >
	<td  colspan="6" style="border-bottom: solid 1pt #ccc;"><label style="color:#0080FF">$medical[history]</label></td>
</tr>

<tr>
  <td colspan="3" style="border-bottom: solid 1px;" ><br /><b>Hospitalizations & Surgeries</b><br /></td>
  <td colspan="3" style="border-bottom: solid 1px;"><br /><b>Women Only</b><br /></td>
</tr>

<tr >
	<td  colspan="3" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;">Reason <br /><label style="color:#0080FF">$medical[hosp]</label></td>
	<td colspan="3" style="border-bottom: solid 1pt #ccc;border-top: solid 1pt #ccc;"># of Pregnancies - <label style="color:#0080FF">$medical[preg]</label>       # of Miscarraiges - <label style="color:#0080FF">$medical[misc]</label>       # of Abortions - <label style="color:#0080FF">$medical[abo]</label>             # of Living - <label style="color:#0080FF">$medical[living]</label></td>
</tr>

<tr >
	<td  colspan="3" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;border-top: solid 1pt #ccc;"Date<br /><label style="color:#0080FF">$medical[Surgeries_Day]/$medical[Surgeries_Month]/$medical[Surgeries_Year]</label>></td>
	<td colspan="3" style="border-bottom: solid 1pt #ccc;">Last Pap Smear - <label style="color:#0080FF">$medical[last]</label>         Last Mammogram - <label style="color:#0080FF">$medical[lastm]</label>     Birth Control Method - <label style="color:#0080FF">$medical[birth]</label></td>
</tr>

<tr>
  <td colspan="6" style="border-bottom: solid 1px;"><br /><b>Family History</b><br /></td>
</tr>

<tr >
	<td  colspan="6" >Has anyone in your family had any of the following conditions?</td>
</tr>

<tr >
	<td  colspan="6" style="border-bottom: solid 1pt #ccc;"><label style="color:#0080FF">$medical[fhistory]</label></td>
</tr>

<tr>
  <td colspan="6" style="border-bottom: solid 1px;"><br /><b>Lifestyle factors</b><br /></td>
</tr>

<tr >
	<td  colspan="6" style="">Are you sexually active?</td>
</tr>

<tr >
	<td  colspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;"><label style="color:#0080FF">$medical[active]</label></td>
	<td  colspan="4" style="border-bottom: solid 1pt #ccc;"># of partners in past year?<label style="color:#0080FF">$medical[partner]</label></td>
</tr>

<tr >
	<td  colspan="6" style="">Do you wish to be checked for STDs?</td>
</tr>

<tr >
	<td  colspan="6" style="border-bottom: solid 1pt #ccc;"><label style="color:#0080FF">$medical[std]</label></td>
	
</tr>

<tr >
	<td  colspan="6" style="">Has anyone in your home ever physically or verbally hurt you?</td>
</tr>

<tr >
	<td  colspan="6" style="border-bottom: solid 1pt #ccc;"><label style="color:#0080FF">$medical[pm]</label></td>
</tr>

<tr >
	<td  colspan="6" style="">Have you ever smoked?</td>
</tr>

<tr >
	<td  colspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;"><label style="color:#0080FF">$medical[smoke]</label></td>
	<td  colspan="4" style="border-bottom: solid 1pt #ccc;"># of packs/day?<label style="color:#0080FF">$medical[packs]</label></td>
</tr>

<tr >
	<td  colspan="6" style="">Do you smoke now?</td>
</tr>

<tr >
	<td  colspan="3" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;"><label style="color:#0080FF">$medical[smokes]</label></td>
	<td  colspan="3" style="border-bottom: solid 1pt #ccc;"># of packs/day?<label style="color:#0080FF">$medical[npacks]</label></td>
</tr>

<tr >
	<td  colspan="6" style="">Do you use recreational drugs?</td>
</tr>

<tr >
	<td  colspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;"><label style="color:#0080FF">$medical[drugs]</label></td>
	<td  colspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;">Type - <label style="color:#0080FF">$medical[type]</label></td>
	<td  colspan="2" style="border-bottom: solid 1pt #ccc;"># times/week?<label style="color:#0080FF">$medical[wtype]</label></td>
</tr>

<tr >
	<td  colspan="6" style="">How much alcohol do you drink per day?</td>
</tr>

<tr >
	<td  colspan="6" style="border-bottom: solid 1pt #ccc;"># drinks/week?<label style="color:#0080FF">$medical[alcohol]</label></td>
</tr>

<tr >
	<td  colspan="6" style="">How much caffeine do you drink per day?</td>
</tr>

<tr >
	<td  colspan="6" style="border-bottom: solid 1pt #ccc;"># drinks/day?<label style="color:#0080FF">$medical[caffeine]</label></td>
</tr>

<tr >
	<td  colspan="6" style="">How offten do you excercise?</td>
</tr>

<tr >
	<td  colspan="2" style="border-bottom: solid 1pt #ccc;border-right: solid 1pt #ccc;"><label style="color:#0080FF">$medical[excr]</label></td>
	<td  colspan="4" style="border-bottom: solid 1pt #ccc;"># of packs/day?<label style="color:#0080FF">$medical[nexcr]</label></td>
</tr>

</table>


EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Bookmydoc'.time().'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
