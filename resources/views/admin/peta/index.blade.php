@extends('layouts.admin')
@push('css')
    <!-- DATA TABLE CSS -->
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/responsive.bootstrap5.css')}}" rel="stylesheet"/>
    <!-- Internal Sweet-Alert css-->
    <link href="{{asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
@endpush
@section('title')
    <title>SIMAPAN - PETA KEMISKINAN</title>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">PETA KEMISKINAN</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Peta Kemiskinan</li>
            </ol>
        </div>
        <div class="d-flex">
            <div class="justify-content-center">
                <a href="{{route('peta.create')}}" class="btn btn-primary my-2 btn-icon-text">
                    <i class="fe fe-plus-circle me-2"></i> Tambah Data</a>
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
                        <h6 class="main-content-label mb-4">Tabel Peta Kemiskinan</h6>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered border-bottom" id="peta">
                            <thead>
                            <tr>
                                <th class="wd-25p">ID</th>
                                <th class="wd-25p">Keterangan Peta</th>
                                <th class="wd-20p">Periode</th>
                                <th class="wd-20p">Tahun</th>
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
    <div class="modal" id="peta-modal" data-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Peta Kemiskinan</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <div class="modal-body">
                    <img src="" title="Peraturan" id="image-peta"
                         class="responsive-iframe"></img>
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
            var dt = $('#peta').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: '{{ route('peta.data') }}',
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        visible: false
                    }, {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'periode',
                        name: 'periode'
                    },
                    {
                        data: 'tahun',
                        name: 'tahun'
                    },
                    {
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
                            url: "{{ route('peta.index')}}/" + id,
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
                var url = $(this).attr('data-id')
                $('#image-peta').attr('src', '{{url('admin/peta/file')}}/' + url);
                $('#peta-modal').modal('show');
            });
        });
    </script>
@endpush
