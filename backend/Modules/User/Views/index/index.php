<div class="layui-collapse" lay-filter="test">
    <div class="layui-colla-item">
        <h2 class="layui-colla-title" style="text-decoration: underline;color: red;">高级搜索</h2>
        <div class="layui-colla-content">
            <form class="layui-form" action="/User/index/data">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">用户名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="email" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">搜索</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div style="text-align: center;">
    <div class="layui-inline layui_table_width_99">
        <table class="layui-hide" id="service_list"></table>
    </div>
</div>


<script type="text/html" id="start">
    <div id="test9">123123</div>
</script>

<!--列表顶部操作组-->
<script type="text/html" id="toolbarDemo">
    <div class="layui-btn-container">
        <button class="layui-btn layui-btn-sm" lay-event="click_event">操作按钮</button>
        <button class="layui-btn layui-btn-sm" lay-event="click_event">操作按钮</button>
        <button class="layui-btn layui-btn-sm" lay-event="click_event">操作按钮</button>
    </div>
</script>
<!--列表右侧操作组-->
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>

<!-------------------------------------------资源文件------------------------------------------->
<!--引入javascript-->
<?php $this->registerJs($this->render("/javascript/index.js"),yii\web\View::POS_END); ?>
<!--引入css-->