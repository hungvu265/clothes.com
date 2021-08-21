<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<base href="{{ asset('') }}">
	<link rel="stylesheet" type="text/css" href="css/index1.css">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	@include('admin.header')

	<!-- middle -->
	<div class="middle">
		<div class="row">
			<!-- menu -->
			<div class="col-lg-2 col-md-3 col-sm-4">
				<ul class="menu">
					<li class="dropdown1">
						<button class="dropbtn">Thể loại
							<i></i>
						</button>
						<div class="dropdown-content" id="theloai">
							<a href="admin/theloai/danhsach">Danh sách</a>
							<a href="admin/theloai/them">Thêm thể loại</a>
						</div>
					</li>
					<li class="dropdown1">
						<button class="dropbtn">Loại sản phẩm
							<i></i>
						</button>
						<div class="dropdown-content" id="loaisanpham">
							<a href="admin/loaisanpham/danhsach">Danh sách</a>
							<a href="admin/loaisanpham/them">Thêm loại sản phẩm</a>
						</div>
					</li>
					<li class="dropdown1">
						<button class="dropbtn">Sản phẩm
							<i></i>
						</button>
						<div class="dropdown-content" id="sanpham">
							<a href="admin/sanpham/danhsach">Danh sách</a>
							<a href="admin/sanpham/them">Thêm sản phẩm</a>
						</div>
					</li>
					<li class="dropdown1">
						<button class="dropbtn">Nhân viên
							<i></i>
						</button>
						<div class="dropdown-content" id="nhanvien">
							<a href="admin/nhanvien/danhsach">Danh sách</a>
							<a href="admin/nhanvien/them">Thêm nhân viên</a>
							<a href="admin/nhanvien/hoatdong">Hoạt động</a>
						</div>
					</li>
					<li class="dropdown1">
						<button class="dropbtn">Khách hàng
							<i></i>
						</button>
						<div class="dropdown-content" id="khachhang">
							<a href="admin/khachhang/danhsach">Danh sách</a>

						</div>
					</li>
				</ul>
			</div>
			<!-- content -->
			<div class="col-lg-10 col-md-9 col-sm-8">
				@yield('content')
			</div>		
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".dropbtn i").prop('class', 'fas fa-chevron-left float-right');
			$(".dropbtn").click(function(event) {
				var check = $(this).closest('.dropdown1').find('.dropdown-content').css('display');
				if(check == 'block')
				{
					$(this).closest('.dropdown1').find('.dropdown-content').css('display', 'none');
					$(this).closest('.dropdown1').find('i').prop('class', 'fas fa-chevron-left float-right');
				}
				else{
					$(".dropdown-content").css('display', 'none');
					$(".dropbtn i").prop('class', 'fas fa-chevron-left float-right');
					$(this).closest('.dropdown1').find('.dropdown-content').css('display', 'block');
					$(this).closest('.dropdown1').find('i').prop('class', 'fas fa-chevron-down float-right');
				}			
			});
		});
	</script>
</body>
</html>