<?php
//封装常用函数

//alert输出信息  重定向至首页
//防乱码
function echo_message($message , $url,$pid){
	echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
	//echo "<script charset='utf-8' type='text/javascript'>window.history.go(-1)</script>";
	if($url == 1){
		echo "<script charset='utf-8' type='text/javascript'>alert('$message');window.location.href='../index.php';</script>";
	}else if($url == 2){
		echo "<script charset='utf-8' type='text/javascript'>alert('$message');window.location.href='../login.php';</script>";
	}else if($url == 3){
		echo "<script charset='utf-8' type='text/javascript'>alert('$message');window.location.href='index.php';</script>";
	}else if($url == 4){
		echo "<script charset='utf-8' type='text/javascript'>alert('$message');window.location.href='../zone.php';</script>";
	}else if($url == 5){
		echo "<script charset='utf-8' type='text/javascript'>alert('$message');window.location.href='../info.php?pid=$pid';</script>";
	}else if($url == 6){
		echo "<script charset='utf-8' type='text/javascript'>alert('$message');window.location.href='comment.php';</script>";
	}
}


?>