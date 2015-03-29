<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>千寻网--合肥工业大学失物招领</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/zhao_info.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body data-spy="scroll" data-target="#myScrollspy">
<!-- Head Navbar -->
<?php
include_once "php/header.php";
?>
<!-- Body Main -->
<div class="container">
    <div class="jumbotron">
        <img src="images/hfutphoto1.jpg" alt="合肥工业大学--千寻网" id="bg">

        <h1>你好 欢迎来到千寻网！</h1>

        <p style="color: #5bc0de">这里是千寻网，专注于合肥工业大学失物招领，我们致力于帮每一件宝贝找到它的主人！</p>

        <p>
            <a href="introduction.php" class="btn btn-primary" role="button">阅读使用说明</a>
        </p>
    </div>
    <div class="row">
        <div class="col-xs-4" id="myScrollspy">
            <div class="panel panel-info" data-spy="affix" data-offset-top="310">
                <div class="panel-heading">
                    <h1 class="panel-title">Hi!亲们：</h1>
                </div>
                <div class="panel-body">
                    <h3>在这儿发布失物招领信息哦!</h3>
                    <br/>
                    <a href="publish.php" class="btn btn-info btn-lg btn-block" role="button">我丢宝贝啦</a>
                    <br/>
                    <a href="publish.php" class="btn btn-info btn-lg btn-block" role="button">我捡到宝贝啦</a>

                    <h3>已成功帮<span>88</span>件宝贝找到主人!</h3>

                    <h3>在工大 失物招领就上千寻网!</h3>
                </div>
            </div>
        </div>
        <div class="col-xs-8">
        <?php
                    include_once "php/config.php";
                    $sql = "select * from t_publish where  ptype='1' order by pid desc limit 10 ";
                    $result = mysql_query($sql);
                    if($result&&mysql_num_rows($result)>0){
                    while ($row = mysql_fetch_array($result)) {
                            $uid = $row["uid"];

										        $arr = mysql_fetch_assoc(mysql_query("select * from t_user where uid = '".$uid."' "));
										        $uname = $arr['uname'];
										        $uheader = $arr['uheader'];
                            $pid = $row["pid"];
                            
                            if(empty($row['pimage'])){
                        					echo "<div class='media'>
            <a class='pull-left' href='#'>
                <img class='media-object' src='upload_images/head_photo/".$uheader." ' alt='头像' style='width: 100px;height: 100px;border-radius: 10px;'>
            </a><div class='media-body'>
                <h4 class='media-heading'>".$uname."
            <small>&nbsp;&nbsp;发表于".$row['ptime']."</small>
                </h4>
                <p>物品名称：".$row['pname']."</p>
                <p>拾取地点：".$row['plocation']."</p>
                <p>详细描述：".$row['pdetails']."。</p>
                
                        </div>
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>查看详情</a>
                        <a class='pull-right'>&nbsp;</a>
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>成功找到？</a>
            
        </div>";    	
                            	}else{
                        echo "<div class='media'>
            <a class='pull-left' href='#'>
                <img class='media-object' src='upload_images/head_photo/".$uheader." ' alt='头像' style='width: 100px;height: 100px;border-radius: 10px;'>
            </a><div class='media-body'>
                <h4 class='media-heading'>".$uname."
            <small>&nbsp;&nbsp;发表于".$row['ptime']."</small>
                </h4>
                <p>物品名称：".$row['pname']."</p>
                <p>拾取地点：".$row['plocation']."</p>
                <p>详细描述：".$row['pdetails']."。</p>
                <a href='#'' class='thumbnail'>
                                <img src='upload_images/".$row['pimage']."' data-src='holder.js/300x300' alt='物品图片'>
                            </a>
                        </div>
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>查看详情</a>
                        <a class='pull-right'>&nbsp;</a>
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>成功找到？</a>
            
        </div>";
      														}
                        }
                    }
                
                mysql_close();
            ?>
            
            <h4 class="center"></h4>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
    include_once "php/footer.php";
?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script src="js/index.js"></script>
<script src="js/zhao_waterfall.js"></script>

<!-- hfutfind.com Baidu tongji analytics -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F2ef7e98a67ec1cfb8f1b6dcee50de923' type='text/javascript'%3E%3C/script%3E"));</script>

</body>
</html>