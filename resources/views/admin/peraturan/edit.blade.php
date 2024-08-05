@extends('layouts.admin')

@section('title')
    <title>Peraturan - Tambah Peraturan</title>
@endsection
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Edit Peraturan</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('peraturan.index')}}">Peraturan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Peraturan</li>
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
                        <h6 class="main-content-label mb-1">Edit Peraturan</h6>
                        <p class="text-muted card-sub-title">Isi sesuai dengan format.</p>
                    </div>
                    <div class="row row-sm">
                        {{ html()->model($data)->form('put')->action(route('peraturan.update', $data->id))->acceptsFiles()->open() }}
                        @include('admin.peraturan._form')
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

@endsection
