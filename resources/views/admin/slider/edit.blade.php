@extends('layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Slider', 'key' => 'Edit'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('slider.update', ['id'=>$slider->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên slider</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Nhập tên slider" value="{{ $slider->name }}">
                            @error('name')
                            <div class="alert text-danger py-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mô tả slider</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ $slider->description }}</textarea>
                            @error('description')
                            <div class="alert text-danger py-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control-file  @error('image_path') is-invalid @enderror" name="image_path">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-4 my-2">
                                        <img src="{{ $slider->image_path }}" class="w-100 rounded shadow" alt="">
                                    </div>
                                </div>
                            </div>
                            @error('image_path')
                            <div class="alert text-danger py-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
