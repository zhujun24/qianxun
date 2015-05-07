$(window).scroll(function () {
    //Ajax加载后返回的数据
    function waterfall(num) {
        $('.center').html("玩命加载中……");
        //var url = 'php/waterfall.json';
        var url = 'php/json_publish.php';
        var newDOM = '';
        $.ajax({
            url: url,
            dataType: "json",
            success: function (data) {
                $.each(data,function (index,item){
                    if(item.pimage){
                        //"'+item.avatar+'"
                        newDOM += '<div class="media"><a class="pull-left" href="#"><img class="media-object" src="images/head_photo.png" alt="头像"></a><div class="media-body"><h4 class="media-heading">'+item.uid +'<small>&nbsp;&nbsp;'+item.ptime+'</small></h4>'+item.pdetails+'<a href="#" class="thumbnail"><img src="upload_images/'+item.pimage+'" data-src="holder.js/300x300" alt="物品图片"></a></div><a href="info.php" class="btn btn-primary pull-right" role="button">查看详情</a></div>';
                    } else {
                        newDOM += '<div class="media"><a class="pull-left" href="#"><img class="media-object" src="images/head_photo.png" alt="头像"></a><div class="media-body"><h4 class="media-heading">' + item.uid + '<small>&nbsp;&nbsp;' + item.ptime + '</small></h4>' + item.pdetails + '</a></div><a href="info.php" class="btn btn-primary pull-right" role="button">查看详情</a></div>';
                    }
                });
                $('.media').last().after(newDOM);
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