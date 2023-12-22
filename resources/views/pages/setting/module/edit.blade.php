@php
    $html_tag_data = [];
    $title = 'Formulir Module';
    $description = 'Edit Module';
    $url = '/setting/module/' . $mod->id;
    $breadcrumbs = ['/' => 'Home', $url => 'View Module'];
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
        <!-- Title Start -->
        @include('_layout/breadcrumb')
        <!-- Title End -->

        <!-- Form Start -->
        <form method="POST" action="{{ $url }}/update" class="card mb-5 tooltip-end-top">
            @csrf
            @method('PUT')
            <div class="card-header pt-2 pb-2">
                <h4 class="fw-bold"><i class="fa {{ $mod->icon }} pr-2"></i> {{ $mod->description }}</h4>
            </div>
            <div class="card-body pt-2 pb-2">
                <div class="row g-3 mb-1 mt-1">
                    @foreach ($navbars as $navbar)
                        <div class="col-6">
                            <div class="card border border-xl">
                                <div class="card-header pt-2 pb-2">
                                    <h4 class="fw-bold">{{ $navbar->name }}</h4>
                                </div>
                                <div class="card-body pt-2 pb-2">
                                    <div class="row g-3 mb-1 mt-1">
                                        @foreach ($navbar->subnavbars as $subnavbar)
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="subnavbars[]"
                                                        value="{{ $subnavbar->id }}"
                                                        @if (in_array($subnavbar->id, explode(',', $mod->subnavbars))) checked @endif>
                                                    <label class="form-check-label fw-bold">{{ $subnavbar->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer text-end pt-3 pb-3">
                <x-buttons.submit />
            </div>
        </form>
        <!-- Form End -->
    </div>
@endsection
