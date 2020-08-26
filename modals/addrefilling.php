<!-- Modal Send to Supply-->
<div class="modal fade" id="AddtoRefilling" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<form action="" method="post">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send to Refilling</h5>
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
       <select name="rotation_no" class="form-control" id="Refilling_rotation_no">
       <option selected="selected" value="">Select Rotation No</option>
     <?php
     
     $select = SelectAll($pdo,'empty');
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
       br
       <input type="text" class="form-control" name="manufacture_no" id="Refilling_manufacture_no" readonly>
       </div>
       </div>
       </div>

       <div class="form-group">
       <label>Refiling Company</label>
       <br>
       <select name="refiling_company" id="refiling_company" class="form-control">
       <?php
       $select = SelectAll($pdo,'refilling_company');
       while($row=$select->fetch(PDO::FETCH_OBJ)){
         echo "<option value='$row->name'>$row->name</option>";
       }
       ?>
       </select>
       </div>
       
       <div class="row">

       <div class="col-md-6">
       <div class="form-group">
       <label>Dc No.</label>
       <input type="text" name="dc_no" class="form-control">
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
       <input type="text" class="form-control" name="gas" id="Refilling_gas" readonly>
       </div>

       <div class="form-group">
       <label>Type of Cylinder</label>
       <input type="text" class="form-control" name="cylinder_type" id="Refilling_cylinder_type" readonly>
       </div>

      </div>
      <div class="modal-footer">
        <button type="submit" name="addtorefilling" class="btn btn-primary">Send to Refilling</button>
      </div>
    </div>
  </div>
  </form>
</div>


<script>
$('#Refilling_rotation_no').change(function(){
  let rotation_no = $(this).val();
  $.ajax({
    method: "GET",
    url: "./modals/supplydata.php",
    data: {
        data : rotation_no,
        db: 'empty'
    
    },
    success: function (data) {
     $('#Refilling_manufacture_no').val(data.manufacture_no);
     $('#Refilling_gas').val(data.gas);
     $('#Refilling_cylinder_type').val(data.type);
     $('#Refilling_company_name').val(data.customer);
    }
  });
})
</script>


<?php
if(isset($_POST['addtorefilling'])){
  $rotation_no = $_POST['rotation_no'];
  $manufacture_no = $_POST['manufacture_no'];
  $company_name = $_POST['refiling_company'];
  $dc_no = $_POST['dc_no'];
  $bill_date = $_POST['bill_date'];
  $gas = $_POST['gas'];
  $cylinder_type = $_POST['cylinder_type'];
  $status = 'Sent to Refilling';
  
  $insert = $pdo->prepare("INSERT INTO `refilling`( `rotation_no`, `manufacture_no`, `company`, `dc_no`, `date`, `gas`, `type`) 
  VALUES ('$rotation_no','$manufacture_no','$company_name','$dc_no','$bill_date','$gas','$cylinder_type')");
  if($insert->execute()){
    
    $add = $pdo->prepare("INSERT INTO `master`(`rotation_no`, `manufacture_no`, `recipt`, `date`, `client`, `gas`, `type`,`status`) 
    VALUES ('$rotation_no','$manufacture_no','$dc_no','$bill_date','$company_name','$gas','$cylinder_type','$status')");
    $add->execute();
    
    $delete = $pdo->prepare("DELETE FROM `empty` WHERE `rotation_no` = '$rotation_no'");
    if($delete->execute()){
    echo "
    <script>
    alert('Sent to Refilling');
    window.location.href = 'index.php';
    </script>
    ";

  }
  else{
    echo "<script>alert('Failed to send to Refilling')</script>";
  }
  }else{
    echo "<script>alert('Failed to send to Refilling')</script>";
  }
}

?>