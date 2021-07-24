@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins\product\index\list.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors\sweetalert2\sweetalert2@11.js') }}"></script>
    <script src="{{ asset('admins\product\index\list.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Product', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('product.create') }}" class="btn btn-success float-right m-3">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr class="row">
                                    <th scope="col" class="col-1">#</th>
                                    <th class="col-2" scope="col">Tên sản phẩm</th>
                                    <th class="col-2" scope="col">Giá</th>
                                    <th class="col-3" scope="col">Hình ảnh</th>
                                    <th class="col-2" scope="col">Danh mục</th>
                                    <th class="col-2" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $productsItem)
                                <tr class="row">
                                    <th scope="row" class="col-1">{{ $productsItem->id }}</th>
                                    <td class="col-2">{{ $productsItem->name }}</td>
                                    <td class="col-2">{{ number_format($productsItem->price) }}</td>
                                    <td class="col-3"><img class="w-100 shadow img-rounded" src="{{ $productsItem->feature_image_path }}" alt=""></td>
                                    <td class="col-2">{{ optional($productsItem->category)->name }}</td> {{-- nếu ko có trả về null --}}
                                    <td class="col-2">
                                        <a href="{{ route('product.edit', ['id'=>$productsItem->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="" data-url="{{ route('product.delete', ['id'=>$productsItem->id]) }}" class="btn btn-danger action-delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
