$(window).scroll(function () {
    //Ajax加载后返回的数据
    function waterfall(num) {
        $('.center').html("玩命加载中……");
        var url = 'php/waterfall.json';
        var newDOM = '';
        $.ajax({
            url: url,
            dataType: "json",
            success: function (data) {
                $.each(data,function (index,item){
                    if(item.imgUrl){
                        newDOM += '<div class="media"><a class="pull-left" href="#"><img class="media-object" src="'+item.avatar+'" alt="头像"></a><div class="media-body"><h4 class="media-heading">'+item.auther +'<small>&nbsp;&nbsp;'+item.time+'</small></h4>'+item.content+'<a href="#" class="thumbnail"><img src="'+item.imgUrl+'" data-src="holder.js/300x300" alt="物品图片"></a></div><a href="info.html" class="btn btn-primary pull-right" role="button">查看详情</a></div>';
                    } else {
                        newDOM += '<div class="media"><a class="pull-left" href="#"><img class="media-object" src="' + item.avatar + '" alt="头像"></a><div class="media-body"><h4 class="media-heading">' + item.auther + '<small>&nbsp;&nbsp;' + item.time + '</small></h4>' + item.content + '</a></div><a href="info.html" class="btn btn-primary pull-right" role="button">查看详情</a></div>';
                    }
                });
                $('.media').last().after(newDOM);
                $('.center').css("display","none");
                $('.center').html("");
            }
        });
    }

    var down = $(document).height() - $(document).scrollTop() - $(window).height();
    if (down < 400) {
        var num = $('.media').size();
        waterfall(num);
        console.log(num);
        console.log(down);
    }
});