$(function(){
   $(".attr_item_tab").on('click',function(){
      $(this).removeClass('layui-bg-gray').addClass('layui-badge').siblings('span').addClass('layui-bg-gray');
   });
});