@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            Thêm sản phẩm
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="{{ action('Admin\ProductController@store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" placeholder="Please Enter name" required="" />
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" name="price" placeholder="Please Enter price" required/>
                </div>
                <div class="form-group">
                    <label>Sale</label>
                    <input type="number" class="form-control" name="sale" placeholder="Please Enter sale" value='0' step="0.1" min="0" max='0.8' />
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        {{ cate_admin($categories) }}
                    </select>
                </div>
                <div class="form-group">
                    <label>description</label>
                    <textarea class="form-control" rows="3" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label>detail</label>
                    <textarea class="form-control" rows="3" name="detail"></textarea>
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input type="file" name="fImages" required>
                </div>
                <div class="form-group">
                    <label>Guarantee</label>
                    <input type="number" class="form-control" name="guarantee" min='0.1' step="0.1" placeholder="Please Enter Category Keywords" value="0.1" required/>
                </div>
                <div class="form-group">
                    <label>made</label>
                      <input type="text" class="form-control" name="made" required/>
                </div>
                <button type="submit" class="btn btn-default">Product Add</button>
                <button type="reset" class="btn btn-default">Reset</button>
            <form>
        </div>
    </div>
    <!-- /.row -->
@stop
            