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
</head>
<body>
<!-- Head Navbar -->
<?php
include_once "php/header.php";
//include_once "php/function.php";
?>

<!-- Body Main -->
<div class="container">
    <form class="form-horizontal col-sm-4 col-sm-offset-4" role="form" id="forget" action="forget.php">
        <h3>输入您注册时的邮箱，我们将会把密码发送到您的邮箱</h3>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">邮箱</label>

            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="输入您注册时的邮箱">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="button" class="btn btn-primary" id="button">发送密码</button>
            </div>
        </div>
    </form>
</div>

<!-- Footer -->
<div class="container-fluid" id="bottom">
    <p>Copyright &copy; 2014-<script>document.write(new Date().getFullYear());</script><span><a href="index.php">www.hfutfind.com</a></span> 版权所有 合肥工业大学千寻网</p>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="js/forget.js"></script>
</body>
</html>