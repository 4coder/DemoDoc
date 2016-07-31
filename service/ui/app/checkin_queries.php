<?php 
   include("service/ui/common/header.php");   
   ?>
   <link rel="stylesheet" href="<?php echo WEB_ROOT?>service/public/css/checkin.css">
   <link rel="stylesheet" href="<?php echo WEB_ROOT?>service/public/css/token/sumoselect.css">
<style type="text/css">
h3{font-family: font-family: 'Roboto', sans-serif; font-size: 19pt; font-style: normal; font-weight: bold; color:#3699DD;
text-align: center; text-decoration: none; margin-right: 832px; }
table{font-family: Calibri; color:#3499DD; font-size: 11pt; font-style: normal;
text-align:; background-color: #ffffff; border-collapse: collapse; }
table.inner{border: 0px}
</style>

<script type='text/javascript' src='<?php echo WEB_ROOT?>service/public/js/token/jquery.sumoselect.min.js'></script>
 
<section class="team-modern-12">
<div class="hed"><h2 align="center">Check-In</h2></div>
	<div class="main" style="margin-left:7%">
		<h1>Patients Medical History</h1>
       
<form  method="POST" id="queries">
 <h4>Reason for Visit</h4>
	<div class="">
	<div class="detail6">
		<input type="text" name="reason" maxlength="30" placeholder="Reason for Visit"/>
		<select  style="width: 365px; height: 44px; border:1px solid #cccccc; border-radius: 7px;padding:8px; margin-left: 35px;color:#757575; margin-bottom: 15px;" name="health" id="health">
<option value="">Your Health</option>
<option value="Excellent">Excellent</option>
<option value="Good">Good</option>
<option value="Fair">Fair</option>
<option value="Poor">Poor</option>
</select>
</div>
<div class="detail7">
		<input type="text" name="concerns" maxlength="30" placeholder="Other Concerns"/>
		<div style="margin-left: -1px;" class="dob">
<select style="width: 123px; height: 44px; border:1px solid #cccccc; border-radius: 7px; margin-left: 8px; padding:8px; color:#757575" name="medicine" id="medicine">
<option value="">Current Medicine:</option>
<option value="1">1</option>
<option value="2">2</option>
</select>
<select style="width: 122px; height: 44px; border:1px solid #cccccc; border-radius: 7px;padding:8px; color:#757575" id="dosage" name="dosage">
<option value="">Dosage:</option>
<option value="1">1</option>
</select>
<select style="width: 122px; height: 44px; border:1px solid #cccccc; border-radius: 7px;padding:8px; color:#757575" id="frequency" name="Frequency">
<option value="">Frequency:</option>
<option value="1">1</option>
</select>
</div>
<div class="detail8">
		<select multiple="multiple"  class="SlectB" style="width: 332px; height: 29px; border:1px solid #cccccc; border-radius: 7px;padding:8px; margin-left: 8px;color:#757575; margin-bottom: 15px;" name="allergies" id="allergies">
<option value="" disabled>Allergies</option>
<option value="AdhesiveTape">AdhesiveTape</option>
<option value="Barbiturates">Barbiturates</option>
<option value="Codeine">Codeine</option>
<option value="Antibiotics">Antibiotics</option>
<option value="Aspirin">Aspirin</option>
<option value="Sulfa">Sulfa</option>
<option value="Latex">Latex</option>
<option value="Iodine">Iodine</option>
<option value="LocalAnesthetics">LocalAnesthetics</option>
</select>

<select multiple="multiple"  class="SlectBo" style="width: 332px; height: 29px; border:1px solid #cccccc; border-radius: 7px;padding:8px; margin-left: 8px;color:#757575; margin-bottom: 15px;" name="history" id="history">
<option value="" disabled>Medical History</option>
<option value="Alcoholism">Alcoholism</option>
<option value="Allergies">Allergies</option>
<option value="Anemia">Anemia</option>
<option value="AnxietyDisorder">AnxietyDisorder</option>
<option value="Aspirin">Aspirin</option>
<option value="Asthma">Asthma</option>
<option value="AIDS/HIV">AIDS/HIV</option>
<option value="BleedingDisorder">BleedingDisorder</option>
<option value="BloodDisease">BloodDisease</option>
</select>
	</div>
	<h6>Hospitalizations & Surgeries</h6>
	<div class="reason1">
	<input type="text" name="hosp" maxlength="30" placeholder="Reason"/>
	<select style="width: 115px; height: 44px; border:1px solid #cccccc; border-radius: 7px; margin-left: 8px; padding:8px; color:#757575" name="Surgeries_Day" id="Surgeries_Day">
<option value="">Day Of surgery:</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
 
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
 
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
 
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
 
<option value="31">31</option>
</select>
 
<select style="width: 116px; height: 44px; border:1px solid #cccccc; border-radius: 7px;padding:8px; color:#757575" id="Surgeries_Month" name="Surgeries_Month">
<option value="">Month:</option>
<option value="January">Jan</option>
<option value="February">Feb</option>
<option value="March">Mar</option>
<option value="April">Apr</option>
<option value="May">May</option>
<option value="June">Jun</option>
<option value="July">Jul</option>
<option value="August">Aug</option>
<option value="September">Sep</option>
<option value="October">Oct</option>
<option value="November">Nov</option>
<option value="December">Dec</option>
</select>
 
<select style="width: 116px; height: 44px; border:1px solid #cccccc; border-radius: 7px;padding:8px; color:#757575 " name="Surgeries_Year" id="Surgeries_Month">
 
<option value="">Year:</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
 
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
 
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
</select>
</div>	
<div class="reason1">
	
</div>	

<h6>Women's Only</h6>
<div class="women">
	<input type="text" name="preg" maxlength="30" placeholder="# of Pregnancies"/>
	<input type="text" name="misc" maxlength="30" placeholder="# of Miscarraiges"/>
		<input type="text" name="abo" maxlength="30" placeholder="# of Abortion"/>
	<input type="text" name="living" maxlength="30" placeholder="# # of Living"/>
	<input type="text" name="last" maxlength="30" placeholder="# Last Pap Smear"/>
		<input type="text" name="lastm" maxlength="30" placeholder="# Last Mammogram"/>
	<input type="text" name="birth" maxlength="30" placeholder="# Birth Control Method"/>
	</div>
	<h6>Family History</h6>
	<div class="family">
	<select multiple="multiple"  class="SlectBoxx" style="width: 353px; height: 29px; border:1px solid #cccccc; border-radius: 7px;padding:8px; margin-left: 24px;color:#757575; margin-bottom: 15px;" name="history" id="history">
<option value="" disabled>Affected by:</option>
<option value="Alcoholism">Alcoholism</option>
<option value="Allergies">Allergies</option>
<option value="Anemia">Anemia</option>
<option value="AnxietyDisorder">AnxietyDisorder</option>
<option value="Aspirin">Aspirin</option>
<option value="Asthma">Asthma</option>
<option value="AIDS/HIV">AIDS/HIV</option>
<option value="BleedingDisorder">BleedingDisorder</option>
<option value="BloodDisease">BloodDisease</option>
</select>
		
	</div>
	<h6>Life Style</h6>
	<div class="life">
		<div style="margin-left: -361px;width: 100%" class="lifestyle">
<select style="width: 145px; height: 41px; border:1px solid #cccccc; border-radius: 7px; margin-left: 8px; margin-bottom: 15px;padding:8px; color:#757575" name="active" id="active">
<option value="">Sexually Active</option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
<input type="text" name="partner" maxlength="30" placeholder="# of partners in past year" style="width: 170px;"/>

	<select style="width: 353px; height: 41px; border:1px solid #cccccc; border-radius: 7px;padding:8px; margin-left: 8px;color:#757575; margin-bottom: 15px;" name="std" id="std">
<option value="">Checked for STD's:</option>
<option value="yes">yes</option>
<option value="No">No</option>
</select>
	<select style="width: 353px; height: 41px; border:1px solid #cccccc; border-radius: 7px;padding:8px; margin-left: 8px;color:#757575; margin-bottom: 15px;" name="pm" id="pm">
<option value="">Physically or mentally hurted</option>
<option value="yes">yes</option>
<option value="No">No</option>
</select>
</div>
<div class="smoke">
<select style="width: 151px; height: 41px; border:1px solid #cccccc; border-radius: 7px; margin-left: 8px; margin-bottom: 15px;padding:8px; color:#757575" name="smoke" id="smoke">
<option value="">Smoked:</option>
<option value="yes">yes</option>
<option value="No">No</option>
</select>
<input type="text" name="packs" maxlength="30" placeholder="# packs/day" style="width: 166px;"/>
<select style="width: 151px; height: 41px; border:1px solid #cccccc; border-radius: 7px; margin-left: 8px; margin-bottom: 15px;padding:8px; color:#757575" name="smokes" id="smokes">
<option value="">Smokes now:</option>
<option value="yes">yes</option>
<option value="No">No</option>
</select>
<input type="text" name="npacks" maxlength="30" placeholder="# packs/day" style="width: 166px;"/>
<select style="width: 116px; height: 41px; border:1px solid #cccccc; border-radius: 7px; margin-left: 9px; margin-bottom: 15px;padding:8px; color:#757575" name="drugs" id="medicine">
<option value="">Recreational drugs:</option>
<option value="yes">yes</option>
<option value="No">No</option>
</select>
<input type="text" name="type" maxlength="30" placeholder="types" style="width: 91px; margin-left: -1px;"/>
<input type="text" name="wtype" maxlength="30" placeholder="# times/week" style="width: 87px;margin-left: -1px;"/>
</div>
<div class="alc">	
<input type="text" name="alcohol" maxlength="30" placeholder="# alcohol drinks/week"/>		
<input type="text" name="caffeine" maxlength="30" placeholder="# caffeine/day"/>	
<div class="excr">
<select style="width: 151px; height: 41px; border:1px solid #cccccc; border-radius: 7px; margin-left: 8px; margin-bottom: 15px;padding:8px; color:#757575" name="excr" id="excr">
<option value="">Do you Exercise</option>
<option value="yes">yes</option>
<option value="No">No</option>
</select>
<input type="text" name="nexcr" maxlength="30" placeholder="# times/week" style="width: 186px; margin-left: 164px;margin-top: -86px;"/>
	</div>
	</div>
</div>
</div>
<div class="conform_button queries_click">Continue</div>
</div>
<input type="hidden" class="allergies" name="allergies"/> 
<input type="hidden" class="history" name="history"/> 
<input type="hidden" class="fhistory" name="fhistory"/> 
</form>
</div>
<input type="hidden" class="resultis"/> 
<h1 class="info" align="center">Confirm Medical</h1>
<form class="conform_registration" id="query_result" style="margin-left:10%;margin-right:10%">

</form>
</section>
<script type='text/javascript' src='<?php echo WEB_ROOT?>service/public/js/check-in.js'></script>
<?php include("service/ui/common/footer.php"); ?>