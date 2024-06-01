<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'site/index',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            // 'enableStrictParsing' => true,
            'rules' => [
                'login' => 'site/login',
                'about' => 'site/about',
                'docs' => 'site/docs',
                'search' => 'site/search',
                'register' => 'site/signup',
                'news' => 'site/error',


                // main user(name) route
                '<username:\w+>' => 'user',
                '<username:\w+>/cv' => 'user/cv',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                // 'yii\web\JqueryAsset' => [
                //     'js' =>[]
                // ],
                'yii\bootstrap5\BootstrapPluginAsset' => [
                    'js' => []
                ],
                'yii\bootstrap5\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ]

    ],
    'modules' => [

    ],
    'params' => $params,
];
