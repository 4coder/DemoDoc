

<?php 
   include("service/ui/common/header.php");   
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
<section class="team-modern-12">
<h2 align="center">Check-In</h2>
   <div class="main" style="margin-left:5%">
      <h5>Billing And Insurance</h5>
      <form  id="user_insurence">
         <h4>Primary Health Insurence</h4>
         <div class="">
            <div class="detail1">
               <input type="text" name="Company_name" maxlength="30" placeholder="Insurence Company"/>
               <input type="text" name="plan" maxlength="30"placeholder="Plan">
               <input type="text" name="plan_num" maxlength="30" placeholder="Plan Number"/>
               <input type="text" name="GROUP_NUM" maxlength="30" placeholder="Group Number"/>
            </div>
            <div class="detail2">
               <input type="text" name="employer" maxlength="30" placeholder="Insured's Name"/>
               <input type="text" name="insurednum" maxlength="30" placeholder="Insured's Phone Number"/>
               <input type="text" name="insureddob" maxlength="30" placeholder="Insured's Birth Date"/>
               <input type="text" name="bsec" maxlength="30" placeholder="Social Security Number"/>
            </div>
            <div class="detail3">
               <input type="text" name="bCity" maxlength="30" placeholder="City" />
               <input type="text" name="bPin" maxlength="30" placeholder="Pincode"/>
               <input type="text" name="bstate" maxlength="30" placeholder="State" />
               <textarea name="iAddress" rows="4" cols="30" placeholder="Insured Address" style="border: 1px solid #cccccc;padding:11px; width: 352px; border-radius: 7px;"></textarea>
            </div>
         </div>
         <h2>Secondary Health Insurance</h2>
         <div class="detailsec">
            <div class="detail1">
               <input type="text" name="sCompany_name" maxlength="30" placeholder="Insurence Company"/>
               <input type="text" name="splan" maxlength="30"placeholder="Plan">
               <input type="text" name="splan_num" maxlength="30" placeholder="Plan Number"/>
               <input type="text" name="sGROUP_NUM" maxlength="30" placeholder="Group Number"/>
            </div>
            <div class="detail2">
               <input type="text" name="semployer" maxlength="30" placeholder="Insured's Name"/>
               <input type="text" name="sinsurednum" maxlength="30" placeholder="Insured's Phone Number"/>
               <input type="text" name="sinsureddob" maxlength="30" placeholder="Insured's Birth Date"/>
               <input type="text" name="sbsec" maxlength="30" placeholder="Social Security Number"/>
            </div>
            <div class="detail3">
               <input type="text" name="sbCity" maxlength="30" placeholder="City" />
               <input type="text" name="sbPin" maxlength="30" placeholder="Pincode"/>
               <input type="text" name="sbstate" maxlength="30" placeholder="State" />
               <textarea name="siAddress" rows="4" cols="30" placeholder="Insured Address" style="border: 1px solid #cccccc;padding:11px; width: 352px; border-radius: 7px;"></textarea>
            </div>
         </div>
         <div class="conform_button insurence_click">Continue</div>
   </div>
   </form>
   <input type="hidden" class="resultis"/> 
   <h1 class="info" align="center" style="margin-top:10px">Confirm Insurence</h1>
   <form class="conform_insurence" id="query_result" style="margin-left:10%;margin-right:10%">
   </form>
   <div class="final_conformation">
   <div class="prfl_bnr_rht"><img src="<?php echo WEB_ROOT;?>service/public/images/pic123.jpg" alt=""></div>
      <p style="width: 340px;margin-left:35%">
         <input type="checkbox" class="toggler" checked /><i style="margin-left:7px">I verify that the information presented here is accurate,and i authorize Bookmydoc to send this information to my health care provider</i>
      </p>
      <div class="conform_button final_confirm_click" style="margin-bottom:30px;margin-top:30px;">Click here to proceed</div>
      </div>
</section>
<?php include("service/ui/common/footer.php"); ?>

