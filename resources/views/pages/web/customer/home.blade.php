@extends('pages.web.customer.common')
@section('content-customer')
	<div class="row" id="customer-home">
		@include('errors.msg')
		@if (session('status'))
			<div class="alert alert-{{ session('status')["status"] }}">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				{{ session('status')["notification"] }}
			</div>
		@endif
		<div class="col-md-12">
			<h4>Quản lý tài khoản</h4>
			<p>Xin chào , <b>{{ Auth::user()->name }}</b></p>
		</div>
		<div class="col-md-6">
			<div id="title">
				<h4><i class="fa fa-user"></i> Thông tin liên hệ</h4>
			</div>
			<div id="content">
				<p>{{ Auth::user()->name }}</p>
				<p>{{ Auth::user()->email }}</p>
			</div>
		</div>
		<div class="col-md-6">
			<div id="title">
				<h4><i class="fa fa-map-marker" aria-hidden="true"></i> Địa chỉ giao hàng mặc định</h4>
			</div>
			<div id="content">
				<p>{{ Auth::user()->address }}</p>
			</div>
		</div>
	</div>

	<div class="clearfix">
	
	</div>

	<div class="row" id="customer-bill-home">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h4>Đơn đặt hàng gần đây</h4>
			<table class="table table-hover">
				<thead>
					<tr class="active">
						<th>Mã đơn hàng</th>
						<th>Ngày đặt hàng</th>
						<th>Thành tiền</th>
						<th>Tình trạng</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($bills as $bill)
						<tr>
							<td><a href="{{ action('CustomerController@orderDetail', $bill->id) }}">{{ $bill->id }}</a></td>
							<td>{{ $bill->created_at->toDateString() }}</td>
							<td>{{ number_format($bill->total) }} VNĐ</td>
							<td>
								@if ($bill->status)
									Chưa thanh toán
									@else
									Đã thanh toán
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop