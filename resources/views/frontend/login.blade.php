@extends('frontend.layout.layoutuser')
@section('content')
	<!---->
	<div class="container">

      	   <div class="account_grid">
			   <div class="login-right">
			  	<h3><b>ĐĂNG NHẬP</b></h3>
                  <div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                           @foreach ($errors->all() as $error)
                           <li> {{ $error }}</li>
                           @endforeach
                        </ul>
                     </div>
                     @endif
                  </div>
                  <div>
                      @if (session()->has('mess'))
                          {{ session('mess') }}
                      @endif
                  </div>
				<p>Nếu bạn đã có tài khoản hãy đăng nhập để mua hàng</p>
				<form action="{{ route('user.postlogin') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div>
                    <span>Mã khách hàng: <label>*</label></span>
                      <input type="text" name="id" value="{{ old('id') }}">
                  </div>
				  <div>
					<span>Email <label>*</label></span>
					<input type="text" name="email" value="{{ old('email') }}">
				  </div>
				  <div>
					<span>Mật khẩu <label>*</label></span>
					<input type="text" name="password" value="{{ old('password') }}">
				  </div>
				  <input type="submit" value="Login">
                  &nbsp; &nbsp;
				  <a class="forgot" href="#">Bạn quên mật khẩu?</a>
			    </form>
			   </div>
			    <div class=" login-left">
			  	 <h3>NEW ACCOUNT</h3>
				 <p>Nếu bạn chưa có tài khoản, hãy tạo tài khoản để dễ dàng mua sách và kiểm tra lịch sử mua</p>
				 <a class="acount-btn" href="{{ route('user.showRegister') }}">Create an Account</a>
			   </div>
			   <div class="clearfix"> </div>
			 </div>
			 <div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
					<h3 class="cate">Danh mục</h3>
		 <ul class="menu">

        @foreach ($cate as $c)
        <li>
			<ul class="kid-menu">
				<li><a href="{{route('user.showPro')}}">{{ $c->name }}</a></li>
			</ul>
		</li>
        @endforeach
	</ul>
	</div>
				<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });

			});
		</script>
             </div>
	   		<div class="clearfix"> </div>
	</div>
	<!---->
@endsection
