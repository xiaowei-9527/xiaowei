<?php
// echo substr('HTTP_HOST',5);
function get_getallheaders() //定义方法
{ 
  // var_dump($_SERVER);
 foreach ($_SERVER as $name => $value) //循环_SERVER数组
 { 
 if (substr($name, 0, 5) == 'HTTP_') //前5个字符是HTTP_的进入循环
 { 
 $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value; 
 //注释
 //substr($name, 5)，从$name第5个字符向后截取
 //str_replace('_', ' ',)下划线替换成空格
 //strtolower()全部转换为小写
 //ucwords()首字母转换为大写
 //str_replace(' ', '-',)所有空格替换为-
 } 
 } 
 return $headers; //返回前key前5个字符是HTTP_的数组
 //return $_SERVER; //返回_SERVER数组
}
$arr = get_getallheaders();//获取http头数组
echo $arr['Access-Token'];

if(!$arr['Access-Token']){
  echo json_encode(array('code'=>101,'msg'=>'access-token不存在'));
}else if($arr['Access-Token']!='24f9c1b24dd3a64578294aea30060be1'){
	// ef80af910fa07870e25b1a4c86d10402
  echo json_encode(array('code'=>201,'msg'=>'非法Access-Token'));
}else{
  echo json_encode($arr);
}
//echo $arr["Token"];//输出Token
// echo json_encode($arr);//输出整个数组
