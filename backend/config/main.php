<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'language' => 'zh-CN',
    'sourceLanguage' => 'en-US',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log','admin'],
//    'defaultRoute'=>'Login/login/index',//路由
    'defaultRoute' => 'base',
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
//            'layout' => 'left-menu',
            'layout' => '@backend/views/rbac/layouts/left-menu.php',
            'mainLayout' => '@backend/views/rbac/layouts/main.php',
//            'menus' => [
//                'assignment' => [
//                    'label' => 'Grand Access' // 更改label
//                ],
//                'route' => null, // 禁用菜单
//            ],
            'controllerMap' => [
//                'menu' => [
//                    'class' => 'mdm\admin\controllers\AssignmentController',
//                    'userClassName' => 'Service\ServiceModules\ServiceUser\Models\Ar\UserAr',
//                    'idField' => 'id',
//                    'usernameField' => 'name',
//                    'extraColumns' => [
//                        [
//                            'attribute' => 'mobile',
//                            'label' => '手机号',
//                            'value' => function ($model, $key, $index, $column) {
//                                return $model->mobile;
//                            },
//                        ],
//                    ],
//                ]
            ]
        ],
        //商品模块-后期对接商品库组件
        'Goods' => [
            'class' => 'backend\Modules\Goods\Module',
        ],
        //登录模块
        'Login' => [
            'class' => 'backend\Modules\Login\Module',
        ],
        //订单模块
        'Orders' => [
            'class' => 'backend\Modules\Orders\Module',
        ]
    ],
    'components' => [
        //css,js资源文件不进行缓存操作
        'assetManager' => [
            'hashCallback' => function ($path) {
                if (YII_DEBUG && !function_exists('_myhash_')) {
                    function _myhash_($path) {
                        if (is_dir($path)) {
                            $handle = opendir($path);
                            $hash = '';
                            while (false !== ($entry = readdir($handle))) {
                                if ($entry === '.' || $entry === '..') {
                                    continue;
                                }
                                $entry = $path . '/' . $entry;
                                $hash .= _myhash_($entry);
                            }
                            $result = sprintf('%x', crc32($hash . Yii::getVersion()));
                        } else {
                            $result = sprintf('%x', crc32(filemtime($path) . Yii::getVersion()));
                        }
                        return $result;
                    }
                }

                return _myhash_($path);
            }
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'Service\ServiceModules\ServiceUser\Models\Ar\UserIdentity',
            'enableAutoLogin' => false,
            'loginUrl' => '/Login/login/login',
//            'identityClass' => 'Service\ServiceModules\ServiceUser\Models\Ar\UserIdentity',
//            'enableAutoLogin' => true,
//            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
//            'loginUrl' => '/Login/login/login',//默认跳转登录页
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
            'rules' => [],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=sdadmin;port=3306',
            'username' => 'root',
            'password' => 'sodeng123#+',
            'charset' => 'utf8',
        ],
    ],
    'params' => $params,
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'base/index',
            'site/index',
            'hook/*',
            'Login/login/login',
            'Login/login/logout',
            'admin/*',
        ]
    ],
];
