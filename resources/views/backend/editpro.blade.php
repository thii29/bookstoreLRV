<!DOCTYPE html>
<head>
<title>Admin Ogani</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Admin Ogani" />
<script type="application/x-javascript">
  addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
  function hideURLbar(){ window.scrollTo(0,1); }
 </script>
<link rel="stylesheet" href="{{url('public')}}/backend/css/bootstrap.min.css" >
<link href="{{url('public')}}/backend/css/style.css" rel='stylesheet' type='text/css' />
<link href="{{url('public')}}/backend/css/style-responsive.css" rel="stylesheet"/>
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{url('public')}}/backend/css/font.css" type="text/css"/>
<link href="{{url('public')}}/backend/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="{{url('public')}}/backend/css/morris.css" type="text/css"/>
<link rel="stylesheet" href="{{url('public')}}/backend/css/monthly.css">
<script src="{{url('public')}}/backend/js/jquery2.0.3.min.js"></script>
<script src="{{url('public')}}/backend/js/raphael-min.js"></script>
<script src="{{url('public')}}/backend/js/morris.js"></script>
</head>
<body>
<section id="container">
<header class="header fixed-top clearfix">
<div class="brand">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<div class="nav notify-row" id="top_menu">
</div>
<div class="top-nav clearfix">
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/admin.png">
                <span class="username">Admin</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{route('ad.logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
    </ul>
</div>
</header>
<aside>
    <div id="sidebar" class="nav-collapse">
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="}">
                        <i class="fa fa-dashboard"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Quản lý</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('ad.category')}}">Category</a></li>
                        <li><a href="{{route('ad.product')}}">Product</a></li>
                        <li><a href="{{route('ad.order')}}">Order</a></li>
                        <li><a href="{{route('ad.user')}}">User</a></li>
                        <li><a href="{{route('ad.admin')}}">Admin</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('ad.logout')}}">
                        <i class="fa fa-user"></i>
                        <span>Đăng xuất</span>
                    </a>
                </li>
            </ul>
          </div>
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Product
      <span class="tools pull-right">
        <a class="btn-btn-primary" href="{{route('ad.addpro')}}">Thêm</a>
      </span>
    </div>
    <div class="table-responsive">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="panel-body">
                        <div class=" form">
                            <form class="cmxform form-horizontal "
                             id="commentForm" method="post" action="{{route('ad.editpro')}}"
                                  novalidate="novalidate"  enctype="multipart/form-data">
                                  <input type="hidden" name="_method" value="PUT">
                            @csrf

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">ID</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="idbook"
                                            value="{{ $book->idbook }}" minlength="2" type="text" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Namebook</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="namebook"
                                            value="{{ $book->namebook }}" minlength="2" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Category</label>
                                        <div class="col-lg-6">
                                        <select name="id_category">
                                            @foreach ( $category as $cate)
                                            @if ($cate->id == $book->id_category)
                                                <option value="{{ $cate->id }}" selected>{{ $cate->name }}</option>
                                            @endif
                                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Detail</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="detailbook"
                                            value="{{$book->detailbook}}" minlength="2" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Description</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="description"
                                            value="{{$book->description}}" minlength="2" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Price</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="price"
                                            value="{{$book->price}}" minlength="2" type="text" required="">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Price saleoff</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="price_saleoff"
                                            value="{{$book->price_saleoff}}" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Quantity</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="quantity"
                                            value="{{$book->quantity}}" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Image</label>
                                        <div class="col-lg-6">
                                            <!-- <input class=" form-control" id="cname" name="name" minlength="2" type="text" required=""> -->
                                            <input type="file" name="image"
                                            value="{{url('public')}}/frontend/images/{{$book->image}}" class="custom-file-input" id="chooseFile">
                                            <img src="{{url('public')}}/frontend/images/{{$book->image}}" alt="" width="85%">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Status</label>
                                        <div class="col-lg-6">
                                        <select name="status">
                                                    <option value="0">
                                                       Active
                                                    </option>
                                                    <option value="1">
                                                       Unactive
                                                    </option>
                                                </select>
                                        </div>
                                    </div>

                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Edit</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">
          {{-- <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul> --}}
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
 <!-- footer -->
 <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2022 Visitors. All rights reserved | Design by <a href="index.php">Ogani</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="{{url('public')}}/backend/js/bootstrap.js"></script>
<script src="{{url('public')}}/backend/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="{{url('public')}}/backend/js/scripts.js"></script>
<script src="{{url('public')}}/backend/js/jquery.slimscroll.js"></script>
<script src="{{url('public')}}/backend/js/jquery.nicescroll.js"></script>
<script src="{{url('public')}}/backend/js/jquery.scrollTo.js"></script>
<script type="{{url('public')}}/backend/text/javascript" src="js/monthly.js"></script>
</body>
</html>
