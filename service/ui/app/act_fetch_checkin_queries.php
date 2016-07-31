<?php
include("./conf/config.inc.php");
$Data = $_POST;
?>
<h1>Basic Info</h1>
<table class="table  table-striped  " >

<tr>
<th colspan="3">Reason for visit</th>
</tr>

<tr>
<td style="color:#000;">Why you are book this appointment?</td>
<td style="color:#666;" class="name"><?php  if(empty($Data[reason])){echo "No response";}else{echo $Data[reason];}?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>
<tr style="display:none" class="datas">
<td><input type="text" name="reason" maxlength="30" placeholder="Reason for Visit" value="<?php echo $Data[reason];?>"/><br >
<input type="button" value="submit" class="save1 submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td>
<td></td>
</tr>

<tr>
<td style="color:#000;">Do you have any other concerns you whould like to address?</td>
<td style="color:#666;" class="name"><?php  if(empty($Data[concerns])){echo "No response";}else{echo $Data[concerns];}?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>
<tr style="display:none" class="datas">
<td><input type="text" name="concerns" maxlength="30" placeholder="Reason for Visit" value="<?php echo $Data[concerns];?>"/><br >
<input type="button" value="submit" class="save1 submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td>
<td></td>
</tr>

<tr>
<td style="color:#000;">How is your general health?</td>
<td style="color:#666;" class="name"><?php  if(empty($Data[health])){echo "No response";}else{echo $Data[health];}?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>
<tr style="display:none" class="datas">
<td><select  style="width: 365px; height: 44px; border:1px solid #cccccc; border-radius: 7px;padding:8px; color:#757575; margin-bottom: 15px;" name="health" id="health">
<option value="-1">Your Health</option>
<option value="Excellent" <?php if($Data[health]=="Excellent"){echo "selected";} ?>>Excellent</option>
<option value="Good" <?php if($Data[health]=="Good") {echo "selected";} ?>>Good</option>
<option value="Fair" <?php if($Data[health]=="Fair") {echo "selected";} ?>>Fair</option>
<option value="Poor" <?php if($Data[health]=="Poor") {echo "selected";} ?>>Poor</option>
</select><br >
<input type="button" value="submit" class="save1 submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td>
<td></td>
</tr>

<tr>
<th colspan="3">Allergies & Medications</th>
</tr>

<tr>
<td style="color:#000;">Do you have any allergies?</td>
<td style="color:#666;" class="name"><?php  if(empty($Data[allergies])){echo "No response";}else{echo $Data[allergies];}?></td>
<td class="editthis" style="cursor:pointer">Edit </td>
<?php
$str = explode(",",$Data[allergies]);
$cnt = count($str);
?>
</tr>
<tr style="display:none" class="datas">

<td><select multiple="multiple"  class="SlectiB" style="width: 332px; height: 29px; border:1px solid #cccccc; border-radius: 7px;padding:8px; margin-left: 8px;color:#757575; margin-bottom: 15px;" name="allergies" id="allergies">
<option value="" disabled>Allergies</option>
<option value="AdhesiveTape" <?php if(in_array("AdhesiveTape",$str)){echo "selected";}?>>AdhesiveTape</option>
<option value="Barbiturates" <?php if(in_array("Barbiturates",$str)){echo "selected";}?>>Barbiturates</option>
<option value="Codeine" <?php if(in_array("Codeine",$str)){echo "selected";}?>>Codeine</option>
<option value="Antibiotics" <?php if(in_array("Antibiotics",$str)){echo "selected";}?>>Antibiotics</option>
<option value="Aspirin" <?php if(in_array("Aspirin",$str)){echo "selected";}?>>Aspirin</option>
<option value="Sulfa" <?php if(in_array("Sulfa",$str)){echo "selected";}?>>Sulfa</option>
<option value="Latex" <?php if(in_array("Latex",$str)){echo "selected";}?>>Latex</option>
<option value="Iodine" <?php if(in_array("Iodine",$str)){echo "selected";}?>>Iodine</option>
<option value="LocalAnesthetics" <?php if(in_array("LocalAnesthetics",$str)){echo "selected";}?>>LocalAnesthetics</option>
</select><br >
<input type="button" value="submit" class="save1 submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td>
<td></td>
</tr>

