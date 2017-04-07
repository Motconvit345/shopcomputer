@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <h1 class="page-header">
                Danh sách thể loại
                </h1>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="page-header page-header-button" style="border: none!important;text-align: right">
                    <a href="{{ action('Admin\CategoryController@index') }}" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
                    <a href="{{ action('Admin\CategoryController@create') }}" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>Thêm mới</a>

                </div>
            </div>
        </div>
           
        </div>
        <div class="clearfix">
            
            </div>
            <div class="col-md-8" style="margin-bottom: 20px;">
                <form action="#" method="get" role="form" class="form-inline">
                    <div class="form-group">
                        <label for="category_id" style="margin-right: 20px;">Thể loại</label>
                        <select name="category_id" id="inputCateg" class="form-control" required="required">
                            {{ cate_admin($categoryModel::all(), 0, '', Request::input('category_id') ? Request::input('category_id') : 0) }}
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-filter-category" style="margin-left: 15px;">Tìm Kiếm</button>
                </form>
            </div>
         @if (session('status'))
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('status') }}
                    </div>
                </div>
            </div>
        @endif
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="listCategory">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category Parent</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parentName()['name'] }}</td>
                        <td class="center">
                        <a href="#" class="delete" id="{{ $category->id }}">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                        {{ Form::open([
                            'action' => ['Admin\CategoryController@destroy', $category->id],
                            'method' => "DELETE",
                            'id' => 'form-delete'.$category->id,
                        ]) }}
                        {{ Form::close() }}
                        <a href="{{ action('Admin\CategoryController@edit', $category->id) }}">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
@push('script')
    <script>
        $(document).ready(function() {
            $('#listCategory').DataTable( {
            } );
        }); 
    </script>
@endpush
@push('style')
<style>
    i.fa-times {
        width: 25%;
        float: left;
        color: red;
    }
    i.fa-pencil-square-o {
        float: left;
        color: #2ec53c;
    }
</style>
@endpush     