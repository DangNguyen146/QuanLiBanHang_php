@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Menus', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tên menu</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên menu">
                            </div>
                            <div class="form-group">
                                <label>Chọn menu</label>
                                <select class="form-control form-control-sm" name="parent_id">
                                    <option value="0">Chọn menu cha</option>
                                    {!! $optionSelect !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
