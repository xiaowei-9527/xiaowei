<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<script>
			document.onclick=function(){
				var xhr=new XMLHttpRequest()
	//			2 打开目标地址
				xhr.open('get','demo1.php?rand='+Math.random(),false)   // false指的是同步请求
				// 3发送请求
				xhr.send(null)
				alert(xhr.responseText)

			}
		</script>
	</body>
</html>
