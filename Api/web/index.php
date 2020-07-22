<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../../vendor/autoload.php');

require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
// var_dump(__DIR__ . '/../../common/config/bootstrap.php');die;
require(__DIR__ . '/../../common/config/bootstrap.php');

require(__DIR__ . '/../Config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../../common/config/main-local.php'),
    require(__DIR__ . '/../Config/main.php'),
    require(__DIR__ . '/../Config/main-local.php')
);
 // var_dump($config);die;
$application = new yii\web\Application($config);
$application->run();
