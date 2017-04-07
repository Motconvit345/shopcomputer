<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>
	</head>
	<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 customer">
					<h2>Cảm ơn Anh/Chị {{ $bill->user->name }} đã đặt hàng tại ShopTrungKien,</h2>
					<h4>Đơn hàng của quý khách đã được gửi thành công!</h4>
					<b style="margin-bottom: 10px;">THÔNG TIN ĐƠN HÀNG {{ $bill->order_code }}</b>
					<table class="table info-customer" border="1">
						<thead>
							<tr>
								<th width="50%">Thông tin thanh toán</th>
								<th style="border-left: 1px solid white;">Địa chỉ giao hàng</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="border-right: 1px solid #dddddd;">
									<ul>
										<li>{{ $bill->user->name }}</li>
										<li>{{ $bill->user->email }}</li>
										<li>{{ $bill->user->phone }}</li>
									</ul>
								</td>
								<td>
									<ul>
										<li>{{ $bill->user->address }}</li>
									</ul>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="clearfix">
					
					</div>
					<div class="bill">
						<h4 style="padding-bottom: 5px;">Chi Tiết Đơn Hàng</h4>
					<table class="table bill" border="1">
							<thead>
								<tr>
									<th>STT</th>
									<th>SẢN PHẨM</th>
									<th>GIÁ</th>
									<th>SỐ LƯỢNG</th>
									<th>THÀNH TIỀN</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($bill->billDetails as $billDetail)
								<tr>
									<td>{{ $billDetail->id }}</td>
									<td>{{ $billDetail->item->name }}</td>
									<td>{{ $billDetail->item->price }}</td>
									<td>{{ $billDetail->quality }}</td>
									<td>{{ number_format($billDetail->item->price * $billDetail->quality ) }}</td>
								</tr>
							@endforeach
								<tr>
									<td colspan="4">Tổng giá trị đơn hàng</td>
									<td>{{ number_format($bill->total) }}</td>
								</tr>
							</tbody>
						</table>
					</div>
					<p>Quý khách lưu ý: giá bán, khuyến mại của sản phẩm và tình trạng còn hàng có thể bị thay đổi bất cứ lúc nào mà không kịp báo trước.</p>
					<b>Một lần nữa ShopTrungKien Online cảm ơn quý khách.</b>
			</div>
		</div>
	</div>
	<style>
		.info-customer, .bill {
			border-collapse: collapse;
		}
		.customer .info-customer {
			margin-top: 5px;
		}
		.customer .info-customer th {
			background: #6E6DFE;
			color: white;
			padding: 5px 20px;
		}

		.customer .info-customer ul  {
			list-style: none;
			padding-left: 10px;
		}
		.customer .info-customer ul li {
			line-height: 25px;
		}

		.customer .bill th {
			background: #6E6DFE;
			padding: 5px 20px;

			color: white;
		}
		.bill td {
			padding: 5px 10px;
		}
		
	</style>
	</body>
</html>