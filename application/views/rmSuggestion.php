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
<h1 align="center" style="padding-top: 50px;">Relationship-Manager Suggestions</h1>
<?php
$check=false;
 $this->load->database();
 $this->db->select();
 $this->db->from('tbl_assignrm');
 $this->db->where('client_id',$_SESSION['CusID']);
 $query = $this->db->get();
 foreach ($query->result() as $row) {
    $check=true;
    $rmID=$row->idRM;
    $this->db->select();
    $this->db->from('tbl_relationshipmanager');
    $this->db->where('idRM',$rmID);
    $query2 = $this->db->get();
    foreach ($query2->result() as $row2) {
?>
  <div>
    <h3 align="center">My RM:  <?php echo $row2->nameRM; ?></h3>
  </div>
<div class="product-container">
<?php 
    }
}
 $status=0;
 $this->db->select();
 $this->db->from('tbl_rmsuggestion');
 $this->db->where('client_id',$_SESSION['CusID']);
 $this->db->where('idRM',$rmID);
 $query3 = $this->db->get();
 foreach ($query3->result() as $row3){
    $status=1;
    $ideaID=$row3->i_idea_id;
    $this->db->select();
    $this->db->from('tbl_investmentideas');
    $this->db->where('i_idea_id',$ideaID);
    $query4 = $this->db->get();
    foreach ($query4->result() as $row4) {
        ?>
        <div class="product-box">
        <h3><?php echo $row4->i_idea_title; ?></h3>
        <p><?php echo $row4->i_idea_category; ?></p>
        <a style="text-decoration: none;transition: border-bottom-color 0.3s ease-in-out;" href="<?php echo site_url('ControllerForCustomer/invest/'.$row3->i_idea_id.'')?>" class="buy-btn">Interested?</a>
        </div>
        <?php
    }
}
 if(!$check){
 ?>
 <h1 align="center" style="padding-top: 100px;">No Relationship Manager Assigned Yet</h1>
 <?php 
 }
 if($status==0){
    ?>
    <h1 align="center" style="padding-top: 100px;">No Suggestions Yet</h1>
    <?php 
    }
 ?>
 </div>