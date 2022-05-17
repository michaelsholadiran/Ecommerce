<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'paypal' => [
      'paypal_mode'=>env('PAYPAL_MODE', ''),
      'client_id_production'=>env('CLIENT_ID_PRODUCTION', ''),
      'secret_id_production'=>env('SECRET_ID_PRODUCTION', ''),
      'client_id_sandbox'=>env('CLIENT_ID_SANDBOX', ''),
      'secret_id_sandbox'=>env('SECRET_ID_SANDBOX', ''),
    ],
    'stripe' => [
  'test_mode'=>env('TEST_MODE', ''),
  'live_public_key'=>env('LIVE_PUBLIC_KEY', ''),
  'live_secret_key'=>env('LIVE_SECRET_KEY', ''),
  'test_public_key'=>env('TEST_PUBLIC_KEY', ''),
  'test_secret_key'=>env('TEST_SECRET_KEY', ''),
    ],

];
