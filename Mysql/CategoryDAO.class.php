
<?php
/*
*创建人：zhan
*创建时间：2016-4-10 
*说明：类别表操作类
*版权所有：yynews.com
*/
require_once("../Mysql/DbConnect.class.php");
class CategoryDAO
{
	private $conn;
//1. 构造函数__construct功能：创建数据库连接
	public function __construct(){
		$db =new DbConnect();
		$db->db_connect();
		$this->conn = $db->conn;
	}

//2. getCategories功能：取出所有的新闻分类,返回一个二维数组
	public function getCategories(){
		
		$rs =@mysql_query("select * from users ",$this->conn);
		if (!$rs) {
			echo "空";
			return false;
		}
		$catsNum =@mysql_num_rows($rs);
		if ($catsNum==0) {
			echo "没有数据";
			return false;
		}
		$rs_array = array();
		 while($row = mysql_fetch_assoc($rs)){
			$rs_array[] = $row;
		}
		print_r($rs_array);
		return $rs_array;
	}
	
	//验证是否账号密码是否正确
	public function login($stuNum,$password){
		$rs = mysql_query("select Stuno,password from users where Stuno = "."$stuNum",$this->conn);
		if(!$rs){
			return 0;
		}
		$catsNum =@mysql_num_rows($rs);
		if($catsNum == 0){
			return false;
		}
		$row = mysql_fetch_array($rs);
		if($row["password"] == $password){
			return true;
		}else{
			return false;
		}
	}
	
	//关闭数据库
	public function close_mysql(){
		mysql_close($this->conn);
	}
	
//3. displayCategories(）功能：用ul>li>带a>链接的形式显示全部类别列表
	public function displayCategories($rs_array){
		if (!$rs_array) {
			echo "error!";return;
		}
		echo "<ul>";
		foreach ($rs_array as  $row) {
			$id=$row["catid"];
			$name=$row["catname"];
			echo "<li><a href=\"show_cat.php?catId=$id\">$name</a></li>";
		}
		echo "</ul>";
		mysql_close($this->conn);
	}

//4. optionCategories（）功能：用select>option>的形式显示所有类别列表，value为catId
	public function optionCategories($rs_array){
		if (!$rs_array) {
			echo "error!";return;
		}
		echo '<select name="catName">';
		foreach ($rs_array as  $row) {
			$id=$row["catid"];
			$name=$row["catname"];
			echo "<option value=\" $id \">$name</option>";
		}
		echo "</select>";
		mysql_close($this->conn);		
	}

//5. insertCategory（）功能：在类别表中插入新的类别
	public function insertCategory($catName){
		$bool= false;
		$sql = "insert into categories(catName) values('$catName')";
		mysql_query($sql,$this->conn);
		$id = mysql_insert_id($this->conn); 
		return $id;
		mysql_close($this->conn);
	}

//6. updateCategory（）功能：修改类别
	public function updateCategory($newCatName,$catId){
		$sql = "update categories set catName='$newCatName' where catId=$catId";
		mysql_query($sql,$this->conn);		
		if (mysql_affected_rows()!=-1) {
			return true;
		}else{
			return false;
		}
		mysql_close($this->conn);
	}

//7. deleteRow（）功能：删除类别（连同其下的新闻和新闻评论一起删除）
	public function deleteRow($catid){
		$sql = "delete from categories where catid=$catid ";
		$del = false;
		if(mysql_query($sql,$this->conn)){
			$del = true;
		}else{
			$del = false;
		}
		return $del;
		mysql_close($this->conn);
	}
		
//8. getIdByCatname（）功能：由类别名获取id 
	public function getIdByCatname($catName){
		$rs =@mysql_query("select catId from categories where catName='$catName'",$this->conn);
		if (!$rs) {
			return false;
		}
		$catsNum =@mysql_num_rows($rs);
		if ($catsNum==0) {
			return false;
		}else{
			$rs=mysql_result($rs,0,"catId");
			return $rs;
		}
		mysql_close($this->conn);
	}

//9. getCatnameById（）功能：由id获取类别名
public function getCatnameById($catId){
		$rs =@mysql_query("select catName from categories where catId='$catId'",$this->conn);
		if (!$rs) {
			return false;
		}
		$catsNum =@mysql_num_rows($rs);
		if ($catsNum==0) {
			return false;
		}else{
			$rs=mysql_result($rs,0,"catName");
			return $rs;
		}
		mysql_close($this->conn);
	}
}

?>