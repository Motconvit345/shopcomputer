@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User
                <small>Add</small>
            </h1>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="{{ action('Admin\UserController@update', $user->id) }}"" method="POST">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" name="name" placeholder="Please Enter Username" value="{{ old('name', $user->name) }}" required/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Please Enter Email" value="{{ old('email', $user->email)}}"required/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Please Enter Password"/>
                </div>
                <div class="form-group">
                    <label>RePassword</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Please Enter Phone" value="{{ old('phone', $user->phone)}}"  required/>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Please Enter Address" value="{{ old('address', $user->address)}}" required/>
                </div>
                <div class="form-group">
                    <label>User Level</label>
                    <label class="radio-inline">
                        <input name="role" value="1" checked="" type="radio">Admin
                    </label>
                    <label class="radio-inline">
                        <input name="role" value="2" type="radio">Member
                    </label>
                </div>
                <button type="submit" class="btn btn-default">User Add</button>
                <button type="reset" class="btn btn-default">Reset</button>
            <form>
        </div>
    </div>
    <!-- /.row -->
@stop