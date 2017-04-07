@extends('layouts.admin')
@push('style')
    {!! Charts::assets() !!}
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Trang Chủ</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">26</div>
                            <div>New Comments!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-cubes fa-5x" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $item->count() }}</div>
                            <div>Sản phẩm!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $bill->where('status_ship', 0)->where('status_payment', 0)->count() }}</div>
                            <div>Giao dịch!</div>
                        </div>
                    </div>
                </div>
                <a href="{{ action('Admin\BillController@index') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $user->where('role_id', 4)->count() }}</div>
                            <div>Thành viên!</div>
                        </div>
                    </div>
                </div>
                <a href="{{ action('Admin\UserController@indexMember') }}">
                    <div class="panel-footer">
                        <span class="pull-left">Chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Thống kê</h3>
                </div>
                <div class="panel-body">
                    <center>
                        {!! $chart->render() !!}
                    </center>
                </div>
            </div>
        </div>
    </div>
@stop