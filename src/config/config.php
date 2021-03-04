<?php

/*
 * Where to find my secret key?
 * - Log into your Dashboard with appropriate credentials.
 * - You can find your secret keys under Account > GoSell > API Credentials
 * - To generate live secret keys contact our Support team via Live Chat
 */

return [
    'debug'               => function_exists('env') ? env('APP_DEBUG', false) : false,

    'API_URL'             => 'https://api.tap.company/v2/',

    'TAP_SECRET_KEY_LIVE'        => function_exists('env') ? env('TAP_SECRET_KEY_LIVE', '') : '',
    'TAP_SECRET_KEY_SANDBOX'        => function_exists('env') ? env('TAP_SECRET_KEY_SANDBOX', '') : '',
];
