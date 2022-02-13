<?php

require_once '../main/db.php';
session_start();
if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    $sorov = query("select * from users WHERE id = '{$id}'");
    
    while ($row = fetch_arrayy($sorov)) {
        $name = $row['first_name'];

        query("DELETE FROM `dp_korzina` WHERE `dp_korzina`.`first_name` = '$name'");
        
        query("UPDATE `users` SET `ttf` = 0 WHERE first_name = '{$name}'");
        $_SESSION['message'] = "Malumot O'chirildi";
        $_SESSION['msg_type'] = "danger";
    }
    
    header('Location: https://client1458.4bo.ru/online_shop/admin_panel/');
}

