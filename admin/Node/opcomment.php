<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../Css/style.css" />
    <script type="text/javascript" src="../Js/jquery.js"></script>
    
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
$cid = $_GET['cid'];
$op = $_GET['op'];
if(!empty($cid)){
    $arr = mysql_fetch_assoc(mysql_query("select * from t_comment where cid = '".$cid."' "));
        
        $cid = $arr['cid'];
        $pid = $arr['pid'];
        $ctime = $arr['ctime'];
        $cdetails = $arr['cdetails'];

        $uid = $arr['uid'];
        $array = mysql_fetch_assoc(mysql_query("select * from t_user where uid = '".$uid."' "));
        $uname = $array['uname'];

        $parray = mysql_fetch_assoc(mysql_query("select * from t_publish where pid = '".$pid."' "));
        $pname = $parray['pname'];

    if($op == "look"){
        //echo $op;
?>
    <table style="margin:40px 0 0 30px;" class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">评论文章</td>
            <td><?php  echo $pname;?></td>
        </tr>
        
        <tr>
            <td width="10%" class="tableleft">评论人</td>
            <td><?php  echo $uname;?></td>
        </tr>
        <tr>
            <td width="10%" class="tableleft">评论时间</td>
            <td><?php  echo $ctime;?></td>
        </tr>
        <tr>
            <td class="tableleft">详情</td>
            <td ><?php  echo $cdetails;?></td>
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td><a href="comment.php">
            <button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button></a>
            </td>
        </tr>
    </table>

<?php

    }else if($op=="del"){

        include_once "../../php/conn.php";
        include_once "../../php/function.php";

        $insql = "delete from t_comment where cid='$cid'";
            //执行插入
        $rowsNum = $conne->uidRst($insql);
        if($rowsNum)
        {
            $conne->close_conn();
            echo_message("删除成功！",6);   
        }else {
            //出错
            echo $conne->msg_error();   
        }


?>

<?php
    }
   
}

?>


</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="{:U('Node/index')}";
		 });

    });
</script>