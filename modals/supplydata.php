<?php
include './../db.php';
include './../functions/select.php';

if(isset($_GET['data'])){
    $rotaion_no = $_GET['data'];
    $db = $_GET['db'];

    $select = $pdo->prepare("SELECT * FROM `$db` WHERE `rotation_no` = '$rotaion_no'");
    $select->execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);


    header('Content-Type: application.json');

    echo json_encode($row);}

?>