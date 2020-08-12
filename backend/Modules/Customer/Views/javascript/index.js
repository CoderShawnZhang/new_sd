layui.use('table', function(){
    var table = layui.table;
    var cols = [[
        {field:'user_name', width:180, title: '用111户名', sort: true}
        ,{field:'c_id', width:120, title: 'ID'}
        ,{field:'is_auth', width:100, title: '是否认证',templet:'#auth'}
        ,{field:'status', width:100, title: '状态',templet:"#status"}
        ,{field:'roleName', width:110, title: '角色',sort: true}
        ,{field:'parent_level_1', width:200, title: '上级',templet:'#parentLevel1'}
        ,{field:'parent_level_2', width:200, title: '上上级',templet:'#parentLevel2'}
        ,{field:'service', width:120, title: '客服',templet:'#service',sort: true}
        ,{field:'created_at', width:170, title: '注册时间'}
        ,{field:'right',width:150,title:'操作',toolbar:'#barDemo'}
    ]];
    //渲染
    $.form.table('customer_list','/Customer/index/data/',cols,true);
    
    //监听行工具事件
    table.on('tool(customer_filter)', function(obj){
        var data = obj.data;
        //console.log(obj)
        if(obj.event === 'del'){
            layer.confirm('真的删除行么', function(index){
                obj.del();
                layer.close(index);
            });
        } else if(obj.event === 'edit') {
            layer.open({
                type: 2 //此处以iframe举例
                , title: '当你选择该窗体时，即会在最顶端'
                , area: ['80%', '100%']
                , shade: 0
                , maxmin: true
                , content: '/Customer/index/edit'
                , btn: ['确定', '关闭'] //只是为了演示
                , yes: function () {
                    layer.msg('不111开心。。', {icon: 5});
                }
                ,btn2: function(){
                    layer.msg('不555开心。。', {icon: 5});
                }
                , success: function (layero) {
                    // layer.msg('不222开心。。', {icon: 5});
                }
            });
        }
    });

});


