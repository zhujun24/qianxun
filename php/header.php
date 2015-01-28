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
            <a class="navbar-brand" href="index.html"><img alt="合肥工业大学--千寻网" src="images/logo.png"></a>
            <a class="navbar-brand" id="brand" href="index.php">千寻网</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php
                //session_start();
                error_reporting(0);
                if (!isset($_SESSION)) {
                    session_start();
                };
                $curfile = basename($_SERVER['PHP_SELF']);
                $file = basename($curfile);
                //echo $file;
                if (!empty($_GET["pid"])) {
                    $pid = $_GET["pid"];
                    include_once "config.php";
                    $arr = mysql_fetch_assoc(mysql_query("select * from t_publish where pid = '" . $pid . "' "));
                    $ptype = $arr["ptype"];
                    echo $ptype;
                    //print_r($arr);
                    //echo $pid;
                    if ($ptype == 1) {
                        $file = "zhao_info.php";
                    }
                    if ($ptype == 0) {
                        $file = "shi_info.php";
                    }
                    mysql_close();
                }


                if ($file == "zone.php") {

                    ?>
                    <li><a href="index.php">首页</a></li>
                    <li><a href="zhao_info.php">招领信息</a></li>
                    <li><a href="shi_info.php">失物信息</a></li>
                    <?php
                    if (!empty($_SESSION["uname"])) {
                        echo "<li class='active'><a href='zone.php'>个人中心</a></li>";
                        echo "<li><a href='logout.php'>注销</a></li>";
                    } else {
                        echo "";
                    }
                    ?>

                    <li><a href="about.php">关于</a></li>
                    <li><a href="login.php">登陆</a></li>
                    <li><a href="reg.php">注册</a></li>
                <?php
                } else if ($file == "zhao_info.php") {
                    ?>
                    <li><a href="index.php">首页</a></li>
                    <li class="active"><a href="zhao_info.php">招领信息</a></li>
                    <li><a href="shi_info.php">失物信息</a></li>
                    <?php
                    if (!empty($_SESSION["uname"])) {
                        echo "<li><a href='zone.php'>个人中心</a></li>";
                        echo "<li><a href='logout.php'>注销</a></li>";
                    } else {
                        echo "";
                    }
                    ?>

                    <li><a href="about.php">关于</a></li>
                    <li><a href="login.php">登陆</a></li>
                    <li><a href="reg.php">注册</a></li>

                <?php
                } else if ($file == "shi_info.php") {
                    ?>
                    <li><a href="index.php">首页</a></li>
                    <li><a href="zhao_info.php">招领信息</a></li>
                    <li class="active"><a href="shi_info.php">失物信息</a></li>
                    <?php

                    if (!empty($_SESSION["uname"])) {
                        echo "<li><a href='zone.php'>个人中心</a></li>";
                        echo "<li><a href='logout.php'>注销</a></li>";
                    } else {
                        echo "";
                    }
                    ?>

                    <li><a href="about.php">关于</a></li>
                    <li><a href="login.php">登陆</a></li>
                    <li><a href="reg.php">注册</a></li>

                <?php
                } else if ($file == "about.php") {
                    ?>
                    <li><a href="index.php">首页</a></li>
                    <li><a href="zhao_info.php">招领信息</a></li>
                    <li><a href="shi_info.php">失物信息</a></li>
                    <?php
                    if (!empty($_SESSION["uname"])) {
                        echo "<li><a href='zone.php'>个人中心</a></li>";
                        echo "<li><a href='logout.php'>注销</a></li>";
                    } else {
                        echo "";
                    }
                    ?>

                    <li class="active"><a href="about.php">关于</a></li>
                    <li><a href="login.php">登陆</a></li>
                    <li><a href="reg.php">注册</a></li>

                <?php
                } else if ($file == "login.php") {
                    ?>
                    <li><a href="index.php">首页</a></li>
                    <li><a href="zhao_info.php">招领信息</a></li>
                    <li><a href="shi_info.php">失物信息</a></li>
                    <?php
                    if (!empty($_SESSION["uname"])) {
                        echo "<li><a href='zone.php'>个人中心</a></li>";
                        echo "<li><a href='logout.php'>注销</a></li>";
                    } else {
                        echo "";
                    }
                    ?>

                    <li><a href="about.php">关于</a></li>
                    <li class="active"><a href="login.php">登陆</a></li>
                    <li><a href="reg.php">注册</a></li>

                <?php
                } else if ($file == "reg.php") {
                    ?>
                    <li><a href="index.php">首页</a></li>
                    <li><a href="zhao_info.php">招领信息</a></li>
                    <li><a href="shi_info.php">失物信息</a></li>
                    <?php
                    if (!empty($_SESSION["uname"])) {
                        echo "<li><a href='zone.php'>个人中心</a></li>";
                        echo "<li><a href='logout.php'>注销</a></li>";
                    } else {
                        echo "";
                    }
                    ?>

                    <li><a href="about.php">关于</a></li>
                    <li><a href="login.php">登陆</a></li>
                    <li class="active"><a href="reg.php">注册</a></li>

                <?php
                } else if ($file == "logout.php") {
                    ?>
                    <li><a href="index.php">首页</a></li>
                    <li><a href="zhao_info.php">招领信息</a></li>
                    <li><a href="shi_info.php">失物信息</a></li>
                    <?php
                    if (!empty($_SESSION["uname"])) {
                        echo "<li><a href='zone.php'>个人中心</a></li>";
                        echo "<li class='active'><a href='logout.php'>注销</a></li>";
                    } else {
                        echo "";
                    }
                    ?>

                    <li><a href="about.php">关于</a></li>
                    <li><a href="login.php">登陆</a></li>
                    <li><a href="reg.php">注册</a></li>

                <?php
                } else {
                    ?>
                    <li class="active"><a href="index.php">首页</a></li>
                    <li><a href="zhao_info.php">招领信息</a></li>
                    <li><a href="shi_info.php">失物信息</a></li>
                    <?php
                    if (!empty($_SESSION["uname"])) {
                        echo "<li><a href='zone.php'>个人中心</a></li>";
                        echo "<li><a href='logout.php'>注销</a></li>";
                    } else {
                        echo "";
                    }
                    ?>

                    <li><a href="about.php">关于</a></li>
                    <li><a href="login.php">登陆</a></li>
                    <li><a href="reg.php">注册</a></li>
                <?php
                }
                ?>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li>
                    <form class="navbar-form navbar-right" role="search" action="shi_info.php" method="post">
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
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">搜索</button>
                            </span>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
