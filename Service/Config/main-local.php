<?php
$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'yIyJVDWlY3VcqwS62vKRNT8tN1bSeoQp',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mysql;dbname=dengbei;port=3306',
            'username' => 'root',
            'password' => 123456,
            'charset' => 'utf8',
        ],
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
    ],
];

if (YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
}

return $config;
