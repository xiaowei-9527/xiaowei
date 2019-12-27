<?php
	header("content-type:text/html;charset=utf-8");
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "html";
	$id=$_GET['id'];
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	} 
	
	$sql = "delete from newslist where newsid=$id";
	
	$result = $conn->query($sql)
	//判断是否查询成功，
	if($result){
		//成功就跳转
//	    header("location:fenye.php");
	}
  	$conn->close();
?>