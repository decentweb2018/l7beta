// Menu Toggle
jQuery( document ).ready(function($) {
	$(".menu-toggle, .slide-out-container .bg-overlay, .slide-out-container .btn-close").click(function () {
		$(".sidemenu__overlay").toggleClass("sidemenu__overlay_open");
	});
  
  /*Close menu if click overlay*/
  $('.sidemenu__overlay').click(function(){
    $(this).removeClass('sidemenu__overlay_open');
    $('#sidebar').removeClass('active');
    $('body').removeClass('scroll-stop');
  });
  
  $('.menu-toggle').click(function(){
    $('body').toggleClass('scroll-stop');
  });
  
  
});

/*
 * Mobile Menu
 */
//$(document).mouseup(function(e) {
//  var $menu = $('.menuSb_box');
//  var $btn  = $(".btn_toggleMenuSb");
//  
//  if (!$menu.is(e.target) && !$btn.is(e.target)
//    && $menu.has(e.target).length === 0) { 
//	$menu.removeClass('extend');
//    $('a.btn_toggleMenuSb').removeClass('active');
//  }
//});

