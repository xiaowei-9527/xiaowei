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
	if($conn->query($sql))//成功就跳转
	{
		echo json_encode(array('code'=>200,'msg'=>'删除成功'));
	}
  	$conn->close();
?>