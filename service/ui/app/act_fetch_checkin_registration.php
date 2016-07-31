<?php
include("./conf/config.inc.php");
$Data = $_POST;
?>
<h1>Basic Info</h1>
<table class="table  table-striped  " >
<tr>
<th colspan="3">Patient info</td>
</tr>
<tr>
<td style="color:#000;">Name</td>
<td style="color:#666;" class="name"><?php $name = $Data[fname]." ".$Data[mname]." ".$Data[lname];
if(empty($name)){
	echo "No response";
	}else{
		echo $name;
		}
?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>
<tr style="display:none" class="datas">
<td><input type="text" name="fname" value="<?php echo $Data[fname]?>" maxlength="30" placeholder="First Name"/><br >
<input type="button" value="submit" class="save submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td><input type="text" name="mname" value="<?php echo $Data[mname]?>" maxlength="30"placeholder="Middle Name"></td>
<td><input type="text" name="lname" value="<?php echo $Data[lname]?>" maxlength="30" placeholder="Last Name"/> </td>
</tr>
<tr>
<td style="color:#000;">Sex</td>
<td style="color:#666;" class="gender"><?php if(empty($Data[gender])){echo "No response";} else{echo $Data[gender];}?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>
<tr style="display:none">
<td><select style="width: 380px; height: 41px; border:1px solid #cccccc; border-radius: 7px;padding:8px; margin-left: 8px;color:#757575; margin-bottom: 15px;" name="gender" id="gender">
<option value="">Gender:</option>
<option value="Male" <?php if($Data[gender]=="Male") echo "selected"; ?>>Male</option>
<option value="Female" <?php if($Data[gender]=="Female") echo "selected"; ?>>Female</option>
</select><br >
<input type="button" value="submit" class="save submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td>
<td></td>
</tr><tr>
<td style="color:#000;">Date of Birth</td>
<td style="color:#666;" class="dob"><?php $bday = $Data[Birthday_day]." ".$Data[Birthday_Month]." ".$Data[Birthday_Year];
if(!empty($bday)){echo $bday;}else{echo "No response";}?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>

<tr style="display:none">
<td><select style="width: 115px; height: 41px; border:1px solid #cccccc; border-radius: 7px; margin-left: 8px; margin-bottom: 15px;padding:8px; color:#757575" name="Birthday_day" id="Birthday_Day">
<option value="">Day Of Birth:</option>
<option value="1" <?php if($Data[Birthday_day]==1) echo "selected"; ?>>1</option>
<option value="2" <?php if($Data[Birthday_day]==2) echo "selected"; ?>>2</option>
<option value="3" <?php if($Data[Birthday_day]==3) echo "selected"; ?>>3</option>
 
<option value="4" <?php if($Data[Birthday_day]==4) echo "selected"; ?>>4</option>
<option value="5" <?php if($Data[Birthday_day]==5) echo "selected"; ?>>5</option>
<option value="6" <?php if($Data[Birthday_day]==6) echo "selected"; ?>>6</option>
<option value="7" <?php if($Data[Birthday_day]==7) echo "selected"; ?>>7</option>
<option value="8" <?php if($Data[Birthday_day]==8) echo "selected"; ?>>8</option>
<option value="9" <?php if($Data[Birthday_day]==9) echo "selected"; ?>>9</option>
<option value="10" <?php if($Data[Birthday_day]==10) echo "selected"; ?>>10</option>
<option value="11" <?php if($Data[Birthday_day]==12) echo "selected"; ?>>11</option>
<option value="12" <?php if($Data[Birthday_day]==12) echo "selected"; ?>>12</option>
 
<option value="13" <?php if($Data[Birthday_day]==13) echo "selected"; ?>>13</option>
<option value="14" <?php if($Data[Birthday_day]==14) echo "selected"; ?>>14</option>
<option value="15" <?php if($Data[Birthday_day]==15) echo "selected"; ?>>15</option>
<option value="16" <?php if($Data[Birthday_day]==16) echo "selected"; ?>>16</option>
<option value="17" <?php if($Data[Birthday_day]==17) echo "selected"; ?>>17</option>
<option value="18" <?php if($Data[Birthday_day]==18) echo "selected"; ?>>18</option>
<option value="19" <?php if($Data[Birthday_day]==19) echo "selected"; ?>>19</option>
<option value="20" <?php if($Data[Birthday_day]==20) echo "selected"; ?>>20</option>
<option value="21" <?php if($Data[Birthday_day]==21) echo "selected"; ?>>21</option>
 
