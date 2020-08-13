
var columns = [
    {field:'user_name', width:180, title: '用户名', sort: true},
    {field:'c_id', width:120, title: 'ID'},
    {field:'is_auth', width:100, title: '是否认证',templet:'#auth'},
    {field:'status', width:100, title: '状态',templet:"#status"},
    {field:'roleName', width:110, title: '角色',sort: true},
    {field:'parent_level_1', width:200, title: '上级',templet:'#parentLevel1'},
    {field:'parent_level_2', width:200, title: '上上级',templet:'#parentLevel2'},
    {field:'service', width:120, title: '客服',templet:'#service',sort: true},
    {field:'created_at', width:170, title: '注册时间'},
    {field:'right',width:150,title:'操作',toolbar:'#barDemo'}
];

//渲染数据表
$.form.table('customer_list','/Customer/index/data/',columns,true);

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
        , area: ['80%', '100%']
        , shade: 0
        , maxmin: true
        , content: '/Customer/index/edit'
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
$.form.on('tool(customer_filter)',functionArray);


