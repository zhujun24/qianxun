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
    <link href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
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
                <li  class="active"><a href="../login.php">登陆</a></li>
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
<!-- Body Main -->
<div class="container">

  
 <form class="form-horizontal col-sm-4 col-sm-offset-4" role="form" id="forget" action="forget.php">

<?php
	error_reporting(0);
 if(!empty($_POST)){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $telephone=$_POST["phone"];
    $qq=$_POST["qq"];
    
  
		
    include_once "conn.php";
    include_once "function.php";
    //$_SESSION["email"]=$_GET["email"];//邮箱

    mysql_query("SET NAMES utf8");
    $sql="select * from t_user where uemail = 
    '".$_POST['email']."'";

    //查询数据库是否存在该邮箱
    $num = $conne->getRowsNum($sql);
    if($num >= 1){
    	//如果存在
    	//echo "1";
        $conne->close_conn();
    	echo_message("您的邮箱已存在！",2);
    }else if($num == 0){
    	//echo "0";
    	//echo_message("您的邮箱不存在！");

    	$insql = "insert into t_user(uname,uemail,upwd,utel,uqq,upower) values('$name','$email','$password','$telephone','$qq',1) ";
    	//执行插入
    	$rowsNum = $conne->uidRst($insql);
    	if($rowsNum)
    	{
            $conne->close_conn();
			echo_message("注册成功！请登录千寻网！",1);   
    	}else {
    		//出错
    		echo $conne->msg_error();	
    	}

    }else {
    	//出错
    	echo $conne->msg_error();
    }
    $conne->close_conn();
    
 }
 //mysql_close();	
?>
</form>
</div>

<!-- Footer -->
<div class="container-fluid" id="bottom">
    <p>Copyright 2014-? <span><a href="index.html">www.hfutfind.com</a></span> 版权所有 合肥工业大学千寻网</p>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="../js/reg.js"></script>
</body>
</html>