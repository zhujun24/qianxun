<?php
        session_start();
    ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>千寻网--后台管理系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/main-min.css" rel="stylesheet" type="text/css" />
    <link href="Css/style.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    
    
</head>
<body>

<div class="header">

    <div class="dl-title">
        <!--<img src="/chinapost/Public/assets/img/top.png">-->
    </div>
    
    <div class="h3 dl-log">欢迎您，<span class="dl-log-user"><?php echo $_SESSION["uname"];?></span><a href="../logout.php" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
</div>
<div class="content">
    <div class="dl-main-nav">
        <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
        <ul id="J_Nav"  class="nav-list ks-clear">
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">系统管理</div></li>		<li class="nav-item dl-selected"><div class="nav-item-inner nav-order">信息管理</div></li>

        </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
</div>
<script type="text/javascript" src="assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="assets/js/bui-min.js"></script>
<script type="text/javascript" src="assets/js/common/main-min.js"></script>
<script type="text/javascript" src="assets/js/config-min.js"></script>
<script>
    BUI.use('common/main',function(){
        var config = [{id:'1',homePage : '4', menu:[{text:'系统管理',items:[{id:'3',text:'角色管理',href:'Role/index.php'},{id:'4',text:'用户管理',href:'User/index.php'}]}]},{id:'7',homePage : '9',menu:[{text:'业务管理',items:[{id:'9',text:'信息管理',href:'Node/index.php'},{id:'11',text:'评论管理',href:'Node/comment.php'},{id:'14',text:'成功案例',href:'Node/success.php'}]}]}];
        new PageUtil.MainPage({
            modulesConfig : config
        });
    });
</script>
<!-- Footer -->
<div style="text-align:center;" class="container-fluid" id="bottom">
<p>来源：<a href="http://wangali.sinaapp.com/" target="_blank">流管易抛的个人博客</a></p>
<p>Copyright 2014-? <span><a href="index.php">www.hfutfind.com</a></span> 版权所有 合肥工业大学千寻网</p>
</div>

</body>
</html>