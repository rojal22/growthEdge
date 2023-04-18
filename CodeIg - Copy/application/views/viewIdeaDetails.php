<?php
include("headerAdmin.php");
?>
<html>
    <head>
        <style>
            <style>
    .feel-good-table {
  border-collapse: collapse;
  width: 100%;
  max-width: 600px;
  margin: 20px auto;
  font-family: 'Helvetica Neue', sans-serif;
  color: #333   ;
  background-color: #fff;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.feel-good-table th,
.feel-good-table td {
  padding: 15px;
  text-align: left;
}
.

.feel-good-table th {
  background-color: #f2b632;
  color: #fff;
  text-transform: uppercase;
  font-size: 14px;
  letter-spacing: 1px;
}

.feel-good-table tbody tr:nth-child(even) {
  background-color: #f5f5f5;
}

.feel-good-table tbody tr:hover {
  background-color: #e0e0e0;
  cursor: pointer;
}

.feel-good-table tbody td:last-child {
  font-weight: bold;
}


.feel-good-table tbody td:last-child {
  font-weight: bold;
}
.feel-good-button {
  display: inline-block;
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

.feel-good-button:hover {
  background-color: #e0ac3d;
}
</style>
        </style>
    </head>
    <div style="padding-top: 5%; padding-left: 35%; padding-right:0%; font-family: 'Open Sans', sans-serif;">
            <h1>Idea Details
            </h1><br><br>
            <?php
         
                ?>
            <table class="feel-good-table" style="font-weight: bold;">
                <tr>
                    <th style="text-align:left;">Name</th>
                    <td style="width: 100%;text-align:center;"><?php 
                        $idRM=$_SESSION['ideaID'];
                        $this->db->select();
                        $this->db->from('tbl_investmentideas');
                        $this->db->where('i_idea_id',$idRM);
                        $query1 = $this->db->get();
                        foreach ($query1->result() as $row1) {
                        echo $row1->i_idea_title;
                     ?></td>
                </tr>
                <tr>
                    <th style="text-align:left;">Owner</th>
                    <td style="width: 100%;text-align:center;"><?php echo $row1->i_idea_owner ?></td>
                </tr>
                <tr>
                    <td style="text-align:left;">Expiry Date</td>
                    <td style="width: 100%;text-align:center;"><?php echo $row1->i_idea_Rdate ?></td>
                </tr> 
                <tr>
                    <td style="text-align:left;">Category</td>
                    <td style="width: 100%;text-align:center;"><?php echo $row1->i_idea_category ?></td>
                </tr>  
                <tr>
                    <td style="text-align:left;">Description</td>
                    <td style="width: 100%;text-align:center;"><?php echo $row1->i_idea_desc ?></td>
                </tr>  
                <tr>
                    <td style="text-align:left;">Country</td>
                    <td style="width: 100%;text-align:center;"><?php echo $row1->i_idea_country ?></td>
                </tr>  
                <tr><td  colspan="2" style="text-align:center;"><form action="<?php echo site_url('ControllerForAdmin/EditIdea'); ?>" method="post"><button  class="feel-good-button">EDIT</button></form><td><tr>      
                <?php }?>
        </div>
</body>
</html>
            
    </body>
</html>
