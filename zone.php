<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>千寻网--合肥工业大学失物招领</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/zone.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Head Navbar -->
<?php
include_once "php/header.php";
include_once "php/config.php";
$arr = mysql_fetch_assoc(mysql_query("select * from t_user where uid = '".$_SESSION["uid"]."' "));
        $uname = $arr['uname'];
        $uheader = $arr['uheader'];
        $uemail = $arr['uemail'];
        $upwd = $arr['upwd'];
        $uqq = $arr['uqq'];
        $utel = $arr['utel'];

?>

<div class="container heropic">
    <div class="left-info">    
        <img src="upload_images/head_photo/<?php 
        echo $uheader;?>" class="img-circle pull-left">
        
    </div>
    <div class="right-info">
        <div style="margin-bottom:10px;">
            <span class="h3"><?php echo $uname;?></span>
        </div>
        <div>
            <span class="h3"><?php echo $uemail;?></span>
        </div>
        <div>
            <form action="php/zone.php" enctype="multipart/form-data" class="form-inline col-lg-5" method="post">
                <input type="file" name="uploadfile" id="doc" onchange="javascript:setImagePreview();"
                       class="filestyle" data-icon="false" data-buttonText="点击选择头像"
                       data-buttonName="btn-info">
                <button class="btn btn-primary xiugaitouxiang" type="submit">确认上传</button>
            </form>
        </div>
    </div>
</div>

