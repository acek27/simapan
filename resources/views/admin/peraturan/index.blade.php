@extends('layouts.admin')
@push('css')
    <!-- DATA TABLE CSS -->
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/responsive.bootstrap5.css')}}" rel="stylesheet"/>
    <!-- Internal Sweet-Alert css-->
    <link href="{{asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
    <style>
        .modal-dialog {
            width: 100% !important;
            height: 95% !important;
        }
        .modal-content {
            height: auto;
            min-height: 100%;
            border-radius: 0;
        }
        .responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
@endpush
@section('title')
    <title>SIMAPAN - Peraturan</title>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">PERATURAN</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Peraturan</li>
            </ol>
        </div>
        <div class="d-flex">
            <div class="justify-content-center">
                <a href="{{route('peraturan.create')}}" class="btn btn-primary my-2 btn-icon-text">
                    <i class="fe fe-plus-circle me-2"></i> Tambah Peraturan</a>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Row -->
    <div class="row sidemenu-height">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-4">Tabel Peraturan</h6>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered border-bottom" id="berita">
                            <thead>
                            <tr>
                                <th class="wd-25p">ID</th>
                                <th class="wd-25p">Jenis peraturan</th>
                                <th class="wd-20p">Nama peraturan</th>
                                <th class="wd-20p">Nomor</th>
                                <th class="wd-25p">Tentang</th>
                                <th class="wd-25p">Tanggal Ditetapkan</th>
                                <th class="wd-15p">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
    <!-- Large Modal -->
    <div class="modal" id="peraturan-modal" data-keyboard="false"  data-bs-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Legalitas/Peraturan</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <div class="modal-body">
                    <iframe src="" title="Peraturan" id="pdf-peraturan" frameborder="0" class="responsive-iframe"></iframe>
                </div>
{{--                <div class="modal-footer">--}}
{{--                    <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Tutup</button>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <!--End Large Modal -->
@endsection
@push('js')
    <!-- Internal Data Table js -->
    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
    <!-- Internal Sweet-Alert js-->
    <script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('.btn-animation').on('click', function (br) {
                //adding animation
                $('.modal.animation-modal .modal-dialog').attr('class', 'modal-dialog  ' + $(this).data(
                    "animation") + '  animated');
            });
            var dt = $('#berita').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: '{{ route('peraturan.data') }}',
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        visible: false
                    }, {
                        data: 'jenis.nama_jenis',
                        name: 'jenis.nama_jenis'
                    },
                    {
                        data: 'nama_peraturan',
                        name: 'nama_peraturan'
                    },
                    {
                        data: 'nomor',
                        name: 'nomor'
                    },
                    {
                        data: 'tentang',
                        name: 'tentang',
                    },
                    {
                        data: 'tanggal_penetapan',
                        name: 'tanggal_penetapan',
                    }, {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        align: 'center'
                    },
                ],
            });
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
                            url: "{{ route('peraturan.index')}}/" + id,
                            method: "DELETE",
                        }).done(function (msg) {
                            swal("Deleted!", "Data berhasil dihapus.", "success");
                            dt.ajax.reload();
                        }).fail(function (textStatus) {
                            swal("Gagal", "Terjadi kesalahan)", "error");
                        });

                    });
            }


            $('body').on('click', '.preview', function () {
                var url =$(this).attr('data-id')
                $('#pdf-peraturan').attr('src', '{{url('admin/peraturan/file')}}/' + url);
                $('#peraturan-modal').modal('show');
            });
        });
    </script>
@endpush
