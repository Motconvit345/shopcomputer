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
                    <a href="{{ action('Admin\BillController@index') }}" class="btn btn-info"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a>
                    <a href="{{ action('Admin\BillController@create') }}" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>Thêm mới</a>

                </div>
            </div>
        </div>
           
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
        <table class="table table-striped table-bordered table-hover" id="listbill">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Loại thanh toán</th>
                    <th>Tông tiền</th>
                    <th>Thanh Toán</th>
                    <th>Giao Hàng</th>
                    <th>In</th>
                    <th style="with:10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bills as $bill)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $bill->id }}</td>
                        <td>{{ $bill->payment }}</td>
                        <td>{{ number_format($bill->total) }}</td>
                        <td>
                            @if (!$bill->status_payment)
                                <span class="unsuccess"> Chưa thanh toán</span>
                            @else 
                                <span class="success">Đã thanh toán</span>
                            @endif
                        </td>
                        <td>
                            @if (!$bill->status_ship)
                                <span class="unsuccess">Chưa giao hàng</span>
                            @else 
                                <span class="success"> Đã giao hàng</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ action('Admin\BillController@show', $bill->id) }}">
                                <i class="fa fa-print" aria-hidden="true" style="color:green;"></i>
                            </a>
                        </td>
                        <td class="center">
                        <a href="#" class="delete" id="{{ $bill->id }}">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                        {{ Form::open([
                            'action' => ['Admin\BillController@destroy', $bill->id],
                            'method' => "DELETE",
                            'id' => 'form-delete'.$bill->id,
                        ]) }}
                        {{ Form::close() }}
                        <a href="{{ action('Admin\BillController@edit', $bill->id) }}">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <a href="#" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </a>
                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                          <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Chi tiết hóa đơn {{ $bill->id }}</h4>
                              </div>
                              <div class="modal-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Tên</th>
                                            <th>Đơn Giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành Tiền</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-bill-detail">
                                    @foreach ($bill->billDetails as $billDetail)
                                        <tr>
                                            <td>{{ $billDetail->id }}</td>
                                            <td>{{ $billDetail->item->name }}</td>
                                            <td class="price">{{ number_format($billDetail->item->price) }}</td>
                                            <td class="quantity">{{ $billDetail->quality }}</td>
                                            <td class="total-bill-detail">{{ number_format($billDetail->item->price * $billDetail->quality) }}</td>
                                          
                                            <td>
                                                <div class="btn-action">
                                                    <a href="#" class="delete-bill-detail" id="{{ $billDetail->id }}">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </a>
                                                    {{ Form::open([
                                                        'action' => ['Admin\BillDetailController@destroy', $billDetail->id],
                                                        'method' => "DELETE",
                                                        'id' => 'form-delete-bill-detail'.$billDetail->id,
                                                    ]) }}
                                                    {{ Form::close() }}
                                                    <a href="#" class="edit-bill-detail" style="margin-left: 5px;">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <div class="btn-save">
                                                    <button type="button" class="btn btn-success" style="padding: 5px 10px;" data-id="{{ $billDetail->id }}" data-url="{{ action('Admin\BillDetailController@store') }}">Lưu</button>
                                                    <button type="button" class="btn btn-danger btn-cancel" style="padding: 5px 10px;">Hủy</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4">
                                            <center style="font-weight: bold; font-size: 18px;">Tổng tiền</center>
                                        </td>
                                        <td colspan="2" class="total-bill">{{ number_format($bill->total) }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                              </div>
                              <div class="modal-footer">
                                <button type="button" data-bill-id="{{ $bill->id }}" class="btn btn-default close-modal-detail" data-dismiss="modal">Close</button>
                              </div>
                            </div>

                          </div>
                        </div>
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
            $('#listbill').DataTable( {
            } );
        }); 
    </script>
@endpush
@push('style')
<style>
.success {
    color: #70C83C;
    font-weight: 800;
}
.unsuccess {
    color: red;
}
    i.fa-times {
        width: 25%;
        float: left;
        color: red;
    }
    i.fa-pencil-square-o {
        float: left;
        color: #2ec53c;
    }
    i.fa-search { 
        margin-left: 10px;
        float: left;
    }
</style>
@endpush     