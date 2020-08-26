<?php
include './db.php';
$id = $_GET['id'];

$select = $pdo->prepare("SELECT * FROM `add_cylinder` WHERE `rotation_no`='$id'");
$select->execute();
$row=$select->fetch(PDO::FETCH_OBJ);
$rotation_no=$row->rotation_no;
$manufacture_no=$row->manufacture_no;
$remarks=$row->remarks;
$type=$row->type;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data | Miracle Inventory</title>
    <!-- css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    
    <h2 class="text-center mt-2">Miracle Gases and Equipments</h2>
    <h4 class="text-center margin-top">Cylinder Master Data</h4>

    <!-- navbar -->
  <div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item active">
        <a class="nav-link"  href="index.php">Dashboard</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="alldata.php">All</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="stockreport.php">Stock</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="supplyreport.php">Supply</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="emptyreport.php">Empty</a>
      </li> 
      <li class="nav-item active">
        <a class="nav-link" href="refillingreport.php">Refilling</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="customers.php">Customers</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="allcylinder.php">All Cylinders</a>
      </li>
    </ul>
</nav>
  </div>


<div class="container margin-top">

<form action="" method="POST">
<div class="row">
       
       <div class="col-md-6"> 
       <div class="form-group">
       <label>Cylinder Rotation No.</label>
       <input type="text" class="form-control" name="cylinder_rotation_no" required value="<?=$rotation_no?>">
       </div>
       </div>

       <div class="col-md-6">
       <div class="form-group">
       <label>Cylinder Manufacture No.</label>
       <input type="text" class="form-control" name="cylinder_manufacture_no" required value="<?=$manufacture_no?>">
       </div>
       </div>

       </div>


       <div class="row">
       
       <div class="col-md-6">
       <div class="form-group">
       <label>Type of Gas</label>
        <select name="gas" class="form-control" >
        <option value="Oxygen">OXYGEN</option>
        <option value="MO2">MO2</option>
        <option value="Nitrogen">NITROGEN</option>
        <option value="Argon">ARGON</option>
        <option value="ACM">ACM</option>
        <option value="CO2">CO2</option>
        <option value="DA">DA</option>
        <option value="0 Air">0 AIR</option>
        <option value="Helium">HELIUM</option>
        <option value="Hydrogen">HYDROGEN</option>
        </select>
       </div>
       </div>

       <div class="col-md-6">
       <div class="form-group">
       <label>Type of Cylinder</label>
       <select name="cylinder_type" class="form-control">
        <option value="B">B</option>
        <option value="D">D</option>
        </select>
       </div>
       </div>

       </div>

       <div class="form-group">
       <label>Remarks</label>
       <input type="text" class="form-control" name="remarks" required value="<?=$remarks?>">
       </div>

       <div class="form-group">
       <label>Status</label>
       <select name="status" class="form-control">
       <option value="Active">Active</option>
       <option value="Sold">Sold</option>
       </select>
       </div>

       <div class="form-group">
         <input type="submit" value="Update Cylinder" name="update" class="form-control btn btn-success">
       </div>

</form>
</div>
      <!-- script -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</body>
</html>



<?php
if(isset($_POST['update'])){
  $rotation_no = $_POST['cylinder_rotation_no'];
  $manufacture_no = $_POST['cylinder_manufacture_no'];
  $remarks = $_POST['remarks'];
  $gas = $_POST['gas'];
  $cylinder_type = $_POST['cylinder_type'];
  $status = $_POST['status'];
  

  $update = $pdo->prepare("UPDATE `add_cylinder` SET `rotation_no`='$rotation_no',`manufacture_no`='$manufacture_no',`gas`='$gas',`type`='$cylinder_type',`remarks`='$remarks',`status`='$status' WHERE `rotation_no` = '$id'");
  if($update->execute()){
    echo "<script>
    alert('Cylinder Updated');
    window.location.href = 'allcylinder.php';
    </script>";
  }else{
    echo "<script>
    alert('Cylinder Failed Updated');
    window.location.href = 'allcylinder.php';
    </script>";
  }
}

?>