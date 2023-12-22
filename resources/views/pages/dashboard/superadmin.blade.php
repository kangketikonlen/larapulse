@php
    $html_tag_data = [];
    $title = 'Superadmin Dashboard';
    $description = 'Dashboard';
    $breadcrumbs = ['/' => 'Home'];
@endphp
@extends('layout-private', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
    <div class="container">
        @include('_layout/breadcrumb')
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav justify-content-start row">
                            @foreach ($modules as $module)
                                <li class="nav-item col-2">
                                    <a class="nav-link d-flex flex-column align-items-center" href="/dashboard/{{$module->id}}/switch">
                                        <span class="d-inline-block bg-primary rounded p-3">
                                            <i class="fa fa-2x {{ $module->icon }} order-1 text-white"></i>
                                        </span>
                                        <span class="order-2 my-2">
                                            <span class="fw-bold d-block">{{ $module->description }}</span>
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
