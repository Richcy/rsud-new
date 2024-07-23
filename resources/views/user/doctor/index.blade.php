@section('seo_keyword', 'Dokter, rumah sakit umum daerah cimacan, rsud cimacan')
@section('seo_title', 'RSUD Cimacan | Dokter')
@section('seo_desc',
'Daftar dokter spesialis Rumah Sakit Daerah Cimacan')
@section('seo_url', route('user.doctor.index'))
@extends('user.layouts.main')
@push('custom_css')
    <style>
        .page-link{
            color: #A82024;
        }
        .active .page-link{
            border: 1px solid #A82024;
            background-color: #A82024 !important;
            background: #A82024 !important;
        }
    </style>
@endpush

@section('content')
<div class="container my-4">
    <div class="row">
        <span><small><a href="">Beranda</a> / <strong>Dokter</strong></small></span>
        <div class="col-xl-12 mt-5 pt-5 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
            <div class="rr-price-2-title-box text-center mb-45">
               <h4 class="rr-section-title rr-section-title-space">Dokter</h4>
            </div>
         </div>
        <div class="col-12 py-2 pb-2">
            <div class="row container">
              <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Filter Dokter</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.doctor.index') }}" method="GET">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label for="field" class="form-label">Spesialis</label>
                                <select name="field" id="field" class="form-select">
                                    <option selected>Pilih Spesialis Dokter</option>
                                    @foreach ($fields as $field)
                                        <option value="{{ $field->id }}" {{ request('field') == $field->id ? 'selected' : '' }}>
                                            {{ $field->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="name" class="form-label">Nama Dokter</label>
                                <input type="name" type="text" name="name" class="form-control" placeholder="Nama Dokter" id="name" value="{{ request('name') }}">
                                {{-- <input type="text" name="name" id="name" class="form-control" placeholder="Nama Dokter" value="{{ request('name') }}"> --}}
                            </div>
                        </div>
                        <div class="d-flex justify-content-end my-1 mt-3">
                            <button type="reset" class="btn btn-secondary me-1" onclick="window.location='{{ route('user.doctor.index') }}'">Reset</button>
                            <button type="submit" class="btn btn-primary" style="background: #A82024 !important;">Cari</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </div>

        <div class="col-12 pt-20 mt-20">
            <div class="row">
                @foreach ($doctors as $item)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                  <div class="rr-team-4-item p-relative mb-60">
                     <div class="rr-team-4-thumb p-relative ">
                        <div class="rr-team-4-img">
                            @if (empty($item->img) || !\Illuminate\Support\Facades\Storage::exists('public/' . $item->img))
                                <img class="w-100" src="{{ asset('assets/images/doctor.jpg') }}" alt="img">
                            @else
                                <img class="w-100" src="{{ asset('storage/' . $item->img) }}" alt="img">
                            @endif
                        </div>
                     </div>
                     <div class="rr-team-4-content text-center p-relative">
                        <h6 class="rr-team-4-title"><a href="#">{{ $item->name }}</a></h6>
                        <p>{{ $item->field_doctor->name }}</p>
                     </div>
                     <div class="rr-team-4-arrow"> <a href="{{ route('user.doctor.show', $item->id) }}"><i class="fa-solid fa-arrow-up"></i></a>
                     </div>
                  </div>
               </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{  $doctors->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom_js')


@endpush
