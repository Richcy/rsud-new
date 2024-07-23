@section('seo_keyword', 'Cimanews, Berita, Blog, Berita rumah sakit, Berita rumah sakit umum daerah cimacan,Berita rsud cimacan')
@section('seo_title', 'RSUD Cimacan | Cimanews')
@section('seo_desc', 'Daftar Berita terbaru yang diterbitkan oleh Rumah Sakit Daerah Cimacan')
@section('seo_url', route('user.cimanews.index'))
@extends('user.layouts.main')
@push('custom_css')
<link href="https://cdn.jsdelivr.net/npm/glightbox@3.0.6/dist/css/glightbox.min.css" rel="stylesheet">

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
        <span><small><a href="">Beranda</a> / <strong>Cimanews</strong></small></span>
        <div class="col-xl-12 mt-5 pt-5 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
            <div class="rr-price-2-title-box text-center mb-45">
               <h4 class="rr-section-title rr-section-title-space">Cimanews</h4>
            </div>
         </div>
        <div class="col-12 py-2 pb-2">
            <div class="row container">
              <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Filter Cimanews</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.cimanews.index') }}" method="GET">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <label for="title" class="form-label">Judul Cimanews</label>
                                <input type="title" type="text" name="title" class="form-control" placeholder="Judul Cimanews" id="title" value="{{ request('title') }}">
                                {{-- <input type="text" name="name" id="name" class="form-control" placeholder="Nama Dokter" value="{{ request('name') }}"> --}}
                            </div>
                        </div>
                        <div class="d-flex justify-content-end my-1 mt-3">
                            <button type="reset" class="btn btn-secondary me-1" onclick="window.location='{{ route('user.cimanews.index') }}'">Reset</button>
                            <button type="submit" class="btn btn-primary" style="background: #A82024 !important;">Cari</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
        <div class="col-12 py-3">
            <div class="row">
                @forelse ($cimanews as $item)
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                    <div class="rr-blog-item">
                    <div class="rr-blog-thumb-main p-relative">
                        <a href="{{ asset('storage/'. $item->img) }}" data-glightbox="title: {{ $item->title }}">
                            <div class="rr-blog-thumb">
                                <img src="{{ asset('storage/'. $item->img) }}" alt="img">
                            </div>
                        </a>
                    </div>
                    <div class="rr-blog-content rr-blog-content-opcity p-relative">
                        <div class="rr-blog-content-info d-flex mb-15">
                            <span class=""><i class="fa-regular fa-calendar-days"></i>{{ $item->created_at->format('d-m-Y') }}</span>
                        </div>
                        <div class="rr-blog-text">
                            <h4 class="rr-blog-title mb-0 pb-10"><a href="{{ route('user.cimanews.show', $item->slug) }}">{{ $item->title }}</a></h4>
                            <p>{{ \Illuminate\Support\Str::limit($item->sub_desc, 120) }}</p>
                        </div>
                        <div class="rr-blog-wrap d-flex align-items-center justify-content-between">
                            <div class="rr-blog-item-user d-flex align-items-center">
                                <div class="rr-blog-item-user-thumb">
                                <img src="{{ asset('assets/images/icon-avatar.png') }}" alt="img" style="width: 20px !important; height: 20px !important;">
                                </div>
                                <div class="rr-blog-item-user-content">
                                    <span class="rr-blog-item-user-title">{{ ucfirst($item->author) }}</span>
                                </div>
                            </div>
                            <div class="rr-blog-link">
                                <a href="{{ route('user.cimanews.show', $item->slug) }}">Lihat Selengkapnya <i class="fa-light fa-angle-right"></i></a>
                            </div>

                        </div>
                    </div>
                    </div>
                </div>
                @empty
                    <div class="text-center">
                        <h5>Data Tidak Tersedia</h5>
                    </div>
                @endforelse
            </div>
            <div class="mt-4">
                {{  $cimanews->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom_js')
<script src="https://cdn.jsdelivr.net/npm/glightbox@3.0.6/dist/js/glightbox.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lightbox = GLightbox({
            selector: 'data-glightbox'
        });
    });
</script>

@endpush
