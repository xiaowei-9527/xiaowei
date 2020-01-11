// 自适应代码
window.onload = function(){
	getRem(750,100)
};
//页面发生变化或刷新时执行（获取窗口大小）
window.onresize = function(){
	getRem(750,100)
};
function getRem(pwidch,prem){
	var html = document.getElementsByTagName("html")[0];
	var width = document.body.clientWidth || document.getElementsByTagName("html")[0];
	html.style.fontSize = width/pwidch*prem + "px";
}


/********************************
 *			另外一种rem			*
 ********************************/

//// 自适应代码
//(function (win) {
//  var doc = win.document;
//  var docEl = doc.documentElement;
//  
//  var tid;
//  function refreshRem() {
//      var width = docEl.getBoundingClientRect().width;
//      if (width > 750) { // 最大宽度
//          width = 750;
//      }
//      var rem = width / 3.75;
//      docEl.style.fontSize = rem + 'px';
//  }
//  win.addEventListener('resize', function () {
//      clearTimeout(tid);
//      tid = setTimeout(refreshRem, 300);
//  }, false);
//  win.addEventListener('pageshow', function (e) {
//      if (e.persisted) {
//          clearTimeout(tid);
//          tid = setTimeout(refreshRem, 300);
//      }
//  }, false);
//  refreshRem();
//  //匿名函数自执行
//})(window);