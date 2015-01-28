<?php
//数据库配置链接及操作数据库函数
class opmysql{
	private $host = 'localhost';			//服务器地址
	private $name = 'root';					//登录账号
	private $pwd = '';					//登录密码
	private $dBase = 'qdm114284171_db';			//数据库名称
	private $conn = '';						//数据库链接资源
	private $result = '';					//结果集
	private $msg = '';						//返回结果
	private $fields;						//返回字段
	private $fieldsNum = 0;					//返回字段数
	private $rowsNum = 0;					//返回结果数
	private $rowsRst = '';					//返回单条记录的字段数组
	private $filesArray = array();			//返回字段数组
	private $rowsArray = array();			//返回结果数组
	//初始化类
	function __construct($host='',$name='',$pwd='',$dBase=''){
		if($host != '')
			$this->host = $host;
		if($name != '')
			$this->name = $name;
		if($pwd != '')
			$this->pwd = $pwd;
		if($dBase != '')
			$this->dBase = $dBase;
		$this->init_conn();
	}

	//链接数据库
	function init_conn(){
		$this->conn=@mysql_connect($this->host,$this->name,$this->pwd);
		@mysql_select_db($this->dBase,$this->conn);
		//mysql_query("set names 'utf8'");
	}

	//查询结果
	function mysql_query_rst($sql){
		if($this->conn == ''){
			$this->init_conn();
		}
		$this->result = @mysql_query($sql,$this->conn);
	}

	//取得字段数 
	function getFieldsNum($sql){
		$this->mysql_query_rst($sql);
		$this->fieldsNum = @mysql_num_fields($this->result);
	}

	//取得查询结果数
	function getRowsNum($sql){
		$this->mysql_query_rst($sql);
		if(mysql_errno() == 0){
			return @mysql_num_rows($this->result);
		}else{
			return '';
		}	
	}

	//取得记录数组（单条记录）
	function getRowsRst($sql){
		$this->mysql_query_rst($sql);
		if(mysql_error() == 0){
			$this->rowsRst = mysql_fetch_array($this->result,MYSQL_ASSOC);
			return $this->rowsRst;
		}else{
			return '';
		}
	}

	//取得记录数组（多条记录）
	function getRowsArray($sql){
		$this->mysql_query_rst($sql);
		if(mysql_errno() == 0){
			while($row = mysql_fetch_array($this->result,MYSQL_ASSOC)) {
				$this->rowsArray[] = $row;
			}
			return $this->rowsArray;
		}else{
			return '';
		}
	}

	//更新、删除、添加记录数
	function uidRst($sql){
		if($this->conn == ''){
			$this->init_conn();
		}
		@mysql_query($sql);
		$this->rowsNum = @mysql_affected_rows();
		if(mysql_errno() == 0){
			return $this->rowsNum;
		}else{
			return '';
		}
	}

	//获取对应的字段值
	function getFields($sql,$fields){
		$this->mysql_query_rst($sql);
		if(mysql_errno() == 0){
			if(mysql_num_rows($this->result) > 0){
				$tmpfld = @mysql_fetch_row($this->result);
				$this->fields = $tmpfld[$fields];
				
			}
			return $this->fields;
		}else{
			return '';
		}
	}
	
	//错误信息
	function msg_error(){
		if(mysql_errno() != 0) {
			$this->msg = mysql_error();
		}
		return $this->msg;
	}

	//释放结果集
	function close_rst(){
		mysql_free_result($this->result);
		$this->msg = '';
		$this->fieldsNum = 0;
		$this->rowsNum = 0;
		$this->filesArray = '';
		$this->rowsArray = '';
	}

	//关闭数据库
	function close_conn(){
		$this->close_rst();
		mysql_close($this->conn);
		$this->conn = '';
	}
}

$conne = new opmysql();
?>