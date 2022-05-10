@extends('frontend.layout.layoutuser')
@section('content')
	<!---->
	<div class="container">

		<div class="register">
		  	  <form>
				 <div class="  register-top-grid">
					<h3>Thông tin đăng ký</h3>
					<div class="mation">
						<span>Họ tên <label>*</label></span>
						<input type="text" name="fullname">

						 <span>Email <label>*</label></span>
						 <input type="text" name="email">

                         <span>Số điện thoại <label>*</label></span>
						 <input type="text" name="phone">
					</div>
    				 </div>
				     <div class="register-bottom-grid">
							<div class="mation">
								<span>Mật khẩu <label>*</label></span>
								<input type="password" name="password">
							</div>
					 </div>
				</form>
				<div class="clearfix"> </div>
				<div class="register-but">
				   <form>
					   <input type="submit" value="Đăng Ký">
					   <div class="clearfix"> </div>
				   </form>
				</div>
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
