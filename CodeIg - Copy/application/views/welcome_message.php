<!DOCTYPE html>
<html lang="en">

<head>
  <style>main {
  max-width: 1100px;
  margin: auto;
}

.member {
  text-align: center;
  margin: 1rem;
}

.member img {
  border-radius: 50%;
  width: 150px;
}</style>
      <!-- bootstrap css -->
      <link rel="stylesheet" href="<?php echo base_url('assets/css2/bootstrap.min.css')?>">
      <!-- style css -->
      <link rel="stylesheet" href="<?php echo base_url('assets/css2/style.css')?>">
      <!-- Responsive-->
      <link rel="stylesheet" href="<?php echo base_url('assets/css2/responsive.css')?>">
      <!-- fevicon -->
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="<?php echo base_url('assets/css2/jquery.mCustomScrollbar.min.css')?>">
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Growth Edge</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet" />

  <!-- Custom styles for this template -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section"  style="background-color: skyblue;">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="<?php echo base_url(); ?>">
            <span>Growth Edge
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-2">
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#Aboutus">About </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('HomePageController/SignUp')?>">Create Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"href="<?php echo site_url('HomePageController/LoginIndex')?>">Login</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
<!-- Picture Silder-->
<section class="banner_main">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-7">
                  <div class="text-bg">
                     <div class="padding_lert">
                        <i>
                         <img src="<?php echo base_url('assets/images/image1.png'); ?>"></i>
                        <h1 style="color: black;">Welcome To <br>Growth Edge  </h1>
                     </div>
                  </div>
               </div>
               <div class="col-md-5 bah">
                  <div class="bann_img">
                    
                  <h1 style="color: black;">A Invest in Idea<br>Agency</h1>
                     <figure>
                     <img src="<?php echo base_url('assets/images/image1.png'); ?>"></figure>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <main id="Aboutus">
      <section class="about">
        <h2>Our Mission</h2>
        <p>We believe that great ideas can change the world. Our mission is to connect visionary entrepreneurs with investors who share their passion for innovation and disruption.</p>
        <h2>Our Team</h2>
        <div class="team-member">
          <img src="<?php echo base_url('assets/images/srk.jpg'); ?>" style="width: 100%;" alt="Person 1">
          <h3>John Doe</h3>
          <p>Founder and CEO</p>
          <p>John is a serial entrepreneur and startup advisor with over 20 years of experience in the tech industry. He is passionate about empowering visionary entrepreneurs to create world-changing companies.</p>
        </div>
        <div class="team-member">
          <img src="<?php echo base_url('assets/images/dq.jpg'); ?>" style="width: 100%;" alt="Person 2">
          <h3>Jane Smith</h3>
          <p>Investment Manager</p>
          <p>Jane is an experienced investment manager with a passion for supporting early-stage startups. She is dedicated to helping our portfolio companies grow and succeed.</p>
        </div>
        <div class="team-member">
          <img src="<?php echo base_url('assets/images/surya.jpg'); ?>" style="width: 100%;" alt="Person 3">
          <h3>Mike Johnson</h3>
          <p>Technical Advisor</p>
          <p>Mike is a technology expert with deep knowledge of AI, blockchain, and other emerging technologies. He provides technical guidance and support to our portfolio companies.</p>
        </div>
      </section>
</main>
<!-- End Picture Silder-->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p> Growth Edge
    </p>
  </footer>
  <!-- footer section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/circles.min.js"></script>
  <script src="js/custom.js"></script>


</body>

</html>