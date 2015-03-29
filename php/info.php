<?php
error_reporting(0);
 if(!isset($_SESSION)){ session_start(); }
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
<div class="container">

  
 <form class="form-horizontal col-sm-4 col-sm-offset-4" role="form" id="forget" action="forget.php">

<?php
  //print_r($_GET);
  //print_r($_POST);
 // print_r($_FILES['uploadfile']);

 header("Content-type:text/html;charset=utf-8");
 error_reporting(0);
 if(!empty($_POST)){
    
    include_once "config.php";
    include_once "function.php";
    $pid=$_POST["pid"];
    
    //过滤敏感词
    filter_word(trim($_POST["cdetails"]),$pid);
    $cdetails=trim($_POST["cdetails"]);


    $psucceed = $_POST["psucceed"];
    $uid = $_SESSION['uid'];
    $ctime = date('Y-m-d H:i:s');
    

    //成功找回
    if(!empty($psucceed)){
        include_once "config.php";
        $arr = mysql_fetch_assoc(mysql_query("select * from t_publish where pid='".$pid."' "));
        $puid = $arr["uid"];
        if($arr["psucceed"]==0){
            if($puid == $uid){
                include_once "conn.php";    
                $sql = "update t_publish set psucceed='1' where pid= '$pid' ";
                $rowsNum = $conne->uidRst($sql);
                if($rowsNum > 0){
                    echo "<h3>成功找到！</h3>";
                    $conne->close_conn();
                    echo_message("成功找到..." ,5 , $pid);
                }else{
                    echo "修改失败！";
                    $conne->msg_error();
                    $conne->close_conn();
                    echo_message("请重新修改..." ,5,$pid);
                }
            }else{
                echo "<h3>非本人无法确认成功找到！</h3>";
                echo_message("非本人无法确认成功找到！" ,5, $pid);
            }    
        }else{
            echo "<h3>已成功找到！</h3>";
            echo_message("已成功找到！",5, $pid);  
        }
        
    }
    else{    
        //评论验证
        if(empty($cdetails)){
            //echo_message("评论内容不能为空！",5, $pid);   
            echo "<script type='text/javascript'>alert('评论内容不能为空！');window.history.go(-1)</script>";
        }
        else if(strlen($cdetails) >= "50"){
            //echo_message("评论内容不能大于50字！",5, $pid);   
            echo "<script type='text/javascript'>alert('评论内容不能大于50字！');window.history.go(-1)</script>";
        }else if(empty($uid)){
            echo "<script type='text/javascript'>alert('注册后才能评论！');window.history.go(-1)</script>";
        }
        else{
            include_once "conn.php";
            $insql = "insert into t_comment(pid,uid,ctime,cdetails) values('$pid','$uid','$ctime','$cdetails') ";
            $conne = new opmysql();
            //执行插入
            $rowsNum = $conne->uidRst($insql);
            if($rowsNum)
            {
                $conne->close_conn();
                echo_message("评论成功！",5, $pid);   
            }else {
                //出错
                //echo $conne->msg_error();   
            }

            $conne->close_conn();
        }

        
    }

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