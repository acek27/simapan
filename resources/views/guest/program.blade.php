@extends('layouts.frontend')
@push('css')
    <!-- Internal Sweet-Alert css-->
    <link href="{{asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
    <!-- Internal Gallery css-->
    <link href="{{asset('assets/plugins/gallery/gallery.css')}}" rel="stylesheet">
    <!-- Internal Sweet-Alert css-->
    <link href="{{asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
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
@section('content')
    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_inner_text">
                <h1>Prgoram Intervensi Kemiskinan</h1>
                <p>Dokumentasi kegiatan dari program intervensi kemiskinan</p>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Blog Main Area =================-->
    <section class="blog_main_area p_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            @foreach($data as $datum)
                                <div>
                                    <div>
                                        <h6 class="main-content-label mb-1">{{$datum->nama_kegiatan}}
                                            <a class="hapus-data" href="#" data-id="{{$datum->id}}">
                                                <i class="fas fa-trash text-danger"></i></a></h6>
                                        <p class="text-muted card-sub-title">
                                            {{Carbon\Carbon::parse($datum->tanggal)->isoFormat('dddd, D MMMM Y')}}</p>
                                    </div>
                                    <div class="row" id="{{$datum->id}}">
                                        @foreach($datum->galeri as $item)
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3"
                                                 data-responsive="{{route('intervensi.file', $item->id)}}"
                                                 data-src="{{route('intervensi.file', $item->id)}}"
                                                 data-sub-html=" <h4>{{$datum->nama_kegiatan}}</h4>
                                         <p>{{Carbon\Carbon::parse($datum->tanggal)->isoFormat('dddd, D MMMM Y')}}</p>">
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
        </div>
    </section>
    <!--================End Blog Main Area =================-->
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
    <!-- Internal Sweet-Alert js-->
    <script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            @foreach($data as $datum)
            lightGallery(document.getElementById('{{$datum->id}}'), {
                autoplayControls: false,
            });
            @endforeach

            $('body').on('click', '.hapus-data', function () {
                del($(this).attr('data-id'));
            });
            var del = function (id) {
                swal({
                        title: "Apakah anda yakin?",
                        text: "Data yang dihapus tidak dapat dikembalikan!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn btn-danger",
                        confirmButtonText: "Ya, Hapus!",
                        closeOnConfirm: false
                    },
                    function () {
                        $.ajax({
                            url: "{{ route('intervensi.index')}}/" + id,
                            method: "DELETE",
                        }).done(function (msg) {
                            swal("Deleted!", "Data berhasil dihapus.", "success");
                            location.reload()
                        }).fail(function (textStatus) {
                            swal("Gagal", "Terjadi kesalahan)", "error");
                        });

                    });
            }
        });
    </script>
@endpush
