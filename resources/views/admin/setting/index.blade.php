@extends('layouts.admin')

@section('title')
<title>Settings</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Setting', 'key' => 'List'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Example single danger button -->
                    <div class="btn-group my-3 dropleft float-right">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            ADD
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('settings.create').'?type=Text' }}">Text</a>
                            <a class="dropdown-item" href="{{ route('settings.create').'?type=Textarea' }}">Textare</a>
                        </div>
                    </div>

                    {{-- <a href="{{ route('settings.create') }}" class="btn btn-success float-right m-3">ADD</a> --}}
                </div>
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($settings as $setting)
                            <tr>
                                <th scope="row">{{ $setting->id }}</th>
                                <td>{{ $setting->config_key }}</td>
                                <td>{{ $setting->config_value }}</td>
                                <td>
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $settings->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
