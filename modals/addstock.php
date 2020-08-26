<!-- Modal Add to Stock-->
<div class="modal fade" id="Add_to_Stock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action="" method="post">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add to Stock</h5>
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
       <select name="rotation_no" class="form-control" id="stock_rotation_no">
       <option selected="selected" value="">Select Rotation No</option>
     <?php
     
     $select = SelectAll($pdo,'refilling');
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
       <input type="text" class="form-control" name="manufacture_no" id="stock_manufacture_no" readonly>
       </div>
       </div>

      </div>


      <div class="row">
      
      <div class="col-md-6">
      <div class="form-group">
      <label>Dc No.</label>
      <input type="text" class="form-control" name="dc_no">
      </div>
      </div>


      <div class="col-md-6">
      <div class="form-group">
      <label>Date</label>
      <input type="date" class="form-control" name="bill_date">
      </div>
      </div>

      </div>



       <div class="form-group">
       <label>Refilled By</label>
       <input type="text" class="form-control" name="refilledby" id="stock_refilledby" readonly>
       </div>

       <div class="form-group">
       <label>Type of Gas</label>
       <input type="text" class="form-control" name="gas" id="stock_gas" readonly>
       </div>

       <div class="form-group">
       <label>Type of Cylinder</label>
       <input type="text" class="form-control" name="cylinder_type" id="stock_cylinder_type" readonly>
       </div>

      </div>
      <div class="modal-footer">
        <button type="submit" name="addtostock"class="btn btn-primary">Add to Stock</button>
      </div>
    </div>
  </div>
  </form>
</div>


<script>
$('#stock_rotation_no').change(function(){
  let rotation_no = $(this).val();
  $.ajax({
    method: "GET",
    url: "./modals/supplydata.php",
    data: {
        data : rotation_no,
        db: 'refilling'
    
    },
    success: function (data) {
     $('#stock_manufacture_no').val(data.manufacture_no);
     $('#stock_refilledby').val(data.company);
     $('#stock_gas').val(data.gas);
     $('#stock_cylinder_type').val(data.type);
    }
  });
})
</script>


<?php
if(isset($_POST['addtostock'])){
  $rotation_no = $_POST['rotation_no'];
  $manufacture_no = $_POST['manufacture_no'];
  $company_name = $_POST['refilledby'];
  $dc_no = $_POST['dc_no'];
  $bill_date = $_POST['bill_date'];
  $gas = $_POST['gas'];
  $cylinder_type = $_POST['cylinder_type'];
  $status = 'Added to Stock';
  
  $insert = $pdo->prepare("INSERT INTO `stock`( `rotation_no`, `manufacture_no`, `dc_no`, `company`, `bill_date`, `gas`, `type`) 
  VALUES ('$rotation_no','$manufacture_no','$dc_no','$company_name','$bill_date','$gas','$cylinder_type')");
  if($insert->execute()){
    
    $add = $pdo->prepare("INSERT INTO `master`(`rotation_no`, `manufacture_no`, `recipt`, `date`, `client`, `gas`, `type`,`status`) 
    VALUES ('$rotation_no','$manufacture_no','$dc_no','$bill_date','$company_name','$gas','$cylinder_type','$status')");
    $add->execute();
    
    $delete = $pdo->prepare("DELETE FROM `refilling` WHERE `rotation_no` = '$rotation_no'");

    if($delete->execute()){
    echo "<script>
    alert('Added to Stock');
    window.location.href = 'index.php';
    </script>";

  }
  else{
    echo "<script>alert('Failed to add to Stock')</script>";
  }
  }else{
    echo "<script>alert('Failed to add to Stock')</script>";
  }
}

?>