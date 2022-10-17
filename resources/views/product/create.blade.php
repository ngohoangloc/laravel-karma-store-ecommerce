<!-- resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content-header', ['name' => 'Product', 'key' => 'Add'])
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
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="name" class="@error('name') is-invalid border border-danger @enderror">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="text" class="form-control" placeholder="Nhập giá sản phẩm" name="price" class="@error('price') is-invalid @enderror" >
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện sản phẩm</label>
                                <input type="file" class="form-control-file"  name="feature_image_path" >
                            </div>
                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input type="file" multiple class="form-control-file"  name="image_path[]" >
                            </div>
                            <div class="form-group">
                                <label>Danh mục sản phẩm</label>
                                <select class="form-control select2_init @error('category_id') is-invalid @enderror " name="category_id" class="">
                                    <option value="">Chọn danh mục</option>
                                    {!! $htmlOption !!}
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nhập tags cho danh mục</label>
                                <select class="form-control tag_select_choose @error('tags') is-invalid @enderror" multiple="multiple" name="tags[]">

                                </select>
                                @error('tags')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nhập nội dung</label>
                                <textarea class="form-control @error('contents') is-invalid @enderror" name="contents" rows="3" ></textarea>
                                @error('contents')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
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



