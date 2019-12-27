/************************************
 *				正则验证				*
 * *********************************/
//手机号验证
function shouJiHao(val){
	var sjh = sjh = /^[1][3,5][0-9]{9}$/;
	var value = val.toString()
	if(!sjh.test(value)){
		return false;
	}
	return true;
}

//身份证验证
function shenFenZheng(val){
	var sfz = /^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/;
	var value = val.toString()
	
	if(!sfz.test(value)){
		return false;
	}
	return true;
}

//邮箱验证
function youXiang(val){
	var yx = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var value = val.toString();
	if(!yx.test(yx)){
		return false;
	}
	return true;
}

//网址验证
function wangZhi(val){
	var wz = /^((https?|ftp|file):\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;
	var value = val.toString();
	if(!value.test(value)){
		return false;
	}
	return true;
}


/************************************
 *			获取URL后面？的值			*
 * *********************************/
//获取URL中？后面的值
function getArgs() {
//创建一个存放键值对的数组
	var args = [];				
//去除?号			
	var qs = location.search.length > 0 ? location.search.substring(1) : '';
//按&字符串拆分数组
	var items = qs.split('&');
	var item = null, name = null, value = null;
//遍历
	for (var i = 0; i < items.length; i++) {
		item = items[i].split('=');
		name = item[0];
		value = item[1];
//把键值对存放到数组中去
		args[name] = value;
	}
	return args;
}
