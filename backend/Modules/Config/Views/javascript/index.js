layui.use(['form', 'layedit', 'laydate'], function(){
    var form = layui.form,layer = layui.layer;
    //监听提交
    form.on('submit(demo1)', function(data){

        if( $(this).attr('lay-submit') !='aaa'){
            $(this).attr('lay-submit','aaa');
            $(this).attr('disabled',true).css('background','gray');

        // layer.alert(JSON.stringify(data.field), {
        //     title: '最终的提交信息'
        // });
        // alert(JSON.stringify(data.field));
            post();
        }
        return false;
    });
});

function post()
{
    $.ajax({
        url:'/Config/index/update',
        data:$('#config_1').serialize(),
        type: 'post',
        dataType : "json",
        success:function(res){
            console.log(res)
        },
        fail:function(){

        }
    });
}