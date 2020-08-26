

  <!-- Modal Add Customer-->
  <div class="modal fade" id="refilling_company" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action="" method="post">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Refilling Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
       <label>Refilling Company Name</label>
       <input type="text" class="form-control" name="company_name" required >
       </div>
       
      </div>
      <div class="modal-footer">
        <button type="submit" name="refilling_button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
  </form>
</div>

<?php


if(isset($_POST['refilling_button'])){
$customer = $_POST['company_name'];


$select = SelectDb($pdo,'refilling_company','name',$customer);
    $row=$select->fetch(PDO::FETCH_OBJ);
    if($row->name == $customer){
      echo "<script>
      alert('Customer Exist');
      </script>";

    }else{

      $query = "`name`";
      $values = "`$customer`";

     $insert = $pdo->prepare("INSERT INTO `refilling_company`( `name`) VALUES ('$customer')");
      if($insert->execute()){
        echo "<script>
      alert('Refilling Company Added');
    window.location.href = 'index.php';
      </script>";
      }else{
        echo "<script>
      alert('Failed to Add Refilling Company');
    window.location.href = 'index.php';
      </script>";
      }

    }
}
?>