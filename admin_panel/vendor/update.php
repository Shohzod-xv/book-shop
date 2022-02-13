<?php
session_start();

require_once '../main/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sorov = query("select * from users WHERE id = '$id'");
    while ($row = fetch_arrayy($sorov)) {
        $name = $row['first_name'];
        $sql = query("Select * from dp_korzina where first_name = '{$name}'");
        foreach ($sql as $sun):
            $status = $sun['status'];
            $pname = $sun['product_name'];
            $pnum = $sun['product_number'];
        endforeach;
        if ($status == "off") {
            query("Update dp_korzina set `status` = 'on' WHERE `dp_korzina`.`first_name` = '$name'");
            $_SESSION['message'] = "Buyurtma Tasdiqlandi";
            $_SESSION['msg_type'] = "success";
        } elseif ($status == "on") {
            query("Insert into printer(`product_name`,`product_number`,`insert_date`) values('{$pname}','{$pnum}',NOW())");
            
            query("Update dp_korzina set `status` = 'off' WHERE `dp_korzina`.`first_name` = '$name'");
            $_SESSION['message'] = "Buyurtma Olib Tashlandi";
            $_SESSION['msg_type'] = "danger";
        }
    }
}

header('Location: https://client1458.4bo.ru/online_shop/admin_panel/');