
@section('seo_keyword', 'Sambutan Direktur, rumah sakit umum daerah cimacan, rsud cimacan')
@section('seo_title', 'RSUD Cimacan | Sambutan Direktur')
@section('seo_desc',
    'Puji syukur kami panjatkan kepada Allah SWT. atas segala anugerah yang telah diberikan sehingga pelayanan kesehatan kepada masyarakat masih dapat....')
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
                <span><small><a href="">Beranda</a> / <a href="">Tentang</a> / <strong>Sambutan Direktur</strong></small></span>
                <div class="text-center">
                    <img style="height: 300px; width: 500px; object-fit:cover;" src="{{ asset('storage/'. $greeting->banner) }}" alt="">
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
