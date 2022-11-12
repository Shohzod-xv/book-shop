<?php
include "components/db.php";
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$cid = $message->chat->id;
$miid = $message->message_id;
$name = $message->chat->first_name;
$tx = $message->text;
$PhoneNumber = $message->contact->phone_number;
$callback = $update->callback_query;
$mmid = $callback->inline_message_id;
$mes = $callback->message;
$mid = $mes->message_id;
$mmid = $callback->inline_message_id;
$cbid = $callback->from->id;
$data = $callback->data;

$first_name = $message->from->first_name;
$user_id = $message->from->id;


if($tx == "/start"){
    if (!check_user($first_name)){
        query("INSERT INTO users(`first_name`,`user_id`,`date`,`ttf`) values('{$first_name}','{$user_id}',NOW(),0)");
    }
    if (phone() == ""){
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "Telefon raqam yuboring",
            'reply_markup' => json_encode([
                'resize_keyboard' =>true,
                'keyboard' => [
                    [
                        ['text' => "Send number",'request_contact' => true]
                    ]
                ]
            ])
        ]);
        update_phone($PhoneNumber);
    }else{
        bot('sendMessage', [
            'chat_id' => $user_id,
            'text' => "Botga xush kelibsiz",
            'reply_markup' => $menuBtn
        ]);
    }
}

if (mb_stripos($PhoneNumber, "998")!==false) {
    update_phone($PhoneNumber);
    bot('sendMessage', [
        'chat_id' => $user_id,
        'text' => "Botga xush kelibsiz",
        'reply_markup' => $menuBtn
    ]);
}
if (($tx == "/app") and ($cid == 1504256494)) {
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "Web applicationga Bo'limidasiz",
        'reply_markup' => $panelBtn
    ]);
}elseif(($tx == "/app") and ($cid == 294665521)){
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "Web applicationga Bo'limidasiz",
        'reply_markup' => $panelBtn
    ]);
}

if (($tx == "/panel") and ($cid == 1504256494)) {
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "Admin Paneldasiz",
        'reply_markup' => $panelBtn2
    ]);
}elseif(($tx == "/panel") and ($cid == 294665521)){
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "Admin Paneldasiz",
        'reply_markup' => $panelBtn2
    ]);
}
if ($tx == "Menu 📝"){
    deleteMenu($user_id);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "Kitoblar bolimidasiz, qaysi kitobni sotib olmoqchisiz?",
        'reply_markup' => $tovarBtn
    ]);
}elseif ($tx == "Orqaga"){
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "Botga xush kelibsiz",
        'reply_markup' => $menuBtn
    ]);
}
function numberBtn($tx)
{
    $s1 = query("Select * from `savat` where `product_name` = '{$tx}'");
    foreach ($s1 as $s2):
        $id = $s2['id'];
    endforeach;

    return json_encode(
        ['inline_keyboard' => [
            [
                ['text' => "-", 'callback_data' => "minus_1_$id"],
                ['text' => "1", 'callback_data' => "soni"],
                ['text' => "+", 'callback_data' => "plus_1_$id"]
            ],
            [
                ['text' => "🛒 Savatga joylash", 'callback_data' => "sendkorzinka_$id"]
            ]
        ]
        ]);
}

