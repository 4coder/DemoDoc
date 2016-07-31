

<?php 
   include("service/ui/common/header.php");   
   include("./conf/config.inc.php");
   $patientData = $dateCnt;
   ?>
<link rel="stylesheet" href="<?php echo WEB_ROOT?>service/public/css/checkin.css">
<style type="text/css">
   h3{font-family: font-family: 'Roboto', sans-serif; font-size: 19pt; font-style: normal; font-weight: bold; color:#3699DD;
   text-align: center; text-decoration: none; margin-right: 832px; }
   table{font-family: Calibri; color:#3499DD; font-size: 11pt; font-style: normal;
   text-align:; background-color: #ffffff; border-collapse: collapse; }
   table.inner{border: 0px}
</style>
<script type='text/javascript' src='<?php echo WEB_ROOT?>service/public/js/check-in.js'></script>
<script type='text/javascript' src='<?php echo WEB_ROOT?>service/public/js/token/jquery.sumoselect.min.js'></script>
<section  class="team-modern-12">
<h2 align="center">Check-In</h2>
   <div class="main">
      
      <h1 align="center">Patients Registration Form</h1>
      <form action="" method="POST" id="checkin_reg">
         <div class="" style="margin-left: 72px;">
            <div class="detail1">
               <input type="text" name="apnt_time" maxlength="30" readonly value="<?php echo $dateCnt;?>" />
               <input type="text" name="fname" maxlength="30" placeholder="First Name"/>
               <input type="text" name="mname" maxlength="30"placeholder="Middle Name">
               <input type="text" name="lname" maxlength="30" placeholder="Last Name"/>
               <div class="dob">
                  <select style="width: 115px; height: 41px; border:1px solid #cccccc; border-radius: 7px; margin-left: 8px; margin-bottom: 15px;padding:8px; color:#757575" name="Birthday_day" id="Birthday_Day">
                     <option value="">Day Of Birth:</option>
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
                  <select style="width: 116px; height: 41px; border:1px solid #cccccc; border-radius: 7px;padding:8px; color:#757575" id="Birthday_Month" name="Birthday_Month">
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
                  <select style="width: 135px; height: 41px; border:1px solid #cccccc; border-radius: 7px;padding:8px; color:#757575 " name="Birthday_Year" id="Birthday_Year">
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
                  <select style="width: 380px; height: 41px; border:1px solid #cccccc; border-radius: 7px;padding:8px; margin-left: 8px;color:#757575; margin-bottom: 15px;" name="gender" id="gender">
                     <option value="">Gender:</option>
                     <option value="Male">Male</option>
                     <option value="Female">Female</option>
                  </select>
                  <input type="text" name="occupation" maxlength="30" placeholder="Occupation"/>
                  <input type="text" name="email" maxlength="30" placeholder="Email ID"/>
               </div>
            </div>
            <div class="detail4">
               <select style="width: 376px; height: 41px; border:1px solid #cccccc; border-radius: 7px;padding:8px; color:#757575; margin-bottom: 15px;" name="marital" id="marital">
                  <option value="">Marital Status</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
               </select>
               <input type="text" name="pnum" maxlength="30" placeholder="Mobile Number"/>
               <input type="text" name="hnum" maxlength="30" placeholder="Home Number"/>
               <input type="text" name="pCity" maxlength="30" placeholder="City" />
               <input type="text" name="pPin" maxlength="30" placeholder="Pincode"/>
               <input type="text" name="pstate" maxlength="30" placeholder="State" />
               <textarea name="pAddress" rows="4" cols="30" placeholder="Address" style="border: 1px solid #cccccc;padding:11px; width: 352px; border-radius: 7px;"></textarea>
            </div>
            <div class="detail5">
               <input type="text" name="ssn" maxlength="30" placeholder="Social Security Number" />
               <input type="text" name="reff" maxlength="30" placeholder="Reffered By"/>
               <input type="text" name="pcp" maxlength="30" placeholder="Primary Care Physician" />
               <input type="text" name="pcpn" maxlength="30" placeholder="Primary Care Physician Number" />
               <input type="text" name="phar" maxlength="30" placeholder="Pharmacy" />
               <input type="text" name="phnum" maxlength="30" placeholder="Pharmacy Number" />
               <textarea name="phAddress" rows="4" cols="30" placeholder="Pharmacy Address" style="border: 1px solid #cccccc;padding:11px; width: 352px; border-radius: 7px;"></textarea>
            </div>
         </div>
         <div class="check_button registration_click">Continue</div>
   </div>
   </form>
   <!-- result stored in  this input-->
   <input type="hidden" class="resultis"/> 
   <h1 class="info" align="center">Confirm Registration</h1>
   <form class="conform_registration">
      <input type="hidden" name="apnt_time" maxlength="30" readonly value="<?php echo $dateCnt;?>" />
   </form>
</section>
<?php include("service/ui/common/footer.php"); ?>

