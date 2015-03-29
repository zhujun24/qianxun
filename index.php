<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>千寻网--合肥工业大学失物招领</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
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
include_once "php/conn.php";
include_once "php/config.php";

    $result = mysql_query("SELECT * FROM t_publish where psucceed='1' ");
    $num_rows = mysql_num_rows($result);
    //成功总记录数
    //mysql_close();
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
        <div class="col-lg-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h1 class="panel-title">Hi!亲们：</h1>
                </div>
                <div class="panel-body">
                    <h3>在这儿发布失物招领信息哦!</h3>
                    <br/>
                    <a href="publish.php" class="btn btn-info btn-lg btn-block" role="button">我丢宝贝啦</a>
                    <br/>
                    <a href="publish.php" class="btn btn-info btn-lg btn-block" role="button">我捡到宝贝啦</a>

                    <h3>已成功帮<span><?php echo $num_rows;?></span>件宝贝找到主人!</h3>

                    <h3>在工大 失物招领就上千寻网!</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#home" role="tab" data-toggle="tab">招领信息</a></li>
                <li class=""><a href="#profile" role="tab" data-toggle="tab">失物信息</a></li>
                <li class="dropdown">
                    <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">查看更多
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                        <li class=""><a role="menuitem" tabindex="-1" href="zhao_info.php">更多招领信息</a></li>
                        <li class=""><a role="menuitem" tabindex="-1" href="shi_info.php">更多失物信息</a></li>
                    </ul>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="home">
                    <table class="table table-hover table-responsive">
                        <thead>
                        <tr>
                            <th>类型</th>
                            <th>名称</th>
                            <th>地点</th>
                            <th>时间</th>
                            <th>详情</th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                <?php
										include_once "php/config.php";
                    $sql = "select * from t_publish where ptype = '1'  order by pid desc limit 8";
                    // $rowsArray = $conne -> getRowsArray($sql);
                    $result = mysql_query($sql);
                    if($result&&mysql_num_rows($result)>0){
                        $i = 0;
                        while ($row = mysql_fetch_array($result)) {
                            //if($row['pdetails'].)
                            $i++;
                            if(($i)%2 == 1){
                        echo "<tr><td>".$row['pitem']."</td>
                            <td>".mb_substr($row['pname'] , 0 , 5,'utf-8')."</td>
                            <td>".$row['plocation']."</td>
                            <td>".mb_substr($row['ptime'] , 0 , 10,'utf-8')."</td>
                            <td>".mb_substr($row['pdetails'] , 0 , 21,'utf-8')."...</td>
                            <td><a href='info.php?pid=".$row['pid']." '>查看具体</a></td></tr>";
                        }else {
                            echo "<tr class='info'><td>".$row['pitem']."</td>
                            <td>".mb_substr($row['pname'] , 0 , 5,'utf-8')."</td>
                            <td>".$row['plocation']."</td>
                            <td>".mb_substr($row['ptime'] , 0 , 10,'utf-8')."</td>
                            <td>".mb_substr($row['pdetails'] , 0 , 19,'utf-8')."...</td>
                            <td><a href='info.php?pid=".$row['pid']." '>查看具体</a></td></tr>";
                        }
                    }
                }
                //mysql_close();
            ?>
                        
                        
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="profile">
                    <table class="table table-hover table-responsive">
                        <thead>
                        <tr>
                            <th>类型</th>
                            <th>名称</th>
                            <th>地点</th>
                            <th>时间</th>
                            <th>详情</th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php

                    //include_once "php/config.php";
                    $sql = "select * from t_publish where ptype = '0'  order by pid desc limit 8";
                    // $rowsArray = $conne -> getRowsArray($sql);
                    $result = mysql_query($sql);
                    if($result&&mysql_num_rows($result)>0){
                        $i = 0;
                        while ($row = mysql_fetch_array($result)) {
                            //if($row['pdetails'].)
                            $i++;
                            if(($i)%2 == 1){
                        echo "<tr><td>".$row['pitem']."</td>
                            <td>".mb_substr($row['pname'] , 0 , 5,'utf-8')."</td>
                            <td>".$row['plocation']."</td>
                            <td>".mb_substr($row['ptime'] , 0 , 10,'utf-8')."</td>
                            <td>".mb_substr($row['pdetails'] , 0 , 16,'utf-8')."</td>
                            <td><a href='info.php?pid=".$row['pid']."'>查看具体</a></td></tr>";
                        }else {
                            echo "<tr class='info'><td>".$row['pitem']."</td>
                            <td>".mb_substr($row['pname'] , 0 , 5,'utf-8')."</td>
                            <td>".$row['plocation']."</td>
                            <td>".mb_substr($row['ptime'] , 0 , 10,'utf-8')."</td>
                            <td>".mb_substr($row['pdetails'] , 0 , 16,'utf-8')."</td>
                            <td><a href='info.php?pid=".$row['pid']."'>查看具体</a></td></tr>";
                        }
                    }
                }
                //mysql_close();
            ?>
                        
                        
                        </tbody>
                    </table>
                </div>
            </div>
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
<!-- hfutfind.com Baidu tongji analytics -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");

document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F2ef7e98a67ec1cfb8f1b6dcee50de923' type='text/javascript'%3E%3C/script%3E"));

</script>
</body>
</html>