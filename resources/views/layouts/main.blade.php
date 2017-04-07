<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>@yield('title')</title>
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
		<script src="{{ asset('/js/laroute.js') }}"></script>
	</head>

	<body>
		<header>
			<div id="header-top">
				<div class="container">
					<div class="row">
						<div class="col-md-offset-6 col-md-6 col-lg-6">
							<ul>
								<li><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="{{ action('BillController@index') }}"><span id="slSP">{{ Cart::content()->count() }} </span> sản phẩm</a></li>
								@if (Auth::check())
									<li>
										<a href="{{ action('CustomerController@index') }}">{{ Auth::user()->name }}</a>
									</li>
									<li style="width:12%;">
										<a href="{{ url('/logout') }}"
						                    onclick="event.preventDefault();
						                             document.getElementById('logout-form').submit();">
						                    Logout
						                </a>
						                
						                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
						                    {{ csrf_field() }}
						                </form>
									</li>
								@else
									<li>
										<i class="fa fa-user" aria-hidden="true"></i>
										<a href="{{ action('Auth\LoginController@login') }}">Đăng nhập</a>
									</li>
									<li>
										<i class="fa fa-user-plus" aria-hidden="true"></i>
										<a href="{{ action('Auth\RegisterController@register') }}">Đăng ký</a>
									</li>
								@endif
							</ul>		
						</div>		
					</div>
				</div>
			</div>
			<div class="clearfix">
			</div>
			<div id="header-content">
				<div class="container">
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<a href="{{ url('/') }}">
								<img src="//bizweb.dktcdn.net/100/085/087/themes/106386/assets/logo.png?1483437497404" alt="">
							</a>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
							<div id="content-right">
								<div class="row">
									<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
										<div id="seach-header">
											<form action="#" method="POST" role="form">
												<div class="input-group">
												  <input type="text" class="form-control" placeholder="Nhập từ khóa ..." aria-describedby="basic-addon1" id="search">
												  <span class="input-group-addon" id="basic-addon1">
												  		<button type="button" id="search">
												  			Tìm
														</button>
												  </span>
												</div>
											</form>
											<ul id="resul-search"></ul>
										</div>
									</div>
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										<div id="header-hotline">Hotline : <strong>016665822222</strong></div>
									</div>
									<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
										<div id="header-cart">
											<a href="{{ action('BillController@index') }}">
												<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												<span id="slSP">{{ Cart::content()->count() }}</span> 
												sản phẩm
											</a>
										</div>
									</div>
								</div>
							</div>
							<div id="header-nav">
								<ul class="list-inline">
									<li class="active"><a href="#">Trang Chủ</a></li>
									<li><a href="#">Sản Phẩm</a></li>
									<li><a href="#">Giới Thiệu</a></li>
									<li><a href="#">Tư Vấn</a></li>
									<li><a href="#">Tuyển Dụng</a></li>
									<li><a href="#">Liên Hệ</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header><!-- /header -->
		<div id="wrapper">
			@yield('content')
		</div>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div id="footer-info">
							<h3>Công ty cổ phần VINATEK</h3>
							<ul>
								<li class="active">Tp. Hà Nội</li>
								<li>QL32, Nhổn, Minh Khai, Bắc Từ Liêm, Nhổn, Minh Khai Từ Liêm Hà Nội</li>
								<li>04 3765 5121</li>
								<li>09748569854</li>
								<li>dhcnhn@edu.com</li>
							</ul>
						</div>
					</div>
					<div class="col-md-4">
						<div id="footer-policy">
							<ul>
								<li class="active"><a href="#">Hỗ trợ mua hàng</a></li>
								<li><a href="#">Hỗ trợ mua hàng trực tuyến</a></li>
								<li><a href="#">Các hình thức thanh toán</a></li>
								<li><a href="#">Hướng dẫn mua hàng trả góp</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4">
						<div id="footer-map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14893.939389846553!2d105.7355306!3d21.0532889!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x20ac91c94d74439a!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBIw6AgTuG7mWk!5e0!3m2!1sen!2s!4v1486023979796" width="100%" height="210" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</footer>
		{{-- Jquery --}}
		{!! Html::script(elixir('/js/jquery.js')) !!}
		<!-- Bootstrap JavaScript -->
		{!! Html::script(elixir('/js/bootstrap.min.js')) !!}
		{!! Html::script(elixir('/js/ajax/Cart.js')) !!}
		{!! Html::script(elixir('/js/ajax/searchHome.js')) !!}
		@yield('sc')
		<script>
			$(document).ready(function() {
				$('.alert').delay(5000).slideUp();
			});
		</script>
	</body>
</html>