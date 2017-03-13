<?php
	require_once("./Mysql/CategoryDao.class.php");    //得到对数据库操作的类
	$rs = array();                               //用来存储数据库中的数据
	$accountErr=$passwordErr="";                     //用来存储账号错误信息
	$account=test_input($_POST["IDnumber"]);
	$password=test_input($_POST["password"]);
	
	$DAO = new CategoryDAO();
	
	$rs = $DAO->getCategories();
	echo $rs;
	
	/*
	function test_input($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}*/
?>