<!-- Body Main -->
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">个人资料</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="php/zone.php" method="post" >
                        <div class="form-group form-group-sm">
                            <label class="col-sm-3 control-label">昵称</label>

                            <div class="col-sm-9">
                                <p class="form-control-static yuanlai"><?php echo $uname;?></p>
                                <input type="text" id="name" name="name" class="form-control xiugai" value="<?php echo $uname;?>">
                            </div>
                        </div>
                        
                        
                        <div class="form-group form-group-sm">
                            <label class="col-sm-3 control-label">邮箱</label>

                            <div class="col-sm-9">
                                <p class="form-control-static yuanlai"><?php echo $uemail;?></p>
                                <input type="text" id="email"  name="email" class="form-control xiugai" value="<?php echo $uemail;?>">
                            </div>
                        </div>
                        <div class="form-group form-group-sm">
                            <label class="col-sm-3 control-label">密码</label>

                            <div class="col-sm-9">
                                <p class="form-control-static yuanlai"><?php echo $upwd;?></p>
                                <a href="resetPassword.php" class="btn btn-primary right" role="button">修改密码</a>    
                            </div>

                        </div>
                        <div class="form-group form-group-sm">  
                            <label class="col-sm-3 control-label">手机号码</label>

                            <div class="col-sm-9">
                                <p class="form-control-static yuanlai"><?php echo $utel;?></p>
                                <input type="text" id="phone" name="phone" class="form-control xiugai" value="<?php echo $utel;?>">
                            </div>
                        </div>
                        <div class="form-group form-group-sm">
                            <label class="col-sm-3 control-label">QQ</label>

                            <div class="col-sm-9">
                                <p class="form-control-static yuanlai"><?php echo $uqq;?></p>
                                <input type="text" id="qq" name="qq" class="form-control xiugai" value="<?php echo $uqq;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                
                                <button class="btn btn-primary xiugai-btn">修改资料</button>
                                <button type="button" class="btn btn-default col-sm-offset-1" id="alter">确认修改</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#zhaoling" role="tab" data-toggle="tab">我的招领信息</a></li>
                <li><a href="#shiwu" role="tab" data-toggle="tab">我的失物信息</a></li>
                <li><a href="#messages" role="tab" data-toggle="tab">我的评论</a></li>
                <li><a href="#success" role="tab" data-toggle="tab">成功事例</a></li>
            </ul>



            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="zhaoling">
                    <?php
                    include_once "php/config.php";
                    $sql = "select * from t_publish where  ptype='1' and  uid='".$_SESSION['uid']."' order by pid desc ";
                    $result = mysql_query($sql);
                    if($result&&mysql_num_rows($result)>0){
                    while ($row = mysql_fetch_array($result)) {
                            //$uid = $row["uid"];
                            $pid = $row["pid"];
                        		if(empty($row['pimage']))
                        		{
                        			echo "<div class='media'>
            <a class='pull-left' href='#'>
                <img src='upload_images/head_photo/$uheader' class='media-object' alt='头像'>
            </a><div class='media-body'>
                <h4 class='media-heading'>".$uname."
            <small>&nbsp;&nbsp;发表于".$row['ptime']."</small>
                </h4>
                <p>物品名称：".$row['pname']."</p>
                <p>拾取地点：".$row['plocation']."</p>
                <p>详细描述：".$row['pdetails']."。</p>
                        </div>
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>查看详情</a>
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>成功找到？</a></div>";
                        		}else
                        		{
                        			echo "<div class='media'>
            <a class='pull-left' href='#'>
                <img src='upload_images/head_photo/$uheader' class='media-object' alt='头像'>
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
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>成功找到？</a></div>";			
                        		}    
                            
                        
                        
                        
                        }
                    }
                
                //mysql_close();
            ?>


                    <!--div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/head_photo.png" alt="头像">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">默默人
                                <small>&nbsp;&nbsp;发表于7月32日</small>
                            </h4>
                            如果仅仅就这一个问题看，显然是看问题的高度不同和认识不同，而导致的立场不同，自然看法也不同。列宁认为帝国主义的世界大战只不过是权势者们争权夺利的豪赌，无论谁输赢，对普通民众都没有什么大的关系，这是符合心理分析理论的看法的。在爱国主义的旗帜下，兜售对外强势，今天美俄如同一撤。
                        </div>
                        <a href="info.html" class="btn btn-primary pull-right" role="button">查看详情</a>
                        <a href="#" class="btn btn-primary pull-right" role="button">成功找到？</a>
                    </div>
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/head_photo.png" alt="头像">
                        </a>

                        <div class="media-body">
                            <h4 class="media-heading">某某某人
                                <small>&nbsp;&nbsp;发表于7月32日</small>
                            </h4>
                            如果仅仅就这一个问题看，显然是看问题的高度不同和认识不同，而导致的立场不同，自然看法也不同。列宁认为帝国主义的世界大战只不过是权势者们争权夺利的豪赌，无论谁输赢，对普通民众都没有什么大的关系，这是符合心理分析理论的看法的。在爱国主义的旗帜下，兜售对外强势，今天美俄如同一撤。
                            <a href="#" class="thumbnail">
                                <img src="images/wu1.jpg" data-src="holder.js/300x300" alt="物品图片">
                            </a>
                        </div>
                        <a href="info.html" class="btn btn-primary pull-right" role="button">查看详情</a>
                        <a href="#" class="btn btn-primary pull-right" role="button">成功找到？</a>
                    </div>
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/head_photo.png" alt="头像">
                        </a>

                        <div class="media-body">
                            <h4 class="media-heading">某某某人
                                <small>&nbsp;&nbsp;发表于7月32日</small>
                            </h4>
                            如果仅仅就这一个问题看，显然是看问题的高度不同和认识不同，而导致的立场不同，自然看法也不同。列宁认为帝国主义的世界大战只不过是权势者们争权夺利的豪赌，无论谁输赢，对普通民众都没有什么大的关系，这是符合心理分析理论的看法的。在爱国主义的旗帜下，兜售对外强势，今天美俄如同一撤。
                        </div>
                        <a href="info.html" class="btn btn-primary pull-right" role="button">查看详情</a>
                        <a href="#" class="btn btn-primary pull-right" role="button">成功找到？</a>
                    </div-->
                </div>
                <div class="tab-pane fade" id="shiwu">

                <?php
                    include_once "php/config.php";
                    $sql = "select * from t_publish  where  ptype='0' and  uid='".$_SESSION['uid']."' order by pid desc";
                    $result = mysql_query($sql);
                    if($result&&mysql_num_rows($result)>0){
                    while ($row = mysql_fetch_array($result)) {
                            //$uid = $row["uid"];
                            $pid = $row["pid"];
                        if(empty($row['pimage']))
                        		{
                        			echo "<div class='media'>
            <a class='pull-left' href='#'>
                <img src='upload_images/head_photo/$uheader' class='media-object' alt='头像'>
            </a><div class='media-body'>
                <h4 class='media-heading'>".$uname."
            <small>&nbsp;&nbsp;发表于".$row['ptime']."</small>
                </h4>
                <p>物品名称：".$row['pname']."</p>
                <p>丢失地点：".$row['plocation']."</p>
                <p>详细描述：".$row['pdetails']."。</p>
                        </div>
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>查看详情</a>
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>成功找到？</a></div>";
                        		}else
                        		{
                        			echo "<div class='media'>
            <a class='pull-left' href='#'>
                <img src='upload_images/head_photo/$uheader' class='media-object' alt='头像'>
            </a><div class='media-body'>
                <h4 class='media-heading'>".$uname."
            <small>&nbsp;&nbsp;发表于".$row['ptime']."</small>
                </h4>
                <p>物品名称：".$row['pname']."</p>
                <p>丢失地点：".$row['plocation']."</p>
                <p>详细描述：".$row['pdetails']."。</p>
                <a href='#'' class='thumbnail'>
                                <img src='upload_images/".$row['pimage']."' data-src='holder.js/300x300' alt='物品图片'>
                            </a>
                        </div>
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>查看详情</a>
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>成功找到？</a></div>";			
                        		}    
                        }
                    }
                
                //mysql_close();
            ?>
                    <!--div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/head_photo.png" alt="头像">
                        </a>

                        <div class="media-body">
                            <h4 class="media-heading">某某某人
                                <small>&nbsp;&nbsp;发表于7月32日</small>
                            </h4>
                            如果仅仅就这一个问题看，显然是看问题的高度不同和认识不同，而导致的立场不同，自然看法也不同。列宁认为帝国主义的世界大战只不过是权势者们争权夺利的豪赌，无论谁输赢，对普通民众都没有什么大的关系，这是符合心理分析理论的看法的。在爱国主义的旗帜下，兜售对外强势，今天美俄如同一撤。
                        </div>
                        <a href="info.html" class="btn btn-primary pull-right" role="button">查看详情</a>
                        <a href="#" class="btn btn-primary pull-right" role="button">成功找到？</a>
                    </div>
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/head_photo.png" alt="头像">
                        </a>

                        <div class="media-body">
                            <h4 class="media-heading">某某某人
                                <small>&nbsp;&nbsp;发表于7月32日</small>
                            </h4>
                            如果仅仅就这一个问题看，显然是看问题的高度不同和认识不同，而导致的立场不同，自然看法也不同。列宁认为帝国主义的世界大战只不过是权势者们争权夺利的豪赌，无论谁输赢，对普通民众都没有什么大的关系，这是符合心理分析理论的看法的。在爱国主义的旗帜下，兜售对外强势，今天美俄如同一撤。
                        </div>
                        <a href="info.html" class="btn btn-primary pull-right" role="button">查看详情</a>
                        <a href="#" class="btn btn-primary pull-right" role="button">成功找到？</a>
                    </div-->
                </div>
                <div class="tab-pane fade" id="messages">
                    


