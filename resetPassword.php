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
include_once "php/config.php";
$arr = mysql_fetch_assoc(mysql_query("select * from t_user where uid = '".$_SESSION["uid"]."' "));
        $uname = $arr['uname'];
        $upwd = $arr['upwd'];

?>
<!-- Body Main -->
<div class="container">
    <h2 style="text-align:center">重置密码</h2>

    <form class="form-horizontal" role="form" action="php/reset.php" method="post">
        <input type="hidden" name="uid" value="<?php echo $_SESSION["uid"]; ?>">
        <input type="hidden" name="pass" value="<?php echo $upwd; ?>">
        <div class="form-group">
            
            <label for="ypassword" class="col-sm-4 control-label">原密码</label>
    
            <div class="col-sm-4">
                <input name="password" type="password" class="form-control" id="ypassword" placeholder="请输入原密码">
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
    include_once "php/footer.php";
?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="js/reset.js"></script>
</body>
</html>