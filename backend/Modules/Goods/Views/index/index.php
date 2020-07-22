
<?php
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\assets\AppAsset;
$asset = AppAsset::register($this);
$this->registerJsFile($asset->baseUrl . "/javascript/pages/page.js", ['depends' => 'yii\web\YiiAsset']);

$js = <<<JS
    
JS;
$this->registerJs($js,\yii\web\View::POS_END);
?>

<blockquote class="layui-elem-quote">欢迎管理员：<span class="x-red">哎123</span>！当前时间:2018-04-25 20:50:53</blockquote>

<?php Pjax::begin(); ?>
<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'layout' => '{items}<div class="text-right tooltip-demo">{pager}</div>',
    'pager' => [
        'firstPageLabel' => '首页',
        'prevPageLabel' => '上一页',
        'nextPageLabel' => '下一页',
        'lastPageLabel' => '末页'
    ],
    'rowOptions' => function(){
        return ['class' => 'label-green'];
    },
    'columns' => [
        'id',
        'city_id',
        'city_name',
        'city_status',
        'city_sort',
        'city_father'
    ]
]);
?>
<?php Pjax::end(); ?>
