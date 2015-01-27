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
$pid = $_GET['pid'];
$op = $_GET['op'];
if(!empty($pid)){
    $arr = mysql_fetch_assoc(mysql_query("select * from t_publish where pid = '".$pid."' "));
        
        $pid = $arr['pid'];
        $pname = $arr['pname'];
        $pitem = $arr['pitem'];
        $plocation = $arr['plocation'];
        $pimage = $arr['pimage'];
        $ptime = $arr['ptime'];
        $pdetails = $arr['pdetails'];
        $psucceed = $arr['psucceed'];
        $uid = $arr['uid'];
        $array = mysql_fetch_assoc(mysql_query("select * from t_user where uid = '".$uid."' "));
        $uname = $array['uname'];

    if($op == "look"){
        //echo $op;
?>
    <table style="margin:40px 0 0 30px;" class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">物品名称</td>
            <td><?php  echo $pname;?></td>
        </tr>
        <tr>
            <td width="10%" class="tableleft">物品类型</td>
            <td><?php  echo $pitem;?></td>
        </tr>
        <tr>
            <td width="10%" class="tableleft">发布者</td>
            <td><?php  echo $uname;?></td>
        </tr>
        <tr>
            <td width="10%" class="tableleft">发布时间</td>
            <td><?php  echo $ptime;?></td>
        </tr>
        <tr>
            <td class="tableleft">物品图片</td>
            <td><img src="../../upload_images/<?php 
        echo $pimage;?>" class="pull-left"></td>
        </tr>
        <tr>
            <td class="tableleft">地点</td>
            <td><?php  echo $plocation;?></td>
        </tr>
        <tr>
            <td class="tableleft">详情</td>
            <td ><?php  echo $pdetails;?></td>
        </tr>
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
<form action="oopinfo.php" class="definewidth m20">
<input type="hidden" name="pid" value="<?php echo $pid;?>"/>
<input type="hidden" name="op" value="editdeal"/>
        <table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">物品名称</td>
            <td><input type="text" name="name" value="<?php echo $pname;?>"/></td>
        </tr>
        <tr>
            <td width="10%" class="tableleft">物品类型</td>
            <td><input type="text" name="item" value="<?php echo $pitem;?>"/></td>
        </tr>
        <tr>
            <td width="10%" class="tableleft">发布者</td>
            <td><?php echo $uname;?></td>
        </tr>
        <tr>
            <td width="10%" class="tableleft">发布时间</td>
            <td><input type="text" name="time" value="<?php echo $ptime;?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">物品图片</td>
            <td><img src="../../upload_images/<?php 
        echo $pimage;?>" class="pull-left"></td>
        </tr>
        <tr>
            <td class="tableleft">地点</td>
            <td><input type="text" name="location" value="<?php echo $plocation;?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">详情</td>
            <td>
            <textarea 
                                name="details" 
                                id="textarea" class="form-control" rows="6"
                                
                                          placeholder="详细说明失物招领信息，不超过200字"><?php echo $pdetails;?></textarea>
                                          </td>
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td><button type="submit" class="btn btn-primary" type="button">保存</button>&nbsp;&nbsp;
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

        $csql = "delete from t_comment where pid='$pid'";

        $rowsNum = $conne->uidRst($csql);
        if($rowsNum)
        {
            echo "评论删除！";
            $psql = "delete from t_publish where pid='$pid'";

            $rowsNum = $conne->uidRst($psql);
            if($rowsNum)
            {   
                echo "信息删除！";
                $conne->close_conn();
                echo_message("删除成功！",3);

            }else{
                    echo "信息删除?";
                    $conne->close_conn();
                }   
            
        }else {
            //出错
            echo $conne->msg_error();   
        }


?>

<?php
    }
   
}else if($op=="add"){
    ?>
<form action="oopinfo.php" class="definewidth m20">
<input type="hidden" name="op" value="adddeal"/>
        <table  class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">物品名称</td>
            <td><input type="text" name="name" /></td>
        </tr>
        <tr>
            <td width="10%" class="tableleft">物品类型</td>
            <td>
            <select name="item" >
                <option value="卡类证件">卡类证件</option>
                <option value="随身物品">随身物品</option>
                <option value="书籍文具">书籍文具</option>
                <option value="电子数码">电子数码</option>
                <option value="衣服饰品">衣服饰品</option>
                <option value="其他物品">其他物品</option>
            </select>
            </td>
        </tr>
        <tr>
            <td width="10%" class="tableleft">发布者</td>
            <td>
                <input type="text" name="uname" value="<?php echo $_SESSION["uname"];?>"/></td>
            </td>
        </tr>
        <tr>
            <td class="tableleft">物品图片</td>
            <td><img src="../../upload_images/1.jpg" class="pull-left"></td>
        </tr>
        <tr>
            <td class="tableleft">地点</td>
            <td><input type="text" name="location"/></td>
        </tr>
        <tr>
            <td class="tableleft">详情</td>
            <td>
            <textarea 
                                name="details" 
                                id="textarea" class="form-control" rows="6"
                                
                                          placeholder="详细说明失物招领信息，不超过200字"></textarea>
                                          </td>
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td><button type="submit" class="btn btn-primary" type="button">保存</button>&nbsp;&nbsp;
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
				window.location.href="{:U('Node/index')}";
		 });

    });
</script>