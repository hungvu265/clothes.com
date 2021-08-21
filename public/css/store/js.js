$(document).ready(function() {
	//show taskbar-left va tro ve dau trang
	$(window).scroll(function(event) {
		var pos = $('html, body').scrollTop();
			if(pos >= 500){
				$("#scroll-top").css('opacity', '1');
				$(".taskbar-left").css('opacity', '1');
			}
			else{
				$("#scroll-top").css('opacity', '0');
				$(".taskbar-left").css('opacity', '0');
			}
	});

	//dropdown
	$(".giohang").click(function(event) {
		var check = $(".dropdown-giohang").css('display');
		if(check == 'block'){
			$(".dropdown-giohang").css('display', 'none').removeClass('animate__bounceIn');
		}
		else{
			$(".dropdown-giohang").css('display', 'block').addClass('animate__bounceIn');
		}
	});
	
	//tro ve dau trang
	$("#scroll-top").click(function(event) {
		$("html, body").animate({ scrollTop:0 }, 1400);
	});

	//thay doi so luong
	$(".tang").click(function(event) {
		var tg = $(this).closest('.slg-sanpham');
		var sl = Number(tg.find(".soluong-sanpham").val());
		tg.find(".soluong-sanpham").val(sl+1);
		tg.find(".giam").css({
			cursor: 'pointer',
			color: 'red'
		});

		
	});
	$(".giam").click(function(event) {
		var tg = $(this).closest('.slg-sanpham');
		var sl = Number(tg.find('.soluong-sanpham').val());
		if(sl > 2){
			tg.find('.soluong-sanpham').val(sl-1);
		}
		else{
			tg.find('.soluong-sanpham').val(1);
			$(this).css({
				cursor: 'not-allowed',
				color: 'black'
			});
		}
		
	});

	//dropdown-danhsach
	$(".dropdown-danhsach").click(function(event) {
		var container = $(this);
		var check = container.find('.dropdown-content').css('display');
		if(check == 'block'){
			container.find('.dropdown-content').css('display', 'none');
		}
		else{
			container.find('.dropdown-content').css('display', 'block');
		}
	});

	$(".add-cart").click(function(event) {
		$("#add-cart-effect").fadeIn('slow').fadeOut('slow');
	});
	
});
