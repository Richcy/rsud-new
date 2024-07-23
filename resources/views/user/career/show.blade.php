@section('seo_keyword', $career->title, 'rumah sakit umum daerah cimacan, rsud cimacan')
@section('seo_title', 'RSUD Cimacan | Karir')
@section('seo_desc', $career->sub_desc ? $career->sub_desc : 'Detail Artikel', $career->title)
@section('seo_url', route('user.career.show', $career->slug))
@extends('user.layouts.main')
@push('custom_css')
    <style>
        a {
            color: #72b9ff;
        }
        a > i {
            color: #121212;
        }
    </style>
@endpush

@section('content')
<div class="container my-4">
    <div class="row">
        <span><small><a style="color:#121212" href="">Beranda</a> / <a style="color:#121212" href="{{ route('user.career.index') }}">Artikel</a> / <strong>{{ $career->title }}</strong></small></span>
        <!-- postbox area start -->
      <section class="postbox__area pt-100 pb-100">
        <div class="container">
           <div class="row">
              <div class="col-xxl-8 col-xl-8 col-lg-8">
                 <div class="postbox__wrapper">
                    <article class="postbox__item format-image mb-50 transition-3">
                       <div class="postbox__thumb w-img mb-25">
                          <a href="blog-details.html">
                             <img src="{{ asset('storage/'. $career->image) }}" alt="img">
                          </a>
                       </div>
                       <div class="postbox__content mr-70">
                          <h3 class="postbox__title mb-10">
                             {{ $career->title }}
                          </h3>
                          <div class="postbox__text pb-10">
                            {!! $career->description !!}
                          </div>
                       </div>
                    </article>
                 </div>
              </div>
              <div class="col-xxl-4 col-xl-4 col-lg-4">
                 <div class="sidebar__wrapper">
                    <div class="sidebar__widget sidebar__widget-bg mb-30">
                       <h3 class="sidebar__widget-title">Karir Terbaru</h3>
                       <div class="sidebar__widget-content">
                          <div class="sidebar__post">
                             @forelse ($otherCareer as $item)
                             <div class="rc__post mb-25 d-flex align-items-center">
                                <div class="rc__post-thumb mr-20">
                                   <a href="{{ route('user.career.show', $item->slug) }}"><img style="width: 60px; height: 60px" src="{{ asset('storage/'. $item->img) }}" alt="img"></a>
                                </div>
                                <div class="rc__post-content">
                                   <div class="rc__meta">
                                    <span><i class="fa-solid fa-calendar-days"></i> {{ date('d-m-Y', strtotime($item->created_at)) }}</span>
                                   </div>
                                   <h3 class="rc__post-title">
                                      <a style="color: #121212" href="{{ route('user.career.show', $item->slug) }}">
                                        {{ $item->title }}
                                      </a>
                                   </h3>
                                </div>
                             </div>
                             @empty
                                 <p class="text-center">Tidak ada karir lain</p>
                             @endforelse
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- postbox area end -->
    </div>
</div>
@endsection

@push('custom_js')


@endpush
