<?php
require __DIR__ . '/../../common/config/bootstrap.php';
return yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/test-local.php'),
    require(__DIR__ . '/main.php'),
    require(__DIR__ . '/main-local.php'),
    require(__DIR__ . '/test.php'),
    [
        'id' => 'app-service-tests',
        'basePath' => dirname(dirname(__DIR__)),
        'components' => [
            // 测试数据库
            'db' => [
                'class' => 'yii\db\Connection',
                'dsn' => 'mysql:host=127.0.0.1;dbname=dengbei',
                'username' => 'root',
                'password' => '123456',
                'charset' => 'utf8',
                'tablePrefix' => ''
            ],
            'user' => [
                'identityClass' => 'app\models\User', // User must implement the IdentityInterface
            ],
        ],
    ]
);


