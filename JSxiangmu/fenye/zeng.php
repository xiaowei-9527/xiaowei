<?php
	
	//除图片之外的上传
 	header("content-type:text/html;charset=utf-8");
	$type = $_POST['type'];
	$title = $_POST['title'];
	$textarea = $_POST['content'];
	$newsfrom = $_POST['newsfrom'];
 	//获得时间戳
 	$time = time();
	//创建连接：四个参数分别为 服务器地址、用户名、密码、数据库名
	$conn = new mysqli('localhost', 'root', 'root', 'html');
	
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	} 
	$sql = "insert into newslist (newstype, newstitle, newscontent,newsfrom,date) 
			VALUES ('{$type}', '{$title}', '{$textarea}','{$newsfrom}','{$time}')";
			
	$sulr = $conn->query($sql);
	
	if ($sulr) {
		echo json_encode(array('code'=>200,'msg'=>'数据插入成功'));
	} else {
		echo json_encode(array('code'=>1001,'msg'=>'数据插入失败'));
	}
	$conn->close();
?>