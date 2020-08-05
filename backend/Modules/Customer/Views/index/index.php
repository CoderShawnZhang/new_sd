<!--模版页-->
<table class="layui-hide" id="test"></table>

<script type="text/html" id="toolbarDemo">
    <div class="layui-btn-container">
        <button class="layui-btn layui-btn-sm" lay-event="click_event">操作按钮</button>
        <button class="layui-btn layui-btn-sm" lay-event="click_event">操作按钮</button>
        <button class="layui-btn layui-btn-sm" lay-event="click_event">操作按钮</button>
    </div>
</script>

<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<!-------------------------------------------资源文件------------------------------------------->
<!--引入javascript-->
<?php $this->registerJs($this->render("/javascript/index.js"),yii\web\View::POS_END); ?>
<!--引入css-->
