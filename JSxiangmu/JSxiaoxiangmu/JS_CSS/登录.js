//点击小眼睛
$(".iconfont").mouseover(function(){
	$(this).addClass('icon-xiaoyanjing-zheng').removeClass('icon-xiaoyanjing-bi')
	mima()
})
//鼠标移进之后添加的是未来元素，所有要使用on或者delegate
$(".iconfont").on('mouseout',function(){
	$(this).addClass('icon-xiaoyanjing-bi').removeClass('icon-xiaoyanjing-zheng')
	mima()
})
//判断密码，上面两个调用
function mima(){
	if ($(".inp").attr("type")=='password') {
		$(".inp").attr("type","text");
	} else{
		$(".inp").attr("type","password");
	}
}


//验证

$('#xm').blur(function(){
	var xm = $(this).val()
	if(xm==''){
		layer.msg('姓名不能为空');
	}
})


$('.mm').blur(function(){
	var mm = $(this).val()
	if(mm==''){
		layer.msg('密码不能为空');
	}
})

//手机号
var sjh;
$('#sjh').blur(function(){
	var sjhval = $(this).val()
	sjh = shouJiHao(sjhval)
	if(sjhval!=''){
		if(!sjh){
			layer.msg('请输入以1开头的11位电话号');
		}
	}
})

//邮箱
var yx;
$('#yx').blur(function(){
	var yxval = $(this).val()
	yx = youXiang(yxval)
	if(yxval!=''){
		if(!yx){
			layer.msg('邮箱带有@和.');
		}
	}
})

//点击注册
godeng.onclick = function(){
	if(sjh && yx){
		$.ajax({
			url:'zhuce.php',
			type:'post',
			data:{
				//后台接收：传的数据
				name:$('#xm').val(),
				password:$('.mm').val(),
				phone:$('#sjh').val(),
				email:$('#yx').val(),
			},
			dataType:'json',
			success:function(res){
				console.log(res)
				if(res.code==200){
					layer.msg(res.msg)
					$('.z').css('transform','translateY(-450px)')
					$('.d').addClass('on').siblings().removeClass('on')
				}
				if(res.code==201){
					console.log('哈哈哈哈')
					layer.msg(res.msg)
				}
			}
		});
	}
}

//点击登录
$("#gozhu").click(function(){
	if ($('.dxm').val().length!=0 && $('.dmm').val()!=0) {
		$.ajax({
			url:"denglu.php",
			type:"post",
			data:{
				name:$('.dxm').val(),
				password:$('.dmm').val(),
			},
			dataType:'json',
			success:function(res){
				if(res.code==200){
					console.log('哈哈哈成功')
					layer.msg(res.msg);
					location.href = '小项目登录.html';
				}
				if(res.code==1001){
					console.log('哈哈哈失败')
					layer.msg(res.msg);
				}
			}
		});
	} 
})