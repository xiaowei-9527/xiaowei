var http=require('http')
var fs=require('fs')
var path=require('path')

http.createServer(function(req,res){
	var pathname=req.url
	console.log(path.extname(pathname))
//	if(pathname=='/'){
//		pathname='/index.html'
//	}
//	if(pathname!='favicon.ico'){
//		fs.readFile('static/'+pathname,function(err,data){
//			if(err){
//				console.log('404')
//				fs.readFile('static/404.html',function(error,data404){
//					if(error){
//						console.log(error)
//					}
//					res.writeHead(404,{"Content-Type":"text/html;charset='utf-8'"});
//					res.write(data404);
//					res.end(); /*结束响应*/
//				})
//			}else{
//				res.writeHead(200,{"Content-Type":"text/html;charset='utf-8'"});
//				res.write(data);
//				res.end(); /*结束响应*/
//			}
//		})
//	}
//	
}).listen(8001)
