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
            'class' => 'common\components\Request',
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
            'errorAction' => 'learn/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'verb' => ['GET', 'POST'],
                    'pattern' => '/opcje',
                    'route' => 'settings/index',
                    'suffix' => '/',
                ],
                [
                    'verb' => ['GET', 'POST'],
                    'pattern' => '/opcje',
                    'route' => 'settings/index',
                ],
                [
                    'pattern' => '/profil/<profile_name:[\w]+>',
                    'route' => 'profile/index',
                ],
                [
                    'pattern' => '/profile/<profile_name:[\w-]+>',
                    'route' => 'profile/index',
                ],
                [
                    'pattern' => '/profil',
                    'route' => 'profile/index',
                    'suffix' => '/'
                ],
                [
                    'pattern' => '/profil',
                    'route' => 'profile/index',
                ],
                [
                    'pattern' => '/nauka/<course_slug:[\w-]+>/<chapter_slug:[\w-]+>/test/sprawdz-poprawnosc',
                    'verb'=> 'POST',
                    'route' => 'learn/validate-answers',
                ],
                [
                    'pattern' => '/nauka/<course_slug:[\w-]+>/<chapter_slug:[\w-]+>/test/validate-answers',
                    'verb' => 'POST',
                    'route' => 'learn/validate-answers',
                ],
                [
                    'pattern' => '/nauka/<course_slug:[\w-]+>/<chapter_slug:[\w-]+>/test',
                    'route' => 'learn/test',
                ],
                [
                    'pattern' => '/learn/<course_slug:[\w-]+>/<chapter_slug:[\w-]+>/test',
                    'route' => 'learn/test',
                ],
                [
                    'pattern' => '/nauka/<course_slug:[\w-]+>/<chapter_slug:[\w-]+>/<lesson_slug:[\w-]+>',
                    'verb' => ['GET', 'POST'],
                    'route' => 'learn/lesson',
                ],
                [
                    'pattern' => '/learn/<course_slug:[\w-]+>/<chapter_slug:[\w-]+>/<lesson_slug:[\w-]+>',
                    'route' => 'learn/lesson',
                ],
                [
                    'pattern' => '/nauka/<course_slug:[\w-]+>/<chapter_slug:[\w-]+>',
                    'route' => 'learn/chapter',
                    'suffix' => '/',
                ],
                [
                    'pattern' => '/learn/<course_slug:[\w-]+>/<chapter_slug:[\w-]+>',
                    'route' => 'learn/chapter',
                    'suffix' => '/',
                ],
                [
                    'pattern' => '/nauka/<course_slug:[\w-]+>',
                    'route' => 'learn/course',
                    'suffix' => '/',
                ],
                [
                    'pattern' => '/learn/<course_slug:[\w-]+>',
                    'route' => 'learn/course',
                    'suffix' => '/',
                ],
                [
                    'pattern' => '/nauka',
                    'route' => 'learn/index',
                ],
                [
                    'pattern' => '/nauka',
                    'route' => 'learn/index',
                    'suffix' => '/',
                ],
            ],
        ],
        'assetManager' => [
            'appendTimestamp' => true,
        ]
    ],
    'params' => $params,
];
