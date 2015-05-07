<?php
    error_reporting(0);
    include_once "../php/function.php";
    $id = trim($_GET['id']);
    if(!empty($id) && is_numeric($id)){

        include_once "config.php";

        $sql = "delete from t_publish where id='$id'";
        mysql_query($sql);
        if(mysql_affected_rows()){
            echo_message("删除成功！",1);
        }else{
            echo_message("删除失败！",1);
        }
        mysql_close();
        
    }else{
        echo_message("文章不存在！",1);
    }
?>
