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
                <li><a href="../index.php">首页</a></li>
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
                <li class="active"><a href="../reg.php">注册</a></li>
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
<!-- Body Main -->
<div class="container">

  
 <form class="form-horizontal col-sm-4 col-sm-offset-4" role="form" id="forget" action="forget.php">


<?php
include_once("config.php");
$token = stripslashes(trim($_GET['token']));
$email = stripslashes(trim($_GET['email']));
$sql = "select * from `t_user` where uemail='$email'";

$query = mysql_query($sql);
$row = mysql_fetch_array($query);
if($row){
	$mt = md5($row['uid'].$row['uname'].$row['upwd']);
	if($mt==$token){
		if(time()-$row['getpasstime']>24*60*60){
			$msg = '<center><h3>该链接已过期！</h3></center>';
		}else{
			//重置密码...
			$msg = '<center><h3>请重新设置密码，显示重置密码表单。</h3></center>';
            $url = "resetPassForm.php";  
            echo "<script language='javascript' 
            type='text/javascript'>";  
            //echo "alert('重置密码');window.location.href='$url'";  
            echo "window.location.href='$url'";  
            echo "</script>"; 

		}
	}else{
		$msg =  '<center><h3>无效的链接<br/>'.$mt.'<br/>'.$token."</center></h3>";
	}
}else{
	$msg =  '<center><h3>错误的链接！</center></h3>';	
}
echo $msg;
?>
</form>
</div>

<?php
    include_once "footer.php";
?>
</body>
</html>