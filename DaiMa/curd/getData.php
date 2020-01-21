<?php
//设置编码格式
header("content-type:text/html;charset=utf-8");
//1.得到mysqli链接
$mysql=mysqli_connect("localhost","root","","angular");
if(!$mysql){
	die("连接失败".mysqli_connect_error($mysql));

}

//2.向我们的数据库发送sql语句（ddl，dml,dql ......）
$sql="select*from user1";
mysqli_query($mysqli,$sql);
//var_dump($res);
//3.处理得到的结果
//循环取出$res中的数据
while($row=mysqli_fetch_row($res)){
	
	foreach($row as $key=>$val){
		echo "--$val";
	
	
	}
echo "<br/>";


}

//4.关闭资源
mysqli_free_result($res);
mysqli_close($mysql);
?>


