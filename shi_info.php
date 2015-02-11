<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>千寻网--合肥工业大学失物招领</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
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
//error_reporting(0);
include_once "php/header.php";
include_once "php/function.php";

if(!empty($_POST["search"])){
    if(empty($_SESSION["uid"])){
        echo_message("请先注册登录后，才可以搜索信息！",3);    
    }
    
}
?>
<!-- Body Main -->
<div class="container">
    <div class="jumbotron">
        <img src="images/hfutphoto1.jpg" alt="合肥工业大学--千寻网" id="bg">

        <h1>你好 欢迎来到千寻网！</h1>

        <p>这里是千寻网，专注于合肥工业大学失物招领，我们致力于帮每一件宝贝找到它的主人！</p>

        <p>
            <a href="introduction.html" class="btn btn-primary" role="button">阅读使用说明</a>
            <a href="http://weibo.com" class="btn btn-primary btn-success" role="button"><span
                    class="glyphicon glyphicon-plus"></span>关注</a>
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
                    // $email = stripslashes(trim($_POST['mail']));
                    // $email = injectChk($email);
                      if(!empty($_POST["search"])){
                        $search = stripslashes(trim($_POST['search']));
                        $item = stripslashes(trim($_POST['item']));
                        if(!empty($item)){
                            $sql = "select * from t_publish where pitem = '".$item."' and ptype='0' and pname like '%".$search."%' order by pid desc "; 
                        }else{
                            $sql = "select * from t_publish where ptype='0' and pname like '%".$search."%' order by pid desc "; 
                        }
                        //$search = injectChk($search);
                        
                    }else{
                        $item = stripslashes(trim($_POST['item']));
                       if(!empty($item)){
                            $sql = "select * from t_publish where pitem = '".$item."' and ptype='0' order by pid desc "; 
                        }else{
                            $sql = "select * from t_publish where ptype='0' order by pid desc "; 
                        }
                        //$sql = "select * from t_publish where  ptype='0' order by pid desc ";
                    }

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
                <img class='media-object' src='upload_images/head_photo/".$uheader." ' alt='头像'>
            </a><div class='media-body'>
                <h4 class='media-heading'>".$uname."
            <small>&nbsp;&nbsp;发表于".$row['ptime']."</small>
                </h4>
                <p>物品名称：".$row['pname']."</p>
                <p>丢失地点：".$row['plocation']."</p>
                <p>详细描述：".$row['pdetails']."。</p>
                
                        </div>
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>查看详情</a>
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>成功找到？</a>
            
        </div>";    	
                            	}else{
                        echo "<div class='media'>
            <a class='pull-left' href='#'>
                <img class='media-object' src='upload_images/head_photo/".$uheader." ' alt='头像'>
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
                        <a href='info.php?pid=$pid' class='btn btn-primary pull-right' role='button'>成功找到？</a>
            
        </div>";
      														}
                        }
                    }else{
                        echo "<script charset='utf-8' type='text/javascript'>alert('您所查找的物品不存在！');</script>";
                    }
                
                mysql_close();
            ?>

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
                        <img src="images/log.jpg" data-src="holder.js/300x300" alt="物品图片">
                    </a>
                </div>
                <a href="info.html" class="btn btn-primary pull-right" role="button">查看详情</a>
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
                        <img src="images/wu3.jpg" data-src="holder.js/300x300" alt="物品图片">
                    </a>
                </div>
                <a href="info.html" class="btn btn-primary pull-right" role="button">查看详情</a>
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
                        <img src="images/wu2.jpg" data-src="holder.js/300x300" alt="物品图片">
                    </a>
                </div>
                <a href="info.html" class="btn btn-primary pull-right" role="button">查看详情</a>
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
                        <img src="images/wu3.jpg" data-src="holder.js/300x300" alt="物品图片">
                    </a>
                </div>
                <a href="info.html" class="btn btn-primary pull-right" role="button">查看详情</a>
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
                        <img src="images/wu2.jpg" data-src="holder.js/300x300" alt="物品图片">
                    </a>
                </div>
                <a href="info.html" class="btn btn-primary pull-right" role="button">查看详情</a>
            </div>
            <h4 class="center"></h4>
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

<script src="js/index.js"></script>
<script src="js/waterfall.js"></script>
</body>
</html>