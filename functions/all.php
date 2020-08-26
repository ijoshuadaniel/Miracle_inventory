<?

// stock count
function rowCount($pdo,$db){
    $count = $pdo->prepare("SELECT * from `$db`");
    $count->execute();
    $totalcount=$count->rowCount();
    return $totalcount;
}

function specificCount($pdo,$db,$value){
    $count = $pdo->prepare("SELECT * from `$db` WHERE `gas`= '$value'");
    $count->execute();
    $row = $count->fetchAll();
    $totalcount=count($row);
    return $totalcount;
}
?>