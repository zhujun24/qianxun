<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>千寻网--合肥工业大学失物招领</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
.demo{width:400px; margin:40px auto 0 auto; min-height:250px;}
.demo h3{line-height:24px; text-align:center; color:#360; font-size:16px}
.demo p{line-height:30px; padding:4px}
.demo p span{margin-left:6px; color:#f30}
.input{width:240px; height:24px; padding:2px; line-height:24px; border:1px solid #999}
.btn{position: relative;overflow: hidden;display:inline-block;*display:inline;padding:4px 20px 4px;font-size:16px;line-height:20px;*line-height:22px;color:#fff;text-align:center;vertical-align:middle;cursor:pointer;background-color:#5bb75b;border:1px solid #cccccc;border-color:#e6e6e6 #e6e6e6 #bfbfbf;border-bottom-color:#b3b3b3;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;}
</style>

</head>
<body>
<!-- Head Navbar -->
<?php
include_once "php/header.php";
//include_once "php/function.php";
?>

<!-- Body Main -->
<div class="container">
    
    <div id="main">
   <div class="demo">
            <h3><p>用户可以通过邮箱找回密码</p>
            <p><strong>输入您注册的电子邮箱，找回密码：</strong></p>
            <p><input type="text" class="input" name="email" id="email"><span id="chkmsg"></span></p>
            <p><input type="button" class="btn" id="sub_btn" value="提 交"></p>
            </h3>
    </div>
 <br/>
</div>
</div>

<!-- Footer -->
<div class="container-fluid" id="bottom">
    <p>Copyright 2014-? <span><a href="index.php">www.hfutfind.com</a></span> 版权所有 合肥工业大学千寻网</p>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- <script src="js/forget.js"></script> -->
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
$(function(){
    $("#sub_btn").click(function(){
        var email = $("#email").val();
        var preg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/; //匹配Email
        if(email=='' || !preg.test(email)){
            $("#chkmsg").html("请填写正确的邮箱！");
        }else{
            $("#sub_btn").attr("disabled","disabled").val('提交中..').css("cursor","default");
            $.post("php/sendmail.php",{mail:email},function(msg){
                if(msg=="noreg"){
                    $("#chkmsg").html("该邮箱尚未注册！");
                    $("#sub_btn").removeAttr("disabled").val('提 交').css("cursor","pointer");
                }else{
                    $(".demo").html("<h3>"+msg+"</h3>");
                }
            });
        }
    });
})
</script>

</body>
</html>