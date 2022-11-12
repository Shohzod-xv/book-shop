<?php
$panelBtn = json_encode(
    ['inline_keyboard' => [
        [
            ['text' => "Web application",'url' => "https://client1458.4bo.ru/online_shop/crud/"]
        ]
    ]
    ]);
$panelBtn2 = json_encode(
    ['inline_keyboard' => [
        [
            ['text' => "Admin panel",'url' => "https://client1458.4bo.ru/online_shop/admin_panel/"]
        ]
    ]
    ]);
$menuBtn = json_encode(
    [   'resize_keyboard' =>true,
        'keyboard' => [
            [
                ['text' => "Menu 📝"],
                ['text' => "🛒 Korzina"]
            ],
            [
                ['text' => "Band qilish 🔴"]
            ]
        ]
    ]);
$korzinaBtn = json_encode(
    ['inline_keyboard' => [
        [
            ['text' => "🛒 Korzina",'callback_data' => "korzinka"]
        ]
    ]
    ]);
$tovarBtn = json_encode(
    [   'resize_keyboard' =>true,
        'keyboard' => [
            [
                ['text' => product_name(1)]
            ],
            [
                ['text' => product_name(2)]
            ],
            [
                ['text' => product_name(3)]
            ],
            [
                ['text' => product_name(4)]
            ],
            [
                ['text' => product_name(5)]
            ],
            [
                ['text' => product_name(6)]
            ],
            [
                ['text' => product_name(7)]
            ],
            [
                ['text' => product_name(8)]
            ],
            [
                ['text' => product_name(9)]
            ],
            [
                ['text' => product_name(10)]
            ],
            [
                ['text' => product_name(11)]
            ],
            [
                ['text' => product_name(12)]
            ],
            [
                ['text' => product_name(13)]
            ],
            [
                ['text' => product_name(14)]
            ],
            [
                ['text' => product_name(15)]
            ],
            [
                ['text' => product_name(16)]
            ],
            [
                ['text' => product_name(17)]
            ],
            [
                ['text' => product_name(18)]
            ],
            [
                ['text' => product_name(19)]
            ],
            [
                ['text' => product_name(20)]
            ],
            [
                ['text' => product_name(21)]
            ],
            [
                ['text' => product_name(22)]
            ],
            [
                ['text' => product_name(23)]
            ],
            [
                ['text' => product_name(24)]
            ],
            [
                ['text' => product_name(25)]
            ],
            [
                ['text' => product_name(26)]
            ],
            [
                ['text' => product_name(27)]
            ],
            [
                ['text' => product_name(28)]
            ],
            [
                ['text' => product_name(29)]
            ],
            [
                ['text' => product_name(30)]
            ],
            [
                ['text' => product_name(31)]
            ],
            [
                ['text' => product_name(32)]
            ],
            [
                ['text' => product_name(33)]
            ],
            [
                ['text' => product_name(34)]
            ],
            [
                ['text' => product_name(35)]
            ],
            [
                ['text' => product_name(36)]
            ],
            [
                ['text' => product_name(37)]
            ],
            [
                ['text' => product_name(38)]
            ],
            [
                ['text' => product_name(39)]
            ],
            [
                ['text' => product_name(40)]
            ],
            [
                ['text' => product_name(41)]
            ],
            [
                ['text' => product_name(42)]
            ],
            [
                ['text' => product_name(43)]
            ],
            [
                ['text' => product_name(44)]
            ],
            [
                ['text' => product_name(45)]
            ],
            [
                ['text' => product_name(46)]
            ],
            [
                ['text' => product_name(47)]
            ],
            [
                ['text' => product_name(48)]
            ],
            [
                ['text' => product_name(49)]
            ],
            [
                ['text' => product_name(50)]
            ],
            [
                ['text' => product_name(51)]
            ],
            [
                ['text' => product_name(52)]
            ],
            [
                ['text' => product_name(53)]
            ],
            [
                ['text' => product_name(54)]
            ],
            [
                ['text' => product_name(55)]
            ],
            [
                ['text' => product_name(56)]
            ],
            [
                ['text' => product_name(57)]
            ],
            [
                ['text' => product_name(58)]
            ],
            [
                ['text' => product_name(59)]
            ],
            [
                ['text' => product_name(60)]
            ],
            [
                ['text' => product_name(61)]
            ],
            [
                ['text' => product_name(62)]
            ],
            [
                ['text' => product_name(63)]
            ],
            [
                ['text' => product_name(64)]
            ],
            [
                ['text' => product_name(65)]
            ],
            [
                ['text' => product_name(66)]
            ],
            [
                ['text' => product_name(67)]
            ],
            [
                ['text' => product_name(68)]
            ],
            [
                ['text' => product_name(69)]
            ],
            [
                ['text' => product_name(70)]
            ],
            [
                ['text' => product_name(71)]
            ],
            [
                ['text' => product_name(72)]
            ],
            [
                ['text' => product_name(73)]
            ],
            [
                ['text' => product_name(74)]
            ],
            [
                ['text' => product_name(75)]
            ],
            [
                ['text' => product_name(76)]
            ],
            [
                ['text' => product_name(77)]
            ],
            [
                ['text' => product_name(78)]
            ],
            [
                ['text' => product_name(79)]
            ],
            [
                ['text' => product_name(80)]
            ],
            [
                ['text' => product_name(81)]
            ],
            [
                ['text' => product_name(82)]
            ],
            [
                ['text' => product_name(83)]
            ],
            [
                ['text' => product_name(84)]
            ],
            [
                ['text' => product_name(85)]
            ],
            [
                ['text' => product_name(86)]
            ],
            [
                ['text' => product_name(87)]
            ],
            [
                ['text' => product_name(88)]
            ],
            [
                ['text' => product_name(89)]
            ],
            [
                ['text' => product_name(90)]
            ],
            [
                ['text' => product_name(91)]
            ],
            [
                ['text' => product_name(92)]
            ],
            [
                ['text' => product_name(93)]
            ],
            [
                ['text' => product_name(94)]
            ],
            [
                ['text' => product_name(95)]
            ],
            [
                ['text' => product_name(96)]
            ],
            [
                ['text' => product_name(97)]
            ],
            [
                ['text' => product_name(98)]
            ],
            [
                ['text' => product_name(99)]
            ],
            [
                ['text' => product_name(100)]
            ],
            [
                ['text' => product_name(101)]
            ],
            [
                ['text' => product_name(102)]
            ],
            [
                ['text' => product_name(103)]
            ],
            [
                ['text' => product_name(104)]
            ],
            [
                ['text' => product_name(105)]
            ],
            [
                ['text' => product_name(106)]
            ],
            [
                ['text' => product_name(107)]
            ],
            [
                ['text' => product_name(108)]
            ],
            [
                ['text' => product_name(109)]
            ],
            [
                ['text' => product_name(110)]
            ],
            [
                ['text' => product_name(111)]
            ],
            [
                ['text' => product_name(112)]
            ],
            [
                ['text' => product_name(113)]
            ],
            [
                ['text' => product_name(114)]
            ],
            [
                ['text' => product_name(115)]
            ],
            [
                ['text' => product_name(116)]
            ],
            [
                ['text' => product_name(117)]
            ],
            [
                ['text' => product_name(118)]
            ],
            [
                ['text' => product_name(119)]
            ],
            [
                ['text' => product_name(120)]
            ],
            [
                ['text' => product_name(121)]
            ],
            [
                ['text' => product_name(122)]
            ],
            [
                ['text' => product_name(123)]
            ],
            [
                ['text' => product_name(124)]
            ],
            [
                ['text' => product_name(125)]
            ],
            [
                ['text' => product_name(126)]
            ],
            [
                ['text' => product_name(127)]
            ],
            [
                ['text' => product_name(128)]
            ],
            [
                ['text' => product_name(129)]
            ],
            [
                ['text' => product_name(130)]
            ],
            [
                ['text' => product_name(131)]
            ],
            [
                ['text' => product_name(132)]
            ],
            [
                ['text' => product_name(133)]
            ],
            [
                ['text' => product_name(134)]
            ],
            [
                ['text' => "Orqaga"],
                ['text' => "🛒 Korzina"]
            ]
        ]
    ]);
