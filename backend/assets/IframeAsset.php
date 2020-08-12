<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2020-07-26
 * Time: 15:09
 */

namespace backend\assets;


use yii\web\AssetBundle;

class IframeAsset extends AssetBundle
{
//     public $basePath = '@backend/assets/static';
    // public $baseUrl = '@web';
    public $sourcePath = '@backend/assets/static';
    public $css = [
        'layui/css/layui.css',
        'css/iframe_style.css'
    ];
    public $js = [
        'javascript/jquery.min.js',
        'layui/layui.all.js',
        'javascript/admin.js'
    ];
    public $depends = [
//         'yii\web\YiiAsset',
//         'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];
}