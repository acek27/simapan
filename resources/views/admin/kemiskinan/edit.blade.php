@extends('layouts.admin')
@push('css')
    <!-- InternalFileupload css-->
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('title')
    <title>Data Kemiskinan - Data Baru</title>
@endsection
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Tambah Data Kemiskinan</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('kemiskinan.index')}}">Data Kemiskinan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Baru</li>
            </ol>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Row -->
    <div class="row sidemenu-height">
        <div class="col-lg-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">Data Baru</h6>
                        <p class="text-muted card-sub-title">Isi sesuai dengan format.</p>
                    </div>
                    <div class="row row-sm">
                        {{ html()->model($data)->form('put')->action(route('kemiskinan.update', $data->id))->acceptsFiles()->open() }}
                        @include('admin.kemiskinan._form')
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

@endsection
@push('js')
    <!-- Internal Fileuploads js-->
    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
@endpush
