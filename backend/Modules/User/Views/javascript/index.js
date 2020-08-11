
layui.use('table', function(){
    var table = layui.table;
    var rate = layui.rate;
    table.render({
        elem: '#service_list'
        ,url: '/User/index/data/'
        ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
        ,page: true
        ,id: 'testReload'
        // ,limits:[10,20,30]//切换当前页显示数量，默认10
        ,toolbar: '#toolbarDemo' //开启头部工具栏，并为其绑定左侧模板
        ,cols: [[
            {field:'username', width:140, title: '用户名',align: 'center'},
            {field:'score', width:180, title: '评分', sort: true,align: 'center',templet: function(d){
                    return '<div id="score' + d.id + '" title="' + d.score + '"></div>';
                }},
            {field:'customer_count', width:150, title: '客户量', sort: true,align: 'center'},
            {field:'complaint_count', width:160, title: '投诉量', sort: true,align: 'center'},
            {field:'satisfied_count', width:120, title: '满意度', sort: true,align: 'center'},
            {field:'refund_count', width:120, title: '退款额', sort: true,align: 'center'},
            {field:'week_sale_count', width:120, title: '周售额', sort: true,align: 'center'},
            {field:'month_sale_count', width:120, title: '月售额', sort: true,align: 'center'},
            {field:'year_sale_count', width:120, title: '年售额', sort: true,align: 'center'},
            {field:'right',width:200,title:'操作',toolbar:'#barDemo',align: 'center'}
        ]]
        ,done : function(res){
            var data = res.data;
            for (var item in data) {
                rate.render({
                    elem: '#score' + data[item].id
                    , length: 5
                    , value: data[item].score / 2
                    , readonly: true
                });
            }
        }
    });

    //只读
    rate.render({
        elem: '#test9'
        ,value: 4
        ,readonly: true
    });
});


