$(document).ready(function () {

    // 学号和密码的正则表达式
    var Emailpattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var Passwordpattern = /^([a-z]|[A-Z]|[0-9]){6,12}$/;

    // 学号密码可以来自Cookie
    $("#email").val($.cookie('email'));
    $("#password").val($.cookie('password'));

    // 检查Email
    function checkEmail() {
        if (!Emailpattern.test($("#email").val()) && $("#email").val() != '') {
            $(this).css('border-color', '#d9534f');
            $(this).next().css('display', 'block');
            return false;
        } else {
            $(this).next().css('display', 'none');
            $(this).css('border-color', '#31b0d5');
            $.cookie('email', $("#email").val(), {expires: 9999, path: '/'});
            return true;
        }
    }

    // 检查密码
    function checkPassword() {
        if (!Passwordpattern.test($("#password").val())) {
            if ($("#password").val() != '') {
                $(this).css('border-color', '#d9534f');
                $(this).next().css('display', 'block');
            }
            ;
            return false;
        } else {
            $(this).next().css('display', 'none');
            $(this).css('border-color', '#31b0d5');
            return true;
        }
    }

    // 重新输入时恢复样式
    function Focus() {
        $(this).next().css('display', 'none');
        $(this).css('border-color', '#31b0d5');
    }

    $('#email').blur(checkEmail);
    $('#password').blur(checkPassword);
    $('#email').focus(Focus);
    $('#password').focus(Focus);

    //验证码
    $("#yzm-img").click(function () {
        $(this).attr("src", 'php/code_char.php?' + Math.random());
        $("#yzm").val('').focus();
    });

    function check_yzm() {
        var obj = $('#yzm');
        var code_char = obj.val();
        $.post("php/chk_code.php?act=char", {code: code_char}, function (msg) {
            obj.next().css('display', 'block');
            if (msg == 1) {
                obj.next().css('display', 'none');
                obj.css('border-color', '#31b0d5');
                console.log("验证码正确！");
                return true;
            } else {
                obj.css('border-color', '#d9534f');
                obj.next().css('display', 'block');
                console.log("验证码错误！");
                return false;
            }
        });
    }

    $("#yzm").blur(function () {
        check_yzm();
    });
    $("#yzm").focus(function () {
        Focus($(this));
    });

    // 登陆表单提交
    $('#log').click(function () {
        $.post("php/chk_code.php?act=char", {code: $('#yzm').val()}, function (msg) {
            if (msg == 1 && (checkEmail() == true) && (checkPassword() == true)) {
                console.log('true');
                $('#log').html('登陆ing...');
                //密码Cookie的存储
                if ($("#remember").prop('checked') == true) {
                    $.cookie('password', $("#password").val());
                } else {
                    $.cookie('password', null);
                }

                //管理员登陆
                if ($("#manager").prop('checked') == true) {
                    $.cookie('power', '9');
                } else {
                    $.cookie('power', '1');
                }
                $('#logform').submit();
                return true;
            } else {
                console.log('false');
                return false;
            }
        });
    });
});