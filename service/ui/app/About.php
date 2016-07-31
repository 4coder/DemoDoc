<?php
session_start();
include("service/ui/common/header.php"); 
echo $_SESSION['userID'];
?>
<section  class="team-modern-12">
   <div class="container">
      <div class="">
      <div class="menu-nav">
      	<li class="link-li"><a href="<?php echo WEB_ROOT;?>index.php/About">About Us</a></li>
        <li class="link-li"><a href="<?php echo WEB_ROOT;?>index.php/Careers">Careers</a></li>
        <li class="link-li"><a href="<?php echo WEB_ROOT;?>index.php/Contact">Contact Us</a></li>
      </div>
      <div class="content-box">
      <p style="text-align:justify">
      
<h4>About Us ... </h4>
<p style="text-align:justify">
Founded in 2007 with a mission of improving access to healthcare, Book My Doc is a free service that allows patients to find a nearby doctor or dentist who accepts their insurance, see their real-time availability, and instantly book an appointment via Book My Doc.com or Book My Doc's free apps for iPhone or Android. By revealing the 'hidden supply' of appointments, Book My Doc helps most patients get access to care in just 24 - 72 hours. The company's most recent product, Book My Doc Check-In, allows patients to fill out their paperwork online in advance of their appointment, and a Spanish-language version called Book My Doc en Espanol is also available. More than 2.5 million people use Book My Doc each month across 1,800+ cities, covering 40 percent of the US population. Book My Doc is funded by some of the tech world's most respected investors, including DST Global, Goldman Sachs, Founders Fund, Khosla Ventures, Jeff Bezos, Marc Benioff, and Ron Conway. Total investment in the company has reached $95 million to date.</p>
<br \><p style="text-align:justify">
Founded in 2007 with a mission of improving access to healthcare, Book My Doc is a free service that allows patients to find a nearby doctor or dentist who accepts their insurance, see their real-time availability, and instantly book an appointment via Book My Doc.com or Book My Doc's free apps for iPhone or Android. By revealing the 'hidden supply' of appointments, Book My Doc helps most patients get access to care in just 24 - 72 hours. The company's most recent product, Book My Doc Check-In, allows patients to fill out their paperwork online in advance of their appointment, and a Spanish-language version called Book My Doc en Espanol is also available. More than 2.5 million people use Book My Doc each month across 1,800+ cities, covering 40 percent of the US population. Book My Doc is funded by some of the tech world's most respected investors, including DST Global, Goldman Sachs, Founders Fund, Khosla Ventures, Jeff Bezos, Marc Benioff, and Ron Conway. Total investment in the company has reached $95 million to date.</p>
</p>
      </div>
      </div>
      </div>
      </section>
      <?php 
	  include("service/ui/common/footer.php"); 
	  ?>