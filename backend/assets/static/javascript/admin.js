
//左侧列表
// $(".layui-nav-item").on('click',function(){
//     var active = 'layui-nav-itemed';
//    $(this).addClass(active).siblings('li').removeClass(active);
// });



layui.use(['form','table'],function(){
    var form = layui.form,
        table = layui.table,
        $ = layui.jquery;

    $.form = new function(){
        //绑定事件
        this.on = function (elem,functionArray){
            table.on(elem, function(obj){
                // var data = obj.data;
                functionArray.forEach(function(value){
                    console.log('value',value.key);
                    if(obj.event === value.key){
                        value.event(obj);
                    }
                });
            })
        };
        //skin:
        // line （行边框风格）
        // row （列边框风格）
        // nob （无边框风格
        this.table = function (elem, url, cols, isTool = false, isPage = true, skin = '', size = '',limi='') {
            var data = {};
            if(!isPage){
                 data = {
                    elem: '#' + elem + '_table',
                    url: url,
                    cellMinWidth: 95,
                    height: "full-80",
                    limits: [500],
                    limit: 500,
                    toolbar:false,
                    id: elem + 'TableId',
                    cols: cols
                };
            } else {
                 data = {
                    elem: '#' + elem + '_table',
                    url: url,
                    cellMinWidth: 95,
                    page: {
                        count: 100
                        ,first: '首页'
                        ,last: '尾页'
                        ,prev: '上一页'
                        ,next: '下一页'
                        ,groups:10
                    },
                    height: "full-80",
                    limits: [10, 15, 20, 25, 50, 100],
                    limit: 15,
                    toolbar: false,
                    id: elem + 'TableId',
                    cols: cols,
                };
            }
            if (skin != '') data.skin = skin;
            if (size != '') data.size = size;
            if (size == 'lg') data.limit = 8;
            if (limi != '') data.limit = limi;

            if (!isTool){
                data.height = "full";
            } else {
                data.toolbar = '#' + elem + '_toolbar';
            }
            table.render(data);
        }
    }
});