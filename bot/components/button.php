<?php

class Button{
    public function MenuBtn()
    {
        return json_encode([
            'resize_keyboard' => true,
            'keyboard' => [
                [['text' => "Menu 📝"], ['text' => "🛒 Korzina"]],
                [['text' => "Band qilish 🔴"]]
            ]
        ]);
    }
    public function KorzinaBtn()
    {
        return json_encode([
            'resize_keyboard' => true,
            'keyboard' => [
                ['text' => "🛒 Korzina",'callback_data' => "korzinka"]
            ]
        ]);
    }
    public function TovarBtn()
    {
        return json_encode([
            'resize_keyboard' => true,
            [[['text' => product_name(1)]], [['text' => "Orqaga"], ['text' => "🛒 Korzina"]]]
        ]);
    }
}
