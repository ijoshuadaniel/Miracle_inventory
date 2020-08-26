

  <!-- Modal Add Customer-->
  <div class="modal fade" id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action="" method="post">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
       <label>Company Name</label>
       <input type="text" class="form-control" name="company_name" required >
       </div>
       
      </div>
      <div class="modal-footer">
        <button type="submit" name="add_customer" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
  </form>
</div>

<?php


if(isset($_POST['add_customer'])){
$customer = $_POST['company_name'];


$select = SelectDb($pdo,'customer','name',$customer);
    $row=$select->fetch(PDO::FETCH_OBJ);
    if($row->name == $customer){
      echo "<script>
      alert('Customer Exist');
      </script>";

    }else{

      $query = "`name`";
      $values = "`$customer`";

     $insert = $pdo->prepare("INSERT INTO `customer`( `name`) VALUES ('$customer')");
      if($insert->execute()){
        echo "<script>
      alert('Customer Added');
    window.location.href = 'index.php';
      </script>";
      }else{
        echo "<script>
      alert('Failed to Add Customer');
    window.location.href = 'index.php';
      </script>";
      }

    }
}
?>