<?php
            //include_once "php/config.php";
                    
                    $sql = "select * from t_comment  where uid='".$_SESSION['uid']."' ";
                    // $rowsArray = $conne -> getRowsArray($sql);
                    $result = mysql_query($sql);
                    if($result&&mysql_num_rows($result)>0){
                        $i = 0;
                        while ($row = mysql_fetch_array($result)) {
                            
                            $uid = $row["uid"];

        $arr = mysql_fetch_assoc(mysql_query("select * from t_user where uid = '".$uid."' "));
        $uname = $arr['uname'];

                        echo "<div class='media'>
            <a class='pull-left' href='#'>
                <img src='upload_images/head_photo/$uheader' class='media-object' alt='头像'>
            </a><div class='media-body'>
                <h4 class='media-heading'>".$uname."
            <small>&nbsp;&nbsp;发表于".$row['ctime']."</small>
                </h4>
                <p>".$row['cdetails']."。</p>
            </div>
        </div>";
                        }
                    }
                
                //mysql_close();
            ?>
            <!--div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/head_photo.png" alt="头像">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">某某某人
                                <small>&nbsp;&nbsp;发表于7月32日</small>
                            </h4>
                            评论评论评论评论评论评论评论评论评论评论评论。
                        </div>
                    </div-->
                </div>
                <div class="tab-pane fade" id="success">
                          <?php
                    include_once "php/config.php";
                    $sql = "select * from t_publish where  psucceed = '1' order by pid desc ";
                    //and  uid='".$_SESSION['uid']."'我的成功
                    $result = mysql_query($sql);
                    if($result&&mysql_num_rows($result)>0){
                    while ($row = mysql_fetch_array($result)) {
                            //$uid = $row["uid"];

                            $pid = $row["pid"];
                            $uid = $row["uid"];
                            $arr = mysql_fetch_assoc(mysql_query("select * from t_user where uid = '".$uid."' "));
        $uname = $arr['uname'];
        $uheader = $arr['uheader'];
															
															if(empty($row['pimage'])){
																echo "<div class='media'>
            <a class='pull-left' href='#'>
                <img src='upload_images/head_photo/$uheader' class='media-object' alt='头像'>
            </a><div class='media-body'>
                <h4 class='media-heading'>".$uname."
            <small>&nbsp;&nbsp;发表于".$row['ptime']."</small>
                </h4>
                <p>物品名称：".$row['pname']."</p>
                <p>详细描述：".$row['pdetails']."。</p>
                
                        </div>
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>查看详情</a>
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>已成功找到！</a></div>";
															}else{
																	echo "<div class='media'>
            <a class='pull-left' href='#'>
                <img src='upload_images/head_photo/$uheader' class='media-object' alt='头像'>
            </a><div class='media-body'>
                <h4 class='media-heading'>".$uname."
            <small>&nbsp;&nbsp;发表于".$row['ptime']."</small>
                </h4>
                <p>物品名称：".$row['pname']."</p>
                <p>详细描述：".$row['pdetails']."。</p>
                <a href='#' class='thumbnail'>
                                <img src='upload_images/".$row['pimage']."' data-src='holder.js/300x300' alt='物品图片'>
                            </a>
                        </div>
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>查看详情</a>
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>已成功找到！</a></div>";
															}
															
                        
                        }
                    }
                
                mysql_close();
            ?>

                    <!--div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/head_photo.png" alt="头像">
                        </a>

                        <div class="media-body">
                            <h4 class="media-heading">某某某人
                                <small>&nbsp;&nbsp;发表于7月32日</small>
                            </h4>
                            如果仅仅就这一个问题看，显然是看问题的高度不同和认识不同，而导致的立场不同，自然看法也不同。列宁认为帝国主义的世界大战只不过是权势者们争权夺利的豪赌，无论谁输赢，对普通民众都没有什么大的关系，这是符合心理分析理论的看法的。在爱国主义的旗帜下，兜售对外强势，今天美俄如同一撤。
                            <a href="#" class="thumbnail">
                                <img src="images/wu1.jpg" data-src="holder.js/300x300" alt="物品图片">
                            </a>
                        </div>
                        <a href="info.html" class="btn btn-primary pull-right" role="button">查看详情</a>
                        <a href="#" class="btn btn-primary pull-right" disabled role="button">已成功</a>
                    </div-->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="container-fluid" id="bottom">
    <p>Copyright &copy; 2014-<script>document.write(new Date().getFullYear());</script><span><a href="index.php">www.hfutfind.com</a></span> 版权所有 合肥工业大学千寻网</p>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- <script src="js/zone.js"></script> -->
<script src="js/zone.js"></script>
<script src="js/bootstrap-filestyle.min.js"></script>

</body>
</html>