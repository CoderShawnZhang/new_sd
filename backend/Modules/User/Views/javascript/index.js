
layui.use('table', function(){
    var table = layui.table;
    table.render({
        elem: '#test'
        ,url: '/User/index/data/'
        ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
        ,page: true
        ,id: 'testReload'
        // ,limits:[10,20,30]//切换当前页显示数量，默认10
        ,toolbar: '#toolbarDemo' //开启头部工具栏，并为其绑定左侧模板
        ,cols: [[
            {field:'username', width:140, title: '用户名'},
            {field:'score', width:180, title: '评分', sort: true},
            {field:'username', width:180, title: '客户量', sort: true},
            {field:'username', width:180, title: '投诉量', sort: true},
            {field:'username', width:180, title: '满意度', sort: true},
            {field:'username', width:180, title: '退款额', sort: true},
            {field:'username', width:180, title: '周售额', sort: true},
            {field:'username', width:180, title: '月售额', sort: true},
            {field:'username', width:180, title: '年售额', sort: true},
            {field:'right',width:200,title:'操作',toolbar:'#barDemo'}
        ]]
    });
});
