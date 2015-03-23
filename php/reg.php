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
    
    $username = stripslashes(trim($_POST['name']));
    //$name=$_POST["name"];
    //$email=$_POST["email"];
    //$password=$_POST["password"];
    $telephone=trim($_POST["phone"]);
    $qq=trim($_POST["qq"]);

    $password = md5(trim($_POST['password']));
    $email = trim($_POST['email']);
    $regtime = time();

    $token = md5($username.$password.$regtime); //创建用于激活识别码
    $token_exptime = time()+60*60*24;//过期时间为24小时后

  
        
    include_once "conn.php";
    include_once "function.php";
    //$_SESSION["email"]=$_GET["email"];//邮箱

    mysql_query("SET NAMES utf8");
    $sql="select * from t_user where uemail = 
    '".$email."'";

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

        $insql = "insert into t_user(uname,uemail,upwd,utel,uqq,upower,token,token_exptime,regtime) values('$username','$email','$password','$telephone','$qq',1,'$token','$token_exptime','regtime') ";

        mysql_query($insql);

        if(mysql_insert_id()){//写入成功，发邮件
            include_once("register/smtp.class.php");
            // $smtpserver = "smtp.163.com"; //SMTP服务器
         //    $smtpserverport = 25; //SMTP服务器端口
         //    $smtpusermail = "18158879602@163.com"; //SMTP服务器的用户邮箱
         //    $smtpuser = "18158879602@163.com"; //SMTP服务器的用户帐号
         //    $smtppass = "wsqali1314"; //SMTP服务器的用户密码

            $smtpserver = "smtp.mxhichina.com"; //SMTP服务器
            $smtpserverport = 25; //SMTP服务器端口
            $smtpusermail = "postmaster@hfutfind.com"; //SMTP服务器的用户邮箱
            $smtpuser = "postmaster@hfutfind.com"; //SMTP服务器的用户帐号
            $smtppass = "WSQwsq1314"; //SMTP服务器的用户密码
            
            $smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //这里面的一个true是表示使用身份验证,否则不使用身份验证.
            $emailtype = "HTML"; //信件类型，文本:text；网页：HTML
            $smtpemailto = $email;
            $smtpemailfrom = $smtpusermail;
            $emailsubject = "用户帐号激活";
            $emailbody = "亲爱的".$username."：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/><a href='http://www.hfutfind.com/php/register/active.php?verify=".$token."' target='_blank'>http://www.hfutfind.com/php/register/active.php?verify=".$token."</a><br/>如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。<br/>如果此次激活请求非你本人所发，请忽略本邮件。<br/><p style='text-align:right'>-------- Hfutfind.com 敬上</p>";

            $rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);
            if($rs==1){
                $msg = '<h1><center>恭喜您，注册成功！</center></h1><br/>
                <center><h5>请登录到您的邮箱及时激活您的帐号！</h5></center>';   
            }else{
                $msg = $rs; 
                $msg = $msg."fail";
            }
        }
        echo $msg;

   //   //执行插入
   //   $rowsNum = $conne->uidRst($insql);
   //   if($rowsNum)
   //   {
   //          $conne->close_conn();
            // echo_message("注册成功！请登录千寻网！",1);   
   //   }else {
   //       //出错
   //       echo $conne->msg_error();   
   //   }

    }else {
        //出错
        echo $conne->msg_error();
    }
    $conne->close_conn();
    
 }
    mysql_close();  
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