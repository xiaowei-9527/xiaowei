<?php
	header("content-type:text/html;charset=utf-8");
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "yonghu";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$page=$_GET['page'];
	$size=$_GET['pagesize'];
	$start=($page-1)*$size;
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	} 
	$sql = "SELECT * FROM user limit $start,$size";
	$sql1 = "SELECT * FROM user";
	mysqli_query($conn, "set names utf8");
	$result=$conn->query($sql);
	$result1=$conn->query($sql1);
	$num=$result1->num_rows;
	$row=$result->fetch_all(MYSQLI_BOTH);
	$n=0;
	$arr = array();
	while($n<mysqli_num_rows($result)){
   		$arr[$n]['id']=$row[$n]['id'];
   		$arr[$n]['username']=$row[$n]['username'];
   		$arr[$n]['password']=$row[$n]['password'];
   		$n++;
  	}
  	echo json_encode(array('total'=>$num,'list'=>$arr));
  	$conn->close();
?>