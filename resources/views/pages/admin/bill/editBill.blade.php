@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
        <h1 class="page-header">
        Sửa hóa đơn
        </h1>
    </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-12" style="padding-bottom:120px">
            <form action="{{ action('Admin\BillController@update', $bill->id) }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="row">
                    <label class="control-label col-sm-2" for="email">Nhân viên bán</label>
                    <div class="col-sm-4">
                        <select name="user_sell" class="form-control" required="required">
                            @foreach ($selllers as $seller)
                                <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <label class="control-label col-sm-2" for="email">Nhân viên bán</label>
                    <div class="col-sm-4">
                        <select name="user_ship" class="form-control" required="required">
                            @foreach ($shippers as $shipper)
                                <option value="{{ $shipper->id }}">{{ $shipper->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row" style="margin: 15px -15px">
                    <label class="control-label col-sm-2" for="email">Thanh Toán</label>
                    <div class="col-sm-4">
                        <select name="status_payment" class="form-control" required="required">
                            @if ($bill->status_payment)
                                    <option value="1" selected="">Đa thanh toán</option>
                                    <option value="0">Chưa thanh toán</option>
                                @else
                                    <option value="1">Đa thanh toán</option>
                                    <option value="0" selected="">Chưa thanh toán</option>
                            @endif
                            
                            
                        </select>
                    </div>


                    <label class="control-label col-sm-2" for="email">Giao Hàng</label>
                    <div class="col-sm-4">
                        <select name="status_ship" class="form-control" required="required">
                            @if ($bill->status_ship)
                                    <option value="1" selected="">Đã giao hàng</option>
                                    <option value="0">Chưa giao hàng</option>
                                @else
                                    <option value="1">Đã giao hàng</option>
                                    <option value="0" selected="">Chưa giao hàng</option>
                            @endif
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">Cập nhật</button>
                <button type="reset" class="btn btn-default">Reset</button>
            <form>
        </div>
    </div>
    <!-- /.row -->
@stop
            