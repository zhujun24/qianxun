<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>千寻网--合肥工业大学失物招领</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/reg.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Head Navbar -->
<?php
include_once "php/header.php";
?>
<!-- Body Main -->
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">注册--千寻网</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" id="regform" role="form" action="php/reg.php" method="post" >
                <div class="form-group has-feedback">
                    <label for="name" class="col-sm-2 control-label">昵称</label>

                    <div class="col-sm-3">
                        <input type="text" name="name" class="form-control" id="name" autofocus="autofocus" placeholder="输入昵称">
                        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                    </div>
                    <span class="help-inline">用户名由汉字、字母、数字和下划线组成,以汉字或字母开头，3-12个字符</span>
                </div>
                <div class="form-group has-feedback">
                    <label for="email" class="col-sm-2 control-label">邮箱</label>

                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="email" name="email" placeholder="邮箱 someone@xxx.com">
                        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                    </div>
                    <span class="help-inline">请输入有效的邮箱地址，该邮箱用于找回密码，例如someone@xxx.com</span>
                </div>
                <div class="form-group has-feedback">
                    <label for="password" class="col-sm-2 control-label">密码</label>

                    <div class="col-sm-3">
                        <input type="password" class="form-control" id="password" 
                        name="password" 
                        placeholder="输入密码">
                        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                    </div>
                    <span class="help-inline">密码由6-12位数字、字母组成</span>
                </div>
                <div class="form-group has-feedback">
                    <label for="password" class="col-sm-2 control-label">确认密码</label>

                    <div class="col-sm-3">
                        <input type="password" class="form-control" id="password2" placeholder="再次输入密码"
                               disabled="disabled">
                        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                    </div>
                    <span class="help-inline">请输入与前面一致的密码</span>
                </div>
                <div class="form-group has-feedback">
                    <label for="phone" class="col-sm-2 control-label">手机号码</label>

                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="手机号码 18158879602">
                        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                    </div>
                    <span class="help-inline">请输入有效的手机号码，例如13888888888</span>
                </div>
                <div class="form-group has-feedback">
                    <label for="qq" class="col-sm-2 control-label">QQ</label>

                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="qq" name="qq" placeholder="QQ号 786607676">
                        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                    </div>
                    <span class="help-inline">QQ号码为5-10位数字，且不能以0开头，例如10000</span>
                </div>
                <div class="form-group has-feedback">
                    <label for="yzm" class="col-sm-2 control-label">验证码</label>

                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="yzm" placeholder="输入下图中的验证码" maxlength="4">
                        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                        <div class="yzm-div">
                            <img id="yzm-img" src="php/code_char.php" title="看不清，点击换一张">
                            <span class="yzm-img-click">点击换一张</span>
                        </div>
                    </div>
                    <span class="help-inline">验证码输入错误</span>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-3">
                        <button id="reg" type="button" class="btn btn-primary"> 立即注册</button>

                        <a style="margin-left:10px;" class="btn btn-default" role="button" href="introduction.html">阅读使用说明</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
    include_once "php/footer.php";
?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="js/reg.js"></script>

<!-- hfutfind.com Baidu tongji analytics -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");

document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F2ef7e98a67ec1cfb8f1b6dcee50de923' type='text/javascript'%3E%3C/script%3E"));

</script>

</body>
</html>