@extends('pages.web.customer.common')
@section('content-customer')
	@include('errors.msg')
	<div class="row">
		<form class="form-horizontal" action="{{ action('CustomerController@update') }}" method="POST">
			<legend>Thông tin tài khoản</legend>
			{{ csrf_field() }}
			<div class="form-group">
			    <label class="control-label col-sm-2" for="email">Email:</label>
			    <div class="col-sm-10">
			      	<input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly="">
			    </div>
			</div>
			<div class="form-group">
			    <label class="control-label col-sm-2" for="name">Name:</label>
			    <div class="col-sm-10">
			      	<input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required="">
			    </div>
			</div>
			<div class="form-group">
			    <label class="control-label col-sm-2" for="phone">Phone:</label>
			    <div class="col-sm-10">
			      	<input type="phone" name="phone" class="form-control" value="{{ Auth::user()->phone }}" required="">
			    </div>
			</div>
			<div class="form-group">
			    <label class="control-label col-sm-2" for="address">Address:</label>
			    <div class="col-sm-10">
			    	<textarea name="address" class="form-control" rows="6" required="">{{ Auth::user()->address }}</textarea>
			    </div>
			</div>
			<div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-warning ">Lưu thông tin</button>
			    </div>
			</div>
		</form>
	</div>
@stop