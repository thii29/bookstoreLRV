<!DOCTYPE html>
<html>
<head>
<title>Book Shop</title>
<link href="{{ url('public') }}/frontend/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="{{ url('public') }}/frontend/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="{{ url('public') }}/frontend/js/jquery.min.js"></script>
<!--script-->
</head>
<body>
	<!--header-->
    <div class="header">
        <div class="bottom-header">
            <div class="container">
                <div class="header-bottom-left">
                    <div class="logo">
                        <a href="{{ route('user.index') }}">
                            <img src="{{ url('public') }}/frontend/images/logo.png" alt=" " />
                        </a>
                    </div>
                    <div class="search">
                        <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
                        <input type="submit"  value="SEARCH">
                    </div>
                </div>
                <div class="header-bottom-right">
                        <div class="account">
                            <a href="{{ route('user.showLogin') }}">
                                 <span> </span>
                                 @if(session()->has('login'))
                                 {{ session('login')['fullname'] }}
                                 @else
                                 Your Account
                                 @endif
                            </a>
                       </div>
                            <ul class="login">
                                <li ><a href="{{ route('user.showRegister') }}">SIGNUP</a></li>
                                <li><a href="{{ route('user.showLogin') }}"><span> </span>
                                    @if(session()->has('login'))
                                    <a href="{{ route('user.logout') }}">LOG OUT</a>
                                    @else
                                    <a href="{{ route('user.showLogin') }}">LOG IN</a>
                                    @endif</a></li>
                            </ul>
                        <div class="cart"><a href="#"><span> </span>CART</a></div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

@yield('content')

{{-- footer --}}
<div class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="latter">
                <h6>Để lại email</h6>
                <div class="sub-left-right">
                    <form >
                        <input type="text" value="Enter email here"
                               onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = 'Enter email here';}" />
                        <input type="submit" value="Nhập Email"/>
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="latter-right">
                <p><b><a href="{{ route('user.contact') }}">Liên hệ</a></b></p>
                <p>hoặc</p>
                <p>Follow</p>
                <ul class="face-in-to">
                    <li><a href="#"><span class="facebook-in"> </span></a></li>
                    <div class="clearfix"> </div>
                </ul>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-cate">
                <h6>Tác giả nổi bật</h6>
                <ul>
                    <li><a href="#">Cố Mạn</a></li>
                    <li><a href="#">Diệp Lạc Vô Tâm</a></li>
                    <li><a href="#">Nguyễn Nhật Ánh</a></li>
                    <li><a href="#">Nguyễn Minh Nhật/a></li>
                    <li ><a href="#">Tuệ Nhi</a></li>
                    <li ><a href="#">Tiểu Tân</a></li>
                </ul>
            </div>
            <div class="footer-bottom-cate bottom-grid-cat">
                <h6>Nhà xuất bản</h6>
                <ul>
                    <li><a href="#">Nhà xuất bản Kim Đồng</a></li>
                    <li><a href="#">Nhà xuất bản Văn Học Việt Nam</a></li>
                    <li><a href="#">Nhà xuất bản Thanh niên</a></li>
                    <li ><a href="#">Nhà xuất bản Giáo dục</a></li>
                </ul>
            </div>
            <div class="footer-bottom-cate">
                <h6>Thể loại</h6>
                <ul>
                   @foreach ($cate as $k)
                        <li><a href="#">{{ $k->name }}</a></li>
                   @endforeach
                </ul>
            </div>
            <div class="footer-bottom-cate cate-bottom">
                <h6>Địa chỉ</h6>
                <ul>
                    <li>108 Cao Lỗ, Quận 8, TP.HCM</li>
                    <li> MAIL: lazymeomeo@gmail.com</li>
                    <li class="phone"> Holine : 023456789</li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
</body>
</html>
