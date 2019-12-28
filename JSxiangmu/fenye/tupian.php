<?php
	//图片上传
	
	header('Access-Control-Allow-Origin:*');
    function upload(){
        // 获取上传的图片
        // print_r($_FILES);exit;   
        $pic = $_FILES['myfile']['tmp_name'];
        $upload_ret = false;
        if($pic){
            // 上传的路径，建议写物理路径
            $uploadDir = './ajaxupload';
            // 创建文件夹 
            if(!file_exists($uploadDir)){       
                mkdir($uploadDir, 0777);   
            }
            // echo $uploadDir;exit;
            // 用时间戳来保存图片，防止重复
            $targetFile = $uploadDir . '/' . time() . $_FILES['myfile']['name'];
            // 将临时文件 移动到我们指定的路径，返回上传结果
            $upload_ret = move_uploaded_file($pic, $targetFile);   
        }
        if($upload_ret){
//          return $targetFile;
             //链接数据库，插入数据库 
            header("content-type:text/html;charset=utf-8");
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "html";
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// 检测连接
			if ($conn->connect_error) {
			    die("连接失败: " . $conn->connect_error);
			} 
		
			mysqli_query($conn, "set names utf8");
			$sql = "UPDATE newslist SET imgurl='$targetFile' WHERE newsid=277";
		
			mysqli_query($conn, "set names utf8");
			if ($conn->query($sql) == TRUE) {
				return $targetFile;
			} else {
				echo "数据插入失败" ;
			}
				$conn->close();
	    }else{
	        return "123";
	    }
    }
    $a=upload();
    echo json_encode($a);

?>