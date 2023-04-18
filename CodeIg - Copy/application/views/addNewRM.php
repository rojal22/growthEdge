<?php
include("headerAdmin.php");
?>
<style>
.feel-good-form {
  max-width: 500px;
  margin: 20px auto;
  padding: 30px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  font-family: 'Helvetica Neue', sans-serif;
  color: #333;
}

.feel-good-form label {
  display: block;
  font-size: 18px;
  margin-bottom: 10px;
}

.feel-good-form input,
.feel-good-form textarea {
  display: block;
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  font-size: 16px;
  border-radius: 5px;
  border: none;
  background-color: #f5f5f5;
}

.feel-good-form textarea {
  height: 150px;
}

.feel-good-form button[type="submit"] {
  background-color: #f2b632;
  color: #fff;
  font-family: 'Helvetica Neue', sans-serif;
  font-size: 16px;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  text-transform: uppercase;
  letter-spacing: 2px;
  cursor: pointer;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

.feel-good-form button[type="submit"]:hover {
  background-color: #e0ac3d;
}

</style>
<form class="feel-good-form" action="<?php echo site_url('ControllerForAdmin/registerRM'); ?>" method="post">
    <h1>Register New <br>Relationship-Manager</h1>
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>

  <label for="message">Phone<span style="font-size: 10px;padding-left:15px;">(*exclude country code)</span></label>
  <input type="text" id="phone" name="phone" required>
  <?php  if ($this->session->flashdata('error')) { ?>
            <div ><?php echo $this->session->flashdata('error'); ?></div>
  <?php } ?>
  <button type="submit">Register</button>
</form>
