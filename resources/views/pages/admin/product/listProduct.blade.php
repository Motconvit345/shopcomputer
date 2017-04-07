@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <h1 class="page-header">
                    Danh sách sản phẩm
                    </h1>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="page-header page-header-button" style="border: none!important;text-align: right">
                        <a href="{{ action('Admin\ProductController@index') }}" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
                        <a href="{{ action('Admin\ProductController@create') }}" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>Thêm mới</a>

                    </div>
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
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="listProduct">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                             @if ($item->sale != 0)
                                <span style="color: red; font-weight: bold">{{ number_format($item->price - ($item->price * $item->sale/100)) }} VNĐ</span> 
                                <br>
                                <del style="margin-top: 10px;">{{ number_format($item->price) }}</del> VNĐ
                             @else
                                <span style="color: red; font-weight: bold">{{ number_format($item->price) }} VNĐ</span>
                             @endif
                        </td>
                        <td>{{ $item->category->name }}</td>
                        <td class="center">
                            @can('admin', App\Models\Role::class)
                                <a href="#" class="delete" id="{{ $item->id }}">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                            @endcan
                            {{ Form::open([
                                'action' => ['Admin\ProductController@destroy', $item->id],
                                'method' => "DELETE",
                                'id' => 'form-delete' . $item->id,
                            ]) }}
                            {{ Form::close() }}
                            <a href="{{ action('Admin\ProductController@edit', $item->id) }}"> 
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
            $('#listProduct').DataTable( {
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