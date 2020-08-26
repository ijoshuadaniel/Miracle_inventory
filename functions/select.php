<?php

function SelectDb(PDO $pdo ,String $db , String $feild , String $value){
    $select = $pdo->prepare("SELECT * FROM `$db` WHERE `$feild` = '$value'");
    $select->execute();
    return $select;
}

function SelectAll(PDO $pdo ,String $db ){
    $select = $pdo->prepare("SELECT * FROM `$db`");
    $select->execute();
    return $select;
}


?>