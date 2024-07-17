@extends('layouts.admin')
@push('css')
    <!-- Internal Sweet-Alert css-->
    <link href="{{asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
    <!-- Internal Gallery css-->
    <link href="{{asset('assets/plugins/gallery/gallery.css')}}" rel="stylesheet">
    <style>
        .img-fit {
            display: block;
            max-width: 400px;
            max-height: 150px;
            width: auto;
            height: auto;
            object-fit: cover !important;
        }
    </style>
@endpush
@section('title')
    <title>SIMAPAN - Program Intervensi Kemiskinan</title>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Program Intervensi Kemiskinan</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Program Intervensi Kemiskinan</li>
            </ol>
        </div>
        <div class="d-flex">
            <div class="justify-content-center">
                <a href="{{route('intervensi.create')}}" class="btn btn-primary my-2 btn-icon-text">
                    <i class="fe fe-plus-circle me-2"></i> Buat Baru</a>
            </div>
        </div>
    </div>
    <!-- End Page Header -->


    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    @foreach($data as $datum)
                        <div>
                            <div>
                                <h6 class="main-content-label mb-1">{{$datum->nama_kegiatan}}</h6>
                                <p class="text-muted card-sub-title">
                                    {{Carbon\Carbon::parse($datum->tanggal)->isoFormat('dddd, D MMMM Y')}}</p>
                            </div>
                            <div class="row" id="{{$datum->id}}">
                                @foreach($datum->galeri as $item)
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3"
                                         data-responsive="{{route('intervensi.file', $item->id)}}"
                                         data-src="{{route('intervensi.file', $item->id)}}"
                                         data-sub-html=" <h4>{{$datum->nama_kegiatan}}</h4>">
                                        <a href="{{route('intervensi.file', $item->id)}}"><img
                                                class="card-img-top w-100 blog-img img-fit img-responsive"
                                                src="{{route('intervensi.file', $item->id)}}"
                                                alt=""></a>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection
@push('js')
    <!-- Internal Sweet-Alert js-->
    <script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    <!-- Internal Gallery js-->
    <script src="{{asset('assets/plugins/gallery/picturefill.js')}}"></script>
    <script src="{{asset('assets/plugins/gallery/lightgallery.js')}}"></script>
    <script src="{{asset('assets/plugins/gallery/lg-pager.js')}}"></script>
    <script src="{{asset('assets/plugins/gallery/lg-autoplay.js')}}"></script>
    <script src="{{asset('assets/plugins/gallery/lg-fullscreen.js')}}"></script>
    <script src="{{asset('assets/plugins/gallery/lg-zoom.js')}}"></script>
    <script src="{{asset('assets/plugins/gallery/lg-hash.js')}}"></script>
    <script src="{{asset('assets/plugins/gallery/lg-share.js')}}"></script>

    <!-- Perfect-scrollbar js -->
    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

    <!-- Color Theme js -->
    {{--    <script src="{{asset('assets/js/themeColors.js')}}"></script>--}}

    <script>
        $(document).ready(function () {
            @foreach($data as $datum)
            lightGallery(document.getElementById('{{$datum->id}}'), {
                autoplayControls: false,
            });
            @endforeach
        });
    </script>
@endpush
