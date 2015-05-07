<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../Css/style.css" />
    <script type="text/javascript" src="../Js/jquery.js"></script>
    <script type="text/javascript" src="../Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="../Js/bootstrap.js"></script>
    <script type="text/javascript" src="../Js/ckform.js"></script>
    <script type="text/javascript" src="../Js/common.js"></script>

 

    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<body>
<?php
include_once "../../php/config.php";

//print_r($_GET);
$uid = $_GET['uid'];
$op = $_GET['op'];
if(!empty($uid)){
    $arr = mysql_fetch_assoc(mysql_query("select * from t_user where uid = '".$uid."' "));
        
        $uid = $arr['uid'];
        $uname = $arr['uname'];
        $uheader = $arr['uheader'];
        $uemail = $arr['uemail'];
        $upwd = $arr['upwd'];
        $uqq = $arr['uqq'];
        $utel = $arr['utel'];
        $upower = $arr['upower'];

    if($op == "look"){
        //echo $op;
?>
    <table style="margin:40px 0 0 30px;" class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">昵称</td>
            <td><?php  echo $uname;?></td>
        </tr>
        <tr>
            <td class="tableleft">个人头像</td>
            <td><img src="../../upload_images/head_photo/<?php 
        echo $uheader;?>" class="pull-left"></td>
        </tr>
        <tr>
            <td class="tableleft">邮箱</td>
            <td><?php  echo $uemail;?></td>
        </tr>
        <tr>
            <td class="tableleft">密码</td>
            <td><?php  echo $upwd;?></td>
        </tr>
        <tr>
            <td class="tableleft">手机</td>
            <td><?php  echo $utel;?></td>
        </tr>
        <tr>
            <td class="tableleft">QQ</td>
            <td><?php  echo $uqq;?></td>
        </tr>
        <tr>
            <td class="tableleft">权限</td>
            <td><?php  echo $upower;?></td>
        </tr>
        <?php if($upower==9){
        ?>
        <tr>
            <td class="tableleft">角色</td>
            <td>管理员</td>
        </tr>
        <?php }else{
        ?>
        <tr>
            <td class="tableleft">角色</td>
            <td>普通用户</td>
        </tr>
        <?php }?>
        <tr>
            <td class="tableleft"></td>
            <td><a href="index.php">
            <button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button></a>
            </td>
        </tr>
    </table>

<?php
    }else if($op == "edit"){

?>
<form action="oopuser.php" class="definewidth m20">
<input type="hidden" name="uid" value="<?php echo $uid;?>"/>
<input type="hidden" name="op" value="editdeal"/>
<table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">昵称</td>
            <td><input type="text" name="name" value="<?php echo $uname;?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">个人头像</td>
            <td><img src="../../upload_images/head_photo/<?php 
        echo $uheader;?>" class="pull-left"></td>
        </tr>
        <tr>
            <td class="tableleft">邮箱</td>
            <td><input type="text" name="email" value="<?php echo $uemail;?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">密码</td>
            <td><input type="text" name="password" value="<?php echo $upwd;?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">手机</td>
            <td><input type="text" name="phone" value="<?php echo $utel;?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">QQ</td>
            <td><input type="text" name="qq" value="<?php echo $uqq;?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">权限</td>
            <td><input type="text" name="power" value="<?php echo $upower;?>"/></td>
        </tr>
        <?php if($upower==9){
        ?>
        <tr>
            <td class="tableleft">角色</td>
            <td>管理员</td>
        </tr>
        <?php }else{
        ?>
        <tr>
            <td class="tableleft">角色</td>
            <td>普通用户</td>
        </tr>
        <?php }?>
        <tr>
            <td class="tableleft"></td>
            <td>
            <button type="submit" class="btn btn-primary" type="button">保存</button>&nbsp;&nbsp;
            <a href="index.php">
            <button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button></a>
            </td>
        </tr>
    </table>
    </form>

<?php

    }else if($op=="del"){

        include_once "../../php/conn.php";
        include_once "../../php/function.php";

        $csql = "delete from t_comment where uid='$uid'";

        $rowsNum = $conne->uidRst($csql);
        if($rowsNum)
        {
            echo "评论删除！";
            $psql = "delete from t_publish where uid='$uid'";

            $rowsNum = $conne->uidRst($psql);
            if($rowsNum)
            {   
                echo "信息删除！";

                $usql = "delete from t_user where uid='$uid'";

                $rowsNum = $conne->uidRst($usql);
                if($rowsNum)
                {   
                    echo "用户删除！";
                    $conne->close_conn();
                    echo_message("删除成功！",3);                       
                }else{
                    echo "用户删除?";
                }

            }else{
                    echo "信息删除?";
                }   
            
        }else {
            //出错
            echo $conne->msg_error();   
        }

        // $insql = "delete from t_user where uid='$uid'";
        //     //执行插入
        // $rowsNum = $conne->uidRst($insql);
        // if($rowsNum)
        // {
        //     $conne->close_conn();
        //     echo_message("删除成功！",3);   
        // }else {
        //     //出错
        //     echo $conne->msg_error();   
        // }


?>

<?php
    }
   
}else if($op=="add"){
    ?>

<form action="oopuser.php"  class="definewidth m20">
<input type="hidden" name="op" value="adddeal"/>
<table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">昵称</td>
            <td><input type="text" name="name" value=""/></td>
        </tr>
        <tr>
            <td class="tableleft">邮箱</td>
            <td><input type="text" name="email" value=""/></td>
        </tr>
        <tr>
            <td class="tableleft">密码</td>
            <td><input type="text" name="password" value=""/></td>
        </tr>
        <tr>
            <td class="tableleft">手机</td>
            <td><input type="text" name="phone" value=""/></td>
        </tr>
        <tr>
            <td class="tableleft">QQ</td>
            <td><input type="text" name="qq" value=""/></td>
        </tr>
        <tr>
            <td class="tableleft">权限</td>
            <td><input type="text" name="power" value=""/></td>
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td>
            <button type="submit" class="btn btn-primary" type="button">保存</button>&nbsp;&nbsp;
            <a href="index.php">
            <button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button></a>
            </td>
        </tr>
    </table>
    </form>


<?php
}

?>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="{:U('User/index')}";
		 });

    });
</script>