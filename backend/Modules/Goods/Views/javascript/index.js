var data;
var table;
layui.use('table', function(){
    table = layui.table;
    data = [{
        "id": "10001"
        ,"username": "杜甫"
        ,"email": "xianxin@layui.com"
        ,"sex": "男"
        ,"city": "浙江杭州"
        ,"sign": "人生恰似一场修行"
        ,"experience": "116"
        ,"ip": "192.168.0.8"
        ,"logins": "108"
        ,"joinTime": "2016-10-14"
    }];
table.render({
    elem: '#customer_list_table'
    ,cols: [[ //标题栏
        {field: 'id', title: 'ID', width: 80, sort: true}
        ,{field: 'username', title: '用户名', width: 120, edit: 'text'}
        ,{field: 'email', title: '邮箱', minWidth: 150, edit: 'text'}
        ,{field: 'sign', title: '签名', minWidth: 160, edit: 'text'}
        ,{field: 'sex', title: '性别', width: 80, edit: 'text'}
        ,{field: 'city', title: '城市', width: 100, edit: 'text'}
        ,{field: 'experience', title: '积分', width: 80, sort: true, edit: 'text'}
    ]]
    ,data: data
    // ,toolbar:"#customer_list_toolbar"
    //,skin: 'line' //表格风格
    ,even: true
    //,page: true //是否显示分页
    //,limits: [5, 7, 10]
    //,limit: 5 //每页默认显示的数量
});
});
$(function () {
    $("#click_text").on('click',function(){
        data.push({
            "id": "10001"
            ,"username": "1111111"
            ,"email": "xianxin@layui.com"
            ,"sex": "男"
            ,"city": "浙江杭州"
            ,"sign": "人生恰似一场修行"
            ,"experience": "116"
            ,"ip": "192.168.0.8"
            ,"logins": "108"
            ,"joinTime": "2016-10-14"
        });
        table = layui.table;
        table.render({
            elem: '#customer_list_table'
            ,cols: [[ //标题栏
                {field: 'id', title: 'ID', width: 80, sort: true}
                ,{field: 'username', title: '用户名', width: 120, edit: 'text'}
                ,{field: 'email', title: '邮箱', minWidth: 150, edit: 'text'}
                ,{field: 'sign', title: '签名', minWidth: 160, edit: 'text'}
                ,{field: 'sex', title: '性别', width: 80, edit: 'text'}
                ,{field: 'city', title: '城市', width: 100, edit: 'text'}
                ,{field: 'experience', title: '积分', width: 80, sort: true, edit: 'text'}
            ]]
            ,data: data
            // ,toolbar:"#customer_list_toolbar"
            //,skin: 'line' //表格风格
            ,even: true
            //,page: true //是否显示分页
            //,limits: [5, 7, 10]
            ,limit: 100 //每页默认显示的数量
        });
    });
    $('#click_add_goods').on('click',function(){
        // window.parent.location.reload();

        layer.open({
            type: 2
            , title: '11111111'
            , area: ['80%', '90%']
            , offset:'t'
            , shade: 0
            , maxmin: true
            , content: '/Goods/goods/add'
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
    });
});