<?php
	header("content-type:text/html;charset=utf-8");
	error_reporting(0);
	//把用户名传递过来
	$name=$_POST['username'];
	$type=$_POST['type'];
	// 创建链接
	$conn = new mysqli('localhost', 'root', '', 'yonghu');
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	}
	if($type==1){
		// 操作数据库
		$sql="SELECT * from user WHERE username='{$name}'";
		//设置字符集
		mysqli_query($conn, "set names utf8");
		// 执行查询数据库
		$result=$conn->query($sql);
		// 查询完得到结果集
		$row = mysqli_fetch_assoc($result);
		
		if ($row > 0) { //表示查询到数据
			echo json_encode(array('code'=>201,'msg'=>'用户已经注册'));
		} else{
			echo json_encode(array('code'=>200,'msg'=>'用户可以注册'));
		}
	}
	
?>