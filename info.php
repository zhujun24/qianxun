<?php
error_reporting(0);
include_once "php/function.php";
if (!isset($_SESSION)) {
    session_start();
};
//if(empty($_SESSION['uid'])){
//    echo_message("请先注册登录后，才可以查看具体信息！",3);
//}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>千寻网--合肥工业大学失物招领</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/info.css" rel="stylesheet">
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
mysql_query("set names 'utf8'");    
$sql = "select * from t_publish where pid= '" . $_GET['pid'] . "' ";
$num = $conne->getRowsNum($sql);
if ($num >= 1)
{
//如果存在
//echo "1";
$rst = $conne->getRowsRst($sql);
//print_r($rst);
$uid = $rst["uid"];
include_once "php/config.php";
$arr = mysql_fetch_assoc(mysql_query("select * from t_user where uid = '" . $uid . "' "));
$uname = $arr['uname'];
$uemail = $arr['uemail'];
$utel = $arr['utel'];
$uqq = $arr['uqq'];
$uheader = $arr['uheader'];

$pname = $rst["pname"];
$pitem = $rst["pitem"];
$pid = $rst["pid"];
$ptime = $rst["ptime"];
$pdate = $rst["pdate"];
$plocation = $rst["plocation"];
$pdetails = $rst["pdetails"];
$pimage = $rst["pimage"];
$ptype = $rst["ptype"];
if ($ptype == 1) {
    $ptype = "丢失";
    //$pusername="失主";
} else {
    $ptype = "拾取";
    //$pusername="拾取主";
}


?>
    <!-- Body Main -->
<div class="container">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="upload_images/head_photo/<?php echo $uheader;?>" alt="头像"
                     style="width: 100px;height: 100px;border-radius: 10px;">
            </a>

            <div class="media-body">
                <h3 class="media-heading"><?php echo $uname;?>
                    <small>&nbsp;&nbsp;发表于<?php echo $ptime;?></small>
                </h3>
                <br/>
                <h4 class="media-heading">物品类型
                    <strong>&nbsp;&nbsp;<?php echo $pitem;?></strong>
                </h4>
                <br/>
                <h4 class="media-heading">物品名称:
                    <strong>&nbsp;&nbsp;<?php echo $pname;?></strong>
                </h4>
                <br/>
                <h4 class="media-heading">物品<?php echo $ptype;?>时间:
                    <strong>&nbsp;&nbsp;<?php echo $pdate;?></strong>
                </h4>
                <br/>
                <h4 class="media-heading">物品<?php echo $ptype;?>地点:
                    <strong>&nbsp;&nbsp;<?php echo $plocation;?></strong>
                </h4>
                <br/>
                <h4 class="media-heading"><?php echo $ptype;?>物品的人手机:
                    <strong>&nbsp;&nbsp;<?php echo $utel;?></strong>
                </h4>
                <br/>
                <h4 class="media-heading"><?php echo $ptype;?>物品的人QQ:
                    <strong>&nbsp;&nbsp;<?php echo $uqq;?></strong>
                </h4>
                <br/>
                <h4 class="media-heading"><?php echo $ptype;?>物品的人QQ:
                    <strong>&nbsp;&nbsp;<?php echo $uemail;?></strong>
                </h4>
                <br/>
                <h4 class="media-heading">详情：
                    <strong>&nbsp;&nbsp;</strong><span style="line-height: 28px;"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $pdetails;?></span>
                </h4>

                <br/>
                <?php
                if (!empty($pimage)) {
                    ?>
                    <a href="#" class="thumbnail">
                        <img src="upload_images/<?php echo $pimage;?>" data-src="holder.js/300x300" alt="物品图片">
                    </a>
                <?php
                }
                ?>
            </div>
            <?php
            //include_once "php/config.php";
            $arr1 = mysql_fetch_assoc(mysql_query("select * from t_publish where pid='" . $pid . "' "));
            $psucceed = $arr1["psucceed"];
            if ($psucceed == 1) {
                ?>

                <button onclick="alert('已成功找到!')" class="btn btn-primary pull-right">已成功找到 !</button>
            <?php
            } else {
                ?>
                <form class="form-horizontal" role="form" action="php/info.php" method="post">
                    <input type="hidden" name="pid" value="<?php echo $pid;?>">
                    <input type="hidden" name="psucceed" value='1'>
                    <button type="submit" class="btn btn-primary pull-right">成功找到？</button>
                </form>
            <?php
            }
            //mysql_close();
            ?>

        </div>

        <?php

        //include_once "config.php";
        $sql = "select * from t_comment  where pid='$pid' ";
        // $rowsArray = $conne -> getRowsArray($sql);
        $result = mysql_query($sql);
        if ($result && mysql_num_rows($result) > 0) {
            $i = 0;
            while ($row = mysql_fetch_array($result)) {
                $uid = $row["uid"];
                $arr = mysql_fetch_assoc(mysql_query("select * from t_user where uid = '" . $uid . "' "));
                $uname = $arr['uname'];
                $uheader = $arr['uheader'];
                echo "<div class='media'>
									            <a class='pull-left' href='#'>
									                <img src='upload_images/head_photo/$uheader' class='media-object' alt='头像' style='width: 100px;height: 100px;border-radius: 10px;'>
									            </a><div class='media-body'>
									                <h4 class='media-heading'>" . $uname . "
									            <small>&nbsp;&nbsp;发表于" . $row['ctime'] . "</small>
									                </h4>
									                <p>" . $row['cdetails'] . "。</p>
									            </div>
        											</div>";
            }
        }
        mysql_close();
        $conne->close_conn();
        }
        else if ($num == 0) {

            $conne->close_conn();
            echo_message("查询查错！", 3);
        }
        ?>

        <div class="media">
            <form class="form-horizontal" role="form" action="php/info.php" method="post">
                <input type="hidden" name="pid" value="<?php echo $pid; ?>">

                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea name="cdetails" class="form-control" rows="3" placeholder="我要说点啥……"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-info">发表评论</button>
                    </div>
                </div>
            </form>
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

<!-- hfutfind.com Baidu tongji analytics -->
<script type="text/javascript">
    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F2ef7e98a67ec1cfb8f1b6dcee50de923' type='text/javascript'%3E%3C/script%3E"));</script>

</body>
</html>