$(document).ready(function (){
    // 发布表单的验证
    function checkEmpty (obj) {
        if (obj.val() == '') {
            obj.parent().parent().addClass('has-error');
            obj.next().css('display','block');
            obj.next().next().css('display','block');
            return false;
        } else{
            obj.parent().parent().removeClass('has-error');
            obj.next().css('display','none');
            obj.next().next().css('display','none');
            return true;
        };
    }

    function Focus (obj) {
        obj.parent().parent().removeClass('has-error');
        obj.next().css('display','none');
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

    $('#time').blur(function () {
        checkEmpty($('#time'));
    });
    $('#time').focus(function () {
        Focus($('#time'));
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


    // 提交验证
    $('#submit').click(function () {
        if ((checkEmpty($('#good')) == true)&&(checkEmpty($('#place')) == true)&&(checkEmpty($('#time')) == true)&&checkTextarea($('#textarea'))) {
            $('#submit').html('发布ing...');
            alert('可以提交');
            return true;
        } else{
            alert('输入有误，不能提交');
            return false;
        };
    });
});