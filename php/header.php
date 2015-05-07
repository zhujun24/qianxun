<!--hfutfind.com 代码获取（不想手工添加代码？立刻一键安装）
新版访问分析代码（异步加载）  （请将代码添加至网站全部页面的</head>标签前。查看示例  查看建站工具中的安装方法）
新的升级代码是以异步加载形式加载，统计数据更准确、加载速度更快，代码出错率更小。 -->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?2ef7e98a67ec1cfb8f1b6dcee50de923";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<!--写手机端的页面  -->
<!--meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" /-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="format-detection" content="telephone=no" />

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
            <a class="navbar-brand" href="index.php"><img alt="合肥工业大学--千寻网" src="images/logo.png"></a>
            <a class="navbar-brand" id="brand" href="index.php">千寻网</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
            <ul class="nav navbar-nav">
                <?php 
                    //session_start();
                    error_reporting(0);
                    if(!isset($_SESSION)){ session_start();};
                    $curfile = basename($_SERVER['PHP_SELF']);
                    $file = basename($curfile);
                    //echo $file;
                    if(!empty($_GET["pid"])){
                        $pid =$_GET["pid"];
												include_once "config.php";
                        $arr = mysql_fetch_assoc(mysql_query("select * from t_publish where pid = '".$pid."' "));
                        $ptype = $arr["ptype"];
                        echo $ptype;
                        //print_r($arr);
                        //echo $pid;
                        if($ptype == 1){
                            $file = "zhao_info.php";
                        }
                        if($ptype == 0) {
                            $file = "shi_info.php";
                        }
                        mysql_close();
                    }
                    

                    if($file == "zone.php"){

                ?>
                <li><a href="index.php">首页</a></li>
                <li><a href="zhao_info.php">招领信息</a></li>
                <li><a href="shi_info.php">失物信息</a></li>
                <?php
                if(!empty($_SESSION["uname"])){
                    echo "<li class='active'><a href='zone.php'>个人中心</a></li>";
                    echo "<li><a href='logout.php'>注销</a></li>";
                }else {
                    echo "<li><a href='login.php'>登陆</a></li>";
                	echo "<li><a href='reg.php'>注册</a></li>";
                }
                ?>

                <li><a href="about.php">关于</a></li>
                
                <?php
                    }else if($file == "zhao_info.php"){
                ?>
                <li><a href="index.php">首页</a></li>
                <li class="active"><a href="zhao_info.php">招领信息</a></li>
                <li><a href="shi_info.php">失物信息</a></li>
                <?php
                if(!empty($_SESSION["uname"])){
                    echo "<li><a href='zone.php'>个人中心</a></li>";
                    echo "<li><a href='logout.php'>注销</a></li>";
                }else {
                    echo "<li><a href='login.php'>登陆</a></li>";
                	echo "<li><a href='reg.php'>注册</a></li>";
                }
                ?>

                <li><a href="about.php">关于</a></li>

                <?php
                    }else if($file == "shi_info.php"){
                ?>
                <li><a href="index.php">首页</a></li>
                <li><a href="zhao_info.php">招领信息</a></li>
                <li class="active"><a href="shi_info.php">失物信息</a></li>
                <?php
                
                if(!empty($_SESSION["uname"])){
                    echo "<li><a href='zone.php'>个人中心</a></li>";
                    echo "<li><a href='logout.php'>注销</a></li>";
                }else {
                    echo "<li><a href='login.php'>登陆</a></li>";
                	echo "<li><a href='reg.php'>注册</a></li>";
                }
                ?>

                <li><a href="about.php">关于</a></li>
                
    
                <?php
                    }else if($file == "about.php"){
                ?>
                <li><a href="index.php">首页</a></li>
                <li><a href="zhao_info.php">招领信息</a></li>
                <li><a href="shi_info.php">失物信息</a></li>
                <?php
                if(!empty($_SESSION["uname"])){
                    echo "<li><a href='zone.php'>个人中心</a></li>";
                    echo "<li><a href='logout.php'>注销</a></li>";
                }else {
                    echo "<li><a href='login.php'>登陆</a></li>";
                	echo "<li><a href='reg.php'>注册</a></li>";
                }
                ?>

                <li class="active"><a href="about.php">关于</a></li>
                

                <?php
                    }else if($file == "login.php"){
                ?>
                <li><a href="index.php">首页</a></li>
                <li><a href="zhao_info.php">招领信息</a></li>
                <li><a href="shi_info.php">失物信息</a></li>
                <?php
                if(!empty($_SESSION["uname"])){
                    echo "<li><a href='zone.php'>个人中心</a></li>";
                    echo "<li><a href='logout.php'>注销</a></li>";
                }else {
                    echo "<li class='active'><a href='login.php'>登陆</a></li>";
                	echo "<li><a href='reg.php'>注册</a></li>";
                }
                ?>

                <li><a href="about.php">关于</a></li>
                
                
                <?php
                    }else if($file == "reg.php"){
                ?>
                <li><a href="index.php">首页</a></li>
                <li><a href="zhao_info.php">招领信息</a></li>
                <li><a href="shi_info.php">失物信息</a></li>
                <?php
                if(!empty($_SESSION["uname"])){
                    echo "<li><a href='zone.php'>个人中心</a></li>";
                    echo "<li><a href='logout.php'>注销</a></li>";
                }else {
                    echo "<li><a href='login.php'>登陆</a></li>";
                	echo "<li  class='active'><a href='reg.php'>注册</a></li>";
                }
                ?>

                <li><a href="about.php">关于</a></li>
                

                <?php
                    }else if($file == "logout.php"){
                ?>
                <li><a href="index.php">首页</a></li>
                <li><a href="zhao_info.php">招领信息</a></li>
                <li><a href="shi_info.php">失物信息</a></li>
                <?php
                if(!empty($_SESSION["uname"])){
                    echo "<li><a href='zone.php'>个人中心</a></li>";
                    echo "<li class='active'><a href='logout.php'>注销</a></li>";
                }else {
                    echo "<li><a href='login.php'>登陆</a></li>";
                	echo "<li><a href='reg.php'>注册</a></li>";
                }
                ?>

                <li><a href="about.php">关于</a></li>
                

                <?php
                    }else{
                ?>
                <li class="active"><a href="index.php">首页</a></li>
                <li><a href="zhao_info.php">招领信息</a></li>
                <li><a href="shi_info.php">失物信息</a></li>
                <?php
                if(!empty($_SESSION["uname"])){
                    echo "<li><a href='zone.php'>个人中心</a></li>";
                    echo "<li><a href='logout.php'>注销</a></li>";
                }else {
                    echo "<li><a href='login.php'>登陆</a></li>";
                	echo "<li><a href='reg.php'>注册</a></li>";
                }
                ?>

                <li><a href="about.php">关于</a></li>
                
                <?php
                    }
                ?>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li>
                    <form class="navbar-form navbar-right" role="search" action="shi_info.php" method="post">
                        <div class="form-group">
                            
                            <div class="input-group">
                            <div class="input-group-btn">
                                <select class="form-control" role="menu" name="item">
                                    <option value="">所有物品</option>
                                    <option value="卡类证件">卡类证件</option>
                                    <option value="随身物品">随身物品</option>
                                    <option value="书籍文具">书籍文具</option>
                                    <option value="电子数码">电子数码</option>
                                    <option value="衣服饰品">衣服饰品</option>
                                    <option value="其他物品">其他物品</option>
                                </select>
                            </div>
                            <!-- <input type="text" class="form-control"> -->
                            <input type="text" name="search" class="form-control" placeholder="想找什么物品呢？">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary btn-default">搜索</button>
                            </span>
                            </div>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary btn-default">搜索</button> -->
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
