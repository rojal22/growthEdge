<?php
include("headerAdmin.php");
?>
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
<body style="padding-top:10%; padding-left: 20%;">
<form action="<?php echo site_url('ControllerForAdmin/AddIdea'); ?>" method="post">
<button class="feel-good-button">Add New Idea</button>
</form>
<table class="feel-good-table">
  <thead>
    <tr>
      <th>#</th>
      <th>Idea</th>
      <th>View Deatils</th>
    </tr>
  </thead>
<?php
$sql = "SELECT * FROM tbl_investmentideas";
$query = $this->db->query($sql);
$i=1;
foreach ($query->result() as $row) {
?>
  <tbody>
    <tr>
    <td><?php echo $i; $i++; ?></td>
    <td><?php echo strtoupper($row->i_idea_title); ?></td>
    <td><a style="color: blue;text-decoration: none;transition: border-bottom-color 0.3s ease-in-out;" href="<?php echo site_url('ControllerForAdmin/viewDetailsIdea/'.$row->i_idea_id.'')?>"><u>View More</u></td>
    </tr>
  </tbody>
  <?php }
if($query->result()==null){
    ?>
    <h1 align="center">NO RECORDS FOUND</h1>
<?php
    }
?>
</table>
</body>