if ($tx == product_name(1)) {
    product_write($tx, $user_id,1);
    $p1 = pp(1);
    $pn1 = product_name(1);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/2ea231c80197c5ea883d5.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(2)){
    product_write($tx, $user_id, 2);
    $p1 = pp(2);
    $pn1 = product_name(2);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/2ea231c80197c5ea883d5.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(3)){
    product_write($tx, $user_id, 3);
    $p1 = pp(3);
    $pn1 = product_name(3);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/977be4a00ff3eb70e8490.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(4)){
    product_write($tx, $user_id, 4);
    $p1 = pp(4);
    $pn1 = product_name(4);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/977be4a00ff3eb70e8490.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(5)){
    product_write($tx, $user_id, 5);
    $p1 = pp(5);
    $pn1 = product_name(5);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/f54347e231de2bfbcbd98.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(6)){
    product_write($tx, $user_id, 6);
    $p1 = pp(6);
    $pn1 = product_name(6);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/f54347e231de2bfbcbd98.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(7)){
    product_write($tx, $user_id, 7);
    $p1 = pp(7);
    $pn1 = product_name(7);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/80f50b0cccbb1ac5238f2.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(8)){
    product_write($tx, $user_id, 8);
    $p1 = pp(8);
    $pn1 = product_name(8);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/80f50b0cccbb1ac5238f2.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(9)){
    product_write($tx, $user_id, 9);
    $p1 = pp(9);
    $pn1 = product_name(9);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/a5dfb041fac3c1b71554b.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(10)){
    product_write($tx, $user_id, 10);
    $p1 = pp(10);
    $pn1 = product_name(10);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/a5dfb041fac3c1b71554b.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(11)){
    product_write($tx, $user_id, 11);
    $p1 = pp(11);
    $pn1 = product_name(11);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/7e87954e556c4e0e44474.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(12)){
    product_write($tx, $user_id, 12);
    $p1 = pp(12);
    $pn1 = product_name(12);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/7e87954e556c4e0e44474.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(13)){
    product_write($tx, $user_id, 13);
    $p1 = pp(13);
    $pn1 = product_name(13);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/3eb36c9337c4de83ae5e5.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(14)){
    product_write($tx, $user_id, 14);
    $p1 = pp(14);
    $pn1 = product_name(14);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/3eb36c9337c4de83ae5e5.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(15)){
    product_write($tx, $user_id, 15);
    $p1 = pp(15);
    $pn1 = product_name(15);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/1c250b1ba1be98288395d.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(16)){
    product_write($tx, $user_id, 16);
    $p1 = pp(16);
    $pn1 = product_name(16);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/1c250b1ba1be98288395d.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(17)){
    product_write($tx, $user_id, 17);
    $p1 = pp(17);
    $pn1 = product_name(17);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/c2e27fcc045f2527824fc.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(18)){
    product_write($tx, $user_id, 18);
    $p1 = pp(18);
    $pn1 = product_name(18);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/c2e27fcc045f2527824fc.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(19)){
    product_write($tx, $user_id, 19);
    $p1 = pp(19);
    $pn1 = product_name(19);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/10ecf5479cd0a332d764b.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(20)){
    product_write($tx, $user_id, 20);
    $p1 = pp(20);
    $pn1 = product_name(20);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/10ecf5479cd0a332d764b.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(21)){
    product_write($tx, $user_id, 21);
    $p1 = pp(21);
    $pn1 = product_name(21);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/5cb149bcf6c313516d449.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(22)){
    product_write($tx, $user_id, 22);
    $p1 = pp(22);
    $pn1 = product_name(22);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/5cb149bcf6c313516d449.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(23)){
    product_write($tx, $user_id, 23);
    $p1 = pp(23);
    $pn1 = product_name(23);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/692eb8bbb642ceff60ce3.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(24)){
    product_write($tx, $user_id, 24);
    $p1 = pp(24);
    $pn1 = product_name(24);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/692eb8bbb642ceff60ce3.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(25)){
    product_write($tx, $user_id, 25);
    $p1 = pp(25);
    $pn1 = product_name(25);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/8722c17b8a3304dc55e37.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(26)){
    product_write($tx, $user_id, 26);
    $p1 = pp(26);
    $pn1 = product_name(26);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/8722c17b8a3304dc55e37.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(27)){
    product_write($tx, $user_id, 27);
    $p1 = pp(27);
    $pn1 = product_name(27);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/e08c10524dca2f69e7f04.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(28)){
    product_write($tx, $user_id, 28);
    $p1 = pp(28);
    $pn1 = product_name(28);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/e08c10524dca2f69e7f04.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(29)){
    product_write($tx, $user_id, 29);
    $p1 = pp(29);
    $pn1 = product_name(29);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/2e44ad480b20bd33cd961.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(30)){
    product_write($tx, $user_id, 30);
    $p1 = pp(30);
    $pn1 = product_name(30);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/2e44ad480b20bd33cd961.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(31)){
    product_write($tx, $user_id, 31);
    $p1 = pp(31);
    $pn1 = product_name(31);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/000a46e7edf46fe807a9f.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(32)){
    product_write($tx, $user_id, 32);
    $p1 = pp(32);
    $pn1 = product_name(32);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/000a46e7edf46fe807a9f.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(33)){
    product_write($tx, $user_id, 33);
    $p1 = pp(33);
    $pn1 = product_name(33);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/eac266bf13b7a4ba34bbd.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(34)){
    product_write($tx, $user_id, 34);
    $p1 = pp(34);
    $pn1 = product_name(34);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/eac266bf13b7a4ba34bbd.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(35)){
    product_write($tx, $user_id, 35);
    $p1 = pp(35);
    $pn1 = product_name(35);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/e67aa86651f8d212b01b6.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(36)){
    product_write($tx, $user_id, 36);
    $p1 = pp(36);
    $pn1 = product_name(36);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/e67aa86651f8d212b01b6.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(37)){
    product_write($tx, $user_id, 37);
    $p1 = pp(37);
    $pn1 = product_name(37);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/6eb1b2367c7e85a266439.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(38)){
    product_write($tx, $user_id, 38);
    $p1 = pp(38);
    $pn1 = product_name(38);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/6eb1b2367c7e85a266439.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(39)){
    product_write($tx, $user_id, 39);
    $p1 = pp(39);
    $pn1 = product_name(39);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/487c7662747a4ebe24002.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(41)){
    product_write($tx, $user_id, 41);
    $p1 = pp(41);
    $pn1 = product_name(41);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/fa5f957b7877874d703bf.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(42)){
    product_write($tx, $user_id, 42);
    $p1 = pp(42);
    $pn1 = product_name(42);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/fa5f957b7877874d703bf.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(43)){
    product_write($tx, $user_id, 43);
    $p1 = pp(43);
    $pn1 = product_name(43);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/fdf5f21b4a6676a9b1472.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(44)){
    product_write($tx, $user_id, 44);
    $p1 = pp(44);
    $pn1 = product_name(44);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/fdf5f21b4a6676a9b1472.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(45)){
    product_write($tx, $user_id, 45);
    $p1 = pp(45);
    $pn1 = product_name(45);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/84e29263ed1065b54f71b.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(46)){
    product_write($tx, $user_id, 46);
    $p1 = pp(46);
    $pn1 = product_name(46);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/84e29263ed1065b54f71b.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(47)){
    product_write($tx, $user_id, 47);
    $p1 = pp(47);
    $pn1 = product_name(47);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/bac8fff034bb8cd153952.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(48)){
    product_write($tx, $user_id, 48);
    $p1 = pp(48);
    $pn1 = product_name(48);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/bac8fff034bb8cd153952.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(49)){
    product_write($tx, $user_id, 49);
    $p1 = pp(40);
    $pn1 = product_name(49);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/fa5257a48e039216c0b84.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(50)){
    product_write($tx, $user_id, 50);
    $p1 = pp(50);
    $pn1 = product_name(50);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/fa5257a48e039216c0b84.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(51)){
    product_write($tx, $user_id, 51);
    $p1 = pp(51);
    $pn1 = product_name(51);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/e4e78c8bc7ae37aad4beb.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(52)){
    product_write($tx, $user_id, 52);
    $p1 = pp(52);
    $pn1 = product_name(52);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/e4e78c8bc7ae37aad4beb.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(53)){
    product_write($tx, $user_id, 53);
    $p1 = pp(53);
    $pn1 = product_name(53);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/497149ed0f7c20c3299f6.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(54)){
    product_write($tx, $user_id, 54);
    $p1 = pp(54);
    $pn1 = product_name(54);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/497149ed0f7c20c3299f6.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(55)){
    product_write($tx, $user_id, 55);
    $p1 = pp(55);
    $pn1 = product_name(55);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/28ba1d59dff0022dd41df.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(56)){
    product_write($tx, $user_id, 56);
    $p1 = pp(56);
    $pn1 = product_name(56);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/28ba1d59dff0022dd41df.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(57)){
    product_write($tx, $user_id, 57);
    $p1 = pp(57);
    $pn1 = product_name(57);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/03885fee9b0675fc96047.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(58)){
    product_write($tx, $user_id, 58);
    $p1 = pp(58);
    $pn1 = product_name(58);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/03885fee9b0675fc96047.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(59)){
    product_write($tx, $user_id, 59);
    $p1 = pp(59);
    $pn1 = product_name(59);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/04c7dad677c4d924b65e5.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(60)){
    product_write($tx, $user_id, 60);
    $p1 = pp(60);
    $pn1 = product_name(60);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/04c7dad677c4d924b65e5.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(61)){
    product_write($tx, $user_id, 61);
    $p1 = pp(61);
    $pn1 = product_name(61);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/d51e37e8a6b3e78942edc.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(62)){
    product_write($tx, $user_id, 62);
    $p1 = pp(62);
    $pn1 = product_name(62);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/d51e37e8a6b3e78942edc.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(63)){
    product_write($tx, $user_id, 63);
    $p1 = pp(63);
    $pn1 = product_name(63);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.]https://telegra.ph/file/8917c5afec74db3a4f6d8.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(64)){
    product_write($tx, $user_id, 64);
    $p1 = pp(64);
    $pn1 = product_name(64);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/8917c5afec74db3a4f6d8.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(65)){
    product_write($tx, $user_id, 65);
    $p1 = pp(65);
    $pn1 = product_name(65);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/386bc97b9680c66359904.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(66)){
    product_write($tx, $user_id, 66);
    $p1 = pp(66);
    $pn1 = product_name(66);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/386bc97b9680c66359904.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(67)){
    product_write($tx, $user_id, 67);
    $p1 = pp(67);
    $pn1 = product_name(67);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/dea31ca2f7958970c56c6.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(68)){
    product_write($tx, $user_id, 68);
    $p1 = pp(68);
    $pn1 = product_name(68);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/dea31ca2f7958970c56c6.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(69)){
    product_write($tx, $user_id, 69);
    $p1 = pp(69);
    $pn1 = product_name(69);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/42d30d72b78e2a3ff2b29.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(70)){
    product_write($tx, $user_id, 70);
    $p1 = pp(70);
    $pn1 = product_name(70);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/42d30d72b78e2a3ff2b29.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(71)){
    product_write($tx, $user_id, 71);
    $p1 = pp(71);
    $pn1 = product_name(71);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/93fa889b88aba9478fe25.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(72)){
    product_write($tx, $user_id, 72);
    $p1 = pp(72);
    $pn1 = product_name(72);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/93fa889b88aba9478fe25.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(73)){
    product_write($tx, $user_id, 73);
    $p1 = pp(73);
    $pn1 = product_name(73);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/9491d46c02cb30bde071d.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(74)){
    product_write($tx, $user_id, 74);
    $p1 = pp(74);
    $pn1 = product_name(74);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/9491d46c02cb30bde071d.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(75)){
    product_write($tx, $user_id, 75);
    $p1 = pp(75);
    $pn1 = product_name(75);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/52fd1530bb02f4e4a0e6a.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(76)){
    product_write($tx, $user_id, 76);
    $p1 = pp(76);
    $pn1 = product_name(76);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/52fd1530bb02f4e4a0e6a.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(77)){
    product_write($tx, $user_id, 77);
    $p1 = pp(77);
    $pn1 = product_name(77);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/476abea9b631bcfe3b78a.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(78)){
    product_write($tx, $user_id, 78);
    $p1 = pp(78);
    $pn1 = product_name(78);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/476abea9b631bcfe3b78a.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(79)){
    product_write($tx, $user_id, 79);
    $p1 = pp(79);
    $pn1 = product_name(79);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/29fc7fb06f357b4165f34.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(80)){
    product_write($tx, $user_id, 80);
    $p1 = pp(80);
    $pn1 = product_name(80);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/29fc7fb06f357b4165f34.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(81)){
    product_write($tx, $user_id, 81);
    $p1 = pp(81);
    $pn1 = product_name(81);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/43363ba31a29f415bc076.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(82)){
    product_write($tx, $user_id, 82);
    $p1 = pp(82);
    $pn1 = product_name(82);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/43363ba31a29f415bc076.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(83)){
    product_write($tx, $user_id, 83);
    $p1 = pp(83);
    $pn1 = product_name(83);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/44a25e1b14b4739d2782d.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(84)){
    product_write($tx, $user_id, 84);
    $p1 = pp(84);
    $pn1 = product_name(84);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/44a25e1b14b4739d2782d.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(85)){
    product_write($tx, $user_id, 85);
    $p1 = pp(85);
    $pn1 = product_name(85);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/358980f793c38fe5900b7.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(86)){
    product_write($tx, $user_id, 86);
    $p1 = pp(86);
    $pn1 = product_name(86);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/358980f793c38fe5900b7.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(87)){
    product_write($tx, $user_id, 87);
    $p1 = pp(87);
    $pn1 = product_name(87);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/5deaaa200aedb68f251b1.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(88)){
    product_write($tx, $user_id, 88);
    $p1 = pp(88);
    $pn1 = product_name(88);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/5deaaa200aedb68f251b1.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(89)){
    product_write($tx, $user_id, 89);
    $p1 = pp(89);
    $pn1 = product_name(89);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/ee71c02589474d613fe90.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(90)){
    product_write($tx, $user_id, 90);
    $p1 = pp(90);
    $pn1 = product_name(90);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/ee71c02589474d613fe90.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(91)){
    product_write($tx, $user_id, 91);
    $p1 = pp(91);
    $pn1 = product_name(91);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/8ab4461b18042a648279b.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(92)){
    product_write($tx, $user_id, 92);
    $p1 = pp(92);
    $pn1 = product_name(92);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/8ab4461b18042a648279b.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(93)){
    product_write($tx, $user_id, 93);
    $p1 = pp(93);
    $pn1 = product_name(93);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/a429b5bfb41fb38f912b8.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(94)){
    product_write($tx, $user_id, 94);
    $p1 = pp(94);
    $pn1 = product_name(94);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/a429b5bfb41fb38f912b8.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(95)){
    product_write($tx, $user_id, 95);
    $p1 = pp(95);
    $pn1 = product_name(95);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/253ee394a629fb9ba863d.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(96)){
    product_write($tx, $user_id, 96);
    $p1 = pp(96);
    $pn1 = product_name(96);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/253ee394a629fb9ba863d.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(97)){
    product_write($tx, $user_id, 97);
    $p1 = pp(97);
    $pn1 = product_name(97);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/2a4b6bd9817e0de538500.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(98)){
    product_write($tx, $user_id, 98);
    $p1 = pp(98);
    $pn1 = product_name(98);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/2a4b6bd9817e0de538500.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(99)){
    product_write($tx, $user_id, 99);
    $p1 = pp(99);
    $pn1 = product_name(99);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/9f587ceddd6375ab9f743.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(100)){
    product_write($tx, $user_id, 100);
    $p1 = pp(100);
    $pn1 = product_name(100);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/9f587ceddd6375ab9f743.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(101)){
    product_write($tx, $user_id, 101);
    $p1 = pp(101);
    $pn1 = product_name(101);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/e330ae80ecf8fe1432b73.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(102)){
    product_write($tx, $user_id, 102);
    $p1 = pp(102);
    $pn1 = product_name(102);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/e330ae80ecf8fe1432b73.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(103)){
    product_write($tx, $user_id, 103);
    $p1 = pp(103);
    $pn1 = product_name(103);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/29136c916ed361fba1303.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(104)){
    product_write($tx, $user_id, 104);
    $p1 = pp(104);
    $pn1 = product_name(104);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/29136c916ed361fba1303.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(105)){
    product_write($tx, $user_id, 105);
    $p1 = pp(105);
    $pn1 = product_name(105);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/327085ca7f21d82eb0568.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(106)){
    product_write($tx, $user_id, 106);
    $p1 = pp(106);
    $pn1 = product_name(106);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/327085ca7f21d82eb0568.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(107)){
    product_write($tx, $user_id, 107);
    $p1 = pp(107);
    $pn1 = product_name(107);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/f985cff02048e83f1ea22.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(108)){
    product_write($tx, $user_id, 108);
    $p1 = pp(108);
    $pn1 = product_name(108);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/f985cff02048e83f1ea22.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(109)){
    product_write($tx, $user_id, 109);
    $p1 = pp(109);
    $pn1 = product_name(109);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/0a0744a82df86b8c36e8a.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(110)){
    product_write($tx, $user_id, 110);
    $p1 = pp(110);
    $pn1 = product_name(110);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/0a0744a82df86b8c36e8a.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(111)){
    product_write($tx, $user_id, 111);
    $p1 = pp(111);
    $pn1 = product_name(111);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/3c92a42e7a34810278e3f.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(112)){
    product_write($tx, $user_id, 112);
    $p1 = pp(112);
    $pn1 = product_name(112);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/3c92a42e7a34810278e3f.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(113)){
    product_write($tx, $user_id, 113);
    $p1 = pp(113);
    $pn1 = product_name(113);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/68c1fd9515c2f9a9b9fd2.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(114)){
    product_write($tx, $user_id, 114);
    $p1 = pp(114);
    $pn1 = product_name(114);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/68c1fd9515c2f9a9b9fd2.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(115)){
    product_write($tx, $user_id, 115);
    $p1 = pp(115);
    $pn1 = product_name(115);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/dcc0729974587b891ff3b.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(116)){
    product_write($tx, $user_id, 116);
    $p1 = pp(116);
    $pn1 = product_name(116);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/dcc0729974587b891ff3b.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(117)){
    product_write($tx, $user_id, 117);
    $p1 = pp(117);
    $pn1 = product_name(117);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/75f18f0271253bf85dd6d.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(118)){
    product_write($tx, $user_id, 118);
    $p1 = pp(118);
    $pn1 = product_name(118);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/75f18f0271253bf85dd6d.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(119)){
    product_write($tx, $user_id, 119);
    $p1 = pp(119);
    $pn1 = product_name(119);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/337ebad6eb94ab902155f.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(120)){
    product_write($tx, $user_id, 120);
    $p1 = pp(120);
    $pn1 = product_name(120);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/05e049be8212309783ccd.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}
