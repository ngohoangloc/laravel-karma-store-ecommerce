<!-- resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Delete product</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content-header', ['name' => 'Product', 'key' => 'Delete'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('product.index') }}" class="btn btn-success float-right m-2">Tất cả sản phẩm</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" >
                        <form action="{{ route('product.destroy' ,['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group" >
                                <label>Tên sản phẩm</label>
                                <input readonly="readonly" type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="name" value="{{ $product->name }}">
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input readonly="readonly" type="text" class="form-control" placeholder="Nhập giá sản phẩm" name="price" value="{{ $product->price }}" >
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện sản phẩm</label>
                                <img src="{{ $product->feature_image_path }}" width="100px" height="100px"/>
                            </div>

                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                @foreach($product->productImage as $productImageItems)
                                    <img src="{{ $productImageItems->image_path }}" width="100px" height="100px"/>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <select class="form-control select2_init" name="category_id" >
                                    <option value="0">Danh mục</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhập tags cho danh mục</label>
                                <select class="form-control tag_select_choose" multiple="multiple" name="tags[]">
                                    @foreach($product->tags as $tagItems)
                                        <option value="{{ $tagItems->name }}" selected>{{ $tagItems->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhập nội dung</label>
                                <textarea readonly="readonly" class="form-control" name="contents" rows="3"> {{ $product->content }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-danger">Delete</button> |
                            <a href="{{ route('product.index') }}" >Back to list</a>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script>
        $(function () {
                $(".tag_select_choose").select2({
                    tags: true,
                    tokenSeparators: [',']
                })
            }
        )
        $(".select2_init").select2({
            placeholder: "Chọn danh mục",
            allowClear: true
        });
    </script>
@endsection





