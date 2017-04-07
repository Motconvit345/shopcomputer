@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User
                <small>Add</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ action('Admin\UserController@store') }}"" method="POST">
                  {{ csrf_field() }}
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" name="name" placeholder="Please Enter Username" value="{{ old('name')}}" required/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Please Enter Email" value="{{ old('email')}}"required/>
                </div>
                <div class="form-group">
                    <label>User Level</label>
                    @foreach ($roles as $role)
                        <label class="radio-inline">
                            <input name="role" value="{{ $role->id }}" checked="" type="radio">{{ $role->name }}
                        </label>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-default">User Add</button>
                <button type="reset" class="btn btn-default">Reset</button>
            <form>
        </div>
    </div>
    <!-- /.row -->
@stop