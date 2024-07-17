@extends('admin.layouts.main')

@push('vendor_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endpush

@push('custom_css')

@endpush

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Data Beranda</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="#">Daftar Slider</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
            {{--  --}}
        </div>
    </div>
    <div class="content-body">
        <section id="basic-example">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Slider</h2>
                            {{-- button tambah --}}
                            <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">Tambah Slider</a>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <table class="table table table-striped"
                                    id="datatable-slider">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Gambar</th>
                                            <th>Deskripsi</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
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
    $(document).ready(function() {
        $('#datatable-slider').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/adminstrator/slider",
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'title', name: 'title'},
                {data: 'img', name: 'img'},
                {data: 'description', name: 'description'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/id.json'
            },
            displayLength: 25,
            order: []
        });

        $('#datatable-slider').on('click', '.btn-delete', function() {
                var deleteUrl = $(this).data('url');

                // console.log(deleteUrl);

                // Tampilkan SweetAlert konfirmasi
                swal({
                    title: "Apakah Anda yakin?",
                    text: "Slider akan dihapus!",
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
                                swal("Slider berhasil dihapus!", {
                                    icon: "success",
                                });

                                // Muat ulang tabel setelah penghapusan
                                $('#datatable-slider').DataTable().ajax.reload();
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
