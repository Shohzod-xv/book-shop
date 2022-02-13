<?php
function query($sorov)
{
    global $conn;
    return mysqli_query($conn,$sorov);
}
function fetch_array($var){
    return mysqli_fetch_assoc($var);
}
function fetch_arrayy($var){
    return mysqli_fetch_array($var,MYSQLI_ASSOC);
}

function zakas($name){
    $row = query("select SUM(`product_number`) from `dp_korzina` WHERE first_name ='$name'");
    $sorov = fetch_arrayy($row);
    foreach ($sorov as $s):
        return $s;
    endforeach;
}
function summ($name){
    $row = query("select SUM(`summa`) from `dp_korzina` WHERE first_name ='$name'");
    $sorov = fetch_arrayy($row);
    foreach ($sorov as $s):
        return $s;
    endforeach;
}
