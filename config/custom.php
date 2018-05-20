<?php

return [
    "user" => [
        "dob" => "1997-06-07",
        "gender" => "Male",
        "phone" => "0123456789",
        "password_default" => "123456",
        "avatar" => "unknown.png",
        "credit_card" => "00000000",
        "points" => 0,
        'role_id' => 2,
        'status' => 1,
        'user_id' => 0
    ],
    "form" => [
         'create' => 'create',
         'edit' => 'edit',
    ],
    'image' => [
        'avatar_default' => 'storage/images/avatar/unknown.png',
        'path_avatar' => 'storage/images/avatar',
    ],
    'pagination' => [
        'user_table' => 10,
        'order_table' => 10,
        'category_table' => 10,
        'supplier_table' => 10,
        'product_table' => 10,
    ],
    "order" => [
        'payment' => 'payment',
        'homepayment' => 'homepayment',
        'creditcard' => 'creditcard',
        'statusDeliveried' => 0,
        'statusDelivering' => 1,
    ],
];
