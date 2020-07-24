/**
    解决了phpStorm注册问题
    解决了phpStorm输入内容卡顿问题
*/
layui.define(["element"],function(exports){ //提示：模块也可以依赖其它模块，如：layui.define('layer', callback);
    var element = layui.element;
    //插件初始参数
    let obj = function(){
        this.tabConfig = {
            openTabNum: undefined,  //最大可打开窗口数量
            tabFilter: "bodyTab",  //添加窗口的filter
            url: undefined,  //获取菜单json地址
            top_url: undefined
        };
    };
    //插件测试函数
    obj.prototype.hello = function(){
        alert('hello world!');
    };
    //插件导航生成函数
    obj.prototype.navBar = function(menuArray){
        var html = '';
        for (var parent in menuArray) {
            var topTitle = menuArray[parent].name;
            var topIcon = menuArray[parent].icon;
            html +='<li class="layui-nav-item">';
            html +='<a class="" href="javascript:;"><i class="layui-icon '+topIcon+'"></i><span class="left_icon">'+topTitle+'</span><span class="layui-nav-more"></span></a>';
            html +='<dl class="layui-nav-child">';
            for(var child in menuArray[parent].children){
                var childTitle = menuArray[parent].children[child].name;
                var childIcon = menuArray[parent].children[child].icon;
                var url = menuArray[parent].children[child].route;
                html+='<dd><a href="javascript:;" data-url="'+url+'"><i class="layui-icon '+childIcon+'"></i><span class="left_icon">'+childTitle+'</span></a></dd>';
            }
            html +='</dl>';
            html +='</li>';
        }
        return html;
    };
    obj.prototype.navBarTop = function(menuArray){
        var html = '';
        for (var parent in menuArray) {
            var id = menuArray[parent].id;
            var topTitle = menuArray[parent].name;
            var topIcon = menuArray[parent].icon;
            html +='<li class="layui-nav-item" data-menu="'+id+'">';
            html +='<a class="" href="javascript:;"><i class="layui-icon '+topIcon+'"></i><span class="left_icon">'+topTitle+'</span></a>';
            if(menuArray[parent].children.length>0) {
                html += '<dl class="layui-nav-child top_admin_nav">';
                for (var child in menuArray[parent].children) {
                    var childTitle = menuArray[parent].children[child].name;
                    var childIcon = menuArray[parent].children[child].icon;
                    var url = menuArray[parent].children[child].route;
                    html += '<dd><a href="javascript:;" data-url="' + url + '"><i class="layui-icon ' + childIcon + '"></i><span class="left_icon">' + childTitle + '</span></a></dd>';
                }
                html += '</dl>';
            }
            html +='</li>';
        }
        return html;
    };
    //将动态生成的HTML导航渲染在左侧列表
    obj.prototype.render = function(menuArray){
        $(".layui-side-scroll ul").html('').append(this.navBar(menuArray));
        element.init();
    };

    //将动态生成的HTML导航渲染在顶部列表
    obj.prototype.render_top = function(menuArray){
        $(".topLevelMenus").html('').append(this.navBarTop(menuArray));
        element.init();
    };
    var tabIdIndex = 0;
    //动态添加
    obj.prototype.tabAdd = function(_this){
        var that = this;
        var title = '';
        //检查在已经打开窗口中是否存在
        if(that.hasTab(_this.html()) == -1 && _this.siblings('dl.layui-nav-child').length == 0){
            tabIdIndex++;
            title += '<i class="layui-icon layui-icon-refresh tab_refresh" style="padding:3px;margin-right:3px"></i>';
            title += '<span>'+_this.html()+'</span>';
            element.tabAdd("top_nav_raw",{
                title:title,
                content:"<iframe src='"+_this.attr("data-url")+"' data-id='"+tabIdIndex+"'></iframe>",
                id: new Date().getTime()
            });
            element.tabChange('top_nav_raw', that.getLayId(_this.html())); //切换到：用户管理
        } else {
            element.tabChange('top_nav_raw', that.getLayId(_this.html())); //切换到：用户管理
        }
    };
    //通过title获取lay-id
    obj.prototype.getLayId = function (title) {
        var layId = 0;
        $(".layui-tab-title li").each(function () {
            if ($(this).find("span").html() == title) {
                layId = $(this).attr("lay-id");
            }
        });
        return layId;
    }
    obj.prototype.hasTab = function(title){
        var tabIndex = -1;
        $(".layui-tab-title li").each(function(){
            if($(this).find('span').html() == title){
                tabIndex = 1;
            }
        });
        return tabIndex;
    }

    //事件绑定
    $("body").on("click", ".layui-tab-title li i.tab_refresh", function () {
        //加载动画 layui-icon-loading
        $(this).addClass('layui-icon-loading layui-anim layui-anim-rotate layui-anim-loop');
        $(".clildFrame .layui-tab-item.layui-show").find("iframe")[0].contentWindow.location.reload();
        $(this).removeClass('layui-icon-loading layui-anim layui-anim-rotate layui-anim-loop');
    })

    /********************************************参数设置******************************************************/
    obj.prototype.set = function (option) {
        let _this = this;
        $.extend(true, _this.tabConfig, option);
        return _this;
    };
    let bodyTab = new obj();
    exports("bodyTab", function (option) {
        return bodyTab.set(option);
    });
});    

