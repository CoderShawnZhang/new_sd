<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
//     public $basePath = '@backend/assets/static';
    // public $baseUrl = '@web';
    public $sourcePath = '@backend/assets/static';
    public $css = [
        'layui/css/layui.css',
        'css/style.css',
        'css/at-alicdn.css'
    ];
    public $js = [
        'javascript/jquery.min.js',
        'layui/layui.all.js',
        'javascript/admin.js'
    ];
    public $depends = [
         'yii\web\YiiAsset',
         'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];
}
