<?php
session_start();
//Удаление продукта

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Получаем ID продукта из адресной строки
 */
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

mysqli_query($connect, "DELETE FROM `mahsulot` WHERE `mahsulot`.`id` = '$id'");
$_SESSION['message'] = "Malumot o'chirildi";
$_SESSion['msg_type'] = "danger";

header('Location: https://client1458.4bo.ru/online_shop/crud/');
}
?>