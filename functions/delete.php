<?php


function Delete($pdo,$db,$query,$value){
    $delete = $pdo->prepare("DELETE FROM `$db` WHERE `$query` = `$value`");
    if($delete->execute()){
        $return = "Deleted Sucessfully";
        return $return;
    }else{
        $return = "Failed to Delete";
        return $return;
    }

}

?>