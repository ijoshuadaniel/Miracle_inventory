
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data | Miracle Inventory</title>
    <!-- css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
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

<table class="table table-stripped ">
<thead>
<th>Date</th>
<th>Rotation No.</th>
<th>Manufacture No.</th>
<th>Customer</th>
<th>Dc No.</th>
<th>Bill No.</th>
<th>Gas</th>
<th>Cylinder Type</th>
</thead>

<tbody>
<?php
include './db.php';
$select = $pdo->prepare("SELECT * FROM `supply`");
$select->execute();
while($row=$select->fetch(PDO::FETCH_OBJ)){
  echo "
  <tr>
  <td>$row->date</td>
  <td>$row->rotation_no</td>
  <td>$row->manufacture_no</td>
  <td>$row->customer</td>
  <td>$row->dc_no</td>
  <td>$row->bill_no</td>
  <td>$row->gas</td>
  <td>$row->type</td>
  </tr>
  ";
}
?>
</tbody>

</table>

</div>
      <!-- script -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
$('.table').dataTable();
</script>


</body>
</html>

