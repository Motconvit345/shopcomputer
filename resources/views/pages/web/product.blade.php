@extends('layouts.main')
@section('title', $title)
@section('content')
	<section id="filter">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-3" id="filter-title">
						<p>Máy Tính <span>(Có {{ $items->count() }} sản phẩm)</span></p>
					</div>
					<div class="col-md-3" id="filter-dk">
						<div id="sort-pro">
							<span>Sắp xếp sản phẩm <i class="fa fa-caret-down" aria-hidden="true"></i></span>
							<ul>
								<li><a href="{{ rebuild_url_get('order', 'newest') }}">Mới nhất</a></li>
								<li><a href="{{ rebuild_url_get('order', 'asc') }}">Giá : thấp -> cao</a></li>
								<li><a href="{{ rebuild_url_get('order', 'desc') }}">Giá : cao -> thấp</a></li>
							</ul>
						</div>
						<div class="clearfix">
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>
	<section id="product">
		<div class="container">
			<div class="row">
				<div class="col-md-9 content-left">
					<div id="product-title">
						<h3>Tất cả sản phẩn</h3>
					</div>
					<div id="product-box">
						
						@foreach ($items as $item)
							<div class="sub-product">
							<a href="" id="buy" class="{{ $item->id }}">Mua</a>
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
												{{ $item->price - ($item->price*$item->sale) }}
											</del>
											@endif
										</p>
								</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				<div class="col-md-3 content-right">
					<div class="box-filter">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Hãng sản xuất</h3>
							</div>
							<div class="panel-body">
								<ul>
								@foreach ($producers as $producer)
									@if (!Request::has('filter'))
										<li style="margin-bottom: 5px;">
											<a href="{{ rebuild_url_get('filter',$producer->producer) }}"
												>>> {{ $producer->producer }}
											</a>
										</li>
									@else
									<li>
										@if ($producer->producer == Request::input('filter'))
											{{$producer->producer}} 
											<a href="{{ remove_url_get('filter') }}" style="margin-top: 2px;">(Xóa)</a>
										@endif
									</li>
									@endif
								@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="text-center">
				{{ $items->appends([
					'filter' => Request::input('filter'),
					'order' => Request::input('order')
				])->links() }}
			</div>
		</div>
	</section>
@stop
@section('sc')
	<script>
		$(document).ready(function() {
			var pattern = /\?/;
			$('.order-product').change(function(event) {
				$url = window.location.href.replace('');
				alert($url);
				if(pattern.test(window.location.href))
				{
					window.location = window.location.href + '&order=' + $(this).val();
				} else {
					window.location = window.location.href + '?order=' + $(this).val();
				}
				
			});
		});
	</script>
@stop