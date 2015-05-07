<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="refresh" content="2; url='../../login.php' ">
    <title>千寻网--合肥工业大学失物招领</title>
    <link rel="icon" type="image/x-icon" href="../../images/favicon.ico">
    <link href="/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/login.css" rel="stylesheet">
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
            <a class="navbar-brand" href="index.html"><img alt="合肥工业大学--千寻网" src="../../images/logo.png"></a>
            <a class="navbar-brand" id="brand" href="index.php">千寻网</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
            <ul class="nav navbar-nav">
                <li><a href="../../index.php">首页</a></li>
                <li><a href="../../zhao_info.php">招领信息</a></li>
                <li><a href="../../shi_info.php">失物信息</a></li>
                <?php
                
                if(!empty($_SESSION["uname"])){
                    echo "<li><a href='../../zone.php'>个人中心</a></li>";
                }else {
                    echo "";
                }
                ?>

                <li><a href="../../about.php">关于</a></li>
                <li  class="active"><a href="../../login.php">登陆</a></li>
                <li><a href="../../reg.php">注册</a></li>
                <li><a href="../../logout.php">注销</a></li>
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
<!-- Body Main -->
<div class="container">

  
 <form class="form-horizontal col-sm-4 col-sm-offset-4" role="form" id="forget" action="forget.php">

<?php
include_once("../config.php");

$verify = stripslashes(trim($_GET['verify']));
$nowtime = time();
//echo $verify."<br />";
$query = mysql_query("select uid,token_exptime from t_user where status='0' and token ='$verify'");
$row = mysql_fetch_array($query);
if($row){
	//echo $verify."sss<br />";
	if($nowtime>$row['token_exptime']){ //30min
		//echo $verify."aaa<br />";
		$msg = '<center><h3>您的激活有效期已过，请登录您的帐号重新发送激活邮件.</h3></center>';
	}else{
		//echo $verify."bbb<br />";
		mysql_query("update t_user set status=1 where uid=".$row['uid']);
		//echo "1激活成功！";
		if(mysql_affected_rows($link)!=1) die(0);
		//echo "2激活成功！";
		$msg = '<center><h3>激活成功！2s后跳转至登录页面</h3></center>';

		//echo "3激活成功！";
	}
}else{
	$msg = '<center><h3>error.</h3></center>';	
}

echo $msg;
?>
</form>
</div>
</body>
</html>