<option value="22" <?php if($Data[Birthday_day]==22) echo "selected"; ?>>22</option>
<option value="23" <?php if($Data[Birthday_day]==23) echo "selected"; ?>>23</option>
<option value="24" <?php if($Data[Birthday_day]==24) echo "selected"; ?>>24</option>
<option value="25" <?php if($Data[Birthday_day]==25) echo "selected"; ?>>25</option>
<option value="26" <?php if($Data[Birthday_day]==26) echo "selected"; ?>>26</option>
<option value="27" <?php if($Data[Birthday_day]==27) echo "selected"; ?>>27</option>
<option value="28" <?php if($Data[Birthday_day]==28) echo "selected"; ?>>28</option>
<option value="29" <?php if($Data[Birthday_day]==29) echo "selected"; ?>>29</option>
<option value="30" <?php if($Data[Birthday_day]==30) echo "selected"; ?>>30</option>
 
<option value="31" <?php if($Data[Birthday_day]==31) echo "selected"; ?>>31</option>
</select><br >
<input type="button" value="submit" class="save submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td><select style="width: 116px; height: 41px; border:1px solid #cccccc; border-radius: 7px;padding:8px; color:#757575" id="Birthday_Month" name="Birthday_Month">
<option value="">Month:</option>
<option value="January" <?php if($Data[Birthday_Month]=="January") echo "selected"; ?>>Jan</option>
<option value="February" <?php if($Data[Birthday_Month]=="February") echo "selected"; ?>>Feb</option>
<option value="March" <?php if($Data[Birthday_Month]=="March") echo "selected"; ?>>Mar</option>
<option value="April" <?php if($Data[Birthday_Month]=="April") echo "selected"; ?>>Apr</option>
<option value="May" <?php if($Data[Birthday_Month]=="May") echo "selected"; ?>>May</option>
<option value="June" <?php if($Data[Birthday_Month]=="June") echo "selected"; ?>>Jun</option>
<option value="July" <?php if($Data[Birthday_Month]=="July") echo "selected"; ?>>Jul</option>
<option value="August" <?php if($Data[Birthday_Month]=="August") echo "selected"; ?>>Aug</option>
<option value="September" <?php if($Data[Birthday_Month]=="September") echo "selected"; ?>>Sep</option>
<option value="October" <?php if($Data[Birthday_Month]=="October") echo "selected"; ?>>Oct</option>
<option value="November" <?php if($Data[Birthday_Month]=="November") echo "selected"; ?>>Nov</option>
<option value="December" <?php if($Data[Birthday_Month]=="December") echo "selected"; ?>>Dec</option>
</select></td>
<td><select style="width: 135px; height: 41px; border:1px solid #cccccc; border-radius: 7px;padding:8px; color:#757575 " name="Birthday_Year" id="Birthday_Year">
 
<option value="">Year:</option>
<option value="2012" <?php if($Data[Birthday_Year]==2012) echo "selected"; ?>>2012</option>
<option value="2011" <?php if($Data[Birthday_Year]==2011) echo "selected"; ?>>2011</option>
<option value="2010" <?php if($Data[Birthday_Year]==2010) echo "selected"; ?>>2010</option>
<option value="2009" <?php if($Data[Birthday_Year]==2009) echo "selected"; ?>>2009</option>
<option value="2008" <?php if($Data[Birthday_Year]==2008) echo "selected"; ?>>2008</option>
<option value="2007" <?php if($Data[Birthday_Year]==2007) echo "selected"; ?>>2007</option>
<option value="2006" <?php if($Data[Birthday_Year]==2006) echo "selected"; ?>>2006</option>
<option value="2005" <?php if($Data[Birthday_Year]==2005) echo "selected"; ?>>2005</option>
<option value="2004" <?php if($Data[Birthday_Year]==2004) echo "selected"; ?>>2004</option>
<option value="2003" <?php if($Data[Birthday_Year]==2003) echo "selected"; ?>>2003</option>
<option value="2002" <?php if($Data[Birthday_Year]==2002) echo "selected"; ?>>2002</option>
<option value="2001" <?php if($Data[Birthday_Year]==2001) echo "selected"; ?>>2001</option>
<option value="2000" <?php if($Data[Birthday_Year]==2000) echo "selected"; ?>>2000</option>
 
