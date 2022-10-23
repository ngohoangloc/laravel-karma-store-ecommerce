<!-- resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Karma Store | Admin</title>
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content-header', ['name' => 'Product', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">Thêm sản phẩm</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá sản phẩm</th>
                                <th scope="col">Hình ảnh sản phẩm</th>
                                <th scope="col">Mô tả sản phẩm</th>
                                <th scope="col">Danh mục sản phẩm</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($products as $productItem)
                                <tr>
                                    <th scope="row">{{ $productItem->id }}</th>
                                    <td>{{ $productItem->name }}</td>
                                    <td>{{ number_format($productItem->price)}}</td>
                                    <td><img src="{{$productItem->feature_image_path}}" width="100px" height="100px" ></td>
                                    <td>{{ $productItem->content }}</td>
                                    <td>{{ optional($productItem->category)->name }}</td>
                                    <td>
                                        <a href=" {{ route('product.edit', [ 'id' => $productItem->id]) }} " class="btn btn-default" >Edit</a>
                                        <a  href=" {{ route('product.delete', [ 'id' => $productItem->id]) }} " class="btn btn-danger" >Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ $products->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection




