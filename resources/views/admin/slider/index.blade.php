@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection
@section('js')
    <script src="{{ asset('vendors\sweetalert2\sweetalert2@11.js') }}"></script>
    <script src="{{ asset('admins\slider\index\index.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Slider', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('slider.create') }}" class="btn btn-success float-right m-3">ADD</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr class="row">
                                    <th scope="col" class="col-md-1">#</th>
                                    <th scope="col" class="col-md-2">Tên Slider</th>
                                    <th scope="col" class="col-md-4">Desciption</th>
                                    <th scope="col" class="col-md-3">Hình ảnh</th>
                                    <th scope="col" class="col-md-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $item)
                                <tr class="row">
                                    <th scope="row" class="col-md-1">{{ $item->id }}</th>
                                    <td class="col-md-2">{{ $item->name }}</td>
                                    <td class="col-md-4">{{ $item->description }}</td>
                                    <td class="col-md-3"><img src="{{ $item->image_path }}" class="w-100 rounded shadow" alt=""></td>
                                    <td class="col-md-2">
                                        <a href="{{ route('slider.edit', ['id'=>$item->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="" data-url="{{ route('slider.delete', ['id'=>$item->id]) }}" class="btn btn-danger action-delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $sliders->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
