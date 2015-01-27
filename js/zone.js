$(document).ready(function (){

    // 表单验证的正则表达式
    var regexEnum = {
        name:/^([a-zA-Z]|[\u4E00-\u9FA5]){1}([a-zA-Z0-9]|[\u4E00-\u9FA5]|[_]){5,15}$/,
        phone:/^(13|15|18|17)[0-9]{9}$/,
        qq:/^[^0]\d{4,9}$/,
        email:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
    }

    $('.xiugai-btn').click(function(){
        $('.yuanlai').css("display","none");
        $('.xiugai').css("display","block");
        $(this).next().removeAttr('disabled');
        return false;
    });

    // 重新输入重置样式
    function Focus(obj) {
        obj.next().removeClass('glyphicon-remove glyphicon-ok');
    }
    // 普通输入检查
    function check(obj,regEx) {
        obj.next().css('display','block');
        if(regEx.test(obj.val()) == false) {
            obj.parent().parent().removeClass('has-success').addClass('has-error');
        } else{
            obj.parent().parent().removeClass('has-error').addClass('has-success');
        }
    }


    $('#name').blur(function () {
        check($(this),regexEnum.name);
    })
    $('#name').focus(function () {
        Focus($(this));
    })

    $('#email').blur(function () {
        check($(this),regexEnum.email);
    })
    $('#email').focus(function () {
        Focus($(this));
    })


    $('#phone').blur(function () {
        check($(this),regexEnum.phone);
    })
    $('#phone').focus(function () {
        Focus($(this));
    })

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



    // alter表单提交
    $('#alter').click(function () {
        if(regexEnum.email.test($('#email').val())==true&&regexEnum.name.test($('#name').val())==true&&regexEnum.phone.test($('#phone').val())&&(regexEnum.qq.test($('#qq').val())||$('#qq').val()=='')) {
            $('#alter').html('提交ing...');
            alert('符合要求,可以提交（用于测试）,确定后跳转到未完工的页面');
            $('.form-horizontal').submit();
            return true;
        } else{
            alert('不符合要求,不可以提交（用于测试）');
            return false;
        };
    });
});