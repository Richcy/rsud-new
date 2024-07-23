
@section('seo_keyword', 'Instalasi Rawat Inap, rumah sakit, rumah sakit umum daerah cimacan, rsud cimacan, rsd cimacan')
@section('seo_title', 'RSUD Cimacan | Instalasi Rawat Inap')
@section('seo_desc',
    'Instalasi Rawat Inap (IRI) merupakan instalasi yang memberikan pelayanan kesehatan perorangan dan perawatan yang meliputi observasi, pemeriksaan...')
@section('seo_url', route('user.rawat_inap.index'))
@extends('user.layouts.main')
@push('custom_css')
   <!-- Splide CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.11/dist/css/splide.min.css">
   <!-- GLightbox CSS -->
   <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">
    <style>
        @media(min-widht: 768px)
        {
            #description{
                margin-left: 20px;
            }
        }
        .accordion-item {
            border: none !important;
        }
        .accordion-button {
            color: #121212 !important;
            background: transparent !important;
            box-shadow: none !important;
            border: none !important;
        }
    </style>
@endpush

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <span><small><a href="">Beranda</a> / <a href="">Services</a> / <strong>Instalasi Rawat Inap</strong></small></span>
                <div class="text-center">
                    <img style="height: 250px; width: 100%; object-fit:cover;" src="{{ asset('storage/'. $rawatInap->banner) }}" alt="">
                </div>
            </div>

            <div class="col-12 my-4">
                <div class="text-left">
                    <h3>INSTALASI RAWAT INAP</h3>
                </div>

                <div class="row">
                    <div class="{{ $image->isNotEmpty() ? 'col-12 col-md-6 col-lg-8' : 'col-12' }}">
                        <div class="container pt-5" id="description">
                            {!! $rawatInap->description !!}
                        </div>
                        <div class="accordion" id="accordionExample">
                            @forelse ($subService as $item)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $loop->index }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}" aria-expanded="true" aria-controls="collapse{{ $loop->index }}">
                                        <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> {{ $item->title }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $loop->index }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body container">
                                        {!! $item->description !!}
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>

                    @if ($image->isNotEmpty())
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="text-center">
                            <h3>Galeri</h3>
                        </div>
                        <div id="imageCarousel" class="splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach ($image as $item)
                                        <li class="splide__slide">
                                            <a href="{{ asset('storage/' . $item->img) }}" data-glightbox="title: {{ $item->title }}">
                                                <img src="{{ asset('storage/' . $item->img) }}" style="transform: scale(0.7); height: 400px; object-fit: cover;" class="d-block w-100" alt="...">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>




            </div>
        </div>
    </div>
@endsection

@push('custom_js')
     <!-- Splide JS -->
     <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.11/dist/js/splide.min.js"></script>
     <!-- GLightbox JS -->
     <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Splide.js
            new Splide('#imageCarousel', {
                type: 'slide',
                perPage: 1,
                perMove: 1,
                pagination: false,
                arrows: true,
            }).mount();

            // Initialize GLightbox
            const lightbox = GLightbox({
                selector: 'a[data-glightbox]',
            });
        });
    </script>

@endpush
