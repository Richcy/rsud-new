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
                    <h2 class="content-header-title float-start mb-0">Edit Dokter</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="{{ route('admin.doctor.index') }}">Daftar Dokter</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="#">Edit Dokter</a>
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
                            <h2>Form Edit Dokter</h2>
                        </div>
                        <div class="card-body" style="padding-top: 6px !important;">
                            <form action="{{ route('admin.doctor.update', $doctor->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label for="name" class="form-label">Nama Dokter</label>
                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" onkeyup="createSlug()" placeholder="Masukan Nama Dokter" value="{{ old('name', $doctor->name) }}">

                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label class="form-label" for="field_id">Bidang Keahlian: </label>
                                            <select name="field_id" id="field_id"
                                                class="form-select @error('field_id') is-invalid @enderror">
                                                <option selected disabled>Silakan Pilih Bidang Keahlian Dokter</option>
                                                @foreach ($field as $item)
                                                    <option value="{{ $item->id }}" @selected(old('field_id', $doctor->field_id) == $item->id)>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('field_id')
                                                <div class="invalid-feedback d-block">{{ $message ?? 'Something error' }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label for="office" class="form-label">Kantor / Unit Kerja</label>
                                            <input type="text" id="office" class="form-control @error('office') is-invalid @enderror" name="office" placeholder="Masukan Kantor/Unit Kerja" value="{{ old('office', $doctor->office) }}">

                                            @error('office')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label for="sip" class="form-label">SIP</label>
                                            <input type="text" id="sip" class="form-control @error('sip') is-invalid @enderror" name="sip" placeholder="Masukan SIP Dokter" value="{{ old('sip', $doctor->sip) }}">

                                            @error('sip')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label for="img" class="form-label">Foto Dokter</label>
                                            <input type="file" accept="image/jpeg, image/png, image/jpg, image/gif" id="img"
                                                class="form-control @error('img') is-invalid @enderror"
                                                name="img" value="{{ old('img') }}">

                                            @error('img')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label>Pratinjau Foto</label>
                                            <br>
                                            <div id="avatar-content">
                                                @if ($doctor->img)
                                                    <img src="{{ asset('storage/' . $doctor->img) }}" id="avatar-image" style="width: 200px;">
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- button submit --}}
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('admin.doctor.index') }}"
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
        document.addEventListener('DOMContentLoaded', function() {
            // Image preview
            $(document).on('change', '#img', function() {
                var file = $(this)[0].files[0];

                // Check if a file is selected
                if(file) {
                    // Create a FileReader object
                    var reader = new FileReader();

                    // Set up onload function
                    reader.onload = function(e){
                        // Set the background image of the avatar content
                        let src = e.target.result;
                        $('#avatar-content').html('<img src="'+src+'" id="avatar-image" style="width: 200px;">');
                    };

                    // Read the file as data URL
                    reader.readAsDataURL(file);
                }
            });

            $('#field_id').select2()
        });
    </script>
@endpush
