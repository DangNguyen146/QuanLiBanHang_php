@extends('layouts.admin')

@section('title')
    <title>Add Product</title>
@endsection
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet">

@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Product', 'key' => 'Add'])
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                                    placeholder="Nhập giá sản phẩm" value="{{ old('price') }}">
                                @error('price')
                                    <div class="alert text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file" class="form-control-file" name="feature_image_path">
                            </div>
                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input type="file" multiple class="form-control-file" name="image_path[]">
                            </div>

                            <div class="form-group">
                                <label>Chọn danh mục</label>
                                <select
                                    class="form-control select2_choose form-control-sm @error('category_id') is-invalid @enderror"
                                    name="category_id">
                                    <option value="{{ old('category_id') }}">Chọn danh mục</option>
                                    {!! $htmlOption !!}
                                </select>
                                @error('category_id')
                                    <div class="alert text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nhập tags cho sản phẩm</label><span class="pl-1">(Dùng dấu "," hoặc "enter" để ngăn
                                    cách tag )</span>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                </select>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control tinymce_editor_init @error('content') is-invalid @enderror"
                                    name="contents" rows="3">{{ old('contents') }}</textarea>
                                @error('content')
                                    <div class="alert text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.4/tinymce.min.js"
        integrity="sha512-MGz4lok7A2vu3S5dK81JL+GAC8HZYCFOkWmj4rRqcLjPD+SdJESAfdUNtrrO7IhAPgKxmRKJ4qg+4z3GgVCyrA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection
