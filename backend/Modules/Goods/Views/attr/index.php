<style>
    .layui-table, .layui-table-view {
         margin: 0;
    }
</style>
<div class="layui-collapse" lay-filter="test">
    <div class="layui-colla-item">
        <h2 class="layui-colla-title" style="text-decoration: underline;color: red;">高级搜索</h2>
        <div class="layui-colla-content">
            <form class="layui-form" action="">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">ID</label>
                        <div class="layui-input-inline">
                            <input type="number" name="user_id" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">用户名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="email" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">上级ID</label>
                        <div class="layui-input-inline">
                            <input type="text" name="email" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">上上级ID</label>
                        <div class="layui-input-inline">
                            <input type="text" name="email" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">是否认证</label>
                        <div class="layui-input-inline">
                            <select name="modules" lay-search="">
                                <option value="">直接选择或搜索选择</option>
                                <option value="1">layer</option>
                                <option value="2">form</option>

                            </select>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">用户角色</label>
                        <div class="layui-input-inline">
                            <select name="modules" lay-search="">
                                <option value="">直接选择或搜索选择</option>
                                <option value="1">layer</option>
                                <option value="2">form</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">所属客服</label>
                        <div class="layui-input-inline">
                            <select name="modules" lay-search="">
                                <option value="">直接选择或搜索选择</option>
                                <option value="1">layer</option>
                                <option value="2">form</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">是否有灯店</label>
                        <div class="layui-input-inline">
                            <select name="modules" lay-search="">
                                <option value="">直接选择或搜索选择</option>
                                <option value="1">layer</option>
                                <option value="2">form</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">地区</label>
                        <div class="layui-input-inline">
                            <select name="modules" lay-search="">
                                <option value="">直接选择或搜索选择</option>
                                <option value="1">layer</option>
                                <option value="2">form</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">最近登录</label>
                        <div class="layui-input-inline">
                            <select name="modules" lay-search="">
                                <option value="">直接选择或搜索选择</option>
                                <option value="1">layer</option>
                                <option value="2">form</option>
                            </select>
                        </div>
                    </div>

                    <div class="layui-inline">
                        <div class="layui-input-inline">
                            <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">搜索</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<blockquote class="layui-elem-quote layui-text" style="margin-top:5px;">
    <div>
        <button type="button" class="layui-btn layui-btn-primary" id="add_attr">新增属性</button>

    </div>
</blockquote>

<div class="layui-row">
    <div class="layui-col-xs2">
        <div id="dataTree" class="demo-tree demo-tree-box"></div>
    </div>
    <div class="layui-col-xs10">
        <div class="grid-demo">
            <table class="layui-hide" id="customer_list_table" lay-filter="attr_filter"></table>
        </div>
    </div>
</div>
<!--列表右侧操作组-->
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit" data-title="编辑" data-width="80%" data-height="100%">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<!-------------------------------------------资源文件------------------------------------------->
<!--引入javascript-->
<?php $this->registerJs($this->render("/javascript/attr.js"),yii\web\View::POS_END); ?>
<!--引入css-->


