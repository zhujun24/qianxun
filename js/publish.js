$(document).ready(function (){

    //日期选择控件
    $('.form_datetime').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        autoclose: true,
        startView: 4,
        minView: 2,
        forceParse: false
    });

    // 发布表单的验证
    function checkEmpty (obj) {
        if (obj.val() == '') {
            obj.parent().parent().addClass('has-error');
            obj.next().next().css('display','block');
            return false;
        } else{
            obj.parent().parent().removeClass('has-error');
            obj.next().next().css('display','none');
            return true;
        };
    }

    function Focus (obj) {
        obj.parent().parent().removeClass('has-error');
        obj.next().next().css('display','none');
    }

    $('#good').blur(function () {
        checkEmpty($('#good'));
    });
    $('#good').focus(function () {
        Focus($('#good'));
    });

    $('#place').blur(function () {
        checkEmpty($('#place'));
    });
    $('#place').focus(function () {
        Focus($('#place'));
    });

    $('#dtp_input1').blur(function () {
        checkEmpty($('#dtp_input1'));
    });
    $('#dtp_input1').focus(function () {
        Focus($('#dtp_input1'));
    });

    // textarea验证
    function checkTextarea(obj){
        var str = obj.val();
        var realLength = 0, len = str.length, charCode = -1;
        for (var i = 0; i < len; i++) {
            charCode = str.charCodeAt(i);
            if (charCode >= 0 && charCode <= 128) realLength += 1;
            else realLength += 2;
        }
        var num = Math.floor((400 - realLength)/2);
        if (num>=0&&num<=200) {
            $("#num").text('您还可以输入'+num+'字');
            return true;
        } else{
            $("#num").text('已经超过'+(-num)+'字');
            return false;
        };
    }
    $("#textarea").bind("input propertychange",function () {
        checkTextarea($('#textarea'));
    });

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
                obj.parent().parent().removeClass('has-error');
                obj.next().css('display','none');
                console.log("验证码正确！");
                return true;
            }else{
                obj.parent().parent().addClass('has-error');
                obj.next().css('display','block');
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


    // 提交验证
    $('#publish').click(function () {
        $.post("php/chk_code.php?act=char",{code:$('#yzm').val()},function(msg) {
            if (msg == 1 && (checkEmpty($('#good')) == true) && (checkEmpty($('#place')) == true) && (checkEmpty($('#dtp_input1')) == true) && checkTextarea($('#textarea'))) {
                $('#publish').html('发布ing...');
                console.log('可以提交');
                $('#publishform').submit();
                return true;
            } else {
                console.log('请填写所有必填项之后提交');
                return false;
            }
            ;
        });
    });
});