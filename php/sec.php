<?php
if(!isset($_SESSION)){ session_start(); };
if(empty($_SESSION["uid"])){
	echo "<script language='javascript' 
    type='text/javascript'>";  
    echo "alert('权限不足，请先登录！');";  
    echo "window.location.href='index.php'";  
    echo "</script>"; 
}
?>