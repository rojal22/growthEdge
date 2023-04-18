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

</style>
        </style>
    </head>
    <div style="padding-top: 5%; padding-left: 35%; padding-right:0%; font-family: 'Open Sans', sans-serif;">
            <h1>Customer Details
            </h1><br><br>
            <?php
         
                ?>
            <table class="feel-good-table">
                <tr>
                    <th style="text-align:left;">Name</th>
                    <td style="width: 100%;text-align:center;"><?php 
                        $id=$_SESSION['CID'];
                        $this->db->select();
                        $this->db->from('tbl_clientregistration');
                        $this->db->where('client_id',$id);
                        $query1 = $this->db->get();
                        foreach ($query1->result() as $row1) {
                        echo $row1->c_name;
                     ?></td>
                </tr>
                <tr>
                    <th style="text-align:left;">Phone</th>
                    <td style="width: 100%;text-align:center;"><?php echo $row1->c_contactNumber ?></td>
                </tr>
                <tr>
                    <th style="text-align:left; width: 40%;">Secondary Phone Number</th>
                    <td style="width: 100%;text-align:center;"><?php echo $row1->c_alternativeContactNo ?></td>
                </tr>
                <tr>
                    <th style="text-align:left;">Address</th>
                    <td style="width: 100%;text-align:center;"><?php echo $row1->c_address ?></td>
                </tr>
                <tr>
                    <th style="text-align:left;">Post Code</th>
                    <td style="width: 100%;text-align:center;"><?php echo $row1->c_postcode ?></td>
                </tr>
                <tr>
                    <th style="text-align:left;">E-Mail ID</th>
                    <td style="width: 100%;text-align:center;"><?php echo $row1->c_email ?></td>
                </tr>
                <tr>
                <th style="text-align:left;">Relationship-Manager</th>
                    <?php
                      $this->db->select();
                      $this->db->from('tbl_assignrm');
                      $this->db->where('client_id',$id);
                      $query2 = $this->db->get();
                      foreach ($query2->result() as $row2) {
                        $rmid=$row2->idRM;
                      }
                      if($query2->result()!=NULL){
                      $this->db->select();
                      $this->db->from('tbl_relationshipmanager');
                      $this->db->where('idRM',$rmid);
                      $query3 = $this->db->get();
                      foreach ($query3->result() as $row3) {
                        $rmName=$row3->nameRM;
                      }
                      ?>
                      <td style="width: 100%;text-align:center;"><?php echo $rmName?></td>
                      <?php
                    }
                    if($query2->result()==null){?>
                      <td style="width: 100%;text-align:center;">No RM Assigned Yet</td>
                    <?php }
                    ?>
                </tr>       
                <?php }?>
        </div>
</body>
</html>
            
    </body>
</html>
