<?php include("service/ui/common/header.php"); ?>
<section  class="team-modern-12">
   <div class="container">
      <div class="ptent_dctr_main">
         <h1 class="joiintnow"> Join Now </h1>
         <div class="patientmain">
            <div class="patientimg"><img src="<?php echo WEB_ROOT;?>service/public/images/patient.jpg"></div>
            <h1 class="patient"> I'm a new patient </h1>
            <p> Find a doctor and book an appointment online for free!</p>
            <a href="<?php echo WEB_ROOT;?>index.php/join/patient" class="btn">Join Now</a>
         </div>
         <div class="dctrmain">
            <h1 class="patient"> I'm a doctor</h1>
            <p> Quicker way for your patients to schedule an appointment. Register with Book My Doc</p>
            <div class="dctr_lrnmore"> <a href="<?php echo WEB_ROOT;?>index.php/join/learnmore">Learn More</a></div>
         </div>
      </div>
   </div>
</section>
<?php include(APP_PATH."service/ui/common/footer.php"); ?>