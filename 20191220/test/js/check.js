alert(1212121)
	function emailyz(val){
		var pattern = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/
		var value=val.toString()
		if(!pattern.test(value)){
			layer.alert('邮箱格式不正确')
		}
		return true
	}
