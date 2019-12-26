const express=require('express')
const app=new express()


app.get('/forlist',function(req,res){
	var data=[
		{
			title:'html',
			list:[
				{id:1,book:'标签',author:'李彦宏'},
				{id:2,book:'article',author:'马化腾'},
				{id:3,book:'params',author:'马云'}
			]
		},
		{
			title:'javascript',
			list:[
				{id:1,book:'位置与尺寸',author:'张一鸣'},
				{id:2,book:'选择器',author:'周鸿祎'},
				{id:3,book:'占位符',author:'许家印'}
			]
		}
	]
	res.json(data)
})
app.listen(5555,'localhost')
