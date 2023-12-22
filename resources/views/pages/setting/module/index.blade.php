@php
    $html_tag_data = [];
    $title = 'Data Setup Modul';
    $description = 'View Setup Modul';
    $url = '/setting/module';
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
        <!-- Title and Top Buttons Start -->
        @include('_layout/breadcrumb')
        <!-- Title and Top Buttons End -->

        <!-- Controls Start -->
        <div class="row mb-2">
            <!-- Search Start -->
            <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                <x-inputs.search :link="$url" :query="$query" />
            </div>
            <!-- Search End -->
        </div>
        <!-- Controls End -->

        <!-- Item List Start -->
        <div class="card mb-5">
            <div class="card-body table-responsive">
                @if (session('alert'))
                    @php $status = session('alert')["status"] @endphp
                    @php $message = session('alert')["message"] @endphp
                    <x-alert :status="$status" :message="$message" />
                @endif
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-nowrap">Nama</th>
                            <th scope="col" class="text-nowrap">Detail</th>
                            <th scope="col" class="text-nowrap text-center">-</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($mods) == 0)
                            <tr>
                                <td colspan="8" class="text-center text-muted">Tidak ada data</td>
                            </tr>
                        @else
                            @foreach ($mods as $data)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">
                                        <i class="fa {{ $data->icon }} pr-2"></i>
                                        {{ $data->description }}
                                    </td>
                                    <td class="align-middle">{{ $data->url }}</td>
                                    <td class="align-middle text-center text-nowrap">
                                        <x-buttons.edit :link="$url" :data="$data->id" />
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer pt-2 pb-2">
                {{ $mods->appends(['query' => $query])->links() }}
            </div>
        </div>
        <!-- Item List End -->
    </div>
@endsection
