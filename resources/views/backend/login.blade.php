<!DOCTYPE html>
<head>
<title>Admin-Login</title>
@extends('backend.layout.layoutform')
@yield('header')
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>ĐĂNG NHẬP</h2>
		<form action="{{ route('ad.login') }}" method="post" enctype="multipart/form-data">
            @csrf
			<input type="text" class="ggg" name="email" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
			<span style="float:left"><a href="{{ route('ad.showregister') }}">Đăng ký</a></span>
            <span style="float:right"><input type="checkbox"/> Nhớ mật khẩu</span>
				<div class="clearfix"></div>
				<input type="submit" value="ĐĂNG NHẬP" name="login">
		</form>
</div>
</div>
@yield('script')
</body>
</html>
