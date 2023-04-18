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
<h1 align="center" style="padding-top: 50px;">Investment Ideas</h1>
<div class="product-container">
<?php
 $stat=0;
 $check=false;
 $this->load->database();
 $this->db->select();
 $this->db->from('tbl_interestedarea');
 $this->db->where('client_id',$_SESSION['CusID']);
 $query = $this->db->get();
 foreach ($query->result() as $row) {
    $check=true;
    $cat=$row->i_idea_category;
    $this->db->select();
    $this->db->from('tbl_investmentideas');
    $this->db->where('i_idea_category',$cat);
    $query2 = $this->db->get();
    foreach ($query2->result() as $row2) {
        $s=0;
        $this->db->select();
        $this->db->from('tbl_likedidea');
        $this->db->where('client_id',$_SESSION['CusID']);
        $query5 = $this->db->get();
        foreach ($query5->result() as $row5){
            if($row5->i_idea_id==$row2->i_idea_id){
                $s=1;
            }
        }
        if($s==0){
          $stat=1;
?>
  <div class="product-box">
    <h3><?php echo $row2->i_idea_title; ?></h3>
    <p><?php echo $row2->i_idea_category; ?></p>
    <a style="text-decoration: none;transition: border-bottom-color 0.3s ease-in-out;" href="<?php echo site_url('ControllerForCustomer/invest/'.$row2->i_idea_id.'')?>" class="buy-btn">Interested?</a>
  </div>
<?php 
        }
    }
 }
 if(!$check){
    $this->db->select();
    $this->db->from('tbl_investmentideas');
    $query3 = $this->db->get();
    foreach ($query3->result() as $row3) {
        $s=0;
        $this->db->select();
        $this->db->from('tbl_likedidea');
        $this->db->where('client_id',$_SESSION['CusID']);
        $query4 = $this->db->get();
        foreach ($query4->result() as $row4){
            if($row4->i_idea_id==$row3->i_idea_id){
                $s=1;
            }
        }
        if($s==0){
        $stat=1;
?>
  <div class="product-box">
    <h3><?php echo $row3->i_idea_title; ?></h3>
    <p><?php echo $row3->i_idea_category; ?></p>
    <a style="text-decoration: none;transition: border-bottom-color 0.3s ease-in-out;" href="<?php echo site_url('ControllerForCustomer/invest/'.$row3->i_idea_id.'')?>" class="buy-btn">Interested?</a>
  </div>
<?php 
        }
    }

 }
 if($stat==0){
?>
<h1 align="center" style="padding-top: 50px;">No Investment Idea To Display</h1>
<?php
}
?>
</div>
