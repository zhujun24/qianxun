$(document).ready(function (){

    // 表单验证的正则表达式
    var regexEnum = {
        name:/^([a-zA-Z]|[\u4E00-\u9FA5]){1}([a-zA-Z0-9]|[\u4E00-\u9FA5]|[_]){2,11}$/,
        password:/^([a-z]|[A-Z]|[0-9]){6,12}$/,
        phone:/^(13|15|18|17)[0-9]{9}$/,
        email:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
        qq:/^[^0]\d{4,9}$/,
    }


    // 重新输入重置样式
    function Focus(obj) {
        obj.next().removeClass('glyphicon-remove glyphicon-ok');
    }
    // 普通输入检查
    function check(obj,regEx) {
        obj.next().css('display','block');
        if(regEx.test(obj.val()) == false) {
            obj.next().removeClass('glyphicon-ok').addClass('glyphicon-remove');
            obj.parent().parent().removeClass('has-success').addClass('has-error');
            obj.parent().next().css('display','block');
        } else{
            obj.next().removeClass('glyphicon-remove').addClass('glyphicon-ok');
            obj.parent().parent().removeClass('has-error').addClass('has-success');
            obj.parent().next().css('display','none');
        }
    }

    
    $('#name').blur(function () {
        check($(this),regexEnum.name);
    })
    $('#name').focus(function () {
        Focus($(this));
    })


    $('#phone').blur(function () {
        check($(this),regexEnum.phone);
    })
    $('#phone').focus(function () {
        Focus($(this));
    })

    $('#email').blur(function () {
        check($(this),regexEnum.email);
    })
    $('#email').focus(function () {
        Focus($(this));
    })


    function checkPass() {
        $('#password').next().css('display','block');
        if(regexEnum.password.test($('#password').val()) == false) {
            $('#password').next().removeClass('glyphicon-ok').addClass('glyphicon-remove');
            $('#password').parent().parent().removeClass('has-success').addClass('has-error');
            $('#password').parent().next().css('display','block');
            $('#password2').attr("disabled","disabled");
        } else{
            $('#password').next().removeClass('glyphicon-remove').addClass('glyphicon-ok');
            $('#password').parent().parent().removeClass('has-error').addClass('has-success');
            $('#password').parent().next().css('display','none');
            $('#password2').removeAttr("disabled");
        }

        //哈哈！防止返回修改的逻辑漏洞
        if ($('#password2').val() != '') {
            checkPass2();
        }
    }

    function checkPass2() {
        $('#password2').next().css('display','block');
        if($('#password').val() != $('#password2').val()) {
            $('#password2').next().removeClass('glyphicon-ok').addClass('glyphicon-remove');
            $('#password2').parent().parent().removeClass('has-success').addClass('has-error');
            $('#password2').parent().next().css('display','block');
        } else{
            $('#password2').next().removeClass('glyphicon-remove').addClass('glyphicon-ok');
            $('#password2').parent().parent().removeClass('has-error').addClass('has-success');
            $('#password2').parent().next().css('display','none');
        }
    }
    // 密码检查
    $('#password').blur(function () {
        checkPass();
    })
    $('#password').focus(function () {
        Focus($(this));
    })

    $('#password2').blur(function () {
        checkPass2();
    })
    $('#password2').focus(function () {
        Focus($(this));
    })


    //验证码
    $("#yzm-img").click(function(){
        $(this).attr("src",'php/code_char.php?' + Math.random());
        $("#yzm").val('').focus();
    });

    function check_yzm() {
        var obj = $('#yzm');
        var code_char = obj.val();
        $.post("php/chk_code.php?act=char",{code:code_char},function(msg){
            obj.next().css('display','block');
            if(msg==1){
                obj.next().removeClass('glyphicon-remove').addClass('glyphicon-ok');
                obj.parent().parent().removeClass('has-error').addClass('has-success');
                obj.parent().next().css('display','none');
                console.log("验证码正确！");
                return true;
            }else{
                obj.next().removeClass('glyphicon-ok').addClass('glyphicon-remove');
                obj.parent().parent().removeClass('has-success').addClass('has-error');
                obj.parent().next().css('display','block');
                console.log("验证码错误！");
                return false;
            }
        });
    }
    $("#yzm").blur(function(){
        check_yzm();
    });
    $("#yzm").focus(function(){
        Focus($(this));
    });

    //QQ检查
    function checkQQ() {
        $('#qq').next().css('display','block');
        if(regexEnum.qq.test($('#qq').val()) == true) {
            $('#qq').next().removeClass('glyphicon-remove').addClass('glyphicon-ok');
            $('#qq').parent().parent().removeClass('has-error').addClass('has-success');
            $('#qq').parent().next().css('display','none');
            return true;
        } else if($('#qq').val() != '') {
            $('#qq').next().removeClass('glyphicon-ok').addClass('glyphicon-remove');
            $('#qq').parent().parent().removeClass('has-success').addClass('has-error');
            $('#qq').parent().next().css('display','block');
            return false;
        } else{
            return true;
        }
    }

    $('#qq').blur(function () {
        checkQQ();
    })
    $('#qq').focus(function () {
        Focus($(this));
    })
    

    //登陆表单提交
    $('#reg').click(function () {
        $.post("php/chk_code.php?act=char",{code:$('#yzm').val()},function(msg){
            if(regexEnum.name.test($('#name').val())==true&&regexEnum.password.test($('#password').val())&&($('#password').val()==$('#password2').val())&&regexEnum.phone.test($('#phone').val())&&regexEnum.email.test($('#email').val())&&(regexEnum.qq.test($('#qq').val())||$('#qq').val()=='')) {
                $('#reg').html('注册ing...');
                //console.log('符合要求,可以注册（用于测试）,确定后跳转到未完工的页面');
                 alert('符合要求,可以注册（用于测试）,确定后跳转到未完工的页面');
                //$('.form-horizontal').attr("action", "reg.php");
                $('#regform').submit();

                return true;
            } else{
                alert('不符合要求,不可以注册（用于测试）');
                return false;
            };
        });
    });
    // 登陆表单提交
    // $('#reg').click(function () {
    //     $.post("php/chk_code.php?act=char",{code:$('#yzm').val()},function(msg){
    //         if(msg==1&&regexEnum.name.test($('#name').val())==true&&regexEnum.password.test($('#password').val())&&($('#password').val()==$('#password2').val())&&regexEnum.phone.test($('#phone').val())&&regexEnum.email.test($('#email').val())&&(regexEnum.qq.test($('#qq').val())||$('#qq').val()=='')) {
    //             $('#reg').html('注册ing...');
    //             console.log('符合要求,可以注册（用于测试）,确定后跳转到未完工的页面');

    //             $('#regform').submit();
    //             return true;
    //         } else{
    //             console.log('不符合要求,不可以注册（用于测试）');
    //             return false;
    //         }
    //     });
    // });
});