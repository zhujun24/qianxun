<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
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
<form class="form-inline definewidth m20" action="index.php" method="get">    
    物品名称：
    <input type="text" name="username" id="username"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <a href="opinfo.php?op=add"><button type="button" class="btn btn-success" id="addnew">新增信息</button></a>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>信息id</th>
        <th>物品名称</th>
        <th>发布者</th>
        <th>物品类型</th>
        <th>地点</th>
        <th>物品图片</th>
        <th>详情</th>
        <th>是否成功找回</th>
        <th>操作1</th>
        <th>操作2</th>
        <th>操作3</th>
    </tr>
    </thead>
    <tbody>
    <?php

                    include_once "../../php/config.php";
                    $username = $_GET["username"];
                    $sql = "select * from t_publish 
                     where psucceed='1' and pname like '%".$username."%'  order by pid asc ";
                    // $rowsArray = $conne -> getRowsArray($sql);
                    $result = mysql_query($sql);

                    if($result&&mysql_num_rows($result)>0){

            $pageSize = 10;
            $curpage = 1;
            $countPage = 0;
            $curpage = $_GET["page"] == null ? "1" : $_GET["page"];
            $i = 0;
                        while ($row = mysql_fetch_array($result)) {
                            $i++;

                            $arr = mysql_fetch_assoc(mysql_query("select * from t_user where uid = '".$row["uid"]."' "));
        $uname = $arr['uname'];


                            if($row['psucceed']==1)
                            {
                               $row['psucceed']="已成功找回！";      
                            }else{
                                $row['psucceed']="未成功找回！";
                            }

                        if ($i > ($curpage - 1) * $pageSize && $i <= $curpage * $pageSize) {                            
                        echo "<tr><td>".$row['pid']."</td>
                            <td>".$row['pname']."</td>
                            <td>".$uname."</td>
                            <td>".$row['pitem']."</td>
                            <td>".$row['plocation']."</td>
                            <td>".$row['pimage']."</td>
                            <td>".mb_substr($row['pdetails'] , 0 , 15,'utf-8')."</
                            td>
                            <td>".$row['psucceed']."</td>
                            <td><a href='opinfo.php?op=look&pid=".$row['pid']." '>查看具体</a></td>
                            <td><a href='opinfo.php?op=edit&pid=".$row['pid']." '>编辑</a></td>
                            <td><a href='opinfo.php?op=del&pid=".$row['pid']." '>删除</a></td>
                            </tr>";
                        
                    }
                }
                  $countPage = ($i + $pageSize - 1) / $pageSize;
            }
                mysql_close();
            ?>
            </tbody>
</table>
<div class="inline pull-right page">
         共<?php echo $i;?> 条记录 <?php echo $curpage;?>/<?php if($i/$pageSize< 1){ echo "1";}else{ echo (int)$countPage; }
         ?> 页  

        <a href="success.php?page=1">首页</a>
        <?php if ($curpage != 1) {?>
            <a href="success.php?page=<?php 
            echo $curpage - 1;?>">上一页</a>
        <?php }?>

        <?php if ($curpage < ((int)$i/$pageSize)  ) {?>
            <a href="success.php?page=<?php 
            echo $curpage + 1;?>">下一页</a>
        <?php }else{}?>
        <a href="success.php?page=<?php echo $countPage;?>">尾页</a>
        
</div>
</body>
</html>