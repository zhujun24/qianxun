$(document).ready(function (){

    // 表单验证的正则表达式
    var emailReg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    // 登陆表单提交
    $('#button').click(function () {
            if(emailReg.test($('#email').val())==true) {
                console.log('符合要求,可以注册（用于测试）,确定后跳转到未完工的页面');
                $('#button').attr('disabled',"true");
                $('#forget').submit();
                return true;
            } else{
                console.log('不符合要求,不可以注册（用于测试）');
                return false;
            }
    });
});