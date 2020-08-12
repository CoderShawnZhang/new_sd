<!--模版页-->

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
<!--                <div class="layui-form-item">-->
<!--                    <div class="layui-input-block">-->
<!--                        <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">搜索</button>-->
<!--                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>-->
<!--                    </div>-->
<!--                </div>-->
            </form>
        </div>
    </div>
</div>

<div style="text-align: center;">
    <div class="layui-inline layui_table_width_99">
        <table class="layui-hide" id="customer_list_table" lay-filter="customer_filter"></table>
    </div>
</div>

<script type="text/html" id="parentLevel1">
    {{# if(d.parent_1_user_name == '--'){  }}
        <a href="#" style="color: red;text-decoration: underline;">手动绑定</a>
    {{# }else{ }}
        <div>{{d.parent_1_user_name}}-{{d.parent_level_1_txt}}</div>
    {{# } }}
</script>
<script type="text/html" id="parentLevel2">
    {{# if(d.parent_2_user_name == '--'){  }}
    <a href="#" style="color: red;text-decoration: underline;">手动绑定</a>
    {{# }else{ }}
    <div>{{d.parent_2_user_name}}-{{d.parent_level_2_txt}}</div>
    {{# } }}
</script>
<script type="text/html" id="auth">
    <input type="checkbox" name="sex" value="{{d.is_auth}}" lay-skin="switch" lay-text="是|否" lay-filter="sex">
</script>
<script type="text/html" id="status">
    <input type="checkbox" name="status" value="{{d.status}}" lay-skin="switch" lay-text="开启|禁用" lay-filter="status">
</script>
<script type="text/html" id="service">
    {{# if(d.service_txt == '无'){ }}
        <div class="layui-badge layui-bg-black">{{d.service_txt}}</div>
    {{# }else{ }}
        <div class="layui-badge layui-bg-orange">{{d.service_txt}}</div>
    {{# } }}
</script>

<!--列表顶部操作组-->
<script type="text/html" id="customer_list_toolbar">
    <div class="layui-btn-container">
        <button class="layui-btn layui-btn-sm" lay-event="click_event">显示更多</button>
        <button class="layui-btn layui-btn-sm" lay-event="click_event">操作按钮</button>
        <button class="layui-btn layui-btn-sm" lay-event="click_event">操作按钮</button>
    </div>
</script>
<!--列表右侧操作组-->
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="edit" data-open='{:url("Customer/index/edit)}' data-title="编辑{{d.user_name}}" data-width="80%" data-height="100%">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<!-------------------------------------------资源文件------------------------------------------->
<!--引入javascript-->
<?php $this->registerJs($this->render("/javascript/index.js"),yii\web\View::POS_END); ?>
<!--引入css-->
