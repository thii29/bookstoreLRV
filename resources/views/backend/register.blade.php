<!DOCTYPE html>
<head>
<title>Admin-Register</title>
@extends('backend.layout.layoutform')
@yield('header')
</head>
<body>
<div class="reg-w3">
<div class="w3layouts-main">
	<h2>ĐĂNG KÝ</h2>
		<form action="{{ route('ad.reg') }}" method="post" enctype="multipart/form-data">
            @csrf
			<input type="text" class="ggg" name="fullname" placeholder="Nhập họ tên" required="">
			<input type="email" class="ggg" name="email" placeholder="Nhập e-mail" required="">
			<input type="password" class="ggg" name="password" placeholder="Nhập password" required="">
				<div class="clearfix"></div>
				<input type="submit" value="ĐĂNG KÝ" name="register">
		</form>
		<p>Quay về đăng nhập.<a href="{{ route('ad.showLogin') }}">Login</a></p>
</div>
</div>
@yield('script')
</body>
</html>
