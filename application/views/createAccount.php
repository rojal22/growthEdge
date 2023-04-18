<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: skyblue;
}

.signupbtn{
    background-color: red;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 50%;
  }
}
</style>
<body>

<form action="<?php echo site_url('ControllerForCustomer/NewCust'); ?>" method="post" style="border:20px solid #ccc">
  <div class="container">
    <h1 align="center">Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label for="email"><b>Contact Number</b></label>
    <input type="text" placeholder="Enter Contact Number" name="number" required>

    <label for="email"><b>Alternative Contact Number</b></label>
    <input type="text" placeholder="Enter Alternative Contact Number" name="altNumber" required>

    <label for="email"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" required>
    
    <label for="email"><b>Post Code</b></label>
    <input type="text" placeholder="Enter Post Code" pattern="[a-zA-Z0-9 ]+" name="post" required>

    <label for="psw"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="psw"><b>Confirm Password</b></label>
    <input type="password" placeholder="Enter Password" name="conpsw" id="conpsw" required>

    <div id="password-message" style="font-size: 10; padding-left:100px; padding-top: 40px;"></div>
    
    <?php  if ($this->session->flashdata('error')) { ?>
      <div ><?php echo $this->session->flashdata('error'); ?></div>
    <?php } ?>

    <div class="clearfix" >
      <button type="reset" class="cancelbtn">Reset</button>
      <button type="submit" class="signupbtn">Sign Up</button>
      <div style="padding-bottom: 50px;" align='center'>
        <a href="<?php echo base_url(); ?>" style=" background-color: Green; color: #fff; padding: 12px 20px;border: none; border-radius: 4px; cursor: pointer; width: 80%;" align="center">Home </a>
      </div>
    </div>
  </div>
</form>

</body>
</html>
<script>
const newPasswordInput = document.getElementById('psw');
const confirmPasswordInput = document.getElementById('conpsw');
const passwordMessage = document.getElementById('password-message');

confirmPasswordInput.addEventListener('input', checkPasswordMatch);
function checkPasswordMatch() {
  const newPassword = newPasswordInput.value;
  const confirmPassword = confirmPasswordInput.value;
  if (newPassword === confirmPassword) {
    passwordMessage.textContent = 'Passwords match!';
    passwordMessage.style.color = 'green';
  } else {
    passwordMessage.textContent = 'Passwords do not match.';
    passwordMessage.style.color = 'red';
  }
}
</script>