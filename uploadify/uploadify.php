<?php

if(!isset($_SESSION)){ session_start(); };
error_reporting(0);

header("Content-type:text/html;charset=utf-8");
//设置上传目录
$path = "../upload_images/head_photo/";	

if (!empty($_FILES)) {
	
	//得到上传的临时文件流
	$tempFile = $_FILES['Filedata']['tmp_name'];
	
	//允许的文件后缀
	$fileTypes = array('jpg','jpeg','gif','png'); 
	
	list($width,$height,$type,$attr) = getimagesize($_FILES['Filedata']['tmp_name']);
	//得到文件原名
	//要像把gb2312换为utf-8只要写上$content = iconv("gb2312","utf-8//IGNORE",$content);就行
	//$fileName = iconv("UTF-8","GB2312//IGNORE",$_FILES["Filedata"]["name"]);
 	// $imagename = $_SESSION["uid"].$ext;
  //   $query = 'update t_user set uheader="'.$imagename.'" where uid='.$_SESSION["uid"];
  //   mysql_query($query , $db) or die(mysql_error($db));

	$fileName = $_FILES["Filedata"]["name"];
	$fileNames = $fileName;
	$imagenames = explode(".",$fileNames);
	$imagenames[0] = $_SESSION["uid"];
	$imagename = implode(".", $imagenames);
	//$str = "Hello world. It's a beautiful day.";
	//print_r (explode(" ",$str));

	//$fileName = $_SESSION["uid"];

	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	//接受动态传值
	$files=$_POST['typeCode'];
	
	//最后保存服务器地址
	if(!is_dir($path))
	   mkdir($path);
	if (move_uploaded_file($tempFile, $path.$imagename)){
		include_once "../php/config.php";
		$query = 'update t_user set uheader="'.$imagename.'" where uid='.$_SESSION["uid"];
		mysql_query($query , $db) or die(mysql_error($db));
		//echo "原文件名".$fileName."上传成功！新文件名".$imagename."<br>请手动F5刷新!";
        echo "上传成功,请手动F5刷新!";
		mysql_close();
	}else{
		echo $fileName."上传失败！";
	}
	
}else{
	if(!empty($_POST)){
    $name=$_POST["name"];
    $email=$_POST["email"]; //邮箱不可修改
    $telephone=$_POST["phone"];
    $qq=$_POST["qq"];



    //正则表达式匹配手机 
    if(strlen($telephone) == "11") { 
        //上面部分判断长度是不是11位 
        $n = preg_match_all("/13[123569]{1}\d{8}|15[1235689]\d{8}|188\d{8}/",$telephone,$array); 
        /*接下来的正则表达式("/131,132,133,135,136,139开头随后跟着任意的8为数字 '|'(或者的意思) 
        * 151,152,153,156,158.159开头的跟着任意的8为数字 
        * 或者是188开头的再跟着任意的8为数字,匹配其中的任意一组就通过了 
        * /")*/ 

        //var_dump($array); //看看是不是找到了,如果找到了,就会输出电话号码的 
        if(!empty($array[0][0])){
                include_once "../php/conn.php";
                include_once "../php/function.php";

                $sql="update t_user set uname = '".$name."' , uemail = '".$email."' , utel = '".$telephone."' , uqq = '".$qq."'  where uid = '".$_SESSION["uid"]."' ";

                // $sql="update t_user set uname = '".$name."' , utel = '".$telephone."' , uqq = '".$qq."'  where uid = '".$_SESSION["uid"]."' ";
                
                $rowsNum = $conne->uidRst($sql);
                if($rowsNum > 0){
                    echo "<h3>修改成功！</h3>";
                    $conne->close_conn();
                    //session_destroy();
                    
                    echo_message("修改成功..." ,4);
                }else{
                    echo "修改失败！";
                    $conne->msg_error();
                    $conne->close_conn();
                    echo_message("请重新修改..." ,4);
                }            


        }else{
            echo_message("手机号码错误,请重新修改..." ,4);
        }

        
    }else { 
        //echo "长度必须是11位"; 
        echo_message("手机长度必须是11位,请重新修改..." ,4);
    } 
    /* 
    * 虽然看起来复杂点,清楚理解! 
    * 如果有更好的,可以贴出来,分享快乐! 
    * */ 
 }     

}
?>