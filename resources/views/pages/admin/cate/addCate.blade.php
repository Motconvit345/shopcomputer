@extends('layouts.admin')
@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">
        Thêm danh sách thể loại
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        {{ Form::open(['action' => 'Admin\CategoryController@store']) }}
            <div class="form-group">
                <label>Category Parent</label>
                <select class="form-control" name="parent_id">
                    <option value="0">None</option>
                    {{ cate_admin($categories) }}
                </select>
            </div>
            <div class="form-group">
                <label>Category Name</label>
                <input class="form-control" name="name" placeholder="Please Enter Category Name" />
            </div>
            <button type="submit" class="btn btn-default">Category Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
        {{ Form::close() }}
    </div>
@stop