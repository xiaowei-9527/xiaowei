<?php
	header("content-type:text/html;charset=utf-8");
	//去除警告
	error_reporting(E_ERROR); 
	ini_set("display_errors","Off");
	
	$name=$_POST['name'];
	$pwd=$_POST['password'];
	$sjh=$_POST['phone'];
	$yx=$_POST['email'];
	// 创建链接
	$conn = new mysqli('localhost', 'root', 'root', 'html');
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	}
	// 操作数据库
	$sql="SELECT * from user WHERE username='{$name}'";
	
	mysqli_query($conn, "set names utf8");
	// 执行查询数据库
	$result=$conn->query($sql);
	// 查询完得到结果集
	$row = mysqli_fetch_assoc($result);
	
	if ($row > 0) { //判断用户是否注册
		echo json_encode(array('code'=>201,'msg'=>'用户已经注册'));
	} else {
		$sql = "INSERT INTO user ( username, password,phone,email)
		VALUES ('{$name}','{$pwd}','{$sjh}','{$yx}')";
		mysqli_query($conn, "set names utf8");
//		if ($conn->query($sql) === TRUE) {
//			$userid =  mysqli_insert_id($conn);
//			$sql = "INSERT INTO userinfo ( userid )
//					VALUES ({$userid})";
//			echo $sql;
					if ($conn->query($sql) === TRUE){
//						echo "插入数据成功";
						echo json_encode(array('code'=>200,'status'=>'success','msg'=>'注册成功'));
					}
		//echo "新记录插入成功";
//		} else {
//		    echo "Error: " . $sql . "<br>" . $conn->error;
//		}
	}
	$conn->close();
?>