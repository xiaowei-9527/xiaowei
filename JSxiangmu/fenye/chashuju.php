<?php
	header("content-type:text/html;charset=utf-8");
	
	//接收前面传过来的值
	$page = $_GET['page'];
	$pagesize = $_GET['pagesize'];
	$start = ($page-1)*$pagesize;
	// 创建链接
	$conn = new mysqli('localhost', 'root', 'root', 'html');
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	}
	// 操作数据库
	//分页数据
	$fenye = "select * from newslist limit {$start},{$pagesize}";
	
	//查询所有数据
	$sql="SELECT * from newslist";
	mysqli_query($conn, "set names utf8");
	// 执行查询数据库
	$result=$conn->query($sql);
	
	$result1=$conn->query($fenye);
	
	//指向查出来的所有数据
	$num=$result->num_rows;
	//下标从0开始查
	$n=0;
	$arr = array();
	//下标到定的pagsize结束
	$row=$result1->fetch_all(MYSQLI_BOTH);
	while($n<mysqli_num_rows($result1)){
   		$arr[$n]['newsid']=$row[$n]['newsid'];
   		$arr[$n]['newstitle']=$row[$n]['newstitle'];
   		$n++;
  	}
  	//传回json类型
  	echo json_encode(array('list'=>$arr,'total'=>$num));
  	$conn->close();
?>