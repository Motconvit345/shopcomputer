@extends('layouts.main')
@section('title', 'Quản lí tài khoản')
@section('content')
<div class="container">
	<div class="row" id="customer">
		<div class="col-md-4">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<aside class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-user"></i> {{ Auth::user()->name }}</h3>
						</div>
						<div class="panel-body">
							<a href="{{ action('CustomerController@index') }}">Quản lý tài khoản</a>
						</div>
						<div class="panel-body">
							<a href="{{ action('CustomerController@editCustomer') }}">Thông tin tài khoản</a>
						</div>
						<div class="panel-body">
							<a href="{{ action('CustomerController@indexChangePassword') }}">Đổi mật khẩu</a>
						</div>
					</aside>
				</div>
			</div>

		</div>
		<div class="col-md-8">
			@yield('content-customer')
		</div>
	</div>
</div>
@stop
<style>
	
</style>
@section('sc')
	<script>
		jQuery('.panel-heading a').click(function() {
		    $('.panel-heading').removeClass('actives');
		    $(this).parents('.panel-heading').addClass('actives');
		});
	</script>
@stop