<tr>
<td style="color:#000;">What medicationes are you currently taking?</td>
<td style="color:#666;" class="name"><?php  if(empty($Data[medicine]) && empty($Data[dosage]) && empty($Data[Frequency])){echo "No response";}else{echo "medicine - ".$Data[medicine]."<br>dosage - ".$Data[dosage]."<br>Frequency - ".$Data[Frequency];}?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>
<tr style="display:none" class="datas">
<td><select style="width: 123px; height: 44px; border:1px solid #cccccc; border-radius: 7px; margin-left: 8px; margin-bottom: 15px;padding:8px; color:#757575" name="medicine" id="medicine">
<option value="">Current Medicine:</option>
<option value="1" <?php if($Data[medicine]==1) {echo "selected";}  ?>>1</option>
<option value="2" <?php if($Data[medicine]==2) {echo "selected";} ?>>2</option>
</select>
<select style="width: 122px; height: 44px; border:1px solid #cccccc; border-radius: 7px;padding:8px; color:#757575" id="dosage" name="dosage">
<option value="">Dosage:</option>
<option value="1" <?php if($Data[dosage]==1) {echo "selected";}  ?>>1</option>
</select>
<select style="width: 122px; height: 44px; border:1px solid #cccccc; border-radius: 7px;padding:8px; color:#757575" id="frequency" name="Frequency">
<option value="">Frequency:</option>
<option value="1" <?php if($Data[Frequency]==1) {echo "selected";}  ?>>1</option>
</select><br >
<input type="button" value="submit" class="save1 submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td>
<td></td>
</tr>

</table>


<h1>Medical History</h1>
<table class="table  table-striped  " >

<tr>
<th colspan="3">Past conditions</th>
</tr>

<tr>
<td style="color:#000;">Have you ever had any of these conditions?</td>
<td style="color:#666;" class="name"><?php  if(empty($Data[history])){echo "No response";}else{echo $Data[history];}?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>
<?php
$str1 = explode(",",$Data[history]);
?>
<tr style="display:none" class="datas">
<td><select multiple="multiple"  class="SlectiBo" style="width: 332px; height: 29px; border:1px solid #cccccc; border-radius: 7px;padding:8px; margin-left: 8px;color:#757575; margin-bottom: 15px;" name="history" id="history">
<option value="" disabled>Medical History</option>
<option value="Alcoholism" <?php if(in_array("Alcoholism",$str1)){echo "selected";}?>>Alcoholism</option>
<option value="Allergies" <?php if(in_array("Allergies",$str1)){echo "selected";}?>>Allergies</option>
<option value="Anemia" <?php if(in_array("Anemia",$str1)){echo "selected";}?>>Anemia</option>
<option value="AnxietyDisorder" <?php if(in_array("AnxietyDisorder",$str1)){echo "selected";}?>>AnxietyDisorder</option>
<option value="Aspirin" <?php if(in_array("Aspirin",$str1)){echo "selected";}?>>Aspirin</option>
<option value="Asthma" <?php if(in_array("Asthma",$str1)){echo "selected";}?>>Asthma</option>
<option value="AIDS/HIV" <?php if(in_array("AIDS/HIV",$str1)){echo "selected";}?>>AIDS/HIV</option>
<option value="BleedingDisorder" <?php if(in_array("BleedingDisorder",$str1)){echo "selected";}?>>BleedingDisorder</option>
<option value="BloodDisease" <?php if(in_array("BloodDisease",$str1)){echo "selected";}?>>BloodDisease</option>
</select><br >
<input type="button" value="submit" class="save1 submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td>
<td></td>
</tr>

<tr>
<th colspan="3">Family history</th>
</tr>

<tr>
<td style="color:#000;">Has your family ever had any of these conditions?</td>
<td style="color:#666;" class="name"><?php  if(empty($Data[fhistory])){echo "No response";}else{echo $Data[fhistory];}?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>
<?php
$str2 = explode(",",$Data[fhistory]);
?>
<tr style="display:none" class="datas">
<td><select multiple="multiple"  class="SlectiBoxx" style="width: 353px; height: 29px; border:1px solid #cccccc; border-radius: 7px;padding:8px; margin-left: 24px;color:#757575; margin-bottom: 15px;" name="history" id="history">
<option value="" disabled>Affected by:</option>
<option value="Alcoholism" <?php if(in_array("Alcoholism",$str2)){echo "selected";}?>>Alcoholism</option>
<option value="Allergies" <?php if(in_array("Allergies",$str2)){echo "selected";}?>>Allergies</option>
<option value="Anemia" <?php if(in_array("Anemia",$str2)){echo "selected";}?>>Anemia</option>
<option value="AnxietyDisorder" <?php if(in_array("AnxietyDisorder",$str2)){echo "selected";}?>>AnxietyDisorder</option>
<option value="Aspirin" <?php if(in_array("Aspirin",$str2)){echo "selected";}?>>Aspirin</option>
<option value="Asthma" <?php if(in_array("Asthma",$str2)){echo "selected";}?>>Asthma</option>
<option value="AIDS/HIV" <?php if(in_array("AIDS/HIV",$str2)){echo "selected";}?>>AIDS/HIV</option>
<option value="BleedingDisorder" <?php if(in_array("BleedingDisorder",$str2)){echo "selected";}?>>BleedingDisorder</option>
<option value="BloodDisease" <?php if(in_array("BloodDisease",$str2)){echo "selected";}?>>BloodDisease</option>
</select><br >
<input type="button" value="submit" class="save1 submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td>
<td></td>
</tr>



