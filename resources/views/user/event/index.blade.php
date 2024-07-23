@section('seo_keyword', 'event, acara, agenda, rumah sakit umum daerah cimacan, rsud cimacan')
@section('seo_title', 'RSUD Cimacan | Event')
@section('seo_desc',
'Daftar Acara yang diadakan oleh Rumah Sakit Daerah Cimacan')
@section('seo_url', route('user.event.index'))
@extends('user.layouts.main')
@push('custom_css')
    <link href="https://cdn.jsdelivr.net/npm/glightbox@3.0.6/dist/css/glightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/vendors/css/forms/select/select2.min.css">
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
        <span><small><a href="">Beranda</a> / <strong>Event</strong></small></span>
        <div class="col-xl-12 mt-5 pt-5 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
            <div class="rr-price-2-title-box text-center mb-45">
               <h4 class="rr-section-title rr-section-title-space">Event</h4>
            </div>
         </div>
        <div class="col-12 py-2 pb-2">
            <div class="row container">
              <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Filter Event</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.event.index') }}" method="GET">
                        <div class="row">
                            <div class="col-md-6 col-12 mb-2">
                                <label for="category" class="form-label">Kategori Event</label>
                                <select name="category" id="category" class="form-select">
                                    <option selected>Semua Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="title" class="form-label">Judul Event</label>
                                <input type="title" type="text" name="title" class="form-control" placeholder="Judul Event" id="title" value="{{ request('title') }}">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end my-1 mt-3">
                            <button type="reset" class="btn btn-secondary me-1" onclick="window.location='{{ route('user.doctor.index') }}'">Reset</button>
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </div>

        <div class="col-12 pt-20 mt-20">
            <div class="row match-height">
                @php
                    use Illuminate\Support\Str;
                    use Carbon\Carbon;

                    Carbon::setLocale('id');
                @endphp
                @foreach ($events as $item)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col mb-30 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                    <div class="rr-blog-item">
                    <div class="rr-blog-thumb-main p-relative">
                    <a href="{{ asset('storage/'. $item->img) }}" data-glightbox="title: {{ $item->title }}">
                        <div class="rr-blog-thumb">
                            <img src="{{ asset('storage/'. $item->img) }}" alt="img" class="img-fluid">
                        </div>
                    </a>
                    </div>
                    <div class="rr-blog-content rr-blog-content-opcity p-relative">
                        @php
                            $startDateTime = Carbon::parse($item->start_date . ' ' . $item->start_time);
                            $endDateTime = Carbon::parse($item->end_date . ' ' . $item->end_time);

                            $startDateFormatted = $startDateTime->translatedFormat('d M Y H:i'); // Format: 06 Jan 2024 12:00
                            $endDateFormatted = $endDateTime->translatedFormat('d M Y H:i');     // Format: 06 Jan 2024 13:00
                        @endphp
                        <span style="font-size: 13px !important;">
                            {{ $startDateFormatted . ' - ' . $endDateFormatted }}
                        </span>
                        <div class="rr-blog-content-info d-flex mb-15">
                            <span class=""><i class="fa-regular fa-map-marker"></i>{{ Str::limit($item->location, 60, '...') }}</span>
                        </div>
                        <div class="rr-blog-text">
                            <h4 class="rr-blog-title mb-0 pb-10"><a href="blog-details.html">{{ $item->title }}</a></h4>
                            <p>{{ Str::limit($item->sub_desc, 100, '...') }}</p>
                        </div>
                        <div class="rr-blog-wrap d-flex align-items-center justify-content-between">
                            <div class="rr-blog-item-user d-flex align-items-center">
                                {{-- <div class="rr-blog-item-user-thumb">
                                <img src="{{ asset('mekina') }}/assets/img/blog/avada.png" alt="img">
                                </div> --}}
                                <div class="rr-blog-item-user-content">
                                <span class="rr-blog-item-user-title"><a href="blog-details.html">{{ $item->category }}</a></span>
                                </div>
                            </div>
                            <div class="rr-blog-link">
                                <a href="{{ route('user.event.show', $item->slug) }}">Lihat Selengkapnya <i class="fa-light fa-angle-right"></i></a>
                            </div>

                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{  $events->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom_js')
<script src="https://cdn.jsdelivr.net/npm/glightbox@3.0.6/dist/js/glightbox.min.js"></script>
<script src="{{ asset('vuexy') }}/app-assets/vendors/js/forms/select/select2.full.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lightbox = GLightbox({
            selector: 'data-glightbox'
        });

        $('#category').select2()
    });
</script>
@endpush
