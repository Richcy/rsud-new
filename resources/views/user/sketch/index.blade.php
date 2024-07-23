
@section('seo_keyword', 'Denah, Bangunan, rumah sakit umum daerah cimacan, rsud cimacan')
@section('seo_title', 'RSUD Cimacan | Denah')
@section('seo_desc',
    'Denah bangunan Rumah Sakit Daerah Cimacan')
@section('seo_url', route('user.sketch.index'))
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
                <span><small><a href="">Beranda</a> / <a href="">Tentang</a> / <strong>Denah Rumah Sakit</strong></small></span>
                <div class="text-left">
                    <h3>DENAH RSUD CIMACAN</h3>
                </div>
                <div class="text-center">
                    <img style="" src="{{ asset('storage/'. $sketch->img) }}" alt="">
                </div>
            </div>

        </div>
    </div>
@endsection

@push('custom_js')
@endpush