elseif ($tx == product_name(121)){
    product_write($tx, $user_id, 121);
    $p1 = pp(121);
    $pn1 = product_name(121);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/93572031ebf222a39515d.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(122)){
    product_write($tx, $user_id, 122);
    $p1 = pp(122);
    $pn1 = product_name(122);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/93572031ebf222a39515d.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(123)){
    product_write($tx, $user_id, 123);
    $p1 = pp(123);
    $pn1 = product_name(123);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/2d73ead3141e3858f0cad.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(124)){
    product_write($tx, $user_id, 124);
    $p1 = pp(124);
    $pn1 = product_name(124);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/2d73ead3141e3858f0cad.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(125)){
    product_write($tx, $user_id, 125);
    $p1 = pp(125);
    $pn1 = product_name(125);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/ba58f9c2e0c2b40fd4317.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(126)){
    product_write($tx, $user_id, 126);
    $p1 = pp(126);
    $pn1 = product_name(126);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/ba58f9c2e0c2b40fd4317.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(127)){
    product_write($tx, $user_id, 127);
    $p1 = pp(127);
    $pn1 = product_name(127);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/69a7b8a57f8d5f2813ea7.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(128)){
    product_write($tx, $user_id, 128);
    $p1 = pp(128);
    $pn1 = product_name(128);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/69a7b8a57f8d5f2813ea7.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(129)){
    product_write($tx, $user_id, 129);
    $p1 = pp(129);
    $pn1 = product_name(129);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/c5e7b575e3bef4ec6515b.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(130)){
    product_write($tx, $user_id, 130);
    $p1 = pp(130);
    $pn1 = product_name(130);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/c5e7b575e3bef4ec6515b.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(131)){
    product_write($tx, $user_id, 131);
    $p1 = pp(131);
    $pn1 = product_name(131);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/91f8ef82abe57e5ffabc9.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(132)){
    product_write($tx, $user_id, 132);
    $p1 = pp(132);
    $pn1 = product_name(132);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/91f8ef82abe57e5ffabc9.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(133)){
    product_write($tx, $user_id, 133);
    $p1 = pp(133);
    $pn1 = product_name(133);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/6bb0c0b49242e158fe4c5.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}elseif ($tx == product_name(134)){
    product_write($tx, $user_id, 134);
    $p1 = pp(134);
    $pn1 = product_name(134);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/6bb0c0b49242e158fe4c5.jpg)",
        'reply_markup' => numberBtn($tx),
        'parse_mode' => "markdown"
    ]);
}
elseif ($tx == "🛒 Korzina"){
    korzina($cid);
}
if ($data == "all_data_tasdiqlash"){
    $sorov = query("Select * from korzinka where user_id = '{$cbid}'");
    foreach ($sorov as $row):
        $user_id = $row['user_id'];
        $first_name = $row['first_name'];
        $phone_number = $row['phone_number'];
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $product_number = $row['product_number'];
        $summa = $product_price * $product_number;
        query("INSERT INTO dp_korzina(`user_id`,`first_name`,`phone_number`,`product_name`,`product_price`,`product_number`,`summa`,`status`,`insert_date`)
                VALUES ('{$user_id}','{$first_name}','{$phone_number}','{$product_name}','{$product_price}','{$product_number}','{$summa}','off',NOW())");
    endforeach;
    sendData($cbid,$miid,$cid);
    ttf($cbid);
    bot('editMessageText',[
        'chat_id' => $cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text' => "✅ Buyurtma qabul qilindi",
    ]);
    deleteData($cbid);
}elseif ($data == "delete_all_savat"){
    bot('editMessageText',[
        'chat_id' => $cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text' => "✅ O'chirildi"
    ]);
    deleteData($cbid);
}elseif ($data == "back_bosh_menu"){
    bot('editMessageText',[
        'chat_id' => $cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text' => "Bosh menudasiz"
    ]);
    bot('sendMessage',[
        'chat_id' => $cbid,
        'text' => "Kitob buyurtma qilmoqchi bolsangiz Menu bo'lmini tanlang",
        'reply_markup'=> $menuBtn
    ]);
}

if(mb_stripos($data, "plus")!==false){
    $pn=explode("_", $data)[1];
    $id=explode("_", $data)[2];
    $pn++;
    query("Update `savat` Set `product_number` ='{$pn}' where `savat`.`id` = '{$id}'");

    bot('editMessageReplyMarkup', [
        'chat_id' =>$callback->from->id,
        'message_id' =>$callback->message->message_id,
        'inline_message_id' =>$callback->inline_message_id,
        'reply_markup'=> json_encode(
            ['inline_keyboard' => [
                [
                    ['text' => "-",'callback_data' => "minus_".$pn."_".$id],
                    ['text' => "$pn",'callback_data' => "soni"],
                    ['text' => "+",'callback_data' => "plus_".$pn."_".$id]
                ],
                [
                    ['text' => "🛒 Savatga joylash",'callback_data' => "sendkorzinka_$id"]
                ]
            ]
            ])
    ]);

}elseif (mb_stripos($data, "minus")!==false){
    $pn=explode("_", $data)[1];
    $id=explode("_", $data)[2];
    if ($pn>1) {
        $pn--;
        query("Update `savat` Set `product_number` ='{$pn}' where `savat`.`id` = '{$id}'");

        bot('editMessageReplyMarkup', [
            'chat_id' => $callback->from->id,
            'message_id' => $callback->message->message_id,
            'inline_message_id' => $callback->inline_message_id,
            'reply_markup' => json_encode(
                ['inline_keyboard' => [
                    [
                        ['text' => "-",'callback_data' => "minus_".$pn."_".$id],
                        ['text' => "$pn",'callback_data' => "soni"],
                        ['text' => "+",'callback_data' => "plus_".$pn."_".$id]
                    ],
                    [
                        ['text' => "🛒 Savatga joylash", 'callback_data' => "sendkorzinka_$id"]
                    ]
                ]
                ])
        ]);
    }
}
if (mb_stripos($data, "sendkorzinka")!==false) {
    $id = explode("_", $data)[1];
    $sorov1 = query("Select * from savat where id = '{$id}'");
    foreach ($sorov1 as $s2):
        $pid = $s2['id'];
    endforeach;
    if ($pid === $id) {
        send_korzina($cbid,$id);
        user_delete($data);
        bot('editMessageText', [
            'chat_id' => $cbid,
            'message_id' => $mid,
            'inline_message_id' => $mmid,
            'text' => "✅ Savatga joylandi\n\n Yana nima harid qilamiz?",
            'reply_markup' => $korzinaBtn
        ]);
    }
}
if ($data == "korzinka"){
    korzina_inline($cbid,$mid,$mmid);
}
function send($chat_id, $txt){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$txt,
        'parse_mode'=>"html"
    ]);
}
$admin = 1504256494;
$user = 2126271241;
if($tx == "/send" and $cid == $admin) {
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "Xabaringizni kiriting:",
    ]);
    if ($tx and $cid == $admin) {
        bot('SendMessage', [
            'chat_id' => $user,
            'from_chat_id' => $cid,
            'message_id' => $message->message_id,
            'parse_mode' => 'markdown',
            'disable_web_page_preview' => true,
        ]);
    }
    send($cid, "Xabaringiz yuborildi.");
}
