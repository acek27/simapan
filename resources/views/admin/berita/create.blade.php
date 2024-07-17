@extends('layouts.admin')
@push('css')
    <!-- Internal Summernote css-->
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote-editor/summernote.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote-editor/summernote1.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/quill/quill.bubble.css')}}" rel="stylesheet">
    <!-- InternalFileupload css-->
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('title')
    <title>Berita - Data Baru</title>
@endsection
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Tambah Berita</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('berita.index')}}">Berita</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Baru</li>
            </ol>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Row -->
    <div class="row sidemenu-height">
        <div class="col-lg-10">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">Data Baru</h6>
                        <p class="text-muted card-sub-title">Isi sesuai dengan format.</p>
                    </div>
                    <div class="row row-sm">
                        {{ html()->form('post')->action(route('berita.store'))->acceptsFiles()->open() }}
                        @include('admin.berita._form')
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

@endsection
@push('js')
    <!-- INTERNAL Summernote Editor js -->
    <script src="{{asset('assets/plugins/summernote-editor/summernote1.js')}}"></script>
    {{--    <script src="{{asset('assets/js/summernote.js')}}"></script>--}}
    <!-- Internal Fileuploads js-->
    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#content').summernote({
                height: 50,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
            $('.dropify').dropify({
                messages: {
                    'default': 'Drag and drop a file here or click',
                    'replace': 'Drag and drop or click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong appended.'
                },
                error: {
                    'fileSize': 'The file size is too big (2M max).'
                }
            });
        });
    </script>
@endpush
