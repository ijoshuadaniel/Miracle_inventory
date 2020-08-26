<!-- Modal Add cylinder-->
<div class="modal fade" id="Add_Cylinder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action="" method="post">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Cylinder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

       <div class="row">
       
       <div class="col-md-6"> 
       <div class="form-group">
       <label>Cylinder Rotation No.</label>
       <input type="text" class="form-control" name="cylinder_rotation_no" required>
       </div>
       </div>

       <div class="col-md-6">
       <div class="form-group">
       <label>Cylinder Manufacture No.</label>
       <input type="text" class="form-control" name="cylinder_manufacture_no" required>
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
       <input type="text" class="form-control" name="remarks" required>
       </div>

       <div class="form-group">
       <label>Status</label>
       <select name="status" class="form-control">
       <option value="Active">Active</option>
       <option value="Sold">Sold</option>
       </select>
       </div>


      </div>
      <div class="modal-footer">
        <button type="submit" name="addcylinder_submit" class="btn btn-primary">Add Cylinder</button>
      </div>
    </div>
  </div>
  </form>
</div>



<?php


if(isset($_POST['addcylinder_submit'])){

    $rotation_no = $_POST['cylinder_rotation_no'];
    $manufacture_no = $_POST['cylinder_manufacture_no'];
    $gas = $_POST['gas'];
    $cylinder_type = $_POST['cylinder_type'];
    $remarks = $_POST['remarks'];
    $status = $_POST['status'];


    

   $select = SelectDb($pdo,'add_cylinder','rotation_no',$rotation_no);
    
    $row=$select->fetch(PDO::FETCH_OBJ);
    if($row->rotation_no == $rotation_no){
      echo "<script>
      alert('Cylinder Exist');
      </script>";
    }else{
      $query = "`rotation_no`, `manufacture_no`, `gas`, `type`, `remarks`, `status`";
      $values = "'$rotation_no','$manufacture_no','$gas','$cylinder_type','$remarks','$status'";

      $insert  = InsertDb($pdo,'add_cylinder',$query,$values);
      if($insert){
        if($status == 'Active'){
          $insert = $pdo->prepare("INSERT INTO `stock`( `rotation_no`, `manufacture_no`, `dc_no`, `company`, `bill_date`, `gas`, `type`) 
        VALUES ('$rotation_no','$manufacture_no','-','-','-','$gas','$cylinder_type')");
        $insert->execute();
      }
      
      echo "<script>
    alert('Cylinder Added');
    window.location.href = 'index.php';
    </script>";
      }else{
        echo "<script>
      alert('Failed to Add Cylinder');
    window.location.href = 'index.php';
      </script>";
      }
    }

 

}


?>

