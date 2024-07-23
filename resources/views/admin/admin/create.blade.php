@extends('admin.layouts.main')

@push('vendor_css')
@endpush

@push('custom_css')
@endpush

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Data Admin</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="{{ route('admin.admin.index') }}">Daftar Admin</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="#">Tambah Admin</a>
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
                        <h2>Form Tambah Admin</h2>
                    </div>
                    <div class="card-body" style="padding-top: 6px !important;">
                        <form action="{{ route('admin.admin.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Masukan Username Admin" value="{{ old('username') }}">
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukan Nama Admin" value="{{ old('name') }}">

                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukan Email Admin" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukan Nama Admin" value="{{ old('password') }}">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- button submit --}}
                            <div class="d-flex justify-content-end mt-2">
                                <a href="{{ route('admin.admin.index') }}"
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
@endpush

@push('custom_js')
@endpush
