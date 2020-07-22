<?php
    use backend\assets\AppAsset;
    $asset = AppAsset::register($this);
    $opts = $asset->baseUrl;
    $this->registerJs("var option = '{$opts}';", yii\web\View::POS_END);
    $this->registerJs($this->render("/../../backend/assets/static/javascript/pages/index.js"),yii\web\View::POS_END);
    //$this->registerJsFile($asset->baseUrl . "/javascript/pages/index.js", ['depends' => 'yii\web\YiiAsset']);


$js = <<<JS

JS;
$this->registerJs($js,\yii\web\View::POS_END);
?>
