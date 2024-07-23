
@section('seo_keyword', 'Hak dan Kewajiban Pasien Rumah Sakit, rumah sakit umum daerah cimacan, rsud cimacan, rsd cimacan')
@section('seo_title', 'RSUD Cimacan | Hak dan Kewajiban Pasien')
@section('seo_desc',
    'Hak dan Kewajiban Pasien merupakan...')
@section('seo_url', route('user.hak_kewajiban.index'))
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
                <span><small><a href="">Beranda</a> / <a href="">Tentang</a> / <strong>Hak Kewajiban Pasien</strong></small></span>
                <div class="text-left">
                    <h3>HAK KEWAJIBAN PASIEN</h3>
                </div>
                <div class="text-center">
                    <img style="transform: scale(0.6); margin-top: -20rem; margin-bottom: -20rem;" src="{{ asset('storage/'. $hak_kewajiban->img) }}" alt="">
                </div>
            </div>

        </div>
    </div>
@endsection

@push('custom_js')
@endpush
