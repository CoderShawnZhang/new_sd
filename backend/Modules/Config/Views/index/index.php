<blockquote class="layui-elem-quote layui-text">
    鉴于小伙伴的普遍反馈，先温馨提醒两个常见“问题”：1. <a href="/doc/base/faq.html#form" target="_blank">为什么select/checkbox/radio没显示？</a> 2. <a href="/doc/modules/form.html#render" target="_blank">动态添加的表单元素如何更新？</a>
</blockquote>


<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
    <ul class="layui-tab-title">
        <li class="layui-this">网站设置</li>
        <li>用户管理</li>
        <li>权限分配</li>
        <li>商品管理</li>
        <li>订单管理</li>
    </ul>
    <div class="layui-tab-content" style="height: 100px;">
        <div class="layui-tab-item layui-show">
            <form class="layui-form" id="config_1" action="/Config/index/update">
                <input type="hidden" name="_csrf-backend" value="<?= Yii::$app->request->csrfToken ?>" />
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label label_120px">默认左侧顶部菜单</label>
                        <div class="layui-input-inline">
                            <select name="init_top_menu" lay-verify="required" lay-search="">
                                <option value="">直接选择或搜索选择</option>
                                <?php foreach($list as $key => $val){ ?>
                                <option value="<?=$val['id']?>" <?php if($selected_id == $val['id']) {?> selected <?php } ?> ><?=$val['name']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="layui-tab-item">内容2</div>
        <div class="layui-tab-item">内容3</div>
        <div class="layui-tab-item">内容4</div>
        <div class="layui-tab-item">内容5</div>
    </div>
</div>
<?php
//$this->registerJs("var layui = '{$opts}';", yii\web\View::POS_END);
$this->registerJs($this->render("/javascript/index.js"),yii\web\View::POS_END);

//$js = <<<JS
//
//JS;
//$this->registerJs($js,\yii\web\View::POS_END);
?>