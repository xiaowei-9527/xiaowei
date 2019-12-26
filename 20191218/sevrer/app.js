const express=require('express')
const app=new express()
app.all('*', function (req, res, next) {
  res.header('Access-Control-Allow-Origin', '*');
  //Access-Control-Allow-Headers ,可根据浏览器的F12查看,把对应的粘贴在这里就行
  res.header('Access-Control-Allow-Headers', 'Content-Type');
  res.header('Access-Control-Allow-Methods', '*');
  res.header('Content-Type', 'application/json;charset=utf-8');
  next();
})

app.get('/list',function(req,res){
	var data=[
		{title:'刘德华演唱会',time:1500000000000},
		{title:'张学友演唱会',time:1550000000000},
		{title:'郭富城演唱会',time:1580000000000}
	]
	res.json(data)
})
app.listen(3333,'127.0.0.1')

