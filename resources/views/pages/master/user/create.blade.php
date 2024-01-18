@php
    $html_tag_data = [];
    $title = 'Formulir Pengguna Admin';
    $description = 'Create Pengguna Admin';
    $url = '/master/user';
    $breadcrumbs = ['/' => 'Home', $url => 'View Pengguna Admin'];
@endphp
@extends('layout-private', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
    <script src="/js/cs/scrollspy.js"></script>
@endsection

@section('js_page')
@endsection

@section('content')
    <div class="container">
        <!-- Title Start -->
        @include('_layout/breadcrumb')
        <!-- Title End -->

        <!-- Form Start -->
        <form method="POST" action="{{ $url }}/store" class="card mb-5 tooltip-end-top">
            @csrf
            <div class="card-body">
                <div class="row g-3 mb-3">
                    <div class="col">
                        <div class="w-100">
                            <label class="form-label" for="name">
                                Nama
                                @error('name')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input class="form-control" autocomplete="off" id="name" name="name">
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col">
                        <div class="w-100">
                            <label class="form-label" for="username">
                                Username
                                @error('username')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input class="form-control" autocomplete="off" name="username">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end pt-3 pb-3">
                <x-buttons.submit />
            </div>
        </form>
        <!-- Form End -->
    </div>
@endsection
