<?php
//print_r($_GET);
include_once "../../php/config.php";

//print_r($_GET);
//$uid = $_GET['uid'];
$op = $_GET["op"];

if($op=="editdeal"){
	$pid = $_GET["pid"];
    $uid = $_SESSION["uid"];
	$name=$_GET["name"];
    $item=$_GET["item"];
    $ptime = date('Y-m-d H:i:s');
    $plocation = $_GET['location'];
    $pdetails = $_GET['details'];

    include_once "../../php/conn.php";
    include_once "../../php/function.php";

    $sql="update t_publish set pname = '".$name."' , pitem = '".$item."' , ptime = '".$ptime."' , plocation = '".$plocation."' , pdetails = '".$pdetails."' where pid = '".$pid."' ";

    
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
        //print_r($_GET);
        //print_r($_SESSION);
    include_once "../../php/config.php";
    $uid = $_SESSION["uid"];
    $pname=$_GET["name"];
    $pitem=$_GET["item"];
    $ptime = date('Y-m-d H:i:s');
    $plocation = $_GET['location'];
    $pdetails = $_GET['details'];
    $pimage = "1.jpg";
    include_once "../../php/conn.php";
    include_once "../../php/function.php";

    $insql = "insert into t_publish(uid,pitem,pname,plocation,ptime,pimage,pdetails,ptype,pdate) 
    values('$uid','$pitem','$pname','$ptime','$plocation','$pimage','$pdetails','1','$ptime') ";
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