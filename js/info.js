$('#publish').click(function () {
    var content = $.trim($('textarea').val());

    if (!content) {
        alert("请填写评论内容！");
        return false;
    }else{
        $('#publish').attr("disabled","true");
        $('.publish').submit();
    }
});