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
//print_r($_POST);
//print_r($_FILES['uploadfile']);
if(!empty($_FILES['uploadfile'])){
    //print_r($_POST);
    include_once "config.php";
    //$dir = 'E:\xampp\htdocs\qianxun\upload_images\head_photo';
    $dir = '/data/home/qxu1098220222/htdocs/upload_images/head_photo';

    if($_FILES['uploadfile']['error'] != UPLOAD_ERR_OK)
    {
        switch($_FILES['uploadfile']['error'])
        {
            case UPLOAD_ERR_INI_SIZE: //其值为 1，上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值
                die('The upload file exceeds the upload_max_filesize directive in php.ini');
            break;
            case UPLOAD_ERR_FORM_SIZE: //其值为 2，上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值
                die('The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.');
            break;
            case UPLOAD_ERR_PARTIAL: //其值为 3，文件只有部分被上传
                die('The uploaded file was only partially uploaded.');
            break;
            case UPLOAD_ERR_NO_FILE: //其值为 4，没有文件被上传
                die('No file was uploaded.');
            break;
            case UPLOAD_ERR_NO_TMP_DIR: //其值为 6，找不到临时文件夹
                die('The server is missing a temporary folder.');
            break;
            case UPLOAD_ERR_CANT_WRITE: //其值为 7，文件写入失败
                die('The server failed to write the uploaded file to disk.');
            break;
            case UPLOAD_ERR_EXTENSION: //其他异常
                die('File upload stopped by extension.');
            break;
        }
    }


    
    /*getimagesize方法返回一个数组，
    $width : 索引 0 包含图像宽度的像素值，
    $height : 索引 1 包含图像高度的像素值，
    $type : 索引 2 是图像类型的标记：
    = GIF，2 = JPG， 3 = PNG， 4 = SWF， 5 = PSD， 6 = BMP， 
    = TIFF(intel byte order)，8 = TIFF(motorola byte order)，
    = JPC，10 = JP2，11 = JPX，12 = JB2，13 = SWC，14 = IFF，15 = WBMP，16 = XBM，
    $attr : 索引 3 是文本字符串，内容为“height="yyy" width="xxx"”，可直接用于 IMG 标记
    */

    list($width,$height,$type,$attr) = getimagesize($_FILES['uploadfile']['tmp_name']);

    //imagecreatefromgXXX方法从一个url路径中创建一个新的图片
    switch($type)
    {
        case IMAGETYPE_GIF:
            $image = imagecreatefromgif($_FILES['uploadfile']['tmp_name']) or die('The file you upload was not supported filetype');
            $ext = '.gif';
        break;
        case IMAGETYPE_JPEG:
            $image = imagecreatefromjpeg($_FILES['uploadfile']['tmp_name']) or die('The file you upload was not supported filetype');
            $ext = '.jpg';
        break;    
        case IMAGETYPE_PNG:
            $image = imagecreatefrompng($_FILES['uploadfile']['tmp_name']) or die('The file you upload was not supported filetype');
            $ext = '.png';
        break;    
        default    :
            die('The file you uploaded was not a supported filetype.');
    }
    $imagename = $_SESSION["uid"].$ext;
    $query = 'update t_user set uheader="'.$imagename.'" where uid='.$_SESSION["uid"];
    mysql_query($query , $db) or die(mysql_error($db));
    //有url指定的图片创建图片并保存到指定目录
    switch($type)
    {
        case IMAGETYPE_GIF:
            imagegif($image,$dir.'/'.$imagename);
        break;
        case IMAGETYPE_JPEG:
            imagejpeg($image,$dir.'/'.$imagename);
        break;
        case IMAGETYPE_PNG:
            imagepng($image,$dir.'/'.$imagename);
        break;
    }
    //销毁由url生成的图片
    imagedestroy($image);
    include_once "function.php";

    mysql_close();
    echo_message("修改头像成功！",4);


}else{

 if(!empty($_POST)){
    $name=$_POST["name"];
    $email=$_POST["email"]; //邮箱不可修改
    $telephone=$_POST["phone"];
    $qq=$_POST["qq"];



    //正则表达式匹配手机 
    if(strlen($telephone) == "11") { 
        //上面部分判断长度是不是11位 
        $n = preg_match_all("/13[123569]{1}\d{8}|15[1235689]\d{8}|188\d{8}/",$telephone,$array); 
        /*接下来的正则表达式("/131,132,133,135,136,139开头随后跟着任意的8为数字 '|'(或者的意思) 
        * 151,152,153,156,158.159开头的跟着任意的8为数字 
        * 或者是188开头的再跟着任意的8为数字,匹配其中的任意一组就通过了 
        * /")*/ 

        //var_dump($array); //看看是不是找到了,如果找到了,就会输出电话号码的 
        if(!empty($array[0][0])){
                include_once "conn.php";
                include_once "function.php";

                $sql="update t_user set uname = '".$name."' , uemail = '".$email."' , utel = '".$telephone."' , uqq = '".$qq."'  where uid = '".$_SESSION["uid"]."' ";

                // $sql="update t_user set uname = '".$name."' , utel = '".$telephone."' , uqq = '".$qq."'  where uid = '".$_SESSION["uid"]."' ";
                
                $rowsNum = $conne->uidRst($sql);
                if($rowsNum > 0){
                    echo "<h3>修改成功！</h3>";
                    $conne->close_conn();
                    //session_destroy();
                    
                    echo_message("修改成功..." ,4);
                }else{
                    echo "修改失败！";
                    $conne->msg_error();
                    $conne->close_conn();
                    echo_message("请重新修改..." ,4);
                }            


        }else{
            echo_message("手机号码错误,请重新修改..." ,4);
        }

        
    }else { 
        //echo "长度必须是11位"; 
        echo_message("手机长度必须是11位,请重新修改..." ,4);
    } 
    /* 
    * 虽然看起来复杂点,清楚理解! 
    * 如果有更好的,可以贴出来,分享快乐! 
    * */ 
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