<style>
    .attr_item_tab{
        cursor:default;
    }

</style>
<blockquote class="layui-elem-quote layui-text">
    鉴于小伙伴的普遍反馈，先温馨提醒两个常见“问题”：1. <a href="/doc/base/faq.html#form" target="_blank">为什么select/checkbox/radio没显示？</a> 2. <a href="/doc/modules/form.html#render" target="_blank">动态添加的表单元素如何更新？</a>
</blockquote>
<div style="margin-top:10px;margin-left:10px;">
<form class="layui-form layui-form-pane" action="">
    <div class="layui-form-item">
        <label class="layui-form-label">商品标题</label>
        <div class="layui-input-block">
            <input type="text" name="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">商品卖点</label>
        <div class="layui-input-inline">
            <input type="text" name="username" placeholder="请输入" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">供应商产品型号</label>
            <div class="layui-input-inline">
                <input type="text" name="date" id="date1" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline" style="line-height:38px;">
            <button type="button" class="layui-btn layui-btn-normal">选择厂家型号</button>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">供应商产品型号</label>
            <div class="layui-input-inline">
                <input type="text" name="date" id="date1" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline" style="line-height:38px;">
            <button type="button" class="layui-btn layui-btn-normal">选择型号</button>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">品牌</label>
            <div class="layui-input-inline">
                <input type="text" name="date" id="date1" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline" style="line-height:38px;">
            <button type="button" class="layui-btn layui-btn-normal">选择品牌</button>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">标签</label>
        <div class="layui-inline" style="border: 1px solid #eae9e9;line-height: 36px;padding-left: 10px;border-left: 0;padding-right: 20px;">
            <span class="layui-badge">6</span>
            <span class="layui-badge">99</span>
            <span class="layui-badge">61728</span>
            <span class="layui-badge">赤</span>
            <span class="layui-badge layui-bg-orange">橙</span>
            <span class="layui-badge layui-bg-green">绿</span>
            <span class="layui-badge layui-bg-cyan">青</span>
            <span class="layui-badge">61728</span>
            <span class="layui-badge">赤</span>
            <span class="layui-badge layui-bg-orange">橙</span>
            <span class="layui-badge layui-bg-green">绿</span>
            <span class="layui-badge layui-bg-cyan">青</span>
            <span class="layui-badge layui-bg-blue">蓝</span>
            <span class="layui-badge layui-bg-black">黑</span>
            <span class="layui-badge layui-bg-gray">灰</span>
            <span class="layui-badge">+</span>
        </div>
    </div>

    <fieldset class="layui-elem-field site-demo-button" style="margin-top: 30px;">
        <legend>商品必须属性</legend>
        <div style="padding:20px;">
            <?php foreach($must_list as $key => $val){ ?>
            <div class="layui-form-item">
                <div style="padding: 10px; background-color: #F2F2F2;">
                    <div class="layui-row layui-col-space15">
                        <div class="layui-col-md12" style="padding:3px;">
                            <div class="layui-card">
                                <div class="layui-card-header"><?=$val['name']?></div>
                                <div class="layui-card-body" style="padding: 0;">
                                    <div class="layui-inline" style="line-height: 36px;padding-left: 10px;border-left: 0;padding-right: 20px;">
                                        <?php foreach($val['attributeValues'] as $k=>$v){ ?>
                                            <span class="layui-badge <?php if($k!=0){?> layui-bg-gray <?php } ?> attr_item_tab"><?=$v['name']?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </fieldset>
    <fieldset class="layui-elem-field site-demo-button" style="margin-top: 30px;">
        <legend>商品可选属性</legend>
        <div style="padding:20px;">
            <?php foreach($need_list as $key => $val){ ?>
            <div class="layui-form-item">
                <label class="layui-form-label"><?=$val['name']?></label>
                <div class="layui-input-block">
                    <?php foreach($val['attributeValues'] as $k=>$v){ ?>
                        <input type="radio" name="must_radio_<?=$v['type_id']?>" value="1" title="<?=$v['name']?>"<?php if($v['name'] == '否'){?>  checked="" <?php } ?>>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>

    </fieldset>
    <fieldset class="layui-elem-field site-demo-button" style="margin-top: 30px;">
        <legend>商品多规格</legend>

        <div style="margin-left:20px;">
            <div class="layui-form-item">
                <div>
                    <button type="button" class="layui-btn layui-btn-danger" id="click_text">警告按钮</button>
                    <button type="button" class="layui-btn layui-btn-danger" id="click_text">警告按钮</button>
                    <button type="button" class="layui-btn layui-btn-danger" id="click_text">警告按钮</button>
                </div>
                <div class="layui-inline layui_table_width_99">
                    <table class="layui-hide" id="customer_list_table" lay-filter="customer_filter"></table>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="layui-form-item">
        <label class="layui-form-label">最小起订量</label>
        <div class="layui-input-inline">
            <input type="text" name="username" placeholder="请输入" class="layui-input">
        </div>
        <label class="layui-form-label">最大起订量</label>
        <div class="layui-input-inline">
            <input type="text" name="username" placeholder="请输入" class="layui-input">
        </div>
    </div>
    <?php foreach($params_list as $key => $val){ ?>
        <div class="layui-form-item">
            <label class="layui-form-label"><?=$val['name']?></label>
            <div class="layui-input-inline" style="width:auto;">
                <div class="layui-inline" style="line-height: 36px;padding-left: 10px;border-left: 0;padding-right: 20px;">
                    <?php foreach($val['attributeValues'] as $k=>$v){ ?>
                        <span class="layui-badge <?php if($k!=0){?> layui-bg-gray <?php } ?> attr_item_tab"><?=$v['name']?></span>
                    <?php } ?>
                </div>
            </div>
<!--            <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>-->
        </div>
    <?php } ?>

    <div class="layui-form-item">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="test1">外观图片</button>
            <div class="layui-upload-list">
                <img class="layui-upload-img" style="width: 85px;height: 85px;margin: 0 10px 10px 0;">
                <p id="demoText"></p>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="test2">产品详情图</button>
            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                产品详情预览图：<div class="layui-upload-list" id="demo2"></div>
            </blockquote>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="test5"><i class="layui-icon"></i>上传视频</button>
            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                视频览图：<div class="layui-upload-list" id="demo2"></div>
            </blockquote>
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">备注(内部)</label>
        <div class="layui-input-block">
            <textarea placeholder="请输入内容" class="layui-textarea"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <button class="layui-btn" lay-submit="" lay-filter="demo2">提交</button>
        <button class="layui-btn layui-btn-warm" id="back_list">返回列表</button>
    </div>
</form>
</div>

<!--列表右侧操作组-->
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit" data-open='{:url("Customer/index/edit)}' data-title="编辑{{d.user_name}}" data-width="80%" data-height="100%">新增</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>

<!--列表顶部操作组-->
<script type="text/html" id="customer_list_toolbar">
    <div class="layui-btn-container">
        <button type="button" class="layui-btn layui-btn-danger" id="click_text">警告按钮</button>
        <button class="layui-btn layui-btn-sm" lay-event="click_event">操作按钮</button>
        <button class="layui-btn layui-btn-sm" lay-event="click_event">操作按钮</button>
    </div>
</script>
<!-------------------------------------------资源文件------------------------------------------->
<!--引入javascript-->
<?php $this->registerJs($this->render("/javascript/addGoods.js"),yii\web\View::POS_END); ?>
<!--引入css-->
