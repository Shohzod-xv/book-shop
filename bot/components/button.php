<?php

class Button{
    public function Menu()
    {
        return json_encode([
            'resize_keyboard' => true,
            'keyboard' => [
                [['text' => "📚 Kitoblar"], ['text' => "🛒 Savat"]],
                [['text' => "☎️ Admin bilan bog'lanish"]]
            ]
        ]);
    }
    public function SendNumber()
    {
        return json_encode([
            'resize_keyboard' =>true,
            'keyboard' => [
                [
                    ['text' => "Raqam yuborish",'request_contact' => true]
                ]
            ]
        ]);
    }
    public function ProductList()
    {
        return json_encode([
            'resize_keyboard' => true,
            'keyboard' => [
                [['text' => product_name(1)]],
                [['text' => "🔙 Ortga"], ['text' => "🛒 Savat"]]
            ]
        ]);
    }
    public function quantity($tx)
    {
        $baskets = query("Select * from savat where product_name = '$tx'");
        foreach ($baskets as $basket):
            $id = $basket['id'];
        endforeach;
        return json_encode(
            ['inline_keyboard' => [
                [['text' => "➖", 'callback_data' => "minus_1_$id"],['text' => "1", 'callback_data' => "soni"], ['text' => "➕", 'callback_data' => "plus_1_$id"]],
                [['text' => "🛒 Savatga joylash", 'callback_data' => "sendkorzinka_$id"]]
            ]
        ]);
    }

    public function add_quantity($pn,$id)
    {
        return json_encode(
            ['inline_keyboard' => [
                [
                    ['text' => "➖",'callback_data' => "minus_".$pn."_".$id],
                    ['text' => "$pn",'callback_data' => "soni"],
                    ['text' => "➕",'callback_data' => "plus_".$pn."_".$id]
                ],
                [
                    ['text' => "🛒 Savatga joylash", 'callback_data' => "sendkorzinka_$id"]
                ]
            ]
        ]);
    }

}
