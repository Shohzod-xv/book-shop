<?php

//Обновление информации о продукте

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$id = $_POST['id'];
$bs = $_POST['bs'];
$nomi = $_POST['name'];
$kerak = $_POST['kerak'];
$holati = $_POST['holat'];
$tayyor = $_POST['tayyor'];
$t_vaqt = $_POST['t_vaqt'];

/*
 * Делаем запрос на изменение строки в таблице products
 */

mysqli_query($connect, "UPDATE `mahsulot` SET 
`bs` = '$bs', 
`nomi` = '$nomi', 
`kerak` = '$kerak',
`holati` = '$holati',
`tayyor` = '$tayyor',
`t_vaqt` = '$t_vaqt'
 WHERE `mahsulot`.`id` = {$id}");

/*
 * Переадресация на главную страницу
 */

header('Location: https://client1458.4bo.ru/online_shop/crud/');