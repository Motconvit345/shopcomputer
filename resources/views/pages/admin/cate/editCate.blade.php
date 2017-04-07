@extends('layouts.admin')
@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">
        Sửa danh sách thể loại
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="pEditing-bottom:120px">
        {{ Form::open([
            'action' => ['Admin\CategoryController@update', $category->id],
        'method' => 'PUT', 
        ]) }}
            <div class="form-group">
                <label>Category Parent</label>
                <select class="form-control" name="parent_id">
                    <option value="0">None</option>}
                    option
                    {{ cate_admin($categories, 0, '', $category->parent_id) }}
                </select>
            </div>
            <div class="form-group">
                <label>Category Name</label>
                <input class="form-control" name="name" placeholder="Please Enter Category Name" value="{{ $category->name}}"/>
            </div>
            {{ Form::submit('Category Edit') }}
            {{ Form::reset('Reset') }}
        {{ Form::close() }}
    </div>
@stop