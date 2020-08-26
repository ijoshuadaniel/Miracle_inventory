<?php

function InsertDb(PDO $pdo ,String $db , String $query ,String $values){
    $insert = $pdo->prepare("INSERT INTO $db($query) VALUES($values)");
    $insert->execute();
    return $insert;
}


?>