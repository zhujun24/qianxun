$(document).ready(function (){

    //预加载图片
    $.preloadImages = function(){
        for(var i = 0; i<arguments.length; i++)
        $("<img>").attr("src", arguments[i]);
    }
    //3秒后加载所有图片
    $(document).delay(3000).queue(function () {
        $.preloadImages("images/hfutphoto2.jpg","images/hfutphoto3.jpg","images/hfutphoto4.jpg","images/hfutphoto5.jpg");
    });

    // 图片轮播
    var num = 1;  
    function change() {
        num++;
        num = (num+4)%5+1;
        $('#bg').fadeTo('slow',0,function(){
            $(this).attr('src','images/hfutphoto'+num+'.jpg');
        }).fadeTo('slow',1);
    } 

    var time1 = setInterval(change,5000);

    $('.jumbotron').mouseover(function () {
        clearInterval(time1);
    });
    $('.jumbotron').mouseout(function () {
        time1 = setInterval(change,5000); 
    });
});