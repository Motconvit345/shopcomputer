@extends('layouts.main')
@section('title', 'Dell 3521')
@section('content')
	<div id="main-breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
					  <li class="breadcrumb-item"><a href="{{ url('all-product/cid-0') }}">Sản Phẩm</a></li>
					  <li class="breadcrumb-item active">{{ $item->name }}</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<div id="main-product">
		<div class="container">
			<div class="row">
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" id="content-product">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<div id="product-img">
								<div class="row">
		<!-- 							<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 vticker" id="sub-img" style="padding: 0;">
			<ul>
				<li>
					<a href="#"><img src="http://img.bbystatic.com/BestBuy_US/images/products/5579/5579128ld.jpg" alt=""></a>
				</li>
				<li>
					<a href="#"><img src="http://img.bbystatic.com/BestBuy_US/images/products/5579/5579128ld.jpg" alt=""></a>
				</li>
				<li>
					<a href="#"><img src="http://img.bbystatic.com/BestBuy_US/images/products/5579/5579128ld.jpg" alt=""></a>
				</li>
				<li>
					<a href="#"><img src="http://img.bbystatic.com/BestBuy_US/images/products/5579/5579128ld.jpg" alt=""></a>
				</li>
			</ul>
		</div> -->
									<div class="col-md-12" id="main-img">
										<img src="{{ asset('image/upload/'. $item->avatar) }}" id="zoom_01" data-zoom-image="{{ asset('image/upload/'. $item->avatar) }}">
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<div id="info-product">
								<h1 itemprop="name" class="pd-name">{{ $item->name }}</h1>
								<div id="orderItem">
			                        <input type="number" size="2" value="1" min="1" id="sl{{ $item->id }}">
			                        <a href="javascript:void(0)" id="{{ $item->id }}" class="button-1"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Mua Hàng</a>
			                    </div>
								<p class="prod-price">
								@if ($item->sale == 0)
									<b>Giá: </b> <span class="price pd-price"> {{ number_format($item->price - ($item->price*$item->sale)) }}  VNĐ</span> 
									@else
									<b>Giá: </b> <span class="price pd-price"> {{ number_format($item->price - ($item->price*$item->sale)) }}  VNĐ</span>
									<span class="compare-price"><b>GNY: </b> <del>{{ number_format($item->price)  }} VNĐ</del></span>
								@endif
								</p>
								<div class="pd-description-mini"><p><strong>Hãng sản xuất: </strong>{{ $item->category->name }}</p>
									<p><strong>Xuất xứ: </strong>{{ $item->made }}</p>
									<p><strong>Bảo hành: </strong>{{ $item->guarantee }} năm</p>
									<p><strong>Giới thiệu ngắn: &nbsp;</strong>{{ $item->description }}</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div id="info-detail">
								<h2><b>Thông tin sản phẩm</b></h2>
								{{ $item->detail }}
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<aside>
						<h2>Sản phẩm khác</h2>
						<div id="other-product">
							<ul>
								@foreach ($otherProducts as $otherProduct)
									<li>
										<a href="{{ action('ProductController@show', $otherProduct->id) }}">
											<img src="{{ asset('image/upload/'. $otherProduct->avatar) }}" alt="">
											<span class="name">{{ $otherProduct->name }}</span>
											<div id="price">
												<span class="price-new">{{ number_format($otherProduct->price) }} VNĐ</span>
												@if ($otherProduct->sale)
													<span class="price-old">
														<del>
														{{ number_format($otherProduct->price - ($otherProduct->price * $otherProduct->sale), 2) }} VNĐ
														</del>
													</span>
												@endif
											</div>
										</a>
									</li>
									<div class="clearfix">
									
									</div>
								@endforeach
							</ul>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>
@stop
@section('sc')
	{!! Html::script(elixir('/js/jquery.easy-ticker.min.js')) !!}
	{!! Html::script(elixir('/js/jquery.easing.min.js')) !!}
	{!! Html::script(elixir('/js/jquery.elevateZoom-3.0.8.min.js')) !!}
	<script>
		$(document).ready(function() {
			var dd = $('.vticker, #other-product').easyTicker({
				direction: 'up',
				easing: 'easeInOutBack',
				speed: 'slow',
				interval: 3000,
				height: '400px',
			}).data('easyTicker');
			
			$("#zoom_01").elevateZoom();
		});
	</script>
@stop