<tr>
<th colspan="3">Hospitalizations & Surgeries</th>
</tr>

<tr>
<td style="color:#000;">Have you ever been hospitalized?</td>
<td style="color:#666;" class="name"><?php  if(empty($Data[hosp])){echo "No response";}else{echo $Data[hosp];}?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>
<tr style="display:none" class="datas">
<td><input type="text" name="concerns" maxlength="30" placeholder="Reason for Visit" value="<?php echo $Data[hosp];?>"/><br >
<input type="button" value="submit" class="save1 submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td><select style="width: 115px; height: 44px; border:1px solid #cccccc; border-radius: 7px; margin-left: 8px; margin-bottom: 15px;padding:8px; color:#757575" name="Surgeries_Day" id="Surgeries_Day">
<option value="">Day Of surgery:</option>
<option value="1"  <?php if($Data[Surgeries_Day]==1) {echo "selected";}  ?>>1</option>
<option value="2"  <?php if($Data[Surgeries_Day]==2) {echo "selected";}  ?>>2</option>
<option value="3"  <?php if($Data[Surgeries_Day]==3) {echo "selected";}  ?>>3</option>
 
<option value="4"  <?php if($Data[Surgeries_Day]==4) {echo "selected";}  ?>>4</option>
<option value="5"  <?php if($Data[Surgeries_Day]==5) {echo "selected";}  ?>>5</option>
<option value="6"  <?php if($Data[Surgeries_Day]==6) {echo "selected";}  ?>>6</option>
<option value="7"  <?php if($Data[Surgeries_Day]==7) {echo "selected";}  ?>>7</option>
<option value="8"  <?php if($Data[Surgeries_Day]==8) {echo "selected";}  ?>>8</option>
<option value="9"  <?php if($Data[Surgeries_Day]==9) {echo "selected";}  ?>>9</option>
<option value="10"  <?php if($Data[Surgeries_Day]==10) {echo "selected";}  ?>>10</option>
<option value="11"  <?php if($Data[Surgeries_Day]==11) {echo "selected";}  ?>>11</option>
<option value="12"  <?php if($Data[Surgeries_Day]==12) {echo "selected";}  ?>>12</option>
 
<option value="13"  <?php if($Data[Surgeries_Day]==13) {echo "selected";}  ?>>13</option>
<option value="14"  <?php if($Data[Surgeries_Day]==14) {echo "selected";}  ?>>14</option>
<option value="15"  <?php if($Data[Surgeries_Day]==15) {echo "selected";}  ?>>15</option>
<option value="16"  <?php if($Data[Surgeries_Day]==16) {echo "selected";}  ?>>16</option>
<option value="17"  <?php if($Data[Surgeries_Day]==17) {echo "selected";}  ?>>17</option>
<option value="18"  <?php if($Data[Surgeries_Day]==18) {echo "selected";}  ?>>18</option>
<option value="19"  <?php if($Data[Surgeries_Day]==19) {echo "selected";}  ?>>19</option>
<option value="20"  <?php if($Data[Surgeries_Day]==20) {echo "selected";}  ?>>20</option>
<option value="21"  <?php if($Data[Surgeries_Day]==21) {echo "selected";}  ?>>21</option>
 
