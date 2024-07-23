
@section('seo_keyword', 'Struktur Organisas Rumah Sakit, rumah sakit umum daerah cimacan, rsud cimacan, rsd cimacan')
@section('seo_title', 'RSUD Cimacan | Struktur Organisasi')
@section('seo_desc',
    'Bagan struktur organisasi Rumah Sakit Daerah Cimacan')
@section('seo_url', route('user.structure.index'))
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
                <span><small><a href="">Beranda</a> / <a href="">Tentang</a> / <strong>Struktur Rumah Sakit</strong></small></span>
                <div class="text-left">
                    <h3>STRUKTUR ORGANISASI RSUD CIMACAN</h3>
                </div>
                <div class="text-center">
                    <img style="" src="{{ asset('storage/'. $structure->img) }}" alt="">
                </div>
            </div>

        </div>
    </div>
@endsection

@push('custom_js')
@endpush