<option value="1999" <?php if($Data[Birthday_Year]==1999) echo "selected"; ?>>1999</option>
<option value="1998" <?php if($Data[Birthday_Year]==1998) echo "selected"; ?>>1998</option>
<option value="1997" <?php if($Data[Birthday_Year]==1997) echo "selected"; ?>>1997</option>
<option value="1996" <?php if($Data[Birthday_Year]==1996) echo "selected"; ?>>1996</option>
<option value="1995" <?php if($Data[Birthday_Year]==1995) echo "selected"; ?>>1995</option>
<option value="1994" <?php if($Data[Birthday_Year]==1994) echo "selected"; ?>>1994</option>
<option value="1993" <?php if($Data[Birthday_Year]==1993) echo "selected"; ?>>1993</option>
<option value="1992" <?php if($Data[Birthday_Year]==1992) echo "selected"; ?>>1992</option>
<option value="1991" <?php if($Data[Birthday_Year]==1991) echo "selected"; ?>>1991</option>
<option value="1990" <?php if($Data[Birthday_Year]==1990) echo "selected"; ?>>1990</option>
 
<option value="1989" <?php if($Data[Birthday_Year]==1989) echo "selected"; ?>>1989</option>
<option value="1988" <?php if($Data[Birthday_Year]==1988) echo "selected"; ?>>1988</option>
<option value="1987" <?php if($Data[Birthday_Year]==1987) echo "selected"; ?>>1987</option>
<option value="1986" <?php if($Data[Birthday_Year]==1986) echo "selected"; ?>>1986</option>
<option value="1985" <?php if($Data[Birthday_Year]==1985) echo "selected"; ?>>1985</option>
<option value="1984" <?php if($Data[Birthday_Year]==1984) echo "selected"; ?>>1984</option>
<option value="1983" <?php if($Data[Birthday_Year]==1983) echo "selected"; ?>>1983</option>
<option value="1982" <?php if($Data[Birthday_Year]==1982) echo "selected"; ?>>1982</option>
<option value="1981" <?php if($Data[Birthday_Year]==1981) echo "selected"; ?>>1981</option>
<option value="1980" <?php if($Data[Birthday_Year]==1980) echo "selected"; ?>>1980</option>
</select></td>
</tr>

<tr>
<td style="color:#000;">Social Security Number</td>
<td style="color:#666;" class="ssnumber"><?php if(!empty($Data[ssn])){echo $Data[ssn];}else{echo "No Response";}?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>

<tr style="display:none">
<td><input type="text" name="ssn" maxlength="30" placeholder="Social Security Number" value="<?php echo $Data[ssn];?>" /><br >
<input type="button" value="submit" class="save submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td><td></td>
</tr>

<tr>
<td style="color:#000;">Marital Status</td>
<td style="color:#666;" class="Marital"><?php if(!empty($Data[marital])){echo $Data[marital];} else{echo "No Response";};?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>

<tr style="display:none">
<td><select style="width: 376px; height: 41px; border:1px solid #cccccc; border-radius: 7px;padding:8px; color:#757575; margin-bottom: 15px;" name="marital" id="marital">
<option value="-1">Marital Status</option>
<option value="Single" <?php if($Data[marital]=="Single") echo "selected"; ?>>Single</option>
<option value="Married" <?php if($Data[marital]=="Married") echo "selected"; ?>>Married</option>
</select><br >
<input type="button" value="submit" class="save submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td><td></td>
</tr>

<tr>
<th colspan="3">Employment</td>
</tr>
<tr>
<td style="color:#000;">Occupation</td>
<td style="color:#666;" class="Occupation"><?php echo $Data[occupation];?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>
<tr style="display:none">
<td><input type="text" name="occupation" maxlength="30" placeholder="Occupation" value="<?php echo $Data[occupation];?>" /><br >
<input type="button" value="submit" class="save submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td><td></td>
</tr>
</table>


<h1>Contact Info</h1>
<table class="table  table-striped " >
<tr>
<th colspan="3">Contact info</td>
</tr>
<tr>
<td style="color:#000;">Email</td>
<td style="color:#666;" class="email"><?php echo $Data[email];?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>


<tr style="display:none">
<td><input type="text" name="email" maxlength="30" placeholder="Email ID" value="<?php echo $Data[email];?>"/><br >
<input type="button" value="submit" class="save submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td><td></td>
</tr>

