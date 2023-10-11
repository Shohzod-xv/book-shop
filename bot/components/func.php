<?php

define('API_KEY','5939347329:AAH5el7Gry0CMTpnIReGzM04yFF6TU45ADY');

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function ttf($cbid){
    return query("UPDATE users SET ttf = 1 WHERE user_id = '$cbid'");
}
function query($sorov)
{
    global $conn;
    return mysqli_query($conn,$sorov);
}
function fetch_array($var){
    return mysqli_fetch_all($var,MYSQLI_ASSOC);
}
function check_user($first_name)
{
    $a = query("SELECT * FROM users WHERE first_name = '$first_name'");

    if (mysqli_num_rows($a) == 0)
        return false;
    else
        return true;
}
function phone(){
    global $user_id;
    $phone = query("SELECT * FROM users WHERE user_id = '$user_id'");
    foreach ($phone as $phones)
        return $phones['phone_number'];
}
function product_name($id){

    $products  = query("select * from products where id = '$id'");
    foreach ($products as $product):
        return $product['product_name'];
    endforeach;
}
function pp($id){

    $products  = query("select * from products where id = '$id'");
    foreach ($products as $product):
        return $product['product_price'];
    endforeach;
}
function sendData($cbid,$miid,$cid){
    $k = query("SELECT * FROM korzinka WHERE user_id = '$cbid'");
    while ($row = mysqli_fetch_assoc($k)) {
        $fn = $row["first_name"];
        $tel = $row["phone_number"];
        $pn = $row["product_name"];
        $pb = $row["product_number"];
        $pp=$row["product_price"];
        $j +=$pp*$pb;
        $tx .="*$pn - $pb* ta\n";
    }
    bot('sendMessage', [
        'chat_id' => -1001269403167,
        'from_chat_id' => $cid,
        'message_id' => $miid,
        'text' => "*Ism: $fn\nTel:$tel*\n\n".$tx."\n\nJami: *$j* so'm",
        'parse_mode' =>"markdown"
    ]);
}

function deleteData($cbid)
{
    return query("DELETE FROM korzinka WHERE user_id = '$cbid'");
}
function deleteMenu($cbid)
{
    return query("DELETE FROM savat WHERE user_id = '$cbid'");
}
function update_phone($PhoneNumber)
{
    global $user_id;
    $number = query("UPDATE users SET phone_number = '$PhoneNumber' WHERE user_id = '$user_id'");
    return $number;
}
function user_delete($data)
{
    if (mb_stripos($data, "sendkorzinka") !== false) {
        $id = explode("_", $data)[1];
        return query("DELETE FROM savat WHERE id = '$id'");
    }
}
function user_id($user_id)
{
    return query("INSERT INTO savat(user_id,insert_date) values('$user_id',NOW())");
}

function product_write($tx,$user_id,$id)
{
    $sorov = query("Select * from savat where user_id = '$user_id'");
    foreach ($sorov as $pname):
        $name = $pname['product_name'];
    endforeach;
    if ($tx !== $name) {
        $price = query("SELECT * FROM products where id = '$id'");
        foreach ($price as $prices) :
            $p = $prices['product_price'];
            return query("INSERT INTO savat(user_id,product_name,product_price,product_number,insert_date) values('$user_id','$tx','$p',1,NOW())");
        endforeach;
    }
}
function korzina($cid)
{
    $k = query("SELECT * FROM korzinka WHERE user_id = '$cid'");
    if (mysqli_num_rows($k) > 0) {
        while ($row = mysqli_fetch_assoc($k)) {
            $pn = $row["product_name"];
            $pb = $row["product_number"];
            $pp = $row["product_price"];
            $j += $pp * $pb;
            $kitob += $pb;
            $tx .= "$pn - $pb ta\n";
        }
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => $tx . "\n\n<b>Kitoblar soni : $kitob ta\nJami summa: $j so'm</b>",
            'parse_mode' => "html",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "✅ Tasdiqlash", 'callback_data' => "all_data_tasdiqlash"],
                        ['text' => "🗑 Savatni tozalash", 'callback_data' => "delete_all_savat"]
                    ],
                    [
                        ['text' => "🔙 Orqaga", 'callback_data' => "back_bosh_menu"]
                    ]
                ]
            ])
        ]);
    }else{
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "🗑 Savat bo'sh",
            'parse_mode' => "html",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "🔙 Orqaga", 'callback_data' => "back_bosh_menu"]
                    ]
                ]
            ])
        ]);
    }
}
function korzina_inline($cbid,$mid,$mmid)
{
    $k = query("SELECT * FROM korzinka WHERE user_id = '$cbid'");
    if (mysqli_num_rows($k) > 0) {
        while ($row = mysqli_fetch_assoc($k)) {
            $pn = $row["product_name"];
            $pb = $row["product_number"];
            $pp = $row["product_price"];
            $j += $pp * $pb;
            $kitob += $pb;
            $tx .= "$pn - $pb ta\n";
        }
        bot('editMessageText', [
            'chat_id' => $cbid,
            'message_id' => $mid,
            'inline_message_id' => $mmid,
            'text' => $tx . "\n\n<b>Kitoblar soni : $kitob ta\nJami summa: $j so'm</b>",
            'parse_mode' => "html",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "✅ Tasdiqlash", 'callback_data' => "all_data_tasdiqlash"],
                        ['text' => "🗑 Savatni tozalash", 'callback_data' => "delete_all_savat"]
                    ],
                    [
                        ['text' => "🔙 Orqaga", 'callback_data' => "back_bosh_menu"]
                    ]
                ]
            ])
        ]);
    }else{
        bot('editMessageText', [
            'chat_id' => $cbid,
            'message_id' => $mid,
            'inline_message_id' => $mmid,
            'text' => "🗑 Savat bo'sh",
            'parse_mode' => "html",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "🔙 Orqaga", 'callback_data' => "back_bosh_menu"]
                    ]
                ]
            ])
        ]);
    }
}
function send_korzina($cbid,$id)
{
    $baskets = query("SELECT * FROM savat where id = '$id'");
    $users = query("SELECT * FROM users where user_id = '$cbid'");
    $korzinkas= query("SELECT * from korzinka where user_id = '$cbid'");
    foreach ($baskets as $basket) :
        $pname = $basket['product_name'];
        $price = $basket['product_price'];
        $quantity = $basket['product_number'];
    endforeach;
    foreach ($users as $user) :
        $first_name = $user['first_name'];
        $phone_number = $user['phone_number'];
    endforeach;
    foreach ($korzinkas as $korzinka):
        $name = $korzinka['product_name'];
        $sonn = $korzinka['product_number'];
    endforeach;
    $jami = $quantity+$sonn;
    if ($pname !== $name) {
        query("INSERT INTO korzinka(user_id, first_name, phone_number, product_name, product_price, product_number, insert_date) VALUES('$cbid', '$first_name', '$phone_number', '$pname', '$price', '$jami', NOW())");
    } else {
        return query("UPDATE korzinka SET product_number='$jami' WHERE product_name = '$name'");
    }
}






