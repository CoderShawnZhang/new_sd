
layui.use('table', function(){
    var table = layui.table;
    table.render({
        elem: '#test'
        ,url: '/Customer/index/data/'
        ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
        ,page: true
        ,id: 'testReload'
        // ,limits:[10,20,30]//切换当前页显示数量，默认10
        ,toolbar: '#toolbarDemo' //开启头部工具栏，并为其绑定左侧模板
        ,cols: [[
            {field:'user_name', width:180, title: '用户名', sort: true}
            ,{field:'c_id', width:120, title: 'ID'}
            ,{field:'is_auth', width:100, title: '是否认证',templet:'#auth'}
            ,{field:'status', width:60, title: '状态'}
            ,{field:'roleName', width:110, title: '角色'}
            ,{field:'parent_level_1', width:200, title: '上级',templet:'#parentLevel1'}
            ,{field:'parent_level_2', width:200, title: '上上级',templet:'#parentLevel2'}
            ,{field:'service', width:120, title: '客服',templet:'#service'}
            ,{field:'created_at', width:140, title: '注册时间'}
            ,{field:'right',width:150,title:'操作',toolbar:'#barDemo'}
        ]]
    });

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