<tr>
<td style="color:#000;">Address</td>
<td style="color:#666;" class="addr"><?php echo $Data[pAddress]."<br>".$Data[pPin]."<br>".$Data[pCity]."<br>".$Data[pstate];?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>

<tr style="display:none">
<td><textarea name="pAddress" rows="4" cols="30" placeholder="Address" style="border: 1px solid #cccccc;padding:11px; width: 352px; border-radius: 7px;"><?php echo $Data[pAddress];?></textarea><br >
<input type="button" value="submit" class="save submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td><input type="text" name="pCity" maxlength="30" placeholder="City" value="<?php echo $Data[pCity];?>" />
		<input type="text" name="pPin" maxlength="30" placeholder="Pincode" value="<?php echo $Data[pPin];?>"/>
		<input type="text" name="pstate" maxlength="30" placeholder="State" value="<?php echo $Data[pstate];?>" /></td><td></td>
</tr>

<tr>
<td style="color:#000;">Phone</td>
<td style="color:#666;" class="phone"><?php echo "Mobile".$Data[pnum];echo "<br>";echo "Home".$Data[hnum]; ?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>

<tr style="display:none">
<td><input type="text" name="pnum" maxlength="30" placeholder="Mobile Number" value="<?php echo $Data[pnum];?>"/><br >
<input type="button" value="submit" class="save submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td><input type="text" name="hnum" maxlength="30" placeholder="Home Number" value="<?php echo $Data[hnum];?>"/></td><td></td>
</tr>

<tr>
<th colspan="3">Primary Care Physician</td>
</tr>
<tr>
<td style="color:#000;">Primary Care Physician Name</td>
<td style="color:#666;" class="Physician_name"><?php echo $Data[pcp];?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>

<tr style="display:none">
<td><input type="text" name="pcp" maxlength="30" placeholder="Primary Care Physician" value="<?php echo $Data[pcp];?>" /><br >
<input type="button" value="submit" class="save submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td><td></td>
</tr>

<tr>
<td style="color:#000;">Phone</td>
<td style="color:#666;" class="Physician_phone"><?php echo $Data[pcpn];?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>

<tr style="display:none">
<td><input type="text" name="pcpn" maxlength="30" placeholder="Primary Care Physician Number" value="<?php echo $Data[pcpn];?>" /><br >
<input type="button" value="submit" class="save submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td><td></td>
</tr>

<tr>
<th colspan="3">Referring Doctor</td>
</tr>
<tr>
<td style="color:#000;">Referring Doctor Name</td>
<td style="color:#666;" class="Referring_Doctor_Name"><?php echo $Data[reff];?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>

<tr style="display:none">
<td><input type="text" name="reff" maxlength="30" placeholder="Reffered By" value="<?php echo $Data[reff];?>"/><br >
<input type="button" value="submit" class="save submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td><td></td>
</tr>

<tr>
<th colspan="3">Pharmacy Information</td>
</tr>
<tr>
<td style="color:#000;">Pharmacy Name</td>
<td style="color:#666;" class="Pharmacy_Name"><?php echo $Data[phar];?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>

<tr style="display:none">
<td><input type="text" name="phar" maxlength="30" placeholder="Pharmacy" value="<?php echo $Data[phar];?>" /><br >
<input type="button" value="submit" class="save submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td><td></td>
</tr>

<tr>
<td style="color:#000;">Pharmacy Phone</td>
<td style="color:#666;"><?php echo $Data[phnum];?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>

<tr style="display:none">
<td><input type="text" name="phnum" maxlength="30" placeholder="Pharmacy Number" value="<?php echo $Data[phnum];?>" /><br >
<input type="button" value="submit" class="save submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td><td></td>
</tr>

<tr>
<td style="color:#000;">Pharmacy Address</td>
<td style="color:#666;"><?php echo $Data[phAddress];?></td>
<td class="editthis" style="cursor:pointer">Edit</td>
</tr>

<tr style="display:none">
<td><textarea name="phAddress" rows="4" cols="30" placeholder="Pharmacy Address" style="border: 1px solid #cccccc;padding:11px; width: 352px; border-radius: 7px;"><?php echo $Data[phAddress];?></textarea><br >
<input type="button" value="submit" class="save submit_button " /><input type="button" value="cancel" class="cancel cancel_button " /></td>
<td></td><td></td>
</tr>
</table>
<div class="conform_button conform_click">Save</div>