<?php

define('DB_HOST','hostname');
define('DB_USER','username');
define('DB_PASS','password');
define('DB_NAME','dbname');

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if (!$conn){
    echo "MYSQLI CONNECT ERROR";
}
require_once "func.php";
require_once "button.php";

?>
