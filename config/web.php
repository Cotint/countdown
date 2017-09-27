<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
  'language'=>'fa_ir',
  'defaultRoute'=>'site/front',
    'components' => [


      'urlManager' => [
               'class' => 'yii\web\UrlManager',

                'enablePrettyUrl' => true, // Disable r= routes
                'enableStrictParsing'=>true,
                'showScriptName' => false, // Disable index.php

                'rules' => array(
                '/' => 'site/front',
                '/admin' => 'site/login',
                'site/index'=>'site/index',
                'info/create'=>'info/create',
                'email/admin'=>'email/admin',
                'contact/admin'=>'contact/admin',
                'site/logout'=>'site/logout',
                'info/update'=>'info/update',
                'user/create'=>'user/create',
                'user/update'=>'user/update',
                'site/changepass'=>'site/changepass',
                ),
      ],



        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'MhrBfckSvA1zmgZIXqUD-XarU1Hhv0_U',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
//            'useFileTransport' => true,

            'viewPath' => '@app/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'a.behdinian@gmail.com', //<username>@<yourDomain>
                'password' => 'tgyhuj1370', //<userPassword>
                'port' => 465,
                'encryption' => 'ssl',
            ],
            'useFileTransport' => false,
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
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
