
@section('seo_keyword', 'Profil Rumah Sakit, rumah sakit umum daerah cimacan, rsud cimacan, rsd cimacan')
@section('seo_title', 'RSUD Cimacan | Profil')
@section('seo_desc', $profile->description)
@section('seo_url', route('user.profile.index'))
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
                <span><small><a href="">Beranda</a> / <a href="">Tentang</a> / <strong>Profil Rumah Sakit</strong></small></span>
                <div class="text-center">
                    <img style="height: 250px; width: 100%; object-fit:cover;" src="{{ asset('storage/'. $profile->banner) }}" alt="">
                </div>
            </div>

            <div class="col-12 my-4">
                <div class="text-left">
                    <h3>PROFIL RSUD CIMACAN</h3>
                </div>

                <div class="container pt-5" id="description">
                    {!! $profile->description !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
@endpush
