<!-- Modal Send to Supply-->
<div class="modal fade" id="AddtoSupply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<form action="" method="post">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send to Supply</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

       <div class="row">
       <div class="col-md-6">
       <div class="form-group">
       <label>Cylinder Rotation No.</label>
       <br>
       <select name="rotation_no" class="form-control select-two" id="suppply_rotation_no">
       <option selected="selected" value="">Select Rotation No</option>
     <?php
     
     $select = SelectAll($pdo,'stock');
     while($row=$select->fetch(PDO::FETCH_OBJ)){
       echo "<option value='$row->rotation_no'>$row->rotation_no</option>";
     }
  
 
     ?>
       </select>
       </div>
       </div>


       <div class="col-md-6">
       <div class="form-group">
       <label>Cylinder Manufacture No.</label>
       <input type="text" class="form-control" name="manufacture_no" id="suppply_manufacture_no" readonly>
       </div>
       </div>
       </div>

       <div class="form-group">
       <label>Customer Name</label>
       <br>
       <select name="company_name" class="form-control select-two supply_company" id="suppply_company_name">
       <?php
       $select = SelectAll($pdo,'customer');
       while($row=$select->fetch(PDO::FETCH_OBJ)){
         echo "<option value='$row->name'>$row->name</option>";
       }
       ?>
       </select>
       </div>
       
       <div class="row">

       <div class="col-md-3">
       <div class="form-group">
       <label>Dc No.</label>
       <input type="text" name="dc_no" class="form-control">
       </div>
       </div>

       <div class="col-md-3">
       <div class="form-group">
       <label>Bill No.</label>
       <input type="text" name="bill_no" class="form-control">
       </div>
       </div>


       <div class="col-md-6">
       <div class="form-group">
       <label>date</label>
       <input type="date" name="bill_date" class="form-control">
       </div>
       </div>
       

       </div>


       <div class="form-group">
       <label>Type of Gas</label>
       <input type="text" class="form-control" name="gas" id="suppply_gas" readonly>
       </div>

       <div class="form-group">
       <label>Type of Cylinder</label>
       <input type="text" class="form-control" name="cylinder_type" id="suppply_cylinder_type" readonly>
       </div>

      </div>
      <div class="modal-footer">
        <button type="submit" name="addtosupply" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
  </form>
</div>


<script>
$('#suppply_rotation_no').change(function(){
  let rotation_no = $(this).val();
  $.ajax({
    method: "GET",
    url: "./modals/supplydata.php",
    data: {
        data : rotation_no,
        db: 'stock'
    
    },
    success: function (data) {
     $('#suppply_manufacture_no').val(data.manufacture_no);
     $('#suppply_gas').val(data.gas);
     $('#suppply_cylinder_type').val(data.type);
    }
  });
})
</script>


<?php
if(isset($_POST['addtosupply'])){
  print_r($_POST);
  $rotation_no = $_POST['rotation_no'];
  $manufacture_no = $_POST['manufacture_no'];
  $company_name = $_POST['company_name'];
  $dc_no = $_POST['dc_no'];
  $bill_no = $_POST['bill_no'];
  $bill_date = $_POST['bill_date'];
  $gas = $_POST['gas'];
  $cylinder_type = $_POST['cylinder_type'];
  $status = 'Sent to Supply';
  
  $insert = $pdo->prepare("INSERT INTO `supply`(`rotation_no`, `manufacture_no`, `customer`, `dc_no`, `bill_no`, `date`, `gas`, `type`) 
  VALUES ('$rotation_no','$manufacture_no','$company_name','$dc_no','$bill_no','$bill_date','$gas','$cylinder_type')");
  if($insert->execute()){
  
    $add = $pdo->prepare("INSERT INTO `master`(`rotation_no`, `manufacture_no`, `recipt`, `date`, `client`, `gas`, `type`,`status`) 
    VALUES ('$rotation_no','$manufacture_no','$dc_no','$bill_date','$company_name','$gas','$cylinder_type','$status')");
    $add->execute();

    $delete = $pdo->prepare("DELETE FROM `stock` WHERE `rotation_no` = '$rotation_no'");
    if($delete->execute()){
    echo "<script>alert('Sent to Supply');
    window.location.href = 'index.php';
    </script>";

  }
  else{
    echo "<script>alert('Failed to send to Supply')</script>";
  }
  }else{
    echo "<script>alert('Failed to send to Supply')</script>";
  }



}

?>