@extends('admin.layouts.main')

@push('vendor_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
@endpush

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Dokter Unggulan</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dokter Unggulan</li>
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
                            <h4 class="card-title">Daftar Dokter Unggulan</h4>
                            @if ($featuredDoctorCount < 4)
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Dokter Unggulan</button>
                            @else
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#createModal" disabled>Tambah Dokter Unggulan</button>
                            @endif
                        </div>
                        <div class="card-body">
                            <table class="datatables-basic table dataTable no-footer dtr-column" id="datatable-featured-doctor">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Foto Dokter</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Dokter Unggulan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createForm">
                        @csrf
                        <div class="mb-3">
                            <label for="doctor_id" class="form-label">Doctor</label>
                            <select id="doctor_id" name="doctor_id" class="form-select">
                                <option disabled selected>Silakan Pilih Dokter</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
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
            // Setup CSRF token for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#datatable-featured-doctor').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/adminstrator/featured-doctor",
                    type: 'GET',
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'img', name: 'img'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/id.json'
                },
                displayLength: 25,
                order: []
            });

            // Create form submission
            $('#createForm').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('_token', '{{ csrf_token() }}'); // Tambahkan CSRF token

                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.featured-doctor.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#createModal').modal('hide');
                        table.ajax.reload();
                        Swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: response.success,
                    });
                    },
                    error: function(response) {
                        console.log(response);
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan: ' + response.responseJSON.message,
                    });
                    }
                });
            });

            // Delete
            $('#datatable-featured-doctor').on('click', '.btn-delete', function() {
                var deleteUrl = $(this).data('url');

                // console.log(deleteUrl);

                // Tampilkan SweetAlert konfirmasi
                swal({
                    title: "Apakah Anda yakin?",
                    text: "Dokter Unggulan akan dihapus!",
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
                                $('#datatable-featured-doctor').DataTable().ajax.reload();
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
