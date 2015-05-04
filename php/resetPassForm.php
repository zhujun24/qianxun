<?php
error_reporting(0);
if(!isset($_SESSION)){ session_start(); };
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>千寻网--合肥工业大学失物招领</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <link href="/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/lib/html5shiv.min.js"></script>
    <script src="/lib/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Head Navbar -->
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-6">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img alt="合肥工业大学--千寻网" src="../images/logo.png"></a>
            <a class="navbar-brand" id="brand" href="index.php">千寻网</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
            <ul class="nav navbar-nav">
                <li class="active"><a href="../index.php">首页</a></li>
                <li><a href="../zhao_info.php">招领信息</a></li>
                <li><a href="../shi_info.php">失物信息</a></li>
                <?php
                if(!empty($_SESSION["uname"])){
                    echo "<li><a href='../zone.php'>个人中心</a></li>";
                }else {
                    echo "";
                }
                ?>

                <li><a href="../about.php">关于</a></li>
                <li><a href="../login.php">登陆</a></li>
                <li><a href="../reg.php">注册</a></li>
                <li><a href="../logout.php">注销</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li>
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="想找什么物品呢？">
                        </div>
                        <button type="submit" class="btn btn-primary btn-default">搜索</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>


<?php
include_once "config.php";
?>
<!-- Body Main -->
<div class="container">
    <h2 style="text-align:center">重置密码</h2>

    <form class="form-horizontal" role="form" action="dealResetPassForm.php" method="post">
        <div class="form-group">
            
            <label for="email" class="col-sm-4 control-label">邮箱</label>
    
            <!-- <div class="col-sm-4">
                <input name="password" type="password" class="form-control" id="ypassword" placeholder="请输入邮箱">
            </div> -->

            <div class="col-sm-4">
                <input type="text" class="form-control" name="email" id="email" autofocus="autofocus" placeholder="请输入邮箱">
            </div>

        </div>
        <div class="form-group">
            <label for="password1" class="col-sm-4 control-label">新密码</label>

            <div class="col-sm-4">
                <input type="password" name="password1" class="form-control" id="password1" placeholder="请输入新密码">
            </div>
        </div>
        <div class="form-group">
            <label for="password2" class="col-sm-4 control-label">确认新密码</label>

            <div class="col-sm-4">
                <input name="password2" type="password" class="form-control" id="password2" placeholder="请再次输入新密码">
            </div>
        </div>
        <p style="display:none" id="error" class="text-danger col-sm-offset-4">
            &nbsp;&nbsp;密码由大小写字母和数字组成，共6-20位，两次密码必一致</p>

        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-4">
                <button type="submit" id="submit" class="btn btn-primary">确认修改</button>
            </div>
        </div>
    </form>
</div>

<!-- Footer -->
<?php
    include_once "footer.php";
?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/lib/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/lib/bootstrap.min.js"></script>
<script src="../js/reg.js"></script>
</body>
</html>