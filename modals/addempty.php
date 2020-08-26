<!-- Modal Send to Supply-->
<div class="modal fade" id="AddtoEmpty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<form action="" method="post">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add to Empty</h5>
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
       <select name="rotation_no" class="form-control" id="Empty_rotation_no">
       <option selected="selected" value="">Select Rotation No</option>
     <?php
     
     $select = SelectAll($pdo,'supply');
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
       <input type="text" class="form-control" name="manufacture_no" id="Empty_manufacture_no" readonly>
       </div>
       </div>
       </div>

       <div class="form-group">
       <label>Customer Name</label>
       <input type="text" readonly name="company_name" class="form-control" id="Empty_company_name">
       </div>
       
       <div class="row">

       <div class="col-md-6">
       <div class="form-group">
       <label>Empty Recipt No.</label>
       <input type="text" name="empty_reciept" class="form-control">
       </div>
       </div>


       <div class="col-md-6">
       <div class="form-group">
       <label>date</label>
       <input type="date" name="bill_dates" class="form-control">
       </div>
       </div>
       

       </div>


       <div class="form-group">
       <label>Type of Gas</label>
       <input type="text" class="form-control" name="gas" id="Empty_gas" readonly>
       </div>

       <div class="form-group">
       <label>Type of Cylinder</label>
       <input type="text" class="form-control" name="cylinder_type" id="Empty_cylinder_type" readonly>
       </div>

      </div>
      <div class="modal-footer">
        <button type="submit" name="addtoempty" class="btn btn-primary">Return to Empty</button>
      </div>
    </div>
  </div>
  </form>
</div>


<script>
$('#Empty_rotation_no').change(function(){
  let rotation_no = $(this).val();
  $.ajax({
    method: "GET",
    url: "./modals/supplydata.php",
    data: {
        data : rotation_no,
        db: 'supply'
    
    },
    success: function (data) {
     $('#Empty_manufacture_no').val(data.manufacture_no);
     $('#Empty_gas').val(data.gas);
     $('#Empty_cylinder_type').val(data.type);
     $('#Empty_company_name').val(data.customer);
    }
  });
})
</script>


<?php
if(isset($_POST['addtoempty'])){
  $rotation_no = $_POST['rotation_no'];
  $manufacture_no = $_POST['manufacture_no'];
  $company_name = $_POST['company_name'];
  $empty_reciept = $_POST['empty_reciept'];
  $dates = $_POST['bill_dates'];
  $gas = $_POST['gas'];
  $cylinder_type = $_POST['cylinder_type'];
  $status = 'Returned to Empty';
  
  $insert = $pdo->prepare("INSERT INTO `empty`(`rotation_no`, `manufacture_no`, `customer`, `empty_receipt`, `date`, `gas`, `type`) 
  VALUES ('$rotation_no','$manufacture_no','$company_name','$empty_reciept','$dates','$gas','$cylinder_type')");
  if($insert->execute()){
    
    $add = $pdo->prepare("INSERT INTO `master`(`rotation_no`, `manufacture_no`, `recipt`, `date`, `client`, `gas`, `type`,`status`) 
    VALUES ('$rotation_no','$manufacture_no','$empty_reciept','$dates','$company_name','$gas','$cylinder_type','$status')");
    $add->execute();
    

    $delete = $pdo->prepare("DELETE FROM `supply` WHERE `rotation_no` = '$rotation_no'");
    if($delete->execute()){
    echo "<script>alert('Sent to Empty');
    window.location.href = 'index.php';
    </script>";

  }
  else{
    echo "<script>alert('Failed to send to Empty')</script>";
  }
  }else{
    echo "<script>alert('Failed to send to Empty1' )</script>";
  }

}

?>