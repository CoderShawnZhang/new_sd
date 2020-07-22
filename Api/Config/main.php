<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'Api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'Api\controllers',
    'bootstrap' => ['log'],
       'modules' => [
        'v1' => [
            'class' => 'Api\Modules\v1\Module',
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [],
        ],
            /**
         * 数据库相关设置
         */
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mysql;dbname=bdw;port=3306',
            'username' => 'root',
            'password' => '123456',
            'charset' => 'utf8',
        ],
    ],
    'defaultRoute' => 'base',
    'params' => $params,
];