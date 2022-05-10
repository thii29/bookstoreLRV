<!DOCTYPE html>
<head>
<title>Admin</title>
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
    <a href="#" class="logo">
        Ogani
    </a>
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
                <img alt="" src="{{ url('public')}}/backend/images/admin.png" >
                <span class="username">Admin</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{ route('ad.logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
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
                    <a class="active" href="index.php">
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
                    <a href="login.php">
                        <i class="fa fa-user"></i>
                        <span>Đăng xuất</span>
                    </a>
                </li>
            </ul>            </div>
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản lý sản phẩm
      <span class="tools pull-right">
      <a class="btn btn-primary" href="{{route('ad.getpro')}}">Thêm</a>
    </span>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Category</th>
              <th>Detail</th>
              <th>Description</th>
              <th>Price</th>
              <th>Price_SaleOff</th>
              <th> Quantity</th>
              <th>Image</th>
              <th>Status</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($book as $b)
                <tr>
                  <td>{{$b->idbook}}</td>
                  <td>{{$b->namebook}}</td>
                  <td>{{$b->id_category}}</td>
                  <td>{{$b->detailbook}}</td>
                  <td>{{$b->description}}</td>
                  <td>{{$b->price}}</td>
                  <td>{{$b->price_saleoff}}</td>
                  <td>{{ $b->quantity }}</td>
                  <td><img src="{{url('public')}}/frontend/images/{{$b->image}} "
                    weight=100px height=100px></td>
                  <td>{{$b->status}}</td>
              <td><a href="{{route('ad.geteditpro',$b->idbook)}}" class="active" ui-toggle-class="">Edit</a></td>
              <td><a href="{{route('ad.deletepro',$b->idbook)}}" class="active" ui-toggle-class="">Delete</a></td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
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
