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
    <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
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
session_start();
if(!empty($_POST)){
    // $email=$_POST["email"];
    // $password=$_POST["password"];
    $email = trim($_POST['email']);
    $password = md5(trim($_POST['password']));
    //密码前12位
    $password = substr($password , 0 , 12);
    
    include_once "config.php";
    include_once "conn.php";
    include_once "function.php";
    
    //$_SESSION["email"]=$_GET["email"];//邮箱
    //查询邮箱是否存在
    $sqlqu = "select * from t_user where uemail= '".$email."'";
    $numqu = $conne->getRowsNum($sqlqu);
    if($numqu>=1){
            $sql = "select * from t_user where uemail= '".$email."' and upwd='".$password."'  ";
            $num = $conne->getRowsNum($sql);
            if($num >= 1){
            //如果存在
            //echo "1";
            $rst = $conne->getRowsRst($sql);
            //print_r($rst);
            $_SESSION["uid"] = $rst["uid"];
            $_COOKIE["uid"] = $rst["uid"];
                $_SESSION["uname"] = $rst["uname"];
                    $_SESSION["uemail"] = $rst["uemail"];
                    $_SESSION["upwd"] = $rst["upwd"];
            $_SESSION["utel"] = $rst["utel"];
            $_SESSION["uqq"] = $rst["uqq"];
                    $_SESSION["upower"] = $rst["upower"];
            $_SESSION["uheader"] = $rst["uheader"];
            

            $conne->close_conn();        
            //判断是否为管理员
            if($rst["upower"] == 9){
                //$url = "../admin/index.php";
                echo "<script charset='utf-8' type='text/javascript'>alert('管理员登陆!');window.location.href='../admin/index.php';</script>";    
            }else{
                echo_message("登录成功！" , 1);    
            }


        }else if($num == 0){
            $conne->close_conn();
            echo_message("您的账户密码错误！请重新登录！" , 2);
        }    
    }else{
        $conne->close_conn();
        echo_message("您的邮箱不存在！请注册后再登录！" , 7);
    }


    


    mysql_close();

}


?>
</form>
</div>

<!-- Footer -->
<?php
    include_once "footer.php";
?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="../js/reg.js"></script>

<!-- hfutfind.com Baidu tongji analytics -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");

document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F2ef7e98a67ec1cfb8f1b6dcee50de923' type='text/javascript'%3E%3C/script%3E"));

</script>

</body>
</html>