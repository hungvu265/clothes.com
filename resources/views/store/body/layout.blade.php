<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
	<base href="{{ asset('') }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/icon/fontawesome-free-5.15.3-web/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/store/backup.css">
	<script language="javascript" src="{{ asset('css/store/js.js') }}"></script>
</head>
<body>
	@include('store.body.navbar')

	@yield('content')

	@include('store.body.footer')	

</body>
</html>