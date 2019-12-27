<?php
	header("content-type:text/html;charset=utf-8");
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mynewsql";
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	} 
//	$sql = "SELECT * FROM newslist limit $start,$size";
	$sql1 = "SELECT * FROM newslist";
	mysqli_query($conn, "set names utf8");
	
	$result1=$conn->query($sql1);

	$row=$result1->fetch_all(MYSQLI_BOTH);
	$n=0;
	$arr = array();
	while($n<mysqli_num_rows($result1)){ //得到所有数据
   		$arr[$n]['newsid']=$row[$n]['newsid'];
   		$arr[$n]['newstitle']=$row[$n]['newstitle'];
   		$n++;
  	}
  	echo json_encode(array('code'=>200,'list'=>$arr));
  	$conn->close();
?>