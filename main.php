<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'homeUrl' => '/madejayabersama.com',
    'id' => 'app-frontend',
    'name' => 'EZ Company',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '/madejayabersama.com',
        ],
        'user' => [
            'identityClass' => 'frontend\models\Pelamar',
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
                    'class' => 'yii\log\FileTarget',
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
            'enableStrictParsing' => false,
            'rules' => [
            ],
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'google' => [
                    /* 'viewOptions' => [
                         'widget' => [
                             'class' => 'yii\authclient\widgets\GooglePlusButton',
                             'buttonHtmlOptions' => [
                                 'data-approvalprompt' => 'force'
                             ],
                         ],
                     ], */
                    'class' => 'yii\authclient\clients\Google',
                    'clientId' => '716923179769-ssr9d4psnap3dq7k48upn64d5jtoqjmv.apps.googleusercontent.com',
                    'clientSecret' => 'knSjukpV1Czq9wEdrq1rpBG5',        
                ],
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'clientId' => '136691677009046',
                    'clientSecret' => '374587f892274e1cde78dd6466e0d192',
                           
                ],
                /* 'twitter' => [
                    'class' => 'yii\authclient\clients\Twitter',
                    'attributeParams' => [
                        'include_email' => 'true'
                    ],
                    'consumerKey' => 'uKlxS8acsoPf2OvYImw5mMdLV',
                    'consumerSecret' => 'oEF3OdWy5NSvCqmzxihpwwFWoONNyMW3MvaKlZOm0WL6gRSnfy',          
                ], */
                'live' => [
                    'class' => 'yii\authclient\clients\Live',
                    'clientId' => '28ae8075-257e-4501-88ea-272fa010e32a',
                    'clientSecret' => 'nfXBUG2493;ulkglPDD6;%{',
                           
                ],
                /* 'linkedin' => [
                    'class' => 'yii\authclient\clients\LinkedIn',
                    'clientId' => '86zk3rt31l8dgr',
                    'clientSecret' => 'vpYsP58UGWQGKiIg',
                           
                ],
                'github' => [
                    'class' => 'yii\authclient\clients\GitHub',
                    'clientId' => 'a5d9c2e80c44444b2e4a',
                    'clientSecret' => '81108150570ace4f7d1a94d94eb22b068432d040',
                      
                ], */
            ],
        ]
    ],
    'params' => $params,
];
