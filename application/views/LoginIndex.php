<!DOCTYPE html>
<html lang="en">
<head>
	<title>login_wealth_management</title>
	<meta charset="UTF-8">
    <style>
    body {
      background-image: url('<?php echo base_url("assets/images/family.png");?>');
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style> <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }
    .login-box {
      width: 350px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px #aaa;
      margin: 100px auto;
      padding: 20px;
      box-sizing: border-box;
    }
    h2 {
      text-align: center;
      margin-top: 0;
      font-weight: normal;
    }
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 10px;
      margin-bottom: 20px;
    }
    input[type="submit"] {
      background-color: red;
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
    
  </style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images1/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url('assets/log_in/NEW_WM/bootstrap.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/log_in/NEW_WM/font-awesome.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/log_in/NEW_WM/icon-font.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url('assets/log_in/NEW_WM/animate.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url('assets/log_in/NEW_WM/hamburgers.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url('assets/log_in/NEW_WM/animsition.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url('assets/log_in/NEW_WM/select2.min.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url('assets/log_in/NEW_WM/daterangepicker.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url('assets/log_in/NEW_WM/CSS/util.css')?>">
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url('assets/log_in/NEW_WM/CSS/main.css')?>">
<!--===============================================================================================-->
</head>
<body>

	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-30 p-b-70">
				<span class="login100-form-title p-b-41">
					LOGIN 
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="<?php echo site_url('ControllerLogin/userCheck'); ?>" method="post">     

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<span style="font-family: sans; padding-left:5%;">Email</span>
						<input class="input100" type="text" name="uname" placeholder="User name" required>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span style="font-family: sans; padding-left:5%;">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Password" required>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Select user type">
						<b><span class="label-input100">User Type</span><br><br></b>
						<div class="form-check-inline">
							&emsp;&emsp;<input type="radio" id="customer" name="user_type" value="Customer" class="form-check-input" required>
							<label for="customer" class="form-check-label">Customer</label>
						</div><br><br>
						<div class="form-check-inline">
							&emsp;&emsp;<input type="radio" id="RM" name="user_type" value="RM" class="form-check-input" required>
							<label for="RM" class="form-check-label">Relationship Manager</label>
						</div><br><br>
						<div class="form-check-inline">
							&emsp;&emsp;<input type="radio" id="admin" name="user_type" value="admin" class="form-check-input" required>
							<label for="admin" class="form-check-label">Admin</label>
						</div>
					<div class="container-login100-form-btn m-t-32">
						<input type="submit" name="submit" value="LOGIN">
						<?php  if ($this->session->flashdata('error')) { ?>
           				     <div ><?php echo $this->session->flashdata('error'); ?></div>
           				 <?php } ?>
                         <a href="<?php echo site_url('HomePageController/SignUp')?>" style=" background-color: skyblue; color: #fff; padding: 12px 20px;padding-top: 10px; border: none; border-radius: 4px; cursor: pointer; width: 80%;" align="center">Register </a>
						 <a href="<?php echo base_url(); ?>" style=" background-color: Green; color: #fff; padding: 12px 20px;padding-top: 10px; border: none; border-radius: 4px; cursor: pointer; width: 80%;" align="center">Home </a>
                        
					</div>
					

                    
                   
				</form>
			</div>
		</div>
	</div>

</body>
</html>