<script type="text/javascript">
$(document).ready(function() {
	$.get('store/taskleft', function(data) {
		var tong = 0;
		var soluong = 0;
		$.each(data, function(index, val) {
			tong += Number(val.tong);
			soluong += val.soluong;
			$("#scroll-giohang").append('<div class="row"><div class="col-md-5"><img src="images/800x800/'+ val.hinhanh +'"></div><div class="col-md-7"><strong></strong><div class="product-giohang"><div style="font-weight: 600;"><p>Giá: </p><p>'+ String(val.tong).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND' +'</p></div><div style="font-weight: 600;"><p>Đơn:</p><p>'+ String(val.dongia).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND' + '</p></div><div style="font-weight: 600;"><p>Số lượng: </p><p>'+ val.soluong +'</p></div></div></div><hr></div>');
		});
		$("#tong-giohang p").text(String(tong).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND');
		$("#soluong").text(soluong);
	});
});

function cart(id){
	$.get('store/addgiohang/'+id, function(data) {
		$("#scroll-giohang").empty();
		var tong = 0;
		var soluong = 0;
		$.each(data, function(index, val) {
			tong += Number(val.tong);
			soluong += val.soluong;
			$("#scroll-giohang").append('<div class="row"><div class="col-md-5"><img src="images/800x800/'+ val.hinhanh +'"></div><div class="col-md-7"><strong></strong><div class="product-giohang"><div style="font-weight: 600;"><p>Giá: </p><p>'+ String(val.tong).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND' +'</p></div><div style="font-weight: 600;"><p>Đơn:</p><p>'+ String(val.dongia).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND' + '</p></div><div style="font-weight: 600;"><p>Số lượng: </p><p>'+ val.soluong +'</p></div></div></div><hr></div>');
		});
		$("#tong-giohang p").text(String(tong).replace(/(.)(?=(\d{3})+$)/g,'$1.') + ' VND');
		$("#soluong").text(soluong);
	});
}
</script>