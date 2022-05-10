@extends('frontend.layout.layoutuser')
@section('content')
	<!---->

	 <div class="container">
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
	 	<div class=" single_top">
	      <div class="single_grid">
				<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image"
                                         src="{{ url('public') }}/frontend/images/{{ $detail->image }}" class="img-responsive"
                                         style="width: 90%" />
								</a>
							</li>
						</ul>
						 <div class="clearfix"> </div>
				  </div>
				  <div class="desc1 span_3_of_2">

					<h4>{{ $detail->namebook }}</h4>
				<div class="cart-b">
					<div class="left-n ">{{ number_format($detail->price) }} VND</div>
				    <a class="now-get get-cart-in" href="#">Thêm vào giỏ hàng</a>
				    <div class="clearfix"></div>
				 </div>
				 {{-- <h6>Dem so luong hang con lai</h6> --}}
			   	<p>{{ $detail->detailbook }}</p>
				</div>
          	    <div class="clearfix"> </div>
          	   </div>

	<script type="text/javascript" src="{{ url('public') }}/frontend/js/jquery.flexisel.js"></script>

     	<div class="toogle">
	   	<h3 class="m_3">Mô tả:</h3>
	   	<p class="m_text">{{ $detail->description }}</p>
	   </div>
       {{-- Dung đê in những sản phẩm nổi bật # --}}
    {{-- <ul id="flexiselDemo1">
        <li><img src="images/pi.jpg" /><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li>
        <li><img src="images/pi1.jpg" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li>
        <li><img src="images/pi2.jpg" /><div class="grid-flex"><a href="#">Zumba</a><p>Rs 850</p></div></li>
        <li><img src="images/pi3.jpg" /><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li>
        <li><img src="images/pi4.jpg" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li>
     </ul> --}}
    <script type="text/javascript">
     $(window).load(function() {
        $("#flexiselDemo1").flexisel({
            visibleItems: 5,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 3
                }
            }
        });

    });
</script>
    </div>
    <div class="clearfix"></div>

    <!---->

	<!---->
	@endsection
