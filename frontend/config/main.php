<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'name' => 'Język komputerów',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
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
            'rules' => [
                'POST /nauka/validate-answers' => 'learn/validate-answers',
                'POST /learn/validate-answers' => 'learn/validate-answers',

                'GET,POST /nauka/<course_slug:[\w-]+>/<chapter_slug:[\w-]+>/test' => 'learn/test',
                'GET,POST /learn/<course_slug:[\w-]+>/<chapter_slug:[\w-]+>/test' => 'learn/test',

                'GET,POST /nauka/<course_slug:[\w-]+>/<chapter_slug:[\w-]+>/<lesson_slug:[\w-]+>' => 'learn/lesson',
                'GET,POST /learn/<course_slug:[\w-]+>/<chapter_slug:[\w-]+>/<lesson_slug:[\w-]+>' => 'learn/lesson',

                '/nauka/<course_slug:[\w-]+>/<chapter_slug:[\w-]+>' => 'learn/chapter',
                '/learn/<course_slug:[\w-]+>/<chapter_slug:[\w-]+>' => 'learn/chapter',

                '/learn/<slug:[\w-]+>' => 'learn/course',
                '/nauka/<slug:[\w-]+>' => 'learn/course',
                
                '/learn/<slug:\w+>' => 'learn/course',
                '/nauka' => 'learn/index'
            ],
        ],
        'assetManager' => [
            'appendTimestamp' => true,
        ]
    ],
    'params' => $params,
];
