@extends('frontend.layout.layoutuser')
@section('content')
    <!---->
	<div class="container">
			<div class="shoes-grid">
			<a href="{{ route('user.showPro') }}">
			<div class="wrap-in">
				<div class="wmuSlider example1 slide-grid">
				   <div class="wmuSliderWrapper">
                       @foreach ($book as $b)
                       @if ($b->price_saleoff != 0)
					   <article style="position: absolute; width: 100%; opacity: 0;">
						<div class="banner-matter">
						<div class="col-md-5 banner-bag">
							<img class="img-responsive" src="{{ url('public') }}/frontend/images/{{ $b->image }}" alt=" "/>
							</div>
							<div class="col-md-7 banner-off">
								<h2>SALES 0FF</h2>
								<label>{{ $b->namebook }} <br>
                                    <b>Giá: {{ number_format($b->price_saleoff) }}</b>
                                </label>
								<p>{{ $b->description }}</p>
								<span class="on-get">Mua ngay</span>
							</div>
							<div class="clearfix"> </div>
						</div>
					 	</article>
                         @endif
                         @endforeach
					 </div>
					 </a>
	                <ul class="wmuSliderPagination">
	                	<li><a href="#" class="">0</a></li>
	                	<li><a href="#" class="">1</a></li>
	                	<li><a href="#" class="">2</a></li>
	                </ul>
					 <script src="{{ url('public') }}/frontend/js/jquery.wmuSlider.js"></script>
				  <script>
	       			$('.example1').wmuSlider();
	   		     </script>
	            </div>
	    </div>
	           	</a>
	   		      <!---->
	   		     <div class="products">
	   		     	<h5 class="latest-product">SÁCH</h5>
	   		     	  <a class="view-all" href="{{ route('user.showPro') }}">Xem tất cả<span></span></a>
	   		     </div>
	   		     <div class="product-left">
                 @foreach ($book as $key)
                    <div class="col-md-4 grid-chain-bottom">
                        <a href="{{ url('user/showdetailPro') }}/{{ $key->idbook }}">
                            <img class="img-responsive chain" src="{{ url('public') }}/frontend/images/{{ $key->image }}" alt=" " /></a>
                        <span class="star"></span>
                        <div class="grid-chain-bottom">
                            <h6><a href="{{ url('user/showdetailPro') }}/{{ $key->idbook }}">{{ $key->namebook }}</a></h6>
                            <div class="star-price">
                                <div class="dolor-grid">
                                    <span class="actual">{{ $key->price }}</span>
                                </div>
                                <a class="now-get get-cart" href="#">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                @endforeach
	   		    </div>
	   		   </div>
			   <div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
					<h3 class="cate">Danh mục</h3>
		 <ul class="menu">
		{{-- <li class="item1"><a href="#">Curabitur sapien<img class="arrow-img" src="{{ url('public') }}/frontend/images/arrow1.png" alt=""/> </a>
			<ul class="cute">
				<li class="subitem1"><a href="{{route('user.showPro')}}">Cute Kittens </a></li>
				<li class="subitem2"><a href="{{route('user.showPro')}}">Strange Stuff </a></li>
				<li class="subitem3"><a href="{{route('user.showPro')}}">Automatic Fails </a></li>
			</ul>
		</li> --}}
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
	   		    <a class="view-all all-product" href="{{route('user.showPro')}}">Xem tất cả sản phẩm<span> </span></a>
			</div>
	   		<div class="clearfix"> </div>
		</div>

	<!---->
@endsection

