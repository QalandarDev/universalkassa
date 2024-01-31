<?php

use common\models\Admin;
use yii\web\User;

return [
    'id' => 'app-backend-tests',
    'components' => [
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'urlManager' => [
            'showScriptName' => false,
        ],
        'request' => [
            'cookieValidationKey' => 'test',
            'baseUrl' => '/admin',
            'csrfCookie' => [
                'httpOnly' => true,
                'path' => '/admin',
            ],
        ],
        'user' => [
            'class' => User::class,
            'identityClass' => Admin::class,
        ],
    ],
];
