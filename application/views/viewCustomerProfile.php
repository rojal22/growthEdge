<?php
include("clientHeader.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<style>
		body {
			background-color: #fafafa;
			font-family: 'Open Sans', sans-serif;
			color: #333;
		}
		
		.container {
			max-width: 800px;
			margin: 50px auto;
			background-color: #fff;
			padding: 30px;
			box-shadow: 0 5px 10px rgba(0,0,0,0.1);
		}
		
		
		.profile-details {
			margin-top: 30px;
			font-size: 1.2em;
			text-align: center;
		}
		
		.profile-details p {
			margin: 10px 0;
		}
		
		.profile-details a {
			color: #333;
			text-decoration: none;
		}
		
		.profile-details a:hover {
			color: #008080;
		}
		
.button{
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

.button:hover {
  background-color: #e0ac3d;
}
	</style>
</head>
<body>
	<h1 style="text-align: center;">Profile</h1>
	<div class="container">
		<div class="profile-details">
            <?php
            $this->load->database();
            $this->db->select();
            $this->db->from('tbl_clientregistration');
            $this->db->where('client_id',$_SESSION['CusID']);
            $query = $this->db->get();
            foreach ($query->result() as $row) {
            ?>
            <table>
            <tr>
            <td>Name</td>
            <td>:</td>
            <td style="padding-left: 50px; font-size: 30px;"><?php echo $row->c_name; ?></td>
            </tr>
            <tr>
			<td>Email</td>
            <td>:</td>
            <td style="padding-left: 50px; font-size: 30px;"><?php echo $row->c_email; ?></td>
            </tr>
            <tr>
			<td>Phone</td>
            <td>:</td>
            <td style="padding-left: 50px; font-size: 30px;"><?php echo $row->c_contactNumber; ?></td>
            </tr>
            <tr>
			<td>Alternative Phone</td>
            <td>:</td>
            <td style="padding-left: 50px; font-size: 30px;"><?php echo $row->c_alternativeContactNo; ?></td>
            </tr>
            <tr>
			<td>Postcode</td>
            <td>:</td>
            <td style="padding-left: 50px; font-size: 30px;"><?php echo $row->c_postcode; ?></td>
            </tr>
            <tr>
			<td>Address</td>
            <td>:</td>
            <td style="padding-left: 50px; font-size: 30px;"><?php echo $row->c_address; ?></td>
            </tr>
            <table>
			<p>
				<form action="<?php echo site_url('ControllerForCustomer/editProfile'); ?>" method="post">
					<button> Edit Profile</button>
				</form></p>
            <?php
            }
            ?>
		</div>
	</div>
</body>
</html>
