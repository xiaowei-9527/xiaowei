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
