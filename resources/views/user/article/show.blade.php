@section('seo_keyword', $article->title, 'Artikel, Berita, Blog, rumah sakit, rumah sakit umum daerah cimacan, rsud cimacan, rsd cimacan')
@section('seo_title', 'RSUD Cimacan | Artikel')
@section('seo_desc', $article->sub_desc ? $article->sub_desc : 'Detail Artikel', $article->title)
@section('seo_url', route('user.article.show', $article->slug))
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
        <span><small><a style="color:#121212" href="">Beranda</a> / <a style="color:#121212" href="{{ route('user.article.index') }}">Artikel</a> / <strong>{{ $article->title }}</strong></small></span>
        <!-- postbox area start -->
      <section class="postbox__area pt-100 pb-100">
        <div class="container">
           <div class="row">
              <div class="col-xxl-8 col-xl-8 col-lg-8">
                 <div class="postbox__wrapper">
                    <article class="postbox__item format-image mb-50 transition-3">
                       <div class="postbox__thumb w-img mb-25">
                          <a href="blog-details.html">
                             <img src="{{ asset('storage/'. $article->img) }}" alt="img">
                          </a>
                       </div>
                       <div class="postbox__content mr-70">
                          <div class="postbox__meta mb-20">
                             <span><a style="color: #121212;" href="#"><i class="fa-light fa-user"></i>By {{ $article->author }}</a></span>
                          </div>
                          <h3 class="postbox__title mb-10">
                             {{ $article->title }}
                          </h3>
                          <div class="postbox__text pb-10">
                            {!! $article->description !!}
                          </div>
                       </div>
                    </article>
                 </div>
              </div>
              <div class="col-xxl-4 col-xl-4 col-lg-4">
                 <div class="sidebar__wrapper">
                    <div class="sidebar__widget sidebar__widget-bg mb-30">
                       <h3 class="sidebar__widget-title">Kategori</h3>
                       <div class="sidebar__widget-content">
                          <ul>
                            @foreach ($categories as $category)
                                <li><a href="{{ route('user.article.index', ['category' => $category->id]) }}"><i class="fa-solid fa-right-long"></i> {{ $category->name }}</a></li>
                            @endforeach
                          </ul>
                       </div>
                    </div>
                    <div class="sidebar__widget sidebar__widget-bg mb-30">
                       <h3 class="sidebar__widget-title">Artikel Terbaru</h3>
                       <div class="sidebar__widget-content">
                          <div class="sidebar__post">
                             @forelse ($otherArticle as $item)
                             <div class="rc__post mb-25 d-flex align-items-center">
                                <div class="rc__post-thumb mr-20">
                                   <a href="{{ route('user.article.show', $item->slug) }}"><img style="width: 60px; height: 60px" src="{{ asset('storage/'. $item->img) }}" alt="img"></a>
                                </div>
                                <div class="rc__post-content">
                                   <div class="rc__meta">
                                    <span><i class="fa-solid fa-calendar-days"></i> {{ date('d-m-Y', strtotime($item->created_at)) }}</span>
                                   </div>
                                   <h3 class="rc__post-title">
                                      <a style="color: #121212" href="{{ route('user.article.show', $item->slug) }}">
                                        {{ $item->title }}
                                      </a>
                                   </h3>
                                </div>
                             </div>
                             @empty
                                 <div class="text-center">
                                    <p>Belum Ada Artikel Terbaru</p>
                                 </div>
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
