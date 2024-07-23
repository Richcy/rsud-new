@extends('admin.layouts.main')

@push('vendor_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/vendors/css/forms/select/select2.min.css">
@endpush

@push('custom_css')
    <style>
        table.dataTable.no-footer {
            border-bottom: none !important;
        }
    </style>
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
                                <a href="{{ route('admin.schedule-doctor.index') }}">Daftar Jadwal Dokter</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="#">Tambah Jadwal Dokter</a>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Form Tambah Jadwal Dokter</h2>
                    </div>
                    <div class="card-body" style="padding-top: 6px !important;">
                        <form action="{{ route('admin.schedule-doctor.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <label for="doctor_id" class="form-label">Doctor</label>
                                    <select id="doctor_id" name="doctor_id" class="form-select">
                                        <option disabled selected>Silakan Pilih Dokter</option>
                                        @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label">Senin</label>
                                    <div class="row g-0">
                                        <div class="col-3">
                                            <div class="input-group mb-1">
                                                <input type="text" class="form-control" name="senin-start-time" placeholder="Contoh: 09:00">
                                                <span class="input-group-text" style="background-color: #089544 !important; color: #FFFFFF !important; " ><i data-feather='clock' style="transform: scale(1.8)"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-1 d-flex justify-content-center align-item-center">
                                            <h3 style="margin-top: 5px">-</h3>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group mb-1">
                                                <input type="text" class="form-control" name="senin-end-time" placeholder="Contoh: 17:00">
                                                <span class="input-group-text" style="background-color: #089544 !important; color: #FFFFFF !important; " ><i data-feather='clock' style="transform: scale(1.8)"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label">Selasa</label>
                                    <div class="row g-0">
                                        <div class="col-3">
                                            <div class="input-group mb-1">
                                                <input type="text" class="form-control" name="selasa-start-time" placeholder="Contoh: 09:00">
                                                <span class="input-group-text" style="background-color: #089544 !important; color: #FFFFFF !important; " ><i data-feather='clock' style="transform: scale(1.8)"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-1 d-flex justify-content-center align-item-center">
                                            <h3 style="margin-top: 5px">-</h3>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group mb-1">
                                                <input type="text" class="form-control" name="selasa-end-time" placeholder="Contoh: 17:00">
                                                <span class="input-group-text" style="background-color: #089544 !important; color: #FFFFFF !important; " ><i data-feather='clock' style="transform: scale(1.8)"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label">Rabu</label>
                                    <div class="row g-0">
                                        <div class="col-3">
                                            <div class="input-group mb-1">
                                                <input type="text" class="form-control" name="rabu-start-time" placeholder="Contoh: 09:00">
                                                <span class="input-group-text" style="background-color: #089544 !important; color: #FFFFFF !important; " ><i data-feather='clock' style="transform: scale(1.8)"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-1 d-flex justify-content-center align-item-center">
                                            <h3 style="margin-top: 5px">-</h3>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group mb-1">
                                                <input type="text" class="form-control" name="rabu-end-time" placeholder="Contoh: 17:00">
                                                <span class="input-group-text" style="background-color: #089544 !important; color: #FFFFFF !important; " ><i data-feather='clock' style="transform: scale(1.8)"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label">Kamis</label>
                                    <div class="row g-0">
                                        <div class="col-3">
                                            <div class="input-group mb-1">
                                                <input type="text" class="form-control" name="kamis-start-time" placeholder="Contoh: 09:00">
                                                <span class="input-group-text" style="background-color: #089544 !important; color: #FFFFFF !important; " ><i data-feather='clock' style="transform: scale(1.8)"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-1 d-flex justify-content-center align-item-center">
                                            <h3 style="margin-top: 5px">-</h3>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group mb-1">
                                                <input type="text" class="form-control" name="kamis-end-time" placeholder="Contoh: 17:00">
                                                <span class="input-group-text" style="background-color: #089544 !important; color: #FFFFFF !important; " ><i data-feather='clock' style="transform: scale(1.8)"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label">Jumat</label>
                                    <div class="row g-0">
                                        <div class="col-3">
                                            <div class="input-group mb-1">
                                                <input type="text" class="form-control" name="jumat-start-time" placeholder="Contoh: 09:00">
                                                <span class="input-group-text" style="background-color: #089544 !important; color: #FFFFFF !important; " ><i data-feather='clock' style="transform: scale(1.8)"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-1 d-flex justify-content-center align-item-center">
                                            <h3 style="margin-top: 5px">-</h3>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group mb-1">
                                                <input type="text" class="form-control" name="jumat-end-time" placeholder="Contoh: 17:00">
                                                <span class="input-group-text" style="background-color: #089544 !important; color: #FFFFFF !important; " ><i data-feather='clock' style="transform: scale(1.8)"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label">Sabtu</label>
                                    <div class="row g-0">
                                        <div class="col-3">
                                            <div class="input-group mb-1">
                                                <input type="text" class="form-control" name="sabtu-start-time" placeholder="Contoh: 09:00">
                                                <span class="input-group-text" style="background-color: #089544 !important; color: #FFFFFF !important; " ><i data-feather='clock' style="transform: scale(1.8)"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-1 d-flex justify-content-center align-item-center">
                                            <h3 style="margin-top: 5px">-</h3>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group mb-1">
                                                <input type="text" class="form-control" name="sabtu-end-time" placeholder="Contoh: 17:00">
                                                <span class="input-group-text" style="background-color: #089544 !important; color: #FFFFFF !important; " ><i data-feather='clock' style="transform: scale(1.8)"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label">Minggu</label>
                                    <div class="row g-0">
                                        <div class="col-3">
                                            <div class="input-group mb-1">
                                                <input type="text" class="form-control" name="minggu-start-time" placeholder="Contoh: 09:00">
                                                <span class="input-group-text" style="background-color: #089544 !important; color: #FFFFFF !important; " ><i data-feather='clock' style="transform: scale(1.8)"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-1 d-flex justify-content-center align-item-center">
                                            <h3 style="margin-top: 5px">-</h3>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group mb-1">
                                                <input type="text" class="form-control" name="minggu-end-time" placeholder="Contoh: 17:00">
                                                <span class="input-group-text" style="background-color: #089544 !important; color: #FFFFFF !important; " ><i data-feather='clock' style="transform: scale(1.8)"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- button submit --}}
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.schedule-doctor.index') }}"
                                    class="btn btn-secondary me-1">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('vendor_js')
<script src="{{ asset('vuexy') }}/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
@endpush

@push('custom_js')
<script>
    $(document).ready(function(){
        $('#doctor_id').select2();
    })
</script>
@endpush
