/*
 * 移动端选项卡
 */

$(function(){
  //����Ч����˵�
	$(".MENUS li").hover(function(){           
		$(this).addClass("ok").find("dl").stop(true,true).slideUp(0).slideDown(300);
	},function(){
    $(".ok").find("dl").stop(true,true).slideUp(200);
		$(this).removeClass("ok");
	});
  
  //�޶��������˵�
	$(".MENU li,.MENU_MY").hover(function(){           
		$(this).addClass("ok");
	},function(){
		$(this).removeClass("ok");
	});
  
  //��ǰ��ʾ����
      $('.HOTTOP li').mouseover(function(){
          $(this).parent('ul').find('.ok').removeClass('ok');
          $(this).addClass('ok');
          if(!$(this).next('li').text()){
              $(this).addClass('end');
          }
      });
      
  // �۵��˵�   
  $('.SLIDE h3').click(function(){
      var $nn=$(this).hasClass('ok');
      if($nn){
           $(this).removeClass();
           $(this).next('ul').removeClass();
      }
      else
      {
           $(this).addClass('ok');
           $(this).next('ul').addClass('dn');
      }
  });
  
  // 鼠标经过
  $(".TAB li").mousemove(function(){
    var $vv=$(this).parent(".TAB").attr("id");
	  $($vv).hide();
	  $(this).parent(".TAB").find("li").removeClass("hover");
	  var xx=$(this).parent(".TAB").find("li").index(this);
	  $($vv).eq(xx).show();
	  $(this).addClass("hover");
  });

  // 点击
  $(".TAB_CLIKE li").click(function(){
    var $vv=$(this).parent(".TAB").attr("id");
	  $($vv).hide();
	  $(this).parent(".TAB").find("li").removeClass("hover");
	  var xx=$(this).parent(".TAB").find("li").index(this);
	  $($vv).eq(xx).show();
	  $(this).addClass("hover");
  });

});