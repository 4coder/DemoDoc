<?php
session_start();
include("service/ui/common/header.php"); 
echo $_SESSION['userID'];
?>
<style>
.demo{
	min-height:20px;
	width:70%;
	}
</style>
<section  class="team-modern-12">
   <div class="container">
      <div class="">
      <div class="menu-nav">
      	<li class="link-li"><a href="<?php echo WEB_ROOT;?>index.php/About">About Us</a></li>
        <li class="link-li"><a href="<?php echo WEB_ROOT;?>index.php/Careers">Careers</a></li>
        <li class="link-li"><a href="<?php echo WEB_ROOT;?>index.php/Contact">Contact Us</a></li>
      </div>
      <div class="content-box">
      <h4>Getting back to us</h4>
      <input class="demo" type="text" placeholder="Your name...">
      <input class="demo" type="text" placeholder="Your email...">
      <input class="demo" type="text" placeholder="Your phone...">
      <textarea class="demo" placeholder="Your comments..."></textarea><br />
      <div class="btn">Submit</div>
      </div>
      </div>
      </div>
      </section>
      <?php 
	  include("service/ui/common/footer.php"); 
	  ?>