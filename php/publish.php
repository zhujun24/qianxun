<?php
       if(!isset($_SESSION)){ session_start(); };
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
 //print_r($_FILES['uploadfile']);
 // print_r($_FILES);
 header("Content-type:text/html;charset=utf-8");
 include_once "config.php";
 include_once "function.php";
 //过滤敏感词
 //filter_arr($_POST);
//设置上传目录
$path = "../upload_images/";    
// UPLOAD_ERR_OK
// 其值为 0，没有错误发生，文件上传成功。
// UPLOAD_ERR_INI_SIZE
// 其值为 1，上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。
// UPLOAD_ERR_FORM_SIZE
// 其值为 2，上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。
// UPLOAD_ERR_PARTIAL
// 其值为 3，文件只有部分被上传。
// UPLOAD_ERR_NO_FILE
// 其值为 4，没有文件被上传。
// UPLOAD_ERR_NO_TMP_DIR
// 其值为 6，找不到临时文件夹。PHP 4.3.10 和 PHP 5.0.3 引进。
// UPLOAD_ERR_CANT_WRITE
// 其值为 7，文件写入失败。PHP 5.1.0 引进

if($_FILES['uploadfile']['error']==3 ||$_FILES['uploadfile']['error']==5 || $_FILES['uploadfile']['error']==6 || $_FILES['uploadfile']['error']==7){
    //print_r($_FILES);
    echo_message("图片上传失败！",9);

}elseif($_FILES['uploadfile']['size'] > 2000000){
    //print_r($_FILES);
    echo_message("图片最大不超过2M,上传失败！",9);

}elseif($_FILES['uploadfile']['error']==0){

    //print_r($_FILES);
    //得到上传的临时文件流
    $tempFile = $_FILES['uploadfile']['tmp_name'];
    //echo $tempFile;
    //允许的文件后缀
    $fileTypes = array('jpg','jpeg','gif','png'); 
    
    list($width,$height,$type,$attr) = getimagesize($_FILES['uploadfile']['tmp_name']);
    //得到文件原名
    //要像把gb2312换为utf-8只要写上$content = iconv("gb2312","utf-8//IGNORE",$content);就行
    //$fileName = iconv("UTF-8","GB2312//IGNORE",$_FILES["Filedata"]["name"]);
    // $imagename = $_SESSION["uid"].$ext;
  //   $query = 'update t_user set uheader="'.$imagename.'" where uid='.$_SESSION["uid"];
  //   mysql_query($query , $db) or die(mysql_error($db));

    $fileName = $_FILES["uploadfile"]["name"];
    
    $fileParts = pathinfo($_FILES['uploadfile']['name']);
    
    //接受动态传值
    $files=$_POST['typeCode'];
    
    //最后保存服务器地址
    if(!is_dir($path))
       mkdir($path);
    include_once "config.php";

    //$pitem = trim($_POST['item']);
    $pitem = stripslashes(trim($_POST['item']));
    $pitem = strip_tags($pitem);
    //$pname = trim($_POST['name']);
    $pname = stripslashes(trim($_POST['name']));
    $pname = strip_tags($pname);
    //$plocation = trim($_POST['location']);
    $plocation = stripslashes(trim($_POST['location']));
    $plocation = strip_tags($plocation);
    //$pdate = trim($_POST['time']);
    $pdate = stripslashes(trim($_POST['time']));
    $pdate = strip_tags($pdate);
    
    $ptime = date('Y-m-d H:i:s');

    //$pdetails = trim($_POST['details']);
    $pdetails = stripslashes(trim($_POST['details']));
    $pdetails = strip_tags($pdetails);
    $ptype = trim($_POST['inlineRadioOptions']);

    $query = 'insert into t_publish(uid,pitem,pname,plocation,ptime,pdetails,ptype,pdate) values (
    "'.$_SESSION['uid'].'","'.$pitem.'","'.$pname.'",
    "'.$plocation.'","'.$ptime.'","'.$pdetails.'",
    "'.$ptype.'","'.$pdate.'")';
    mysql_query($query , $db) or die(mysql_error($db));
    $last_id = mysql_insert_id();
    //用写入的id作为图片的名字，避免同名的文件存放在同一目录中
    //$imagename = $last_id.$ext;

    $fileNames = $fileName;
    $imagenames = explode(".",$fileNames);
    //$imagenames[0] = $_SESSION["uid"];
    $imagenames[0] = $last_id;
    $imagename = implode(".", $imagenames);

    if (move_uploaded_file($tempFile, $path.$imagename)){
        $query = 'update t_publish set pimage="'.$imagename.'" where pid='.$last_id;
        mysql_query($query , $db) or die(mysql_error($db));
        //$query = 'update t_user set uheader="'.$imagename.'" where uid='.$_SESSION["uid"];
        //mysql_query($query , $db) or die(mysql_error($db));
        //echo "原文件名".$fileName."上传成功！新文件名".$imagename."<br>请手动F5刷新!";
        include_once "function.php";
        mysql_close();
        //echo "success";
        //echo "images success";
        //echo_message("信息发布成功！",1);
    }else{
        //echo $fileName."上传失败！";
        include_once "function.php";
        mysql_close();
        //echo "images fail";
        //echo_message("信息上传失败！",-1);
    }
}elseif($_FILES['uploadfile']['error']==4){
    //print_r($_FILES);
    include_once "config.php";

    //$pitem = trim($_POST['item']);
    $pitem = stripslashes(trim($_POST['item']));
    $pitem = strip_tags($pitem);
    //$pname = trim($_POST['name']);
    $pname = stripslashes(trim($_POST['name']));
    $pname = strip_tags($pname);
    //$plocation = trim($_POST['location']);
    $plocation = stripslashes(trim($_POST['location']));
    $plocation = strip_tags($plocation);
    //$pdate = trim($_POST['time']);
    $pdate = stripslashes(trim($_POST['time']));
    $pdate = strip_tags($pdate);
    
    $ptime = date('Y-m-d H:i:s');

    //$pdetails = trim($_POST['details']);
    $pdetails = stripslashes(trim($_POST['details']));
    $pdetails = strip_tags($pdetails);

    $ptype = trim($_POST['inlineRadioOptions']);

    $query = 'insert into t_publish(uid,pitem,pname,plocation,ptime,pdetails,ptype,pdate) values (
    "'.$_SESSION['uid'].'","'.$pitem.'","'.$pname.'",
    "'.$plocation.'","'.$ptime.'","'.$pdetails.'",
    "'.$ptype.'","'.$pdate.'")';
    mysql_query($query , $db) or die(mysql_error($db));

    include_once "function.php";
    if(mysql_affected_rows()){
        mysql_close();
        //echo "success";
        echo_message("信息发布成功！",1);
    }else{
        mysql_close();
        //echo "fail";
        echo_message("信息上传失败！",-1);
    }
}
    
?>
</form>
</div>

<!-- Footer -->
<div class="container-fluid" id="bottom">
    <p>Copyright 2014-? <span><a href="index.html">www.hfutfind.com</a></span> 版权所有 合肥工业大学千寻网</p>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/lib/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/lib/bootstrap.min.js"></script>
<script src="../js/reg.js"></script>
</body>
</html>