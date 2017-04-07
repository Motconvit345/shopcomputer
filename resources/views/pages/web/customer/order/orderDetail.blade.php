@extends('pages.web.customer.common')
@section('content-customer')
	<div class="row">
		<div class="col-md-12" id="order-detail">
			<h4>Chi tiết đơn hàng</h4>
			<section class="order-detail">
				<div class="order-detail-colum">Đơn hàng #{{ $bill->id }}</div>
				<div class="order-detail-colum">Đặt ngày {{ $bill->created_at->toDateString()  }}</div>
				<div class="order-detail-colum">Thành tiền :{{ number_format($bill->total) }} VNĐ</div>
			</section>
			<section class="order-detailt-item">
				<table class="table">
					<tbody border="none">
						@foreach ($bill->billDetails as $billDetail)
							<tr class="order-detail-row">
								<td class="order-detail-img">
									<a href="#">
									<img src="{{ asset('image/upload/' . $billDetail->item->avatar) }}" alt="">
									</a>
								</td>
								<td class="order-detail-info">{{ $billDetail->item->name }}</td>
								<td class="order-detail-price">{{ number_format($billDetail->item->price) }} VND</td>
								<td class="order-detail-quantity">{{ $billDetail->quality }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</section>
		</div>
	</div>
@stop