<option value="22"  <?php if($Data[Surgeries_Day]==22) {echo "selected";}  ?>>22</option>
<option value="23"  <?php if($Data[Surgeries_Day]==23) {echo "selected";}  ?>>23</option>
<option value="24"  <?php if($Data[Surgeries_Day]==24) {echo "selected";}  ?>>24</option>
<option value="25"  <?php if($Data[Surgeries_Day]==25) {echo "selected";}  ?>>25</option>
<option value="26"  <?php if($Data[Surgeries_Day]==26) {echo "selected";}  ?>>26</option>
<option value="27"  <?php if($Data[Surgeries_Day]==27) {echo "selected";}  ?>>27</option>
<option value="28"  <?php if($Data[Surgeries_Day]==28) {echo "selected";}  ?>>28</option>
<option value="29"  <?php if($Data[Surgeries_Day]==29) {echo "selected";}  ?>>29</option>
<option value="30"  <?php if($Data[Surgeries_Day]==30) {echo "selected";}  ?>>30</option>
 
<option value="31"  <?php if($Data[Surgeries_Day]==31) {echo "selected";}  ?>>31</option>
</select>
<select style="width: 116px; height: 44px; border:1px solid #cccccc; border-radius: 7px;padding:8px; color:#757575" id="Surgeries_Month" name="Surgeries_Month">
<option value="">Month:</option>
<option value="January"  <?php if($Data[Surgeries_Month]=="January") {echo "selected";}  ?>>Jan</option>
<option value="February"  <?php if($Data[Surgeries_Month]=="February") {echo "selected";}  ?>>Feb</option>
<option value="March"  <?php if($Data[Surgeries_Month]=="March") {echo "selected";}  ?>>Mar</option>
<option value="April"  <?php if($Data[Surgeries_Month]=="April") {echo "selected";}  ?>>Apr</option>
<option value="May"  <?php if($Data[Surgeries_Month]=="May") {echo "selected";}  ?>>May</option>
<option value="June"  <?php if($Data[Surgeries_Month]=="June") {echo "selected";}  ?>>Jun</option>
<option value="July"  <?php if($Data[Surgeries_Month]=="July") {echo "selected";}  ?>>Jul</option>
<option value="August"  <?php if($Data[Surgeries_Month]=="August") {echo "selected";}  ?>>Aug</option>
<option value="September"  <?php if($Data[Surgeries_Month]=="September") {echo "selected";}  ?>>Sep</option>
<option value="October"  <?php if($Data[Surgeries_Month]=="October") {echo "selected";}  ?>>Oct</option>
<option value="November"  <?php if($Data[Surgeries_Month]=="November") {echo "selected";}  ?>>Nov</option>
<option value="December"  <?php if($Data[Surgeries_Month]=="December") {echo "selected";}  ?>>Dec</option>
</select>
<select style="width: 116px; height: 44px; border:1px solid #cccccc; border-radius: 7px;padding:8px; color:#757575 " name="Surgeries_Year" id="Surgeries_Year">
 
<option value="">Year:</option>
<option value="2012"  <?php if($Data[Surgeries_Year]==2012) {echo "selected";}  ?>>2012</option>
<option value="2011"  <?php if($Data[Surgeries_Year]==2011) {echo "selected";}  ?>c>2011</option>
<option value="2010"  <?php if($Data[Surgeries_Year]==2010) {echo "selected";}  ?>>2010</option>
<option value="2009"  <?php if($Data[Surgeries_Year]==2009) {echo "selected";}  ?>>2009</option>
<option value="2008"  <?php if($Data[Surgeries_Year]==2008) {echo "selected";}  ?>>2008</option>
<option value="2007"  <?php if($Data[Surgeries_Year]==2007) {echo "selected";}  ?>>2007</option>
<option value="2006"  <?php if($Data[Surgeries_Year]==2006) {echo "selected";}  ?>>2006</option>
<option value="2005"  <?php if($Data[Surgeries_Year]==2005) {echo "selected";}  ?>>2005</option>
<option value="2004"  <?php if($Data[Surgeries_Year]==2004) {echo "selected";}  ?>>2004</option>
<option value="2003"  <?php if($Data[Surgeries_Year]==2003) {echo "selected";}  ?>>2003</option>
<option value="2002"  <?php if($Data[Surgeries_Year]==2002) {echo "selected";}  ?>>2002</option>
<option value="2001"  <?php if($Data[Surgeries_Year]==2001) {echo "selected";}  ?>>2001</option>
<option value="2000"  <?php if($Data[Surgeries_Year]==2000) {echo "selected";}  ?>>2000</option>
 
