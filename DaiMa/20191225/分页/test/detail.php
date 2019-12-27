<?php
	header("content-type:text/html;charset=utf-8");
	error_reporting(0);
	$id=$_GET['id'];

	// 创建链接
	$conn = new mysqli('localhost', 'root', '', 'yonghu');
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	}
	// 操作数据库
	$sql="SELECT * from user WHERE id='{$id}'";
	mysqli_query($conn, "set names utf8");
	// 执行查询数据库
	$result=$conn->query($sql);
	// 查询完得到结果集
	$data=$result->fetch_object();
	echo json_encode($data);


//	if ($row > 0) { //判断用户是否注册
//		echo json_encode(array('code'=>200,'msg'=>'登陆成功'));
//	} else {
//		echo json_encode(Array('code'=>10001,'msg'=>'用户名或密码不正确'));
//	}
	$conn->close();
?>