<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=scanbacklinkscom',
            'username' => 'scanbacklinkscom',
            'password' => 'ecJAjqSNhDThVfWr',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.3js.name',
                'username' => 'picom@3js.name',
                'password' => 'T1b5O2o0',
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
        'log' => [
            'traceLevel' => 4,
            'targets' => [
        	[
        	    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logVars' => [null],
                    'logFile' => '@app/runtime/error.log',
                    'maxFileSize' => 1024 * 2,
                    'maxLogFiles' => 50,
                ],
        	[
            	    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                    'logVars' => [null],
                    'categories' => ['application', 'yii\web\Session::open'],
                    'logFile' => '@frontend/runtime/info.log',
                    'maxFileSize' => 1024 * 2,
                    'maxLogFiles' => 50,
                ],
            ],
        ],
    ],
];