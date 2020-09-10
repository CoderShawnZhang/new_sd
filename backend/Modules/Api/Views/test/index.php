
<blockquote class="layui-elem-quote layui-quote-nm">
    <blockquote class="layui-elem-quote">
        http://dengbeiapi.local.alwooo.com/v1/index/abc
        <a class="layui-btn layui-btn-normal" data-url="http://dengbeiapi.local.alwooo.com/v1/index/abc" id="run">执行</a>
    </blockquote>
    <br>
    method：<span class="layui-badge">GET</span>
    <br><br>
    params：
    <table class="layui-table">
        <colgroup>
            <col width="150">
            <col width="150">
            <col width="200">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>参数名</th>
            <th>参数值</th>
            <th>类型</th>
            <th>是否可以为空</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>name</td>
            <td>测试</td>
            <td>string</td>
            <td>是</td>
        </tr>

        </tbody>
    </table>
</blockquote>

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
    <legend>结果</legend>
</fieldset>
<div class="layui-collapse" lay-filter="test">
    <div class="layui-colla-item">
        <h1 class="layui-colla-title">
            <div class="layui-btn-group">
                <button type="button" class="layui-btn" id="toggle-btn">合起/展开</button>
                <button type="button" class="layui-btn" id="toggle-level1-btn">合起/展开(第一层)</button>
                <button type="button" class="layui-btn" id="toggle-level2-btn">合起/展开(第二层)</button>
            </div>
            <span style="float: right;">
                状态:<span class="layui-badge layui-bg-orange">200</span>&nbsp;&nbsp;耗时:<span class="layui-badge layui-bg-orange">129</span>
            </span>
        </h1>
        <div class="layui-colla-conten layui-showt">
            <div class="layui-form-item layui-form-text">
                <div class="layui-input-block" style="margin-left: 0;">
                    <div id="json"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script typet="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    var json = {};
    $(function(){
        $('#run').on('click',function () {
            var url = $(this).data('url');
            $.get(url,function(data,status){
                json = JSON.stringify(data);
                console.log(json);
                $("#json").JSONView(json);
                $("#json-collapsed").JSONView(json, {collapsed: true, nl2br: true});
                $('#toggle-btn').on('click', function() {
                    $('#json').JSONView('toggle');
                });
                $('#toggle-level1-btn').on('click', function() {
                    $('#json').JSONView('toggle', 1);
                });
                $('#toggle-level2-btn').on('click', function() {
                    $('#json').JSONView('toggle', 2);
                });
            });
        });

    });

</script>
