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
    'stripe' => [
        'key' => env('STRIPE_KEY' , 'pk_test_51KP0UQHgEPYhMzN7seAcDXqJXRCsekmrzKMzt43vKzQmvHXoRsxdHCD2qqIp1JIbz2TugPW0zbLbHugGv2CNM5AD00iJ5U7WK8'),
        'secret' => env('STRIPE_SECRET_KEY' , 'sk_test_51KP0UQHgEPYhMzN736jjrD2HQLbiIVYI0fUvsBad9okbCCLiRBCfHbXEmn7JbXAJYDnDY80SxoBMyZG2e1eFseQz00Vl64vll4'),
    ],


];
