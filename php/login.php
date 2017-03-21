<?php
	require_once("../Mysql/CategoryDAO.class.php");    //得到对数据库操作的类
	$rs = array();                               //用来存储数据库中的数据
	// $accountErr=$passwordErr="";                     //用来存储账号错误信息
	$account=$_POST["user"];
	$password=$_POST["password"];
	
	$DAO = new CategoryDAO();
	$arr =array();
	if($DAO->login($account,$password)){
		echo "1";
	}else{
		echo "0";
	}
	
	/*
	function test_input($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}*/
?>