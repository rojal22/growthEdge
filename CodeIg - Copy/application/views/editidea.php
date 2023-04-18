<?php
include("headerAdmin.php");
?>
<html>
    <head>
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
        </style>
    </head>
<form class="feel-good-form" action="<?php echo site_url('ControllerForAdmin/editIdeaSumit'); ?>" method="post">
            <h1>Idea Details
            </h1><br><br>
            <?php 
                        $ididea=$_SESSION['ideaID'];
                        $this->db->select();
                        $this->db->from('tbl_investmentideas');
                        $this->db->where('i_idea_id',$ididea);
                        $query1 = $this->db->get();
                        foreach ($query1->result() as $row1) {
                     ?>
                     <label for="title">Title:</label>
  <input type="text" id="title" name="title" value="<?php echo $row1->i_idea_title; ?>" required>

  <label for="email">Expire Data:</label>
  <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $row1->i_idea_Rdate; ?>" required>

  <label for="Owner">Idea Owner</label>
  <input type="text" id="Owner" name="Owner" value="<?php echo $row1->i_idea_owner; ?>" required>
  <label for="Description">Description <span style="font-size: 10px;padding-left:15px;">(*Maximum 300 words)</span></label>
  <textarea name="desc" required><?php echo $row1->i_idea_desc; ?></textarea>
  <label for="country">country</label>
  <input type="text" id="country" name="country" value="<?php echo $row1->i_idea_country; ?>" required>
  <label for="Category">Category</label>
  <input type="text" id="Category" name="Category" value="<?php echo $row1->i_idea_category; ?>" required>
  <?php  if ($this->session->flashdata('error')) { ?>
            <div ><?php echo $this->session->flashdata('error'); ?></div>
  <?php } ?>
  <button type="submit">Edit</button> <?php }?>
                        </form>
</body>
</html>
            
    </body>
</html>
