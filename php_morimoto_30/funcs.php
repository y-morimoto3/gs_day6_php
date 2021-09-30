<?php
// XSS対策
function h($val){
    return htmlspecialchars($val,ENT_QUOTES);
}

try {
    //ID:'root', Password: 'root'
    $pdo = new PDO('mysql:dbname=shop_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}



?>