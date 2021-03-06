<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

$appAsset = AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <?php
        $this->registerJs($this->render('test.js'));
    ?>
</head>

<?php $this->beginBody() ?>

<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">

        <div class="layui-logo">
            <img src="<?=$appAsset->baseUrl.'/images/sodenglogo.png'?>" class="layui-nav-img">
            <span>搜灯管理后台</span>
        </div>
        <a href="javascript:;" class="seraph hideMenu icon-caidan"></a>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left topLevelMenus">

        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="<?=$appAsset->baseUrl.'/images/user_face.png'?>" class="layui-nav-img">
                    管理员
                    <span class="layui-nav-more"></span>
                </a>
                <dl class="layui-nav-child top_admin_nav">
                    <dd><a href=""><i class="layui-icon layui-icon-username"></i>基本资料</a></dd>
                    <dd><a href=""><i class="layui-icon layui-icon-auz"></i>安全设置</a></dd>
                    <dd><a href="/Login/login/logout"><i class="layui-icon layui-icon-logout"></i>退出</a></dd>
                </dl>
            </li>
<!--            <li class="layui-nav-item"><a href="">退出</a></li>-->

        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree" lay-filter="test">

            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div>
            <div class="layui-tab" lay-filter="top_nav_raw" lay-allowclose="true">
                <ul class="layui-tab-title">
                    <li class="layui-this"><i class="layui-icon">&#xe68e;</i>网站设置</li>
                </ul>
                <div class="layui-tab-content clildFrame">
                    <div class="layui-tab-item layui-show">
                        <iframe src='/Goods/index/test'></iframe>
                    </div>
                </div>
            </div>
         </div>
    </div>

</div>

</body>

<?php $this->endBody() ?>

</html>
<?php $this->endPage() ?>
