//function GetQueryValue(queryName) {
//    var query = decodeURI(window.location.search.substring(1));
//    var vars = query.split("&");
//   for (var i = 0; i < vars.length; i++) {
//       var pair = vars[i].split("=");
//       if (pair[0] == queryName) { return pair[1]; }
//   }
//   return null;
// }


	function emailyz(val){
		var pattern = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/
		var value=val.toString()
		if(!pattern.test(value)){
			layer.alert('邮箱格式不正确')
		}
		return true
	}

