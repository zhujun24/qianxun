<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>千寻网--合肥工业大学失物招领</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link href="/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/lib/html5shiv.min.js"></script>
    <script src="/lib/respond.min.js"></script>
    <![endif]-->
    <style>.demo{margin-top: 50px;}</style>
</head>
<body>
<!-- Head Navbar -->
<?php
include_once "php/header.php";
//include_once "php/function.php";
?>

<!-- Body Main -->
<div class="container">

    <div class="col-lg-6 col-lg-offset-3 demo">
        <div class="input-group input-group-lg">
            <input type="text" class="form-control" name="email" id="email" placeholder="输入您注册的电子邮箱">
          <span class="input-group-btn">
            <button class="btn btn-primary" type="button" id="sub_btn">找回密码</button>
          </span>
        </div>
        <h4 id="chkmsg"></h4>
    </div>

    <!--    <div id="main">-->
    <!--   <div class="demo">-->
    <!--            <h3><p>用户可以通过邮箱找回密码</p>-->
    <!--            <p><strong>输入您注册的电子邮箱，找回密码：</strong></p>-->
    <!--            <p><input type="text" class="input"><span id="chkmsg"></span></p>-->
    <!--            <p><input type="button" class="btn" value="提 交"></p>-->
    <!--            </h3>-->
    <!--    </div>-->
    <!-- <br/>-->
    <!--</div>-->
</div>

<!-- Footer -->
<?php
include_once "php/footer.php";
?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/lib/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/lib/bootstrap.min.js"></script>
<!-- <script src="js/forget.js"></script> -->
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#sub_btn").click(function () {
            var email = $("#email").val();
            var preg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/; //匹配Email
            if (email == '' || !preg.test(email)) {
                $("#chkmsg").html("请填写正确的邮箱！");
            } else {
                $("#sub_btn").attr("disabled", "disabled").val('提交中...').css("cursor", "default");
                $.post("php/sendmail.php", {mail: email}, function (msg) {
                    if (msg == "noreg") {
                        $("#chkmsg").html("该邮箱尚未注册！");
                        $("#sub_btn").removeAttr("disabled").val('提 交').css("cursor", "pointer");
                    } else {
                        $(".demo").html("<h3>" + msg + "</h3>");
                    }
                });
            }
        });
    })
</script>

</body>
</html>