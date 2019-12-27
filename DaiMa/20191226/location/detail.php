<?php
	header("content-type:text/html;charset=utf-8");
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mynewsql";
	$id=$_GET['id'];
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	} 
//	$sql = "SELECT * FROM newslist limit $start,$size";
	$sql1 = "SELECT * FROM newslist where newsid=$id";

	mysqli_query($conn, "set names utf8");
	
	$result1=$conn->query($sql1);

	
	while($row=$result1->fetch_object()){
//          echo "ID:".$row->newsid."用户名：".$row->newstitle;
		echo json_encode(array('code'=>200,'data'=>$row));
  }
  	$conn->close();
?>