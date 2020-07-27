
let tab;
layui.config({
    base: option + "/javascript/pages/"
}).extend({
    "bodyTab":"bodyTab"
});

layui.use(['bodyTab'],function(e){
    tab = layui.bodyTab({
        url:'/site/left-menu',
        topUrl:'/site/top-menu'
    });
    // 添加新窗口
    $("body").on("click", ".layui-nav-tree .layui-nav-child a", function () {
       addTab($(this));
    });
    /*初始化左侧菜单*/
    $(function(){
        console.log('初始化左侧菜单8888');
        $.get(tab.tabConfig.url,function(res){
            tab.render(res.menu);
        });
        console.log('初始化左侧菜单8888');
        $.get(tab.tabConfig.topUrl,function(res){
            tab.render_top(res.menu,res.init_menu_id);
        });
    });
});

$("body").on("mouseover", ".topLevelMenus li", function () {
    if($(this).data('tag') != 'activity'){
        $(this).addClass('layui-this').siblings().removeClass('layui-this');
    }
});

$("body").on("mouseout", ".topLevelMenus li", function () {
    if($(this).data('tag') != 'activity') {
        $(this).removeClass('layui-this');
    }
});

$("body").on("click", ".topLevelMenus li", function () {
    $(this).data('tag','activity');
    $(this).addClass('layui-this');
    var url = tab.tabConfig.url;
    var top_menu_id = $(this).data('menu');
    $.get(url,{top_menu_id:top_menu_id},function(res){
        tab.render(res.menu);
    });
});
//左侧导航收缩
$("body").on("click", ".layui-nav-tree .layui-nav-item a", function () {
    $(this).parent("li").siblings().removeClass("layui-nav-itemed");
});
//隐藏左侧导航
$(".hideMenu").click(function () {
    // if ($(".topLevelMenus li.layui-this a").data("url")) {
    //     layer.msg("此栏目状态下左侧菜单不可展开");  //主要为了避免左侧显示的内容与顶部菜单不匹配
    //     return false;
    // }
    $(".layui-layout-admin").toggleClass("showMenu");
    //渲染顶部窗口
    // tab.tabMove();
});

/*点击左侧菜单打开tab页面*/
function addTab(_this) {
    tab.tabAdd(_this);
}


