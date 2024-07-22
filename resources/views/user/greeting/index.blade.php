
@section('seo_keyword', 'Tentang RSUD CIMACAN, Biodata RSUD CIMACAN, rumah sakit umum daerah cimacan, rsud cimacan, rsd cimacan')
@section('seo_title', 'RSUD Cimacan | Beranda')
@section('seo_desc',
    'Rumah Sakit Umum Daerah Cimacan pada awalnya adalah Puskesmas Pacet (Cimacan) yang sudah berdiri
    sejak tahun 1953, kemudian pada tahun 1981 statusnya meningkat menjadi Puskesmas DTP dan berubah status menjadi Rumah
    Sakit dengan ditetapkannya Surat Keputusan Bupati Cianjur atas nama Pemerintah Daerah Kabupaten Cianjur Nomor 19 Tahu…')
@section('seo_url', route('user.greeting.index'))
@extends('user.layouts.main')
@push('custom_css')
    <style>
       @media(min-widht: 768px)
       {
        #description{
            margin-left: 20px;
        }
       }
    </style>
@endpush

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <span><small><a href="">Beranda</a> / <a href="">Tentang</a> / Profil Rumah Sakit</small></span>
                <div class="text-center">
                    <img style="height: 300px; width: 100%; object-fit:cover;" src="{{ asset('storage/'. $greeting->banner) }}" alt="">
                </div>
            </div>

            <div class="col-12 my-4">
                <div class="text-left">
                    <h3>PROFIL RSUD CIMACAN</h3>
                </div>

                <div class="container pt-5" id="description">
                    {!! $greeting->description !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
@endpush
