<?php
include("clientHeader.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit Profile</title>
    <style>
      /* Feel-good CSS */
      body {
        background-color: #f4f4f4;
        font-family: Arial, sans-serif;
        color: #333;
      }
      form {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
      }
      label {
        display: block;
        font-size: 18px;
        margin-bottom: 5px;
        color: #555;
      }
      input[type="text"], input[type="email"], select {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: none;
        margin-bottom: 20px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        font-size: 16px;
        color: #333;
      }
      input[type="submit"] {
        background-color: orange;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
      input[type="submit"]:hover {
        background-color: #0056b3;
      }
    </style>
  </head>
  <body>
  <?php
    $sql = "SELECT * FROM tbl_clientregistration WHERE client_id=".$_SESSION['CusID'];
    $query = $this->db->query($sql);
    foreach ($query->result() as $row) {
    ?>
    <h1 style="font-size: 36px; margin-bottom: 20px; text-align: center;">Edit Profile</h1>
    <form  action="<?php echo site_url('ControllerForCustomer/submitEditProfile'); ?>" method="post">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" value="<?php echo $row->c_name?>" required>
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="<?php echo $row->c_email?>" required>
      <label for="Phone">Phone</label>
      <input type="text" id="Phone" name="Phone" value="<?php echo $row->c_contactNumber?>" required>
      <label for="altph">Althernative Phone</label>
      <input type="text" id="altph" name="altph" value="<?php echo $row->c_alternativeContactNo?>" required>
      <label for="address">Address</label>
      <input type="text" id="address" name="address" value="<?php echo $row->c_address?>" required>
      <label for="postcode">Post Code</label>
      <input type="text" id="postcode" name="postcode" value="<?php echo $row->c_postcode?>" required>
						<?php  if ($this->session->flashdata('error')) { ?>
           				     <div ><?php echo $this->session->flashdata('error'); ?></div>
           				 <?php } ?>
      <input type="submit" value="Save Changes">
    </form>
    <?php } ?>
  </body>
</html>
