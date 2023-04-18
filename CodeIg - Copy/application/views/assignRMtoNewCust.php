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
.feel-good-form textarea,
.feel-good-form select {
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
<?php

?>
<form class="feel-good-form" action="<?php echo site_url('ControllerForAdmin/confirmRM'); ?>" method="post">
    <h1>Assign Relationship Managers To<br>New Customer</h1>
    <?php
     $this->db->select();
     $this->db->from('tbl_clientregistration');
     $this->db->where('client_id',$id);
     $query1 = $this->db->get();
     foreach ($query1->result() as $row1) {
     $name=$row1->c_name;
     }
    ?>
  <input type="hidden" name="id" value="<?php echo $id?>">
  <label for="name">Customer Name</label>
  <input type="text" id="name" name="name" value="<?php echo $name?>" disabled>

  <label for="rm">Relationship-Manager</label>
  <select name="rm" required>
  <?php
    $sql = "SELECT * FROM tbl_RelationshipManager";
    $query = $this->db->query($sql);
    foreach ($query->result() as $row) {
  ?>
  <option value="<?php echo $row->idRM?>"><?php echo $row->nameRM?></options>
  <?php
    }
  ?>
  </select>
  <?php  if ($this->session->flashdata('error')) { ?>
            <div ><?php echo $this->session->flashdata('error'); ?></div>
  <?php } ?>
  <button type="submit">Assign</button>
</form>
