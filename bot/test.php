<?php

include "main/db.php";

        $sql1 = query("Select * from dp_korzina");
        print_r($sql1);
//        foreach ($sql1 as $sun1):
//            $pname = $sun1['product_name'];
//            $pnum = $sun1['product_number'];
//        endforeach;