<?php
	header("content-type:text/html;charset=utf-8");
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "html";
	$id=$_POST['id'];
	$lei=$_POST['lei'];
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	} 
	//若$lei==1执行全表查询，反之修改
	mysqli_query($conn, "set names utf8");
	
	if($lei==1){
		//查询所有数据
		$sql="SELECT * from newslist where newsid = $id";
		// 执行查询数据库
		$result=$conn->query($sql);
		while($row=$result->fetch_object()){
			echo json_encode(array('code'=>200,'data'=>$row));
		}
	}else if($lei==2){
		$type = $_POST['type'];
		$title = $_POST['title'];
		$textarea = $_POST['content'];
		$newsfrom = $_POST['newsfrom'];
		$sql1 = "update newslist set newstype = '{$type}', newstitle = '{$title}',newscontent = '{$textarea}', newsfrom = '{$newsfrom}' where newsid=$id";
		
		$result1=$conn->query($sql1);
		
		if ($result1) {
			echo json_encode(array('code'=>200,'msg'=>'数据修改成功'));
		} else {
			echo json_encode(array('code'=>1001,'msg'=>'数据修改失败'));
		}
	}
  	$conn->close();
?>