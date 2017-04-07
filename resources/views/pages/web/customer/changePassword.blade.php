@extends('pages.web.customer.common')
@section('title', 'Đổi mật khẩu')
@section('content-customer')
	@include('errors.msg')
	@if (session('status'))
		<div class="alert alert-{{ session('status')["status"] }}">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ session('status')["notification"] }}
		</div>
	@endif
	<div class="row">
		<form class="form-horizontal" action="{{ action('CustomerController@updatePassword') }}" method="POST">
			<legend>Thông tin tài khoản</legend>
			{{ csrf_field() }}
			<div class="form-group">
			    <label class="control-label col-sm-4" for="current-password">Password hiện tại:</label>
			    <div class="col-sm-8">
			      	<input type="password" name="currentPassword" class="form-control" required="">
			    </div>
			</div>
			<div class="form-group">
			    <label class="control-label col-sm-4" for="password">Password mới:</label>
			    <div class="col-sm-8">
			      	<input type="password" name="password" class="form-control" required="">
			    </div>
			</div>
						<div class="form-group">
			    <label class="control-label col-sm-4" for="confirm-password">Xác nhận password mới:</label>
			    <div class="col-sm-8">
			      	<input type="password" name="password_confirmation" class="form-control" required="">
			    </div>
			</div>
			<div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-warning ">Đổi mật khẩu</button>
			    </div>
			</div>
		</form>
	</div>
@stop