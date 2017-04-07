@extends('layouts.main')
@section('title', 'Giỏ hàng')
@section('content')
<div id="main-breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="#">Trang Chu</a></li>
					  <li class="breadcrumb-item active">Giỏ hàng</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<div id="shoping-cart">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				@if (session('status'))
				    <div class="alert alert-success">
				        {{ session('status') }}
				    </div>
				@elseif (session('status_error'))
				    <div class="alert alert-danger">
				        {{ session('status_error') }}
				    </div>
				@endif
				<form action="#">
					<table class="table  table-bordered table-reponsive" id="cart-content">
						<thead>
							<tr>
								<th>Hỉnh ảnh</th>
								<th>Tên sản phẩm</th>
								<th>Đơn giá</th>
								<th>Số lượng</th>
								<th>Thành tiền</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach (Cart::content() as $item)
								<tr>
									<td class="text-center">
										<a href="{{ action('ProductController@show', $item->id) }}">
											<img alt="{{ $item->alias }}" src="{{ asset('image/upload/'.$item->options->image) }}">
										</a>
									</td>
									<td class="text-center" valign="middle">
										<p class="cart-name">
											<a href="{{ action('ProductController@show', $item->id) }}">{{ $item->name }}</a><br>
										</p>
									</td>
									<td class="text-center"><p class=""><b>{{ number_format($item->price) }}</b></p></td>
									<td class="text-center">
									<input type="number" class="item-quantity" value="{{ $item->qty }}" id="sl{{ $item->rowId }}" min="1">
									</td>
									<td class="text-center"><p class="l"><b id="item-price">{{ number_format($item->price*$item->qty)  }} Đ</b></p></td>
									<td class="text-center">
										<a 
											class="update-cart" 
											id="{{ $item->rowId }}" 
											href="" 
										">
										<img class="tooltip-test"  src="{{ asset('image/update.png') }}" alt=""></a>
										<a 
											class="delete-cart" 
											id="{{ $item->rowId }}" 
											href="" 
										">
											<img class="tooltip-test" data-original-title="Remove" src="{{ asset('image/remove.png') }}" alt="">
										</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</form>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
					<a href="{{ action('HomeController@index') }}" type="button" class="btn btn-default">Tiếp tục mua</a>
					@if (Auth::check())
							<a type="button" class="btn btn-info" id="payment">Thanh toán</a>
						@else
							<a type="button" href="{{ action('Auth\LoginController@login') }}" class="btn btn-info">Thanh toán</a>
					@endif

				</div>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<table class="table table-bordered total-table" id="cart-total">
							<tbody><tr>
								<td class="text-right">Tổng tiền</td>
								<td class="text-right total-pri">{{ number_format(Cart::Subtotal(2, '.', '')) }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div id="custumer-pay">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					{!! Form::open([
						'action' => 'BillController@submit_payment',
						'class' => 'form-horizontal',
						'role' => 'form',
						'accept-charset' => 'utf-8',
					]) !!}
							<div class="form-group">
								{!! Form::label('payment', 'Hình thức thanh toán', ['class' => 'col-md-2 control-label']) !!}
								<div class="col-md-6" id>
									{!! Form::radio('payment', 'COD', true); !!} COD
									{!! Form::radio('payment', 'NganLuong'); !!} Chuyển khoản bằng ngân lượng
								</div>
							</div>
							<div class="form-group" id="payment-cod">
								<div class="col-md-offset-2 col-md-6">
									<ul style="list-style: none;">
										<li>Sau khi nhận hàng và lắp đặt xong. Quý khách thanh toán tiền cho nhân viên vận chuyển của Trung Kien. Chỉ áp dụng cho khu vực giao hàng trong quy định về vận chuyển của Trung Kien.</li>
									</ul>
								</div>
							</div>
							<div class="form-group" id="payment-cart" style="display: none;">
								<div class="col-md-offset-2 col-md-6">
									<ul style="list-style: none;">
										<li>Thanh toán trực tuyến an toàn, tiện lợi bằng thẻ ATM, ví điện tử hoặc tài khoản ngân hàng trong nước</li>
									</ul>
								</div>
							</div>
							<div class="col-sm-offset-4 col-sm-7">
                            	{!! Form::submit('Thanh Toán', ['class' => 'btn btn-primary']); !!}
                        	</div>
							
						</form>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop
@section('sc')
<script>
	$(document).ready(function() {
		$(document).on('click', 'input#payment:first-child', function () {
			$('#payment-cod').show();
			$('#payment-cart').hide();
		});
		$(document).on('click', 'input#payment:last-child', function () {
			$('#payment-cart').show();
			$('#payment-cod').hide();
		});

		$(document).on('click', 'a#payment',function() {
			$("#custumer-pay").toggle();
		});
	});
</script>
@stop