<html>
<?php

if(!isset($_SESSION["CustomerStatus"]))
{
    redirect('ControllerForCustomer/logouted');
}
?>

<link rel="stylesheet" href="<?php echo base_url('assets/css/adminheader.css')?>">   
<title>GROWTH EDGE</title>
</html>
  
<header class="header" role="banner">
    <h1 class="logo">
      <a href="<?php echo site_url('ControllerForAdmin/home')?>"> Welcome<span style="font-size:25px;"> <?php print($_SESSION['uname']); ?></span></a>
    </h1>
      <!--div class="nav-wrap"-->
      <nav class="main-nav" role="navigation">
        <ul>
          <li><a class="ATag" href="<?php echo site_url('ControllerForCustomer/home')?>">Home Page</a></li>
          <li><a class="ATag" href="<?php echo site_url('ControllerForCustomer/viewProfile')?>">View My Profile</a></li>
          <li><a class="ATag" href="<?php echo site_url('ControllerForCustomer/invIdea')?>">Investment Ideas</a></li>
          <li><a class="ATag" href="<?php echo site_url('ControllerForCustomer/likedIdea')?>">Liked Investment Ideas</a></li>
          <li><a class="ATag" href="<?php echo site_url('ControllerForCustomer/preference')?>">Preference</a></li>
          <li><a class="ATag" href="<?php echo site_url('ControllerForCustomer/custChangePWD')?>">Change Password</a></li>
          <li><a class="ATag" href="<?php echo site_url('ControllerForCustomer/rmSuggestion')?>">Relationship-Manager Suggestions</a></li>
          <li><a class="ATag" href="<?php echo site_url('ControllerForCustomer/logout')?>">Logout Here</a></li>
      
        </ul>
      </nav>
    </div>
  </header>