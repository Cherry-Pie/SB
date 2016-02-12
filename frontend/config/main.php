<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'people' => [
            'class' => 'common\models\User',
        ],
        'banners' => [
            'class' => 'common\models\Banners',
        ],
        'notifications' => [
            'class' => 'common\models\Notifications',
        ],
        't' => [
            'class' => 'common\models\TextLabels',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'webmeup' => [
            'class' => 'frontend\models\Webmeup',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => array(
                // report routs
                    'report/charts/<url>' => 'report/charts',
                    'report/backlinks/<type>' => 'report/backlinks',
                    'report/export/<url>' => 'report/export',
                    'report/backlinks/<type>/<url>' => 'report/backlinks',
                // default site routs
                    '<id:\d+>.html' => 'site/view',
                    '<action:\w+>/<id:\d+>.html' => 'site/<action>',
                    '<action:\w+>.html' => 'site/<action>',
                // static page routs
                    'page/<url>.html' => 'page/view',

                'login/<service:google|facebook|twitter>' => 'site/login',
            ),
        ],

        'eauth' => [
            'class' => 'nodge\eauth\EAuth',
            'popup' => true, // Use the popup window instead of redirecting.
            'cache' => false, // Cache component name or false to disable cache. Defaults to 'cache' on production environments.
            'cacheExpire' => 0, // Cache lifetime. Defaults to 0 - means unlimited.
            'httpClient' => [
                // uncomment this to use streams in safe_mode
                //'useStreamsFallback' => true,
            ],
            'services' => [ // You can change the providers and their classes.
                'google' => [
                    // register your app here: https://code.google.com/apis/console/
                    'class' => 'common\services\GoogleOAuth2Service',
                    'clientId' => '368150561698-9kor64cqbtvk465n0jcg0ogm79ro1ut4.apps.googleusercontent.com',
                    'clientSecret' => '_kKO9kmLZ-IQ1-ArGt6vuJuS',
                    'title' => 'Google',
                ],
                'twitter' => [
                    // register your app here: https://dev.twitter.com/apps/new
                    'class' => 'common\services\TwitterOAuth1Service',
                    'key' => 'AnbrBqbEQ6qggp3nMFDwdIy2o',
                    'secret' => 'fZmwgtv4FJopZcmSyaukM0ertVq79L63oNrI4b42Ec8zzWvlkV',
                ],
                'facebook' => [
                    // register your app here: https://developers.facebook.com/apps/
                    'class' => 'common\services\FacebookOAuth2Service',
                    'clientId' => '1048568995195948',
                    'clientSecret' => '3b3b1c1dc90bbfa7db953c5b4a38ae95',
                ],
            ],
        ],

        'i18n' => [
            'translations' => [
                'eauth' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@eauth/messages',
                ],
            ],
        ],
    ],
    'params' => $params,
];
