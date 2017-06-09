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

    //Default public/uploads
    'path_upload' => public_path('uploads'),

    //status suggest admin
    'status' => [
        0 => 'New',
        1 => 'Processing',
        2 => 'Done',
    ],
];
