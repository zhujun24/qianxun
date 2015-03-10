<?php
//如何快速从MySQL表中取值组合成JSON
//include 'inc/xcl_conn.php';
// $db = mysql_connect('localhost','root','') or die('can not connect to database');
// mysql_select_db('qianxun',$db) or die(mysql_error($db));
// mysql_query("set names 'utf8'");
//header("Content-type:text/html;charset=utf-8");
$db = mysql_connect('qdm114284171.my3w.com','qdm114284171','1234567890') or die('can not connect to database');
mysql_select_db('qdm114284171_db',$db) or die(mysql_error($db));
mysql_query("set names 'utf8'");	



//$result = array();	
$rs = mysql_query("select count(*) from t_publish where  ptype='1' ");
$row = mysql_fetch_row($rs);
$zhao_total = $row[0];


$srs = mysql_query("select count(*) from t_publish where  ptype='0' ");
$srow = mysql_fetch_row($srs);
$shi_total = $srow[0];


$zhao_i = 2;
$shi_i = 2;
$pagesize = 10;
if(!empty($_GET['number']) && !empty($_GET['type'])){
	if($_GET['type'] == 1){
		//$number = $_GET['number'];
		//招领第一次
		$start=($zhao_i-1)*$pagesize;
		// $rs = mysql_query("select count(*) from t_publish where  ptype='1' ");
		// $row = mysql_fetch_row($rs);
		// $offset = $row[0] - $start;
		$offset = $zhao_total - $start;
		if( $offset < 10 )
			$sql=" SELECT * FROM t_publish where  ptype='1' order by pid desc limit $start, $offset";
		else{
			$sql=" SELECT * FROM t_publish where  ptype='1' order by pid desc limit $start, $pagesize";
		}

		$zhao_i++;
		
	}else {
		//失物第一次
		$start=($shi_i-1)*$pagesize;
		// $rs = mysql_query("select count(*) from t_publish where  ptype='0' ");
		// $row = mysql_fetch_row($rs);
		//$offset = $row[0] - $start;
		$offset = $shi_total - $start;
		if( $offset < 10 )
			$sql=" SELECT * FROM t_publish where  ptype='0' order by pid desc limit $start, $offset";
		else{
			$sql=" SELECT * FROM t_publish where  ptype='0' order by pid desc limit $start, $pagesize";
		}

		$shi_i++;
	}
}
else{

	$sql=" SELECT * FROM t_publish order by pid desc ";
}


//	$sql=" SELECT * FROM t_publish order by pid desc limit 10 ";
$rs = mysql_query($sql);

$items = array();
$totals = array('zhao_total'=>$zhao_total,'shi_total'=>$shi_total);//这是你的一维数组
array_push($items, $totals);
while($row = mysql_fetch_object($rs)){
  $arr = mysql_fetch_assoc(mysql_query("select * from t_user where uid = '".$row->uid."' "));
  $row->uid = $arr['uname'];
  array_push($items, $row);
}
//$result["rows"] = $items;


$result = $items;
//echo json_encode($result);
$code = json_encode($result);  
//$code = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2', 'UTF-8', pack('H4', '\\1'))", $code);  
$code = preg_replace_callback('/\\\\u([0-9a-f]{4})/i', create_function( '$matches', 'return mb_convert_encoding(pack("H*", $matches[1]), "UTF-8", "UCS-2BE");'), $code);
echo $code;
?>