<html>
<?php

if(!isset($_SESSION["adminStatus"]))
{
    redirect('ControllerForAdmin/logouted');
}
?>

<link rel="stylesheet" href="<?php echo base_url('assets/css/adminheader.css')?>">   
<title>GROWTH EDGE</title>
</html>
  
<header class="header" role="banner">
    <h1 class="logo">
      <a href="<?php echo site_url('ControllerForAdmin/home')?>"> Welcome<span> Admin</span></a>
    </h1>
      <!--div class="nav-wrap"-->
      <nav class="main-nav" role="navigation">
        <ul>
          <li><a class="ATag" href="<?php echo site_url('ControllerForAdmin/home')?>">Home Page</a></li>
          <li><a class="ATag" href="<?php echo site_url('ControllerForAdmin/adminRMIndex')?>">Relationship Managers</a></li>
          <li><a class="ATag" href="<?php echo site_url('ControllerForAdmin/adminCustomerIndex')?>">Customers</a></li>
          <li><a class="ATag" href="<?php echo site_url('ControllerForAdmin/adminIdeaIndex')?>">Investment Ideas</a></li>
          <li><a class="ATag" href="<?php echo site_url('ControllerForAdmin/adminPasswordIndex')?>">Change Password</a></li>
          <li><a class="ATag" href="<?php echo site_url('ControllerForAdmin/logout')?>">Logout Here</a></li>
      
        </ul>
      </nav>
    </div>
  </header>