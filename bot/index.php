<?php
echo "hello";
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
$btn = new Button();

if($tx == "/start"){
    if (!check_user($first_name)){
        query("INSERT INTO users(first_name,user_id,date,ttf) values('$first_name','$user_id',NOW(),0)");
    }
    if (phone() == ""){
        bot('sendMessage', [
            'chat_id' => $cid,
            'text' => "Telefon raqam yuboring",
            'reply_markup' => $btn->SendNumber()
        ]);
        update_phone($PhoneNumber);
    }else{
        bot('sendMessage', [
            'chat_id' => $user_id,
            'text' => "Botga xush kelibsiz",
            'reply_markup' => $btn->Menu()
        ]);
    }
}

if (mb_stripos($PhoneNumber, "998")!==false) {
    update_phone($PhoneNumber);
    bot('sendMessage', [
        'chat_id' => $user_id,
        'text' => "Botga xush kelibsiz",
        'reply_markup' => $btn->Menu()
    ]);
}

if ($tx == "📚 Kitoblar"){
    deleteMenu($user_id);
    bot('sendMessage', [
        'chat_id' => $user_id,
        'text' => "Kitoblar bolimidasiz, qaysi kitobni sotib olmoqchisiz?",
        'reply_markup' => $btn->ProductList()
    ]);


}elseif ($tx == "🔙 Ortga"){
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "Botga xush kelibsiz",
        'reply_markup' => $btn->Menu()
    ]);
}

if ($tx == product_name(1)){
    product_write($tx, $user_id, 1);
    $p1 = pp(1);
    $pn1 = product_name(1);
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "*Nomi: * $pn1\n*Narxi: * $p1 so'm [.](https://telegra.ph/file/487c7662747a4ebe24002.jpg)",
        'reply_markup' => $btn->quantity($tx),
        'parse_mode' => "markdown"
    ]);
} elseif ($tx == "🛒 Savat"){
    korzina($cid);
}

if ($data == "all_data_tasdiqlash"){
    $sorov = query("Select * from korzinka where user_id = '$cbid'");
    foreach ($sorov as $row):
        $user_id = $row['user_id'];
        $first_name = $row['first_name'];
        $phone_number = $row['phone_number'];
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $product_number = $row['product_number'];
        $summa = $product_price * $product_number;
        $n = query("INSERT INTO dp_korzina(user_id,first_name,phone_number,product_name,product_price,product_number,summa,status,insert_date)
                VALUES ('$user_id','$first_name','$phone_number','$product_name','$product_price','$product_number','$summa',true,NOW())");
    bot('editMessageText',[
        'chat_id' => $cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text' => "✅ Buyurtma qabul qilindi",
    ]);
    endforeach;
    sendData($cbid,$miid,$cid);
    ttf($cbid);
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
        'reply_markup'=>$btn->Menu()
    ]);
}

if(mb_stripos($data, "plus")!==false){
    $pn=explode("_", $data)[1];
    $id=explode("_", $data)[2];
    $pn++;
    query("Update savat Set product_number='$pn' where id='$id'");

    bot('editMessageReplyMarkup', [
        'chat_id' =>$callback->from->id,
        'message_id' =>$callback->message->message_id,
        'inline_message_id' =>$callback->inline_message_id,
        'reply_markup'=> $btn->add_quantity($pn, $id)
    ]);

}elseif (mb_stripos($data, "minus")!==false){
    $pn=explode("_", $data)[1];
    $id=explode("_", $data)[2];
    if ($pn>1) {
        $pn--;
        query("Update savat Set product_number='$pn' where id = '$id'");
        bot('editMessageReplyMarkup', [
            'chat_id' => $callback->from->id,
            'message_id' => $callback->message->message_id,
            'inline_message_id' => $callback->inline_message_id,
            'reply_markup' => $btn->add_quantity($pn, $id)
        ]);
    }
}
if (mb_stripos($data, "sendkorzinka")!==false) {
    $id = explode("_", $data)[1];
    send_korzina($cbid, $id);
    user_delete($data);
    bot('editMessageText', [
        'chat_id' => $cbid,
        'message_id' => $mid,
        'inline_message_id' => $mmid,
        'text' => "✅ Savatga joylandi\n\n Yana nima harid qilamiz?",
    ]);
}
if ($data == "korzinka"){
    korzina_inline($cbid,$mid,$mmid);
}
if ($tx == "☎️ Admin bilan bog'lanish"){
    bot('sendMessage', [
        'chat_id' => $cid,
        'text' => "Bo'lim hali ishga tushmagan",
    ]);
}