<option value="1999"  <?php if($Data[Surgeries_Year]==1999) {echo "selected";}  ?>>1999</option>
<option value="1998"  <?php if($Data[Surgeries_Year]==1998) {echo "selected";}  ?>>1998</option>
<option value="1997"  <?php if($Data[Surgeries_Year]==1997) {echo "selected";}  ?>>1997</option>
<option value="1996"  <?php if($Data[Surgeries_Year]==1996) {echo "selected";}  ?>>1996</option>
<option value="1995"  <?php if($Data[Surgeries_Year]==1995) {echo "selected";}  ?>>1995</option>
<option value="1994"  <?php if($Data[Surgeries_Year]==1994) {echo "selected";}  ?>>1994</option>
<option value="1993"  <?php if($Data[Surgeries_Year]==1993) {echo "selected";}  ?>>1993</option>
<option value="1992"  <?php if($Data[Surgeries_Year]==1992) {echo "selected";}  ?>>1992</option>
<option value="1991"  <?php if($Data[Surgeries_Year]==1991) {echo "selected";}  ?>>1991</option>
<option value="1990"  <?php if($Data[Surgeries_Year]==1990) {echo "selected";}  ?>>1990</option>
 
<option value="1989"  <?php if($Data[Surgeries_Year]==1989) {echo "selected";}  ?>>1989</option>
<option value="1988"  <?php if($Data[Surgeries_Year]==1988) {echo "selected";}  ?>>1988</option>
<option value="1987"  <?php if($Data[Surgeries_Year]==1987) {echo "selected";}  ?>>1987</option>
<option value="1986"  <?php if($Data[Surgeries_Year]==1986) {echo "selected";}  ?>>1986</option>
<option value="1985"  <?php if($Data[Surgeries_Year]==1985) {echo "selected";}  ?>>1985</option>
<option value="1984"  <?php if($Data[Surgeries_Year]==1984) {echo "selected";}  ?>>1984</option>
<option value="1983"  <?php if($Data[Surgeries_Year]==1983) {echo "selected";}  ?>>1983</option>
<option value="1982"  <?php if($Data[Surgeries_Year]==1982) {echo "selected";}  ?>>1982</option>
<option value="1981"  <?php if($Data[Surgeries_Year]==1981) {echo "selected";}  ?>>1981</option>
<option value="1980"  <?php if($Data[Surgeries_Year]==1980) {echo "selected";}  ?>>1980</option>
</select></td>
<td></td>
</tr>


</table>


<h1>Lifestyle</h1>
<table class="table  table-striped  " >

<tr>
<th colspan="3">Social History</th>
</tr>

<tr>
<td style="color:#000;">Are you sexually active?</td>
<td style="color:#666;" class="name"><?php  if(empty($Data[active])){echo "No response";}else{echo $Data[active];}?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>
<tr style="display:none" class="datas">
<td><select style="width: 145px; height: 41px; border:1px solid #cccccc; border-radius: 7px; margin-left: 8px; margin-bottom: 15px;padding:8px; color:#757575" name="active" id="active">
<option value="">Sexually Active</option>
<option value="Yes" <?php if($Data[active]=="Yes"){echo "selected";} ?>>Yes</option>
<option value="No" <?php if($Data[active]=="No"){echo "selected";} ?>>No</option>
</select><br >
<input type="button" value="submit" class="save1 submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td>
<td></td>
</tr>

<tr>
<td style="color:#000;">Do you drink alcohol?</td>
<td style="color:#666;" class="name"><?php  if(empty($Data[alcohol])){echo "No response";}else{echo $Data[alcohol];}?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>
<tr style="display:none" class="datas">
<td><input type="text" name="alcohol" maxlength="30" placeholder="# alcohol drinks/week" value="<?php echo $Data[alcohol]; ?>"/>	<br >
<input type="button" value="submit" class="save1 submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td>
<td></td>
</tr>

<tr>
<td style="color:#000;">Do you smoke?</td>
<td style="color:#666;" class="name"><?php  if(empty($Data[smoke])){echo "No response";}else{echo $Data[smoke];}?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>
<tr style="display:none" class="datas">
<td><select style="width: 151px; height: 41px; border:1px solid #cccccc; border-radius: 7px; margin-left: 8px; margin-bottom: 15px;padding:8px; color:#757575" name="smoke" id="smoke">
<option value="">Smoked:</option>
<option value="yes" <?php if($Data[smoke]=="yes"){echo "selected";} ?>>yes</option>
<option value="No" <?php if($Data[smoke]=="No"){echo "selected";} ?>>No</option>
</select><input type="text" name="packs" maxlength="30" placeholder="# packs/day" style="width: 166px;" value="<?php echo $Data[packs]; ?>"/><br >
<input type="button" value="submit" class="save1 submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td><select style="width: 151px; height: 41px; border:1px solid #cccccc; border-radius: 7px; margin-left: 8px; margin-bottom: 15px;padding:8px; color:#757575" name="smokes" id="smokes">
<option value="">Smokes now:</option>
<option value="yes" <?php if($Data[smokes]=="yes"){echo "selected";} ?>>yes</option>
<option value="No" <?php if($Data[smokes]=="No"){echo "selected";} ?>>No</option>
</select>
<input type="text" name="npacks" maxlength="30" value="<?php echo $Data[npacks]; ?>" placeholder="# packs/day" style="width: 166px;"/></td>
<td></td>
</tr>


