<?php
$db = mysql_connect('localhost','root','') or die('can not connect to database');
//$db = mysql_connect('qdm114284171.my3w.com','qdm114284171','1234567890') or die('can not connect to database');
mysql_select_db('qdm114284171_db',$db) or die(mysql_error($db));
mysql_query("set names 'utf8'");	
//设置时区
date_default_timezone_set('Asia/Hong_Kong');
//关闭错误提示
error_reporting(0);
//session_start();
if(!isset($_SESSION)){ session_start(); };

?>