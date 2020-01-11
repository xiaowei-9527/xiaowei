<?php
	$username=$_POST['username'];
	$password=$_POST['password'];
	if($username && $password){
		echo json_encode(array('code'=>200,'msg'=>'登陆成功','token'=>md5($username)));
	}

?>