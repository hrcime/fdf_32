<?php

return [
    'order' => [
        //title
        't-orders' => 'Orders',
        't-detail' => 'Detail',

        //table
        'tb-id' => '#',
        'tb-name' => 'Name',
        'tb-qty' => 'Quantity',
        'tb-user' => 'User',
        'tb-status' => 'Status',
        'tb-action' => 'Action',
        'tb-created' => 'Created At',
        'tb-updated' => 'Updated At',
        'tb-price' => 'Total Price',
        'tb-total' => 'Total',
        'tb-order-id' => 'Order ID',


        //button
        'b-delete' => 'Delete',
        'b-detail' => 'Detail',
        'b-back' => 'Back',
        'b-update' => 'Update',
        'b-cancel' => 'Cancel',

        //status
        'status' => [
            0 => 'New',
            1 => 'Processing',
            2 => 'Pending',
            3 => 'Done',
            4 => 'Cancelled',
        ],

        'msg-updated' => 'Updated',
        'msg-success' => 'Changed',
        'msg-deleted' => 'Deleted',
        'msg-cancelled' => 'Cancelled',
        'msg-notfound' => 'Order not found',
        'msg-success' => 'Order success',
        'msg-missing' => 'Missing information',
        'msg-fail' => 'Order fail',
        'msg-empty' => 'Cart is empty',
        'msg-cancel' => 'Cancel order ?',
    ],

    'cart' => [
        'title' => [
            'detail' => 'Cart detail',
            'info' => 'Infomation',
            'total-bill' => 'Total bill',
            'total-qty' => 'Total quantity',
        ],

        'tb' => [
            'id' => '#',
            'name' => 'Name',
            'image' => 'Image',
            'price' => 'Price',
            'quantity' => 'Quantity',
            'total_per_item' => 'Total ( Price x Quantity )',
            'action' => 'Action',
        ],

        'msg' => [
            'added' => 'Added',
            'updated' => 'Updated',
            'removed' => 'Removed',
            'notfound' => 'Product not found',
            'ajax' => 'Support for ajax',
        ],

        'btn' => [
            'remove' => 'Remove',
            'delete' => 'Delete cart',
            'update' => 'Update',
            'order' => 'Order',
        ],
    ],

    'product' => [
        't-create' => 'Create New Product',
        't-update' => 'Edit Product',
        't-products' => 'Products',

        'f-name' => 'Name',
        'f-price' => 'Price',
        'f-quantity' => 'Quantity',
        'f-image' => 'Image',
        'f-information' => 'Information',
        'f-category' => 'Category',
        'f-id' => 'ID',
        'f-action' => 'Action',

        'b-back' => 'Back',
        'b-create' => 'Create',
        'b-update' => 'Update',
        'b-edit' => 'Edit',
        'b-delete' => 'Delete',

        'msg-created' => 'Create Success',
        'msg-updated' => 'Update Success',
        'msg-deleted' => 'Delete Success',
        'msg-exist' => 'Does not exist',
    ],

    'sugg' => [
        //title
        't-suggests' => 'Suggest',
        't-content' => 'Content',
        't-detail' => 'Detail',

        //table
        'tb-id' => 'ID',
        'tb-title' => 'Title',
        'tb-category' => 'Category',
        'tb-user' => 'Sender',
        'tb-status' => 'Status',
        'tb-action' => 'Action',
        'tb-daysend' => 'Time',
        'tb-image' => 'Image',

        //button
        'b-delete' => 'Delete',
        'b-detail' => 'Detail',
        'b-back' => 'Back',
        'b-update' => 'Update',

        //status
        'status' => [
            0 => 'New',
            1 => 'Processing',
            2 => 'Done',
        ],

        'msg-success' => 'Changed',
        'msg-deteled' => 'Deleted',
    ],

    'category' => [
        //title
        't-category' => 'Categories',
        't-create' => 'Create new category',
        't-update' => 'Update',

        //table
        'tb-action' => 'Action',
        'tb-id' => 'ID',
        'tb-name' => 'Name',
        'tb-parent' => 'Parent',

        //form
        'f-parent' => 'Parent',
        'f-name' => 'Name',

        //button
        'b-create' => 'Create New',
        'b-update' => 'Update',
        'b-back' => 'Back',
        'b-edit' => 'Edit',
        'b-delete' => 'Delete',

        //Default value
        'v-parent' => 'Is Parent',

        //msg
        'msg-deleted' => 'Delete Success',
        'msg-updated' => 'Update Success',
        'msg-hasChildrens' => 'Please delete children category first !',
    ],

    'user' => [
        //title
        't-register' => 'Register',
        't-login' => 'Login',
        't-reset' => 'Reset Password',
        't-profile' => 'Profile',
        't-pwd-change' => 'Change Password',
        't-list' => 'User List',
        't-create' => 'Create New User',
        't-edit' => 'Edit User',

        //form
        'f-name' => 'Name',
        'f-email' => 'E-Mail Address',
        'f-password' => 'Password',
        'f-current-password' => 'Current Password',
        'f-new-password' => 'New Password',
        'f-confirm-password' => 'Confirm Password',
        'f-phone' => 'Phone',
        'f-address' => 'Address',
        'f-avatar' => 'Avatar',
        'f-admin' => 'Type Account',


        //button
        'b-register' => 'Register',
        'b-login' => 'Login',
        'b-remember' => 'Remember Me',
        'b-forgot' => 'Forgot Your Password ?',
        'b-reset' => 'Reset Password',
        'b-send' => 'Send Password Reset Link',
        'b-logout' => 'Logout',
        'b-create' => 'Create',
        'b-edit' => 'Edit',
        'b-cancel' => 'Cancel',
        'b-back' => 'Back',
        'b-facebook' => 'Login With Facebook',
        'b-google' => 'Login With Google',
        'b-twitter' => 'Login With Twitter',
        'b-update' => 'Update',
        'b-change-password' => 'Change Password',

        //msg
        'msg-updated' => 'Update Success',
        'msg-created' => 'Create Success',
        'msg-deleted' => 'Delete Success',
        'msg-old-password' => 'Old password does not match',

        //table
        'tb-id' => 'ID',
        'tb-name' => 'Name',
        'tb-email' => 'Email',
        'tb-phone' => 'Phone',
        'tb-address' => 'Address',
        'tb-action' => 'Action',

        //type account
        'member' => 'Member',
        'admin' => 'Admin',
    ],
    'page' => [
        't-dashboard' => 'DashBoard',
        't-home' => 'Home',
    ],

    'msg' => [
        'logged' => 'You are logged in!',
        'login-fail' => 'Error !',
        'created' => 'Create success',
    ],

    'suggest' => [
        //title
        't-create' => 'Create Suggest',

        //form
        'f-title' => 'Title',
        'f-image' => 'Image',
        'f-category' => 'Category',
        'f-content' => 'Content',

        //button
        'b-send' => 'Send',

        //msg
        'msg-thankyou' => 'Thanks you for your suggest !',
    ],

    'latest' => 'Latest Product',
    'detail' => 'Detail',
    'add-cart' => 'Add to Cart',
    'information' => 'Information',
    'quantity' => 'Quantity',
    'rate' => 'Rate',
    'price' => 'Price',
    'category' => 'Category',

    //msg
    'required-login' => 'Please login to rate this product',
    'support-ajax' => 'Support for ajax',
    'try-again' => 'Please try again later',
];
