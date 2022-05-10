@extends('frontend.layout.layoutuser')
@section('content')
	<!---->
	<!-- start content -->
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
	<div class="women-product">
		<div class=" w_content">
			<div class="women">
				<a href="#"><h4>{{-- Dùng để xuất số lượng item --}}</span> </h4></a>
				<ul class="w_nav">
					<li>Sắp xếp: </li>
			     	<li><a class="active" href="#">Phổ biến</a></li> |
			     	<li><a href="#">Mới </a></li> |
			     	<li><a href="#">Sale</a></li> |
			     <div class="clearfix"> </div>
			     </ul>
			     <div class="clearfix"> </div>
			</div>
		</div>
		<!-- grids_of_4 -->
       @foreach ($book as $item)
       <form action="" method="get" enctype="multipart/form-data">
        @csrf
        <div class="grid-product">
            <a href="#"> <div class="col-md-4">
              <div class="content_box">
                  <a href="{{ url('user/showdetailPro') }}/{{ $item->idbook }}">
                     <div class="left-grid-view">
                             <img src="{{ url('public') }}/frontend/images/{{ $item->image }}"
                                 class="img-responsive watch-right" alt=""/>
                          {{-- <div class="mask">
                              <div class="info">Quick View</div>
                          </div> --}}
                    </div>
                    </a>
                </div>
                  <h4><a href="{{ url('user/showdetailPro') }}/{{ $item->idbook }}">{{ $item->namebook }}</a></h4>
                   <input type="hidden" name="idbook" value="{{ $item->idbook }}">
                   <h4>Mã sách: {{ $item->idbook }}</h4>
                   <p>{{ $item->description }}</p>
                <div class="dolor-grid">
                    <span class="actual">{{ number_format($item->price) }}   &nbsp;</span>
                    <a class="now-get get-cart" href="#">Thêm vào giỏ hàng</a>
                </div>
            </div>
        </a>
        </div>
       </form>
       @endforeach
	<div class="clearfix"> </div>
    </div>
</div>
	<!---->
@endsection
