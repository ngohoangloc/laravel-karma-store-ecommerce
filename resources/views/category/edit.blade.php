<!-- resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Karma Store | Admin</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content-header', ['name' => 'Category', 'key' => 'Edit'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text" class="form-control" placeholder="Nhập tên danh mục"
                                       name="category_name" id="category_name" value="{{ $category->name }}">
                            </div>
                            <div class="form-group">
                                <label>Danh mục cha</label>
                                <select class="form-control" name="parent_id" id="parent_id">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>

                            <a href="{{ route('categories.index') }}" class="btn btn-secondary float-right m-2">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



