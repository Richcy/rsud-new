@section('seo_keyword', 'Artikel, Berita, Blog, rumah sakit, rumah sakit umum daerah cimacan, rsud cimacan, rsd cimacan')
@section('seo_title', 'RSUD Cimacan | Artikel')
@section('seo_desc', 'Daftar Artikel yang diterbitkan oleh Rumah Sakit Daerah Cimacan')
@section('seo_url', route('user.article.index'))
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
        <span><small><a href="">Beranda</a> / <strong>Article</strong></small></span>
        <div class="col-xl-12 mt-5 pt-5 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
            <div class="rr-price-2-title-box text-center mb-45">
               <h4 class="rr-section-title rr-section-title-space">Artikel</h4>
            </div>
         </div>
        <div class="col-12 py-2 pb-2">
            <div class="row container">
              <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Filter Artikel</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.article.index') }}" method="GET">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label for="category" class="form-label">Kategori</label>
                                <select name="category" id="category" class="form-select">
                                    <option selected>Pilih Kategori Artikel</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="title" class="form-label">Judul Artickel</label>
                                <input type="title" type="text" name="title" class="form-control" placeholder="Judul Artikel" id="title" value="{{ request('title') }}">
                                {{-- <input type="text" name="name" id="name" class="form-control" placeholder="Nama Dokter" value="{{ request('name') }}"> --}}
                            </div>
                        </div>
                        <div class="d-flex justify-content-end my-1 mt-3">
                            <button type="reset" class="btn btn-secondary me-1" onclick="window.location='{{ route('user.article.index') }}'">Reset</button>
                            <button type="submit" class="btn btn-primary" style="background: #A82024 !important;">Cari</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
        <div class="col-12 py-3">
            <div class="row">
                @forelse ($articles as $item)
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
                            <h4 class="rr-blog-title mb-0 pb-10"><a href="{{ route('user.article.show', $item->slug) }}">{{ $item->title }}</a></h4>
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
                                <a href="{{ route('user.article.show', $item->slug) }}">Lihat Selengkapnya <i class="fa-light fa-angle-right"></i></a>
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
                {{  $articles->links('vendor.pagination.custom') }}
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
