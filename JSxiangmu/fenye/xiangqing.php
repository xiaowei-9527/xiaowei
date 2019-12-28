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
	$sql1 = "SELECT * FROM newslist where newsid=$id";

	mysqli_query($conn, "set names utf8");
	
	$result1=$conn->query($sql1);
	
	while($row=$result1->fetch_object()){
		echo json_encode(array('code'=>200,'data'=>$row));
  	}
  	$conn->close();
?>