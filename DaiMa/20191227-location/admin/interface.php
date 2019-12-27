<?php
		header("content-type:text/html;charset=utf-8");
		$type = $_POST['type'];
		$title = $_POST['title'];
		$textarea = $_POST['content'];
		$newsform = $_POST['newsform'];
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mynewsql";
		$time=time();
		//链接数据库
		$conn = new mysqli($servername, $username, $password, $dbname);
		// 检测连接
		if ($conn->connect_error) {
		    die("连接失败: " . $conn->connect_error);
		} 
		$sql = "INSERT INTO newslist (newstype, newstitle, newscontent,newsfrom,date)
VALUES ('$_POST[type]', '$_POST[title]', '$_POST[content]','$_POST[newsform]','$time')";
		mysqli_query($conn, "set names utf8");
		if ($conn->query($sql) == TRUE) {
			echo "数据插入成功";
		} else {
			echo "数据插入失败" ;
		}
		$conn->close();
?>