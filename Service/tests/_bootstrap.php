<?php
// This is global bootstrap for autoloading
/*
define('YII_ENV', 'test');
defined('YII_DEBUG') or define('YII_DEBUG', true);

require_once(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require __DIR__ .'/../../vendor/autoload.php';
\Codeception\Util\Autoload::addNamespace('Tests\Extension', __DIR__ . DIRECTORY_SEPARATOR . 'extension');
*/


defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');
defined('YII_APP_BASE_PATH') or define('YII_APP_BASE_PATH', __DIR__.'/../../');


//require_once '../Api/tests/unit/AmountRules.php';

require_once(YII_APP_BASE_PATH . '/vendor/autoload.php');
require_once(YII_APP_BASE_PATH . '/vendor/yiisoft/yii2/Yii.php');
require_once(YII_APP_BASE_PATH . '/common/config/bootstrap.php');
//require_once(__DIR__ . '/../Config/bootstrap.php');