@section('seo_keyword', $event->title, 'rumah sakit umum daerah cimacan, rsud cimacan')
@section('seo_title', 'RSUD Cimacan | Event Detail')
@section('seo_desc', $event->sub_desc ? $event->sub_desc : 'Detail Event', $event->title)
@section('seo_url', route('user.event.show', $event->slug))
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
        <span><small><a style="color:#121212" href="">Beranda</a> / <a style="color:#121212" href="{{ route('user.event.index') }}">Event</a> / <strong>{{ $event->title }}</strong></small></span>
        <!-- postbox area start -->
      <section class="postbox__area pt-100 pb-100">
        <div class="container">
           <div class="row">
              <div class="col-xxl-8 col-xl-8 col-lg-8">
                 <div class="postbox__wrapper">
                    <article class="postbox__item format-image mb-50 transition-3">
                       <div class="postbox__thumb w-img mb-25">
                          <a href="blog-details.html">
                             <img src="{{ asset('storage/'. $event->img) }}" alt="img">
                          </a>
                       </div>
                       <div class="postbox__content mr-70">
                           @php
                              use Illuminate\Support\Str;
                              use Carbon\Carbon;

                              Carbon::setLocale('id');
                              
                              $startDateTime = Carbon::parse($event->start_date . ' ' . $event->start_time);
                              $endDateTime = Carbon::parse($event->end_date . ' ' . $event->end_time);

                              $startDateFormatted = $startDateTime->translatedFormat('d M Y H:i'); // Format: 06 Jan 2024 12:00
                              $endDateFormatted = $endDateTime->translatedFormat('d M Y H:i');     // Format: 06 Jan 2024 13:00
                           @endphp
                           <span style="font-size: 15px !important;">
                              {{ $startDateFormatted . ' - ' . $endDateFormatted }}
                           </span>
                          <div class="postbox__meta mb-20">
                             <span><a style="color: #121212;" href="#"><i class="fa-regular fa-map-marker"></i>{{ $event->location }}</a></span>
                          </div>
                          <h3 class="postbox__title mb-10">
                             {{ $event->title }}
                          </h3>
                          <div class="postbox__text pb-10">
                            {!! $event->description !!}
                          </div>
                       </div>
                    </article>
                 </div>
              </div>
              <div class="col-xxl-4 col-xl-4 col-lg-4">
                 <div class="sidebar__wrapper">
                    <div class="sidebar_widget sidebar_widget-bg mb-30">
                       <h3 class="sidebar__widget-title">Kategori</h3>
                       <div class="sidebar__widget-content">
                          <ul>
                            @foreach ($categories as $category)
                                <li><a href="{{ route('user.event.index', ['category' => $category->id]) }}"><i class="fa-solid fa-right-long"></i> {{ $category->name }}</a></li>
                            @endforeach
                          </ul>
                       </div>
                    </div>
                    <div class="sidebar_widget sidebar_widget-bg mb-30">
                       <h3 class="sidebar__widget-title">Event Terbaru</h3>
                       <div class="sidebar__widget-content">
                          <div class="sidebar__post">
                             @foreach ($relatedEvent as $item)
                                 <div class="rc__post mb-25 d-flex align-items-center">
                                    <div class="rc__post-thumb mr-20">
                                       <a href="{{ route('user.event.show', $item->slug) }}"><img src="{{ asset('storage/'. $item->img) }}" alt="img" style="width: 60px !important; height: 60px !important;"></a>
                                    </div>
                                    <div class="rc__post-content">
                                       <div class="rc__meta">
                                          <span><i class="fa-regular fa-map-marker"></i>
                                             {{ Str::limit($item->location, 60, '...') }}</span>
                                       </div>
                                       <h3 class="rc__post-title">
                                          <a style="color: #121212" href="{{ route('user.event.show', $item->slug) }}">{{ $item->title }}</a>
                                       </h3>
                                    </div>
                                 </div>
                              @endforeach
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