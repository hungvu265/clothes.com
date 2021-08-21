@extends('admin.index')

@section('content')
<div style="display: flex; justify-content: flex-start;">
	<h3 class="text-primary">SẢN PHẨM</h3>
	<p class="ml-2 font-weight-bold">Danh sách</p>
</div>
<hr class="w-25" style="border-bottom: 2px solid">
<form action="" method="">
	@csrf
	<table class="table table-bordered">
		<thead>
			<tr class="text-center">
				<th>Id</th>
				<th>Hình ảnh</th>
				<th>Tên sản phẩm</th>
				<th>Tên không dấu</th>
				<th>Số lượng</th>
				<th>Đơn giá</th>
				<th>Loại sản phẩm</th>
				<th>Thể loại</th>
				<th colspan="2"></th>
			</tr>
		</thead>
		<tbody>
			@if($sanpham)
			@foreach($sanpham as $sp)
			<tr id="row{{ $sp->id }}" class="text-center">

				<td>{{ $sp->id }}</td>
				<td><img src="images/800x800/{{ $sp->hinhanh }}" class="img-thumbnail" style="width: 200px;"></td>
				<td>{{ $sp->ten }}</td>
				<td>{{ $sp->tenkdau }}</td>
				<td>{{ $sp->soluong }}</td>
				<td>{{ $sp->dongia }}</td>
				<td>{{ $sp->loaisanpham->ten }}</td>
				<td>{{ $sp->loaisanpham->theloai->ten }}</td>
				<td><a href="admin/sanpham/thaydoi/{{ $sp->id }}" class="btn btn-primary">Thay đổi</a></td>
				<td><a href="javascript:void(0)" class="btn btn-danger" onclick="xoa({{ $sp->id }})">Xóa</a></td>
			</tr>
			@endforeach
			@endif
		</tbody>
	</table>
</form>

<script type="text/javascript">
	function xoa(id){
		if(confirm("Bạn có chắc chắn muốn xóa không?")){
			$.get('admin/sanpham/xoa/'+id, function(data) {
				if(data){
					$('#row'+id).remove();
				}
			});
		}
		
	}
</script>

@endsection
