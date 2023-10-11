<?php

define('DB_HOST','localhost');
define('DB_USER','Shohzod_book');
define('DB_PASS','Shohzod1009');
define('DB_NAME','Shohzod_book');

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if (!$conn){
    echo "MYSQLI CONNECT ERROR";
}
require_once "func.php";
require_once "button.php";

?>
