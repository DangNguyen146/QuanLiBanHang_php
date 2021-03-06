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
    @include('partials.content-header', ['name' => 'Product', 'key' => 'Edit'])

    <form action="{{ route('product.update',  ['id'=> $product->id]) }}" method="POST" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm"
                                value="{{ $product->name }}">
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm"
                                value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input type="file" class="form-control-file" name="feature_image_path">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img class="w-100 my-2 rounded shadow" src="{{ $product->feature_image_path }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Ảnh chi tiết</label>
                            <input type="file" multiple class="form-control-file" name="image_path[]">
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach ( $product->productImages as $productImageItem )
                                    <div class="col-md-3">
                                        <img class="w-100 my-2 rounded shadow" src="{{ $productImageItem->image_path }}"
                                            alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Chọn danh mục</label>
                            <select class="form-control select2_choose form-control-sm" name="category_id">
                                <option value="">Chọn danh mục</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nhập tags cho sản phẩm</label><span class="pl-1">(Dùng dấu "," hoặc "enter" để ngăn
                                cách tag )</span>
                            <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                @foreach ($product->tags as $tagItem)
                                <option value="{{ $tagItem->name }}" selected>{{ $tagItem->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control tinymce_editor_init" name="contents"
                                rows="3">{{ $product->content }}</textarea>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.4/tinymce.min.js" integrity="sha512-MGz4lok7A2vu3S5dK81JL+GAC8HZYCFOkWmj4rRqcLjPD+SdJESAfdUNtrrO7IhAPgKxmRKJ4qg+4z3GgVCyrA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection
