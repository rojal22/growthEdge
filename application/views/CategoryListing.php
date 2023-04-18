<?php
include("clientHeader.php");
?>
<style>
.product-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
  padding-top: 60px;
}

.product-box {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease-in-out;
  text-align: center;
}

.product-box:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}


.product-box h3 {
  font-size: 20px;
  margin-bottom: 10px;
  color: #333;
}

.product-box p {
  font-size: 18px;
  margin-bottom: 20px;
  color: #777;
}

.buy-btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #f1c40f;
  color: #fff;
  font-size: 18px;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s ease-in-out;
}

.buy-btn:hover {
  background-color: #e67e22;
}
</style>
<h1 align="center" style="padding-top: 50px;">Interested Areas</h1>
<h1 align="center" style="padding-top: 50px;">
<a style="text-decoration: none;transition: border-bottom-color 0.3s ease-in-out;" href="<?php echo site_url('ControllerForCustomer/addPreference')?>" class="buy-btn">Add New Preference</a>
</h1>
<div class="product-container">
<?php
$check=false;
 $this->load->database();
 $this->db->select();
 $this->db->from('tbl_interestedarea');
 $this->db->where('client_id',$_SESSION['CusID']);
 $query = $this->db->get();
 foreach ($query->result() as $row) {
    $check=true
?>
  <div class="product-box">
    <h3><?php echo $row->i_idea_category; ?></h3>
    <a style="text-decoration: none;transition: border-bottom-color 0.3s ease-in-out;" href="<?php echo site_url('ControllerForCustomer/removePreference/'.$row->i_idea_category.'')?>" class="buy-btn">Remove</a>
  </div>
<?php 
    }
 if(!$check){
 ?>
 <h1 align="center" style="padding-top: 100px;">No Preference Yet</h1>
 <?php 
 }
 ?>