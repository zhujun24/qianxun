$(document).ready(function (){

    // 学号和密码的正则表达式
    var Idpattern = /^20[0|1][0-9]\d{4,6}$/;
    var Passwordpattern = /^([a-z]|[A-Z]|[0-9]){6,12}$/;

    // 学号密码可以来自Cookie
    $("#id").val($.cookie('id'));
    $("#password").val($.cookie('password'));

    // 检查Id
    function checkId() {
        if(!Idpattern.test($("#id").val())&&$("#id").val()!=''){
            $(this).css('border-color','#d9534f');
            $(this).next().css('display','block');
            return false;
        } else{
            $(this).next().css('display','none');
            $(this).css('border-color','#31b0d5');
            $.cookie('id', $("#id").val(),{expires:9999,path:'/'});
            return true;
        }
    }

    // 检查密码
    function checkPassword() {
        if(!Passwordpattern.test($("#password").val())){
            if ($("#password").val()!='') {
                $(this).css('border-color','#d9534f');
                $(this).next().css('display','block');
            };
            return false;
        } else{
            $(this).next().css('display','none');
            $(this).css('border-color','#31b0d5');
            return true;
        }
    }

    // 重新输入时恢复样式
    function Focus() {
        $(this).next().css('display','none');
        $(this).css('border-color','#31b0d5');
    }

    $('#id').blur(checkId);
    $('#password').blur(checkPassword);
    $('#id').focus(Focus);
    $('#password').focus(Focus);

    // 登陆表单提交
    $('#submit').click(function () {
        if ((checkId() == true)&&(checkPassword() == true)) {
            $('#submit').html('登陆ing...');
            //密码Cookie的存储
            if ($("#remember").prop('checked')==true) {
                $.cookie('password',$("#password").val());
            } else{
                $.cookie('password','');
            };
            return true;
        } else{
            return false;
        };
    });
});