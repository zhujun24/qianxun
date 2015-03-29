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
<!-- Body Main -->
<div class="container" style="text-align:center">
<!-- <form class="form-horizontal col-sm-4 col-sm-offset-4" role="form" id="forget" action="forget.php"> -->
<?php
// echo "XXX";
// echo $_POST['pass']."___".$_POST['password'];
// echo $_POST['password1']."___".$_POST['password2'];

if(!empty($_POST)){
    //$pass=$_POST["pass"];
    //$password=$_POST["password"];
    $pass = $_POST['pass'];
    $password = md5(trim($_POST['password']));

    //密码前12位
    $pass = substr($pass , 0 , 12);
    $password = substr($password , 0 , 12);

    // echo "<br>XXX";
    // echo $pass."___".$password;


    include_once "function.php";

    if($pass != $password){
        echo_message("原密码错误，请重新修改..." ,4);
    }

    
    // $password1=$_POST["password1"];
    // $password2=$_POST["password2"];

    $password1 = md5(trim($_POST['password1']));
    $password2 = md5(trim($_POST['password2']));
    //密码前12位
    $password1 = substr($password1 , 0 , 12);
    $password2 = substr($password2 , 0 , 12);

    $uid=$_POST["uid"];

    
    include_once "config.php";
    include_once "conn.php";
    
    
    $sql="update t_user set  upwd = '".$password1."'  where uid = '".$uid."' ";
    
    $rowsNum = $conne->uidRst($sql);
    if($rowsNum > 0){
        echo "<h3>修改成功！</h3>";
        $conne->close_conn();
        echo_message("修改成功..." ,4);
    }else{

        echo "新密码与原密码一致！";
        $conne->msg_error();
        $conne->close_conn();
        echo_message("请重新修改..." ,4);
    }

}else{
    echo_message("请重新修改..." ,4);
}     


?>
<!-- </form> -->
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