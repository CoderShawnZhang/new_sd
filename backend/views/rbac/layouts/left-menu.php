<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

$controller = $this->context;
$menus = $controller->module->menus;
$route = $controller->route;
foreach ($menus as $i => $menu) {
    $menus[$i]['active'] = strpos($route, trim($menu['url'][0], '/')) === 0;
}
$this->params['nav-items'] = $menus;
?>
<?php $this->beginContent($controller->module->mainLayout) ?>
<div class="row">
    <div class="col-sm-12">
        <?= $content ?>
    </div>
</div>
<?php
list(, $url) = Yii::$app->assetManager->publish('@mdm/admin/assets');
$this->registerCssFile($url . '/list-item.css');
?>

<?php $this->endContent(); ?>