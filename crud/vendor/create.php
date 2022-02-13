<?php

//Добавление нового продукта


/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */


$bs = $_POST['bs'];
$name = $_POST['name'];
$kerak = $_POST['kerak'];
$holat = $_POST['holat'];
$tayyor = $_POST['tayyor'];
$t_vaqt = $_POST['t_vaqt'];

/*
 * Делаем запрос на добавление новой строки в таблицу products
 */

mysqli_query($connect,"INSERT INTO `mahsulot` (`id`, `bs`, `nomi`, `kerak`, `holati`, `tayyor`,`t_vaqt`) VALUES (NULL, '{$bs}','{$name}', '{$kerak}', '{$holat}', '{$tayyor}', '{$t_vaqt}')");

/*
 * Переадресация на главную страницу
 */

header('Location: https://client1458.4bo.ru/online_shop/crud/');