<!-- resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Karma Store | Admin</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content-header', ['name' => 'menus', 'key' => 'Add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('menus.store') }}" class="btn btn-success float-right m-2">Tất cả Menu</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" >
                        <form action="{{ route('menus.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên menus</label>
                                <input type="text" class="form-control" placeholder="Nhập tên menu" name="menus_name" id="menus_name">
                            </div>
                            <div class="form-group">
                                <label>Chọn menu cha</label>
                                <select class="form-control" name="parent_id" id="parent_id">
                                    <option value="0">Chọn menu cha</option>
                                    {!! $optionSelect !!}
                                </select>
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



