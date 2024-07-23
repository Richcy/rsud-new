@extends('admin.layouts.main')

@push('vendor_css')
<link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
@endpush

@push('custom_css')
    <style>
         /* Custom styles to change the header border color */
    .dataTables_wrapper .dataTables_scrollHead th {
        border-top: 1px solid grey;
        border-bottom: 1px solid grey;
    }
    .dataTables_wrapper .dataTables_scrollHead th {
        border-left: 1px solid grey;
        border-right: 1px solid grey;
    }
    .dataTables_wrapper .dataTables_scrollHead table {
        border-bottom: 1px solid grey;
    }
    </style>
@endpush

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Jadwal Dokter</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Jadwal Dokter</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Jadwal Dokter</h4>
                        <a href="{{ route('admin.schedule-doctor.create') }}" class="btn btn-primary">Tambah Jadwal Dokter</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table dataTable no-footer dtr-column" id="datatable-schedule-doctor">
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="border: none !important;">Action</th>
                                        <th rowspan="2" style="border: none !important;">#</th>
                                        <th rowspan="2" style="border: none !important;">Dokter</th>
                                        <th colspan="7" class="text-center">Jadwal</th>
                                    </tr>
                                    <tr>
                                        <th>Senin</th>
                                        <th>Selasa</th>
                                        <th>Rabu</th>
                                        <th>Kamis</th>
                                        <th>Jumat</th>
                                        <th>Sabtu</th>
                                        <th>Minggu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Dynamic content will be loaded here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('vendor_js')
<script src="{{ asset('vuexy/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
@endpush

@push('custom_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
$(function () {
    var table = $('#datatable-schedule-doctor').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.schedule-doctor.index') }}",
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        },
        columns: [
            { data: 'action', name: 'action', orderable: false, searchable: false },
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'doctor_name', name: 'doctor_name' },
            { data: 'senin', name: 'senin' },
            { data: 'selasa', name: 'selasa' },
            { data: 'rabu', name: 'rabu' },
            { data: 'kamis', name: 'kamis' },
            { data: 'jumat', name: 'jumat' },
            { data: 'sabtu', name: 'sabtu' },
            { data: 'minggu', name: 'minggu' }
        ],
        columnDefs: [
            { targets: 3, title: 'senin' },
            { targets: 4, title: 'selasa' },
            { targets: 5, title: 'rabu' },
            { targets: 6, title: 'kamis' },
            { targets: 7, title: 'jumat' },
            { targets: 8, title: 'sabtu' },
            { targets: 9, title: 'minggu' }
        ],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/id.json'
        },
        displayLength: 25,
        order: []
    });
    $('#datatable-schedule-doctor').on('click', '.btn-delete', function() {
                var deleteUrl = $(this).data('url');

                // console.log(deleteUrl);

                // Tampilkan SweetAlert konfirmasi
                swal({
                    title: "Apakah Anda yakin?",
                    text: "Bidang Dokter akan dihapus!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        // Jika pengguna mengonfirmasi, lakukan penghapusan
                        $.ajax({
                            url: deleteUrl,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                // Tampilkan pesan sukses
                                swal("Bidang Dokter berhasil dihapus!", {
                                    icon: "success",
                                });

                                // Muat ulang tabel setelah penghapusan
                                $('#datatable-schedule-doctor').DataTable().ajax.reload();
                            },
                            error: function(xhr, status, error) {
                                // Tampilkan pesan error jika terjadi kesalahan
                                swal("Oops!", "Terjadi kesalahan: " + error, "error");
                            }
                        });
                    }
                });
            });
});
</script>
@endpush