<tr>
<td style="color:#000;">Do you use recreational drugs?</td>
<td style="color:#666;" class="name"><?php  if(empty($Data[drugs])){echo "No response";}else{echo $Data[drugs];}?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>
<tr style="display:none" class="datas">
<td><select style="width: 116px; height: 41px; border:1px solid #cccccc; border-radius: 7px; margin-left: 9px; margin-bottom: 15px;padding:8px; color:#757575" name="drugs" id="medicine">
<option value="">Recreational drugs:</option>
<option value="yes" <?php if($Data[drugs]=="yes"){echo "selected";} ?>>yes</option>
<option value="No" <?php if($Data[drugs]=="No"){echo "selected";} ?>>No</option>
</select>
<input type="text" name="type" maxlength="30" placeholder="types" value="<?php echo $Data[type]; ?>" style="width: 91px; margin-left: -1px;"/>
<input type="text" name="wtype" maxlength="30" placeholder="# times/week" value="<?php echo $Data[wtype]; ?>" style="width: 87px;margin-left: -1px;"/>
<br >
<input type="button" value="submit" class="save1 submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td>
<td></td>
</tr>

<tr>
<td style="color:#000;">How many caffeinated drinks do you have per day?</td>
<td style="color:#666;" class="name"><?php  if(empty($Data[caffeine])){echo "No response";}else{echo $Data[caffeine];}?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>
<tr style="display:none" class="datas">
<td><input type="text" name="caffeine" maxlength="30" placeholder="# caffeine/day" value="<?php echo $Data[caffeine]; ?>"/><br >
<input type="button" value="submit" class="save1 submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td>
<td></td>
</tr>

<tr>
<td style="color:#000;">Has anyone in your home ever physically or verbally hurt you?</td>
<td style="color:#666;" class="name"><?php  if(empty($Data[pm])){echo "No response";}else{echo $Data[pm];}?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>
<tr style="display:none" class="datas">
<td>	<select style="width: 353px; height: 41px; border:1px solid #cccccc; border-radius: 7px;padding:8px; margin-left: 8px;color:#757575; margin-bottom: 15px;" name="pm" id="pm">
<option value="">Physically or mentally hurted</option>
<option value="yes" <?php if($Data[pm]=="yes"){echo "selected";} ?>>yes</option>
<option value="No" <?php if($Data[pm]=="No"){echo "selected";} ?>>No</option>
</select><br >
<input type="button" value="submit" class="save1 submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td>
<td></td>
</tr>

<tr>
<td style="color:#000;">Do you exercise?</td>
<td style="color:#666;" class="name"><?php  if(empty($Data[excr])){echo "No response";}else{echo $Data[excr];}?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>
<tr style="display:none" class="datas">
<td><select style="width: 151px; height: 41px; border:1px solid #cccccc; border-radius: 7px; margin-left: 8px; margin-bottom: 15px;padding:8px; color:#757575" name="excr" id="excr">
<option value="">Do you Exercise</option>
<option value="yes" <?php if($Data[excr]=="yes"){echo "selected";} ?>>yes</option>
<option value="No" <?php if($Data[excr]=="No"){echo "selected";} ?>>No</option>
</select>
<input type="text" name="nexcr" maxlength="30" placeholder="# times/week" value="<?php echo $Data[nexcr]; ?>" style="width: 193px;"/><br >
<input type="button" value="submit" class="save1 submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td>
<td></td>
</tr>

</table>

<input type="hidden" class="allergiesi" name="allergies"/> 
<input type="hidden" class="historyi" name="history"/> 
<input type="hidden" class="fhistoryi" name="fhistory"/> 
<input type="hidden" class="reslut" name="reslut"/> 

<div class="conform_button conform_queries_click">save</div>