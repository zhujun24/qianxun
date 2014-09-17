$(document).ready(function (){

    // 学号和密码的正则表达式
    var Emailpattern =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var Passwordpattern = /^([a-z]|[A-Z]|[0-9]){6,12}$/;

    // 学号密码可以来自Cookie
    $("#email").val($.cookie('email'));
    $("#password").val($.cookie('password'));

    // 检查Id
    function checkEmail() {
        if(!Emailpattern.test($("#email").val())&&$("#email").val()!=''){
            $(this).css('border-color','#d9534f');
            $(this).next().css('display','block');
            return false;
        } else{
            $(this).next().css('display','none');
            $(this).css('border-color','#31b0d5');
            $.cookie('email', $("#email").val(),{expires:9999,path:'/'});
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

    $('#email').blur(checkEmail);
    $('#password').blur(checkPassword);
    $('#email').focus(Focus);
    $('#password').focus(Focus);

    // 登陆表单提交
    $('#submit').click(function () {
        if ((checkEmail() == true)&&(checkPassword() == true)) {
            $('#submit').html('登陆ing...');
            //密码Cookie的存储
            if ($("#remember").prop('checked')==true) {
                $.cookie('password',$("#password").val());
            } else{
                $.cookie('password','');
            };
            //判断管理员登陆
            if ($("#manager").prop('checked')==true) {
                alert('管理员');
                //管理员登陆
                $('.form-horizontal').attr("action", "login.php");
            } else {
                //普通用户登陆
                $('.form-horizontal').attr("action", "login2.php");
            }
            return true;
        } else{
            return false;
        };
    });
});