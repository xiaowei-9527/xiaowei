<?php
	header("content-type:text/html;charset=utf-8");
	$name=$_POST['name'];
	$pwd=$_POST['pwd'];
	$phone=$_POST['phone'];
	$sfz=$_POST['sfz'];
	$sex=$_POST['sex'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "project";
	 
	// 创建连接
	$conn = new mysqli($servername, $username, $password, $dbname);
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	} 
	$sql="SELECT * from user WHERE name='{$name}'";
	mysqli_query($conn, "set names utf8");
	$result=$conn->query($sql);
	$row = mysqli_fetch_assoc($result); //取其中一行
	if ($row > 0) { //判断是否存在
		echo json_encode(array('code'=>201,'msg'=>'用户已经注册'));
	} else {
		$sql = "INSERT INTO user ( name, password,sfz,phone,sex)
		VALUES ('{$name}','{$pwd}','{$sfz}','${phone}','${sex}')";
		 mysqli_query($conn, "set names utf8");
		if ($conn->query($sql) === TRUE) {
	//	    echo "新记录插入成功";
			echo json_encode(Array('code'=>200,'status'=>'success','msg'=>'注册成功'));
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	$conn->close();
?>