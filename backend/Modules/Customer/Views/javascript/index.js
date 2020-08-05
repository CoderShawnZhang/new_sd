

layui.use('table', function(){
    var table = layui.table;
    table.render({
        elem: '#test'
        ,url:'/Customer/index/data/'
        ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
        ,page: true
        ,limits:[20,30]//切换当前页显示数量，默认10
        ,toolbar: '#toolbarDemo' //开启头部工具栏，并为其绑定左侧模板
        ,cols: [[
            {field:'user_name', width:180, title: 'ID', sort: true}
            ,{field:'c_id', width:120, title: '用户名'}
            ,{field:'roleName', width:150, title: '角色'}
            ,{field:'right',width:200,title:'操作',toolbar:'#barDemo'}
        ]]
    });
});