var dataTree = [];
var formData = {};
layui.use(['tree', 'util','form'], function() {
    var tree = layui.tree;
    var form = layui.form;
    $.get('/Goods/attr/tree',function(res){
        console.log(res);
        dataTree = res;
        tree.render({
            elem: '#dataTree'
            , data: dataTree
            // , edit: ['add', 'update', 'del'] //操作节点的图标
            , click: function (obj) {
                layer.msg(JSON.stringify(obj.data));
            }
        });
    });
    var columns = [
        {field:'value_id', width:100, title: '属性值id', sort: true},
        {field:'name', width:120, title: '属性名'},
        {field:'parent_name', width:100, title: '上级'},
        {field:'type', width:100, title: '属性类别'},
        {field:'sort', width:100, title: '排序'},
        {field:'status', width:100, title: '状态'},
        {field:'right',title:'操作',toolbar:'#barDemo'}
    ];

    //渲染数据表
    $.form.table('customer_list','/Goods/attr/list',columns,false);

    //监听提交
    $("#submit_btn").unbind('submit').on('click',function(){
        var tt = {};
        $.post('/Goods/attr/post-add',tt,function(res){
            window.parent.location.reload();//刷新父页面
            var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
            parent.layer.close(index);
        });
    });

});
//监听行工具事件
var functionArray = [
    {'key':'edit','event':function(rowObj){
            click_edit(rowObj);
        }},
    {'key':'del','event' :function(rowObj){
            click_del(rowObj);
    }}
];

/**
 * 点击编辑
 *
 * @param rowObj {Object}
 * @param rowObj.data {Object}
 * @param rowObj.data.user_name {String}
 */
function click_edit(rowObj)
{
    layer.open({
        type: 2
        , title: rowObj.data.user_name
        , area: ['80%', '90%']
        , shade: 0
        , maxmin: true
        , content: '/Goods/attr/edit'
        , btn: ['确定', '关闭'] //只是为了演示
        , yes: function () {
            $.msg.alert('aaaaa',1);
        }
        ,btn2: function(){
            layer.msg('不555开心。。', {icon: 5});
        }
        , success: function (layero) {
            // layer.msg('不222开心。。', {icon: 5});
        }
    });
}
/**
 * 点击删除
 * @param rowObj
 */
function click_del(rowObj)
{
    layer.confirm('真的删除1123123行么', function(index){
        rowObj.del();
        layer.close(index);
    });
}
//绑定事件
$.form.on('tool(attr_filter)',functionArray);

$(function(){
    $("#add_attr").on('click',function(){
        layer.open({
            type: 2
            , title: '新增属性'
            , area: ['40%', '50%']
            , offset:'t'
            , shade: 0
            , maxmin: true
            , content: '/Goods/attr/add'
            , yes: function () {
                $.msg.alert('aaaaa',1);
            }
            ,btn2: function(){
                layer.msg('不555开心。。', {icon: 5});
            }
            , success: function (layero) {
                // layer.msg('不222开心。。', {icon: 5});
            }
        });
    });
});