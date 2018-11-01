<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [ 
                'client_id' => '390464722025-tufmru2cpabp4ksl2fvd3ke2n8c9mp0u.apps.googleusercontent.com',
                'client_secret' => '8m04sH1PHbLSHFjuuGSIUCV6',
                'redirect' => 'https://jobbersargentina.net/callback/google' 
        ],

    'facebook' => [
            'client_id' => '1480600512039518',
            'client_secret' => '7227b05bee5f2fc84ca31c766cfc7133',
            'redirect' => 'https://jobbersargentina.net/callback/facebook'
    ],

    'linkedin' => [
    'client_id' => '78l6qm3jy02g4n',
    'client_secret' => '2oTQv4Qk2ZQ7NSna',
    'redirect' => 'https://jobbersargentina.net/callback/linkedin',
],

];
