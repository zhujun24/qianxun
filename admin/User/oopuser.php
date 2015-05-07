<?php
//print_r($_GET);
include_once "../../php/config.php";

//print_r($_GET);
//$uid = $_GET['uid'];
$op = $_GET["op"];

if($op=="editdeal"){
	$uid = $_GET["uid"];
	$name=$_GET["name"];
    $email=$_GET["email"];
    $password=$_GET["password"];
    $telephone=$_GET["phone"];
    $qq=$_GET["qq"];
    $power=$_GET["power"];
    
    include_once "../../php/conn.php";
    include_once "../../php/function.php";
    //$_SESSION["email"]=$_GET["email"];//邮箱

    mysql_query("SET NAMES utf8");
    $sql="update t_user set uname = '".$name."' , uemail = '".$email."' , upwd = '".$password."' , utel = '".$telephone."' , uqq = '".$qq."' , upower = '".$power."' where uid = '".$uid."' ";

    
    $rowsNum = $conne->uidRst($sql);
    if($rowsNum > 0){
        echo "<center><h3>修改成功！</h3></center>";
        $conne->close_conn();
        //session_destroy();
        
        echo_message("修改成功！..." ,3);
    }else{
        echo "<h3>修改失败！</h3>";
        $conne->msg_error();
        $conne->close_conn();
        echo_message("修改成功！..." ,3);
    }
}else if($op=="adddeal"){
	$name=$_GET["name"];
    $email=$_GET["email"];
    $password=$_GET["password"];
    $telephone=$_GET["phone"];
    $qq=$_GET["qq"];
    $power=$_GET["power"];
    
    include_once "../../php/conn.php";
    include_once "../../php/function.php";

    $insql = "insert into t_user(uname,uemail,upwd,utel,uqq,upower) values('$name','$email','$password','$telephone','$qq','$power') ";
    	//执行插入
	$rowsNum = $conne->uidRst($insql);
	if($rowsNum)
	{
        $conne->close_conn();
		echo_message("添加成功！",3);   
	}else {
		//出错
		echo $conne->msg_error();	
	}

}

?>