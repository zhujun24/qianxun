﻿<!DOCTYPE html>
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
</head>
<body>
<!-- Head Navbar -->
<?php
include_once "php/header.php";
echo base64_decode($_GET['pid']);
echo base64_decode($_GET['cdetails']);
?>

<!-- Body Main -->
<div class="container">
    <div class="col-sm-6 col-sm-offset-3">
        <form class="form-horizontal" id="logform" role="form" action="php/login.php" method="post">
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">邮箱</label>
                <input type="hidden" name="pid" value="<?php echo base64_decode($_GET['pid']);?>">
                <input type="hidden" name="cdetails" value="<?php echo base64_decode($_GET['cdetails']);?>">
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="email" id="email" autofocus="autofocus" placeholder="邮箱">
                    <span class="help-inline help">邮箱格式不正确</span>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">密码</label>

                <div class="col-sm-7">
                    <input type="password" class="form-control" name="password" id="password" placeholder="密码">
                    <span class="help-inline help">密码不正确</span>
                </div>
            </div>
            <div class="form-group">
                <label for="yzm" class="col-sm-2 control-label">验证码</label>

                <div class="col-sm-3">
                    <input type="text" class="form-control" id="yzm" placeholder="输入验证码" maxlength="4">
                    <span class="help-inline help">验证码输入错误</span>
                </div>
                <img id="yzm-img" src="php/code_char.php" title="看不清，点击换一张">
                <span class="yzm-img-click">点击换一张</span>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox-inline">
                        <label>
                            <input id="remember" type="checkbox" checked="checked">记住密码
                        </label>
                    </div>
                    <div class="checkbox-inline">
                        <label>
                            <input id="manager" type="checkbox">管理员登陆
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-7">
                    <button id="log" type="button" class="btn btn-block btn-primary">登陆</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-7">
                    <span class="help-inline pull-left">还没有账户？<a href="reg.php">立即注册</a></span>
                    <a href="forgetPassword.php" class="pull-right">忘记密码？</a>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Footer -->
<?php
    include_once "php/footer.php";
?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/lib/jquery.min.js"></script>
<!-- jQuery Cookie Plugin -->
<script src="js/jquery.cookie.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/lib/bootstrap.min.js"></script>
<script src="js/login.js"></script>

<!-- hfutfind.com Baidu tongji analytics -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F2ef7e98a67ec1cfb8f1b6dcee50de923' type='text/javascript'%3E%3C/script%3E"));</script>

</body>
</html>