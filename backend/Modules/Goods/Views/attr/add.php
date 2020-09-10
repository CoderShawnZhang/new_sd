<blockquote class="layui-elem-quote layui-text">
    商品属性管理，该属性用户发布商品时对商品的销售属性关联
</blockquote>
<div style="margin-top:10px;margin-left:10px;">
    <form class="layui-form layui-form-pane">
        <div class="layui-form-item">
            <label class="layui-form-label">上级属性</label>
            <div class="layui-input-inline">
                <select name="parentValue">
                    <option value="">顶级属性</option>
                    <?php foreach($list as $key => $val){ ?>
                    <option value="<?=$val['type_id']?>"><?=$val['name']?></option>
                    <?php }?>
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">属性名称</label>
            <div class="layui-input-inline">
                <input type="text" name="name" placeholder="属性名称" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">属性类别</label>
            <div class="layui-input-inline">
                <select name="type">
                    <option value="">请选择属性类别</option>
                    <?php foreach($typeList as $key => $val){ ?>
                        <option value="<?=$key?>"><?=$val?></option>
                    <?php }?>
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">排序</label>
            <div class="layui-input-inline">
                <input type="text" name="sort" placeholder="排序值" class="layui-input">
            </div>
        </div>
        <input type="hidden" name="_csrf-backend" value="<?= Yii::$app->request->csrfToken ?>" />

        <div class="layui-form-item">
            <button class="layui-btn" lay-submit="" id="submit_btn" lay-filter="submit_attr">提交</button>
        </div>
    </form>
</div>

<!-------------------------------------------资源文件------------------------------------------->
<!--引入javascript-->
<?php $this->registerJs($this->render("/javascript/attr.js"),yii\web\View::POS_END); ?>
<!--引入css-->
