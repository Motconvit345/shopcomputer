@extends('layouts.admin')
@section('content')
    <div class="row">
       <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <h1 class="page-header">
                Danh sách ban quản trị
                </h1>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="page-header page-header-button" style="border: none!important;text-align: right">
                    <a href="{{ action('Admin\UserController@index') }}" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
                    <a href="{{ action('Admin\UserController@create') }}" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>Thêm mới</a>

                </div>
            </div>
        </div>       
         @if (session('status'))
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Title!</strong>
                       
                            {{ session('status') }}
                    </div>
                </div>
            </div>
        @endif
            <div class="clearfix">
        
            </div>
            <div class="clearfix"></div>
            @if (isset($role_user))
                <div class="col-md-8" style="margin-bottom: 20px;">
                    <form action="#" method="get" role="form" class="form-inline">
                        <div class="form-group">
                            <label for="category_id" style="margin-right: 20px;">Loại Admin</label>
                            <select name="role_id" id="inputRole" class="form-control" required="required">
                                @foreach ($role_user as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-filter-user" style="margin-left: 15px;">Tìm Kiếm</button>
                    </form>
                </div>
            @endif
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="userList">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                        {{ $user->role->name }}
                        </td>
                         <td class="center">
                            <i class="fa fa-pencil fa-fw"></i> 
                            <a href="#"
                                onclick="event.preventDefault();
                                         document.getElementById('user_delete{{ $user->id }}').submit();">
                                Delete
                            </a>
                            {{ Form::open([
                                'action' => ['Admin\UserController@destroy', $user->id],
                                'method' => "DELETE",
                                'id' => 'user_delete'.$user->id,
                            ]) }}
                            {{ Form::close() }}
                        </td>
                        <td class="center">
                            <i class="fa fa-pencil fa-fw"></i> 
                            <a href="{{ action('Admin\UserController@edit', $user->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
@stop
@push('script')
    <script>
        $(document).ready(function() {
            $('#userList').DataTable( {
            } );
        }); 
    </script>
@endpush
            