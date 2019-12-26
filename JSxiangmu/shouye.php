<?php
//去除警告	
//	error_reporting(E_ERROR); 
//	ini_set("display_errors","Off");


//显示所有post里面的内容
//print_r($_POST);



	$username=$_POST['username'];
	$password=$_POST['password'];
	if(isset($_POST['radioval'])){
		$radioval = $_POST['radioval'];
	}else{
		$radioval=0;
	}
	
	if($radioval==1){
		setcookie("loginStatus",true, time()+3600*24);
		setcookie("username",$username, time()+3600*24);
		setcookie("password",$password, time()+3600*24);
		setcookie("radioval",$radioval, time()+3600*24);
	}else if($radioval==2){
		setcookie("loginStatus",true, time()+3600*24*7);
		setcookie("username",$username, time()+3600*24*7);
		setcookie("password",$password, time()+3600*24);
		setcookie("radioval",$radioval, time()+3600*24);
	}else if($radioval==3){
		setcookie("loginStatus",true, time()+3600*24*30);
		setcookie("username",$username, time()+3600*24*30);
		setcookie("password",$password, time()+3600*24);
		setcookie("radioval",$radioval, time()+3600*24);
	}else{
		
	}
	echo json_encode(array('code'=>200,'msg'=>'登陆成功','username'=>$username));
?>