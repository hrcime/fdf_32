<?php

return [
    //product / page
    'product_per_page' => 15,

    //product / row
    'product_per_row' => 4,

    //Path to folder avatar
    'path_avatar' => env('APP_URL') . '/public/uploads/avatar',

    //Path to folder suggest
    'path_suggest' => env('APP_URL') . '/public/uploads/suggest',

    //Path to folder product
    'path_product' => env('APP_URL') . '/public/uploads/product',

    //Default public/uploads
    'path_upload' => public_path('uploads'),

    //status suggest admin
    'status' => [
        0 => 'New',
        1 => 'Processing',
        2 => 'Done',
    ],

    // Order
    'order_status' => [
        0 => 'New',
        1 => 'Processing',
        2 => 'Done',
        3 => 'Pending',
        4 => 'Cancelled',
    ],

    'default_order_cancel' => 4,

    'filter' => [
        'rate' => [
            'min' => 0,
            'max' => 5,
        ],
    ],
];
