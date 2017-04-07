@extends('layouts.main')
@section('title', 'Home page')
@section('content')
<section id="policy">
	<div class="container">
		<div class="row">
			<div class="sub-policy col-md-3">Sản phẩm chính hãng</div>
			<div class="sub-policy col-md-3">Bảo hành dài hạn</div>
			<div class="sub-policy col-md-3">Giao hàng toàn quốc</div>
			<div class="sub-policy col-md-3">Hỗ trợ 24/7</div>
		</div>
	</div>
</section><!-- /section#policy -->
<section id="bg-slide">
	<div class="container">
		<div class="row">
			<div class="col-xs-3 col-md-3 col-md-3 col-lg-3">
				<div id="list-group-title">
				<i class="fa fa-bars fa-list-group" aria-hidden="true"></i style="margin-right: 10px;">
					Danh Mục Sản Phẩm
				</div>
				<div class="list-group">
					@foreach ($categories as $category)
						@if ($category->parent_id == 0)
							<li class="dropdown">
								<a href="{{ action('ProductController@showFollowCategory',[$category->alias, $category->id]) }}" class="dropdown-toggle" data-toggle="dropdown">{{ $category->name }} <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-2 dropdown-menu-right">
									   	<div class="row">
							            	{{ cate_list($categories, $category->id) }}
									    </div>
								</ul>
							</li>
						@endif
					@endforeach
				</div>
			</div>
			<div class="col-md-9">
				<div id="carousel-id" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carousel-id" data-slide-to="0" class=""></li>
						<li data-target="#carousel-id" data-slide-to="1" class=""></li>
						<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
					</ol>
					<div class="carousel-inner">
					@foreach ($sliders as $slider)
						<div class="item {{ $loop->first ? 'active' : '' }}">
							<img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="{{ $slider->description }}" src="{{ asset('image/slider/' . $slider->image) }}">
							<div class="container">
								<div class="carousel-caption">
								</div>
							</div>
						</div>
					@endforeach
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section> <!-- /section#bg-slide -->
	<section id="Pc">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
					<div id="product-title">
						<h3>Sản phẩm PC</h3>
					</div>
					<div id="product-box">
					@foreach ($ItemPC as $item)
						<div class="sub-product">
						<a href="javascript:void(0)"" id="buy" class="{{ $item->id }}" data-url="{{ url('/') }}">Mua</a>
							<div class="pro-img">
								<a href="{{ action('ProductController@show', $item->id) }}">
									<img src="{{ asset('image/upload/'.$item->avatar) }}" alt="{{ $item->alias }}" class="img-responsive">
								</a>
							</div>
							<div class="pro-content">
								<h4 class="pro-name">
									<a href="{{ action('ProductController@show', $item->id) }}">{{ $item->name }}</a>
								</h4>
							<div class="pro-price">
								<p class="price-new">{{ number_format($item->price) }} VNĐ</p>
									<p class="price-old">
										@if ($item->sale)
											<del>
											{{ number_format($item->price - ($item->price*$item->sale)) }} VNĐ
										</del>
										@endif
									</p>
							</div>
							</div>
						</div>
					@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="laptop">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
					<div id="product-title">
						<h3>Sản phẩm Laptop</h3>
					</div>
					<div id="product-box">
					@foreach ($ItemLaptop as $items)
						<div class="sub-product">
							<a href="javascript:void(0)"" id="buy" class="{{ $items->id }}" data-url="{{ url('/') }}">Mua</a>
							<div class="pro-img">
								<a href="{{ action('ProductController@show', $items->id) }}">
									<img src="{{ asset('image/upload/'.$items->avatar) }}" alt="{{ $items->alias }}" class="img-responsive">
								</a>
							</div>
							<div class="pro-content">
								<h4 class="pro-name">
									<a href="{{ action('ProductController@show', $items->id) }}">{{ $items->name }}</a>
								</h4>
							<div class="pro-price">
								<p class="price-new">{{ number_format($items->price) }} VNĐ</p>
									<p class="price-old">
										@if ($item->sale)
											<del>
											{{ number_format($items->price - ($items->price*$items->sale)) }} VNĐ
										</del>
										@endif
									</p>
							</div>
							</div>
						</div>
					@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
@stop
@section('sc')
	<script>
	   $(function() {
	        $(".dropdown").hover(
	            function(){ $(this).addClass('open') },
	            function(){ $(this).removeClass('open') }
	        );
	        $('.dropdown').click(function() {
	        	var url = $(this).find('a').attr('href');
	        	$(location).attr('href', url)
	        });
	    });
	</script>
@stop