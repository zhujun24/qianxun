<?php
header("Content-type: text/html; charset=utf-8");

//如何快速从MySQL表中取值组合成JSON
//include 'inc/xcl_conn.php';
$db = mysql_connect('localhost','root','') or die('can not connect to database');
mysql_select_db('qianxun',$db) or die(mysql_error($db));
mysql_query("set names 'utf8'");

//$result = array();	
$rs = mysql_query("select count(*) from t_publish");
$row = mysql_fetch_row($rs);
//$result["total"] = $row[0];


$sql=" SELECT * FROM t_publish order by pid desc";
$rs = mysql_query($sql);

//  $uid = $row->uid;
//   $sql = "select * from t_user 
//   		where uid = '".$uid."' ";
//   $query = mysql_query($sql);
//   $arr = mysql_fetch_assoc($query);
//   $row->uid = $arr['uname'];

$items = array();
while($row = mysql_fetch_object($rs)){
  $arr = mysql_fetch_assoc(mysql_query("select * from t_user where uid = '".$row->uid."' "));
  $row->uid = $arr['uname'];
  array_push($items, $row);
}
//$result["rows"] = $items;

$result = $items;
//echo json_encode($result);
$code = json_encode($result);  
$code = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2', 'UTF-8', pack('H4', '\\1'))", $code);  
echo $code;
?>