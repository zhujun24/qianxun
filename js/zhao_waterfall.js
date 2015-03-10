
var count = 11;
$(window).scroll(function () {



    //Ajax加载后返回的数据
    function waterfall(num) {
        $('.center').html("玩命加载中……");
        //var url = 'php/waterfall.json';
        var url = 'php/json_publish.php';
        var newDOM = '';
        
        $.ajax({
            url: url,
            //url: "php/php.php",        //传递的URL
            type: "GET",      //传递的方式
            data: { number: "1",type: "1"},     //传递的数据   比如php为参数，100为值，中间用冒号,两个参数之间用逗号隔开
            dataType: "json",
            // success: function(data){                //若数据返回成功，data为返回值
            //     $('.center').html(data);
            //     //将传回的data值给div标签下id号为asd的标签开始至结束
            // } 
            
            success: function (data) {
                
                $.each(data,function (index,item){
                    if(index == 0 ){
                        count = item.zhao_total;
                        console.log("zhao_count");
                        console.log(count);
                    }else{

                        if(item.pimage){
                        //"'+item.avatar+'"
                        newDOM += '<div class="media"><a class="pull-left" href="#"><img class="media-object" src="images/head_photo.png" alt="头像"></a><div class="media-body"><h4 class="media-heading">'+item.uid +'<small>&nbsp;&nbsp;'+item.ptime+'</small></h4>'+item.pdetails+'<a href="#" class="thumbnail"><img src="upload_images/'+item.pimage+'" data-src="holder.js/300x300" alt="物品图片"></a></div><a href="info.php" class="btn btn-primary pull-right" role="button">查看详情</a></div>';
                    } else {
                        newDOM += '<div class="media"><a class="pull-left" href="#"><img class="media-object" src="images/head_photo.png" alt="头像"></a><div class="media-body"><h4 class="media-heading">' + item.uid + '<small>&nbsp;&nbsp;' + item.ptime + '</small></h4>' + item.pdetails + '</a></div><a href="info.php" class="btn btn-primary pull-right" role="button">查看详情</a></div>';
                    }    
                    }
                    
                });
                $('.media').last().after(newDOM);
                $('.center').html("");

                
                
            }
        });
    }

    var down = $(document).height() - $(document).scrollTop() - $(window).height();
    if (down < 300) {
        
        showalert();
        function showalert() 
        { 
            var num = $('.media').size();
            if(num >= count)
                $('.center').html("已加载全部信息");            
            else{
                waterfall(num);
                console.log("num");
                console.log(num); 
                console.log("count");
                console.log(count);   
            }    
        }
    }
});