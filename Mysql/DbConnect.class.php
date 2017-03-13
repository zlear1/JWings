<?php
/*
*说明：类别表操作类
* 类名：DbConnect
* 说明：数据库连接类
*版权所有：jwings.com
*/
 require_once("./Db.Conf.php");   //引入配置常量文件
 date_default_timezone_set(TIMEZONE); //设置用在脚本中所有日期/时间函数的默认时区
 class DbConnect
 {
	  private $host;            //服务器名
	  private $username;        //数据库登录用户名
	  private $password;        //数据库登录密码
	  private $dbname;          //数据库名
	  public  $conn;            //数据库连接变量  
  /**
   *  __construct类构造函数
   */
	public function __construct($host=DB_HOST ,$username=DB_USER,$password=DB_PASSWORD,$dbname=DB_NAME) {
	   	$this->host = $host;
	   	$this->username = $username;
	 	$this->password = $password;
	   	$this->dbname = $dbname;   
	}
  /**
   * 打开数据库连接
   */
	public function db_connect(){
		$this->conn = mysql_connect($this->host,$this->username,$this->password);
	   	mysql_select_db($this->dbname);
	  	mysql_query("set names utf8",$this->conn);
	}
 }

//测试本类的代码
/*$db =new DbConnect();
$db->db_connect();
var_dump($db);*/

?>