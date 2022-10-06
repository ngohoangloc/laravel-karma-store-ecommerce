<!-- resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Karma Store | Admin</title>
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       @include('partials.admin.content-header', ['name' => 'Category', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Thêm Danh mục</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Danh mục cha</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->parent_id }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <a href=" {{ route('categories.edit', [ 'id' => $category->id]) }} " class="btn btn-default" >Edit</a>
                                        <a href=" {{ route('categories.delete', [ 'id' => $category->id]) }} " class="btn btn-danger" >Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ $categories->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection



