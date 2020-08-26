
<?
// db
include 'db.php';
include './functions/all.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data | Miracle Inventory</title>
    <!-- css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />
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
        <a class="nav-link"  href="#">Dashboard</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#Add_Cylinder">Add Cylinder</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#addCustomer">Add Customer</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#refilling_company">Add Refilling Co.</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#Add_to_Stock">Add to Stock</a>
      </li> 
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#AddtoSupply">Send to Supply</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#AddtoEmpty">Return to Empty</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#AddtoRefilling">Send to Refilling</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="stockreport.php">Reports</a>
      </li>
    </ul>
</nav>
  </div>

  <div class="container margin-top">
  <div class="row">

  <div class="col-md-3 atag">
  <a href="">
  <div class="card bg-success text-center text-light">
  <div class="card-heading margin-top">
  <h3>Stock</h3>
  </div>
  <div class="card-body">
  <h4><?=$stockcount = rowCount($pdo,'stock');?></h4>
  </div>
  </div>
  </a>
  </div>

  <div class="col-md-3 atag">
  <a href="">
  <div class="card bg-primary text-center text-light">
  <div class="card-heading margin-top">
  <h3>Supply</h3>
  </div>
  <div class="card-body">
  <h4><?=$stockcount = rowCount($pdo,'supply');?></h4>
  </div>
  </div>
  </a>
  </div>

  <div class="col-md-3 atag">
  <a href="">
  <div class="card bg-danger text-center text-light">
  <div class="card-heading margin-top">
  <h3>Empty</h3>
  </div>
  <div class="card-body">
  <h4><?=$stockcount = rowCount($pdo,'empty');?></h4>
  </div>
  </div>
  </a>
  </div>

  <div class="col-md-3 atag">
  <a href="">
  <div class="card bg-warning text-center text-light">
  <div class="card-heading margin-top">
  <h3>Refilling</h3>
  </div>
  <div class="card-body">
  <h4><?=$stockcount = rowCount($pdo,'refilling');?></h4>
  </div>
  </div>
  </a>
  </div>


  </div>
  </div>


  <div class="container margin-top"  >
  <table class="table table-bordered">
  <thead>
  <th>Gas</th>
  <th>Oxygen</th>
  <th>MO2</th>
  <th>Nitrogen</th>
  <th>Argon</th>
  <th>ACM</th>
  <th>CO2</th>
  <th>DA</th>
  <th>0 Air</th>
  <th>Helium</th>
  <th>Hydrogen</th>
  <th>Total</th>
  </thead>
  <tbody>
  
  <tr>
  <td>Stocks</td>
  <td><?=$OXYGEN=specificCount($pdo,'stock','OXYGEN');?></td>
  <td><?=$MO2=specificCount($pdo,'stock','MO2');?></td>
  <td><?=$NITROGEN=specificCount($pdo,'stock','NITROGEN');?></td>
  <td><?=$ARGON=specificCount($pdo,'stock','ARGON');?></td>
  <td><?=$ACM=specificCount($pdo,'stock','ACM');?></td>
  <td><?=$CO2=specificCount($pdo,'stock','CO2');?></td>
  <td><?=$DA=specificCount($pdo,'stock','DA');?></td>
  <td><?=$AIR=specificCount($pdo,'stock','0 AIR');?></td>
  <td><?=$HELIUM=specificCount($pdo,'stock','HELIUM');?></td>
  <td><?=$HYDROGEN=specificCount($pdo,'stock','HYDROGEN');?></td>
  <td><?=$TOTAL=$OXYGEN+$MO2+$NITROGEN+$ARGON+$ACM+$CO2+$DA+$AIR+$HELIUM+$HYDROGEN;?></td>
  </tr>
  

  <tr>
  <td>Supply</td>
  <td><?=$OXYGEN1=specificCount($pdo,'supply','OXYGEN');?></td>
  <td><?=$MO21=specificCount($pdo,'supply','MO2');?></td>
  <td><?=$NITROGEN1=specificCount($pdo,'supply','NITROGEN');?></td>
  <td><?=$ARGON1=specificCount($pdo,'supply','ARGON');?></td>
  <td><?=$ACM1=specificCount($pdo,'supply','ACM');?></td>
  <td><?=$CO21=specificCount($pdo,'supply','CO2');?></td>
  <td><?=$DA1=specificCount($pdo,'supply','DA');?></td>
  <td><?=$AIR1=specificCount($pdo,'supply','0 AIR');?></td>
  <td><?=$HELIUM1=specificCount($pdo,'supply','HELIUM');?></td>
  <td><?=$HYDROGEN1=specificCount($pdo,'supply','HYDROGEN');?></td>
  <td><?=$TOTAL1=$OXYGEN1+$MO21+$NITROGEN1+$ARGON1+$ACM1+$CO21+$DA1+$AIR1+$HELIUM1+$HYDROGEN1;?></td>
  </tr>


  <tr>
  <td>Empty</td>
  <td><?=$OXYGEN2=specificCount($pdo,'empty','OXYGEN');?></td>
  <td><?=$MO22=specificCount($pdo,'empty','MO2');?></td>
  <td><?=$NITROGEN2=specificCount($pdo,'empty','NITROGEN');?></td>
  <td><?=$ARGON2=specificCount($pdo,'empty','ARGON');?></td>
  <td><?=$ACM2=specificCount($pdo,'empty','ACM');?></td>
  <td><?=$CO22=specificCount($pdo,'empty','CO2');?></td>
  <td><?=$DA2=specificCount($pdo,'empty','DA');?></td>
  <td><?=$AIR2=specificCount($pdo,'empty','0 AIR');?></td>
  <td><?=$HELIUM2=specificCount($pdo,'empty','HELIUM');?></td>
  <td><?=$HYDROGEN2=specificCount($pdo,'empty','HYDROGEN');?></td>
  <td><?=$TOTAL2=$OXYGEN2+$MO22+$NITROGEN2+$ARGON2+$ACM2+$CO22+$DA2+$AIR2+$HELIUM2+$HYDROGEN2;?></td>
  </tr>


  <tr>
  <td>Refilling</td>
  <td><?=$OXYGEN3=specificCount($pdo,'refilling','OXYGEN');?></td>
  <td><?=$MO23=specificCount($pdo,'refilling','MO2');?></td>
  <td><?=$NITROGEN3=specificCount($pdo,'refilling','NITROGEN');?></td>
  <td><?=$ARGON3=specificCount($pdo,'refilling','ARGON');?></td>
  <td><?=$ACM3=specificCount($pdo,'refilling','ACM');?></td>
  <td><?=$CO23=specificCount($pdo,'refilling','CO2');?></td>
  <td><?=$DA3=specificCount($pdo,'refilling','DA');?></td>
  <td><?=$AIR3=specificCount($pdo,'refilling','0 AIR');?></td>
  <td><?=$HELIUM3=specificCount($pdo,'refilling','HELIUM');?></td>
  <td><?=$HYDROGEN3=specificCount($pdo,'refilling','HYDROGEN');?></td>
  <td><?=$TOTAL3=$OXYGEN3+$MO23+$NITROGEN3+$ARGON3+$ACM3+$CO23+$DA3+$AIR3+$HELIUM3+$HYDROGEN3;?></td>
  </tr>

  <tr>
  <td>Total</td>
  <td><?=$h_OXYGEN = $OXYGEN+$OXYGEN1+$OXYGEN2+$OXYGEN3?></td>
  <td><?=$h_MO2 = $MO2+$MO21+$MO22+$MO23?></td>
  <td><?=$h_NITROGEN= $NITROGEN+$NITROGEN1+$NITROGEN2+$NITROGEN3?></td>
  <td><?=$h_ARGON= $ARGON+$ARGON1+$ARGON2+$ARGON3?></td>
  <td><?=$h_ACM= $ACM+$ACM1+$ACM2+$ACM3?></td>
  <td><?=$h_CO2= $CO2+$CO21+$CO22+$CO23?></td>
  <td><?=$h_DA= $DA+$DA1+$DA2+$DA3?></td>
  <td><?=$h_AIR= $AIR+$AIR1+$AIR2+$AIR3?></td>
  <td><?=$h_HELIUM= $HELIUM+$HELIUM1+$HELIUM2+$HELIUM3?></td>
  <td><?=$h_HYDROGEN= $HYDROGEN+$HYDROGEN1+$HYDROGEN2+$HYDROGEN3?></td>
  <td><?=$h_TOTAL=$TOTAL+$TOTAL1+$TOTAL2+$TOTAL3?></td>
  </tr>

  </tbody>
  </table>
  </div>

  
  


  



 





    <!-- script -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>


<?php

// functions

include './functions/select.php';
include './functions/insert.php';
include './functions/delete.php';

// modals 
include './modals/addcustomer.php';
include './modals/addcylinder.php';
include './modals/addstock.php';
include './modals/addsupply.php';
include './modals/addempty.php';
include './modals/addrefilling.php';
include './modals/addrefillingcompany.php';

?>



<script>

$('#suppply_rotation_no').select2();
$('#Empty_rotation_no').select2();
$('#Refilling_rotation_no').select2();
$('#refiling_company').select2();
$('#suppply_company_name').select2();
$('#stock_rotation_no').select2();

</script>

</body>
</html>




