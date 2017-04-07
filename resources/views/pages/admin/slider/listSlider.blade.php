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
                        <a href="{{ action('Admin\SliderController@index') }}" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
                        <a href="{{ action('Admin\SliderController@create') }}" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>Thêm mới</a>

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
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="listProduct">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th style="width: 35%;">Image</th>
                    <th>Order</th>
                    <th>Descrition</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $slider->id }}</td>
                        <td>
                            <img src="{{ asset('image/slider/' . $slider->image) }}" style="height: 100px; width:150px;">
                        </td>
                        <td>{{ $slider->description }}</td>
                        <td>{{ $slider->order }}</td>
                        <td class="center">
                            <a href="javascript:void:(0)" class="delete" id="{{ $slider->id }}">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                            {{ Form::open([
                                'action' => ['Admin\SliderController@destroy', $slider->id],
                                'method' => "DELETE",
                                'id' => 'form-delete'. $slider->id,
                            ]) }}
                            {{ Form::close() }}
                            <a href="{{ action('Admin\SliderController@edit', $slider->id) }}">
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