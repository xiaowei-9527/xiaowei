<?php
	header("content-type:text/html;charset=utf-8");
	$servername = "localhost"; //127.0.0.1
	$username = "root";
	$password = "";
	$dbname = "mynewsql";
	if(isset($_GET['page'])){
		$page=$_GET['page'] ? $_GET['page'] : 1;
	}else{
		$page=1;
	}
	if(isset($_GET['pagesize'])){
		$size=$_GET['pagesize'] ? $_GET['pagesize'] : 10;
	}else{
		$size=10;
	}
	$start=($page-1)*$size;
	$conn = new mysqli($servername, $username, $password, $dbname);
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	} 		
	$total = "SELECT * FROM newslist";
	$result1=$conn->query($total);
	$num=$result1->num_rows;
	
	$sql = "SELECT * FROM newslist limit $start,$size";
	mysqli_query($conn, "set names utf8");
	$result=$conn->query($sql);
	$row=$result->fetch_all(MYSQLI_BOTH);
	$n=0;  
	$arr = array();
	while($n<mysqli_num_rows($result)){ //得到所有数据
 		$arr[$n]['newsid']=$row[$n]['newsid'];
 		$arr[$n]['newstitle']=$row[$n]['newstitle'];
 		$n++;
	}
	echo json_encode(array('list'=>$arr,'total'=>$num));
?>