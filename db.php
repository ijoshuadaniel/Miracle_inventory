<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=miracle_inventory','root','');
} catch (PDOExpection $th) {
    echo $th;
}
?>