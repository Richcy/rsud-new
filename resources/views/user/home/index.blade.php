
@section('seo_keyword', 'Beranda, Halaman Utama, rumah sakit umum daerah cimacan, rsud cimacan, rsd cimacan')
@section('seo_title', 'RSUD Cimacan | Beranda')
@section('seo_desc',
    'Rumah Sakit Umum Daerah Cimacan pada awalnya adalah Puskesmas Pacet (Cimacan) yang sudah berdiri
    sejak tahun 1953, kemudian pada tahun 1981 statusnya meningkat menjadi Puskesmas DTP dan berubah status menjadi Rumah
    Sakit dengan ditetapkannya Surat Keputusan Bupati Cianjur atas nama Pemerintah Daerah Kabupaten Cianjur Nomor 19 Tahu…')
@section('seo_url', '/')
@extends('user.layouts.main')
@push('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <style>
          .sambutan-description > h1{
            font-weight: 400 !important;
            font-size: 18px;
            text-align: left !important;
        }
        .splide__slide img {
            width: 100%;
            height: 600px; /* Default height */
            object-fit: cover;
        }

        @media (max-width: 1200px) {
            .splide__slide img {
                height: 500px; /* Height for large devices */
            }
        }

        @media (max-width: 992px) {
            .splide__slide img {
                height: 400px; /* Height for medium devices */
            }
        }

        @media (max-width: 768px) {
            .splide__slide img {
                height: 300px; /* Height for small devices */
            }
        }

        @media (max-width: 576px) {
            .splide__slide img {
                height: 200px; /* Height for extra small devices */
            }
        }

        .splide__arrow{
            background: #A82024;
            width: 40px;
            height: 40px;
        }
        .splide__arrow > svg{
            stroke: #FFFFFF !important;
            color: #FFFFFF;
            /* background: #FFFFFF; */
            fill: #FFFFFF;
        }
        .sambutan-description {
            max-height: 180px; /* Adjust height as needed */
            overflow: hidden;
        }
        .sambutan-description > div, a, p, span, h1, h2, h3, h4, h5, h6{
            font-size: 90%;
            line-height: 20px;
            line-break: 20px;
        }
        .sambutan-description::after {
            content: '...';
            display: block;
        }
    </style>
@endpush

@section('content')
      <!-- slider area start -->
      {{-- <div class="rr-slider-3-area black-bg-2">
        <div class="rr-slider-3-wrapper p-relative">
           <div class="rr-slider-3-arrow-box">
              <button class="slider-next">
                 <i class="fa-sharp fa-solid fa-angle-left"></i>
              </button>
              <button class="slider-prev active">
                 <i class="fa-sharp fa-solid fa-angle-right"></i>
              </button>
           </div>
           <div class="swiper-container rr-slider-3-active">
              <div class="swiper-wrapper">
                 <div class="swiper-slide fix">
                     <div class="rr-slider-3-height p-relative rr-slider-3-thumb">
                        @foreach ($sliders as $slider)
                            <img src="{{ asset('storage/' . $slider->img) }}" alt="">
                        @endforeach
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div> --}}
     <section class="splide" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
              <ul class="splide__list">
                 @foreach ($sliders as $slider)
                    <li class="splide__slide">
                        <img style="img-fluid" src="{{ asset('storage/'. $slider->img) }}" alt="">
                    </li>
                 @endforeach
              </ul>
        </div>
      </section>
     <!-- slider area end -->
     <!-- tab area start -->
     <section class="tab-area rr-tab-2__ptb theme-background pt-100 pb-50 p-relative fix">
        <div class="container">
           <div class="row">
              <div class="col-xl-12 col-12 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                 <div class="rr-price-2-title-box text-center mb-45">
                    <h4 class="rr-section-title">INFORMASI PUBLIK</h4>
                 </div>
                 <div class="rr-tab-2__section wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
                    <nav>
                       <div class="nav rr-tab-2 justify-content-center " id="nav-tab" role="tablist">
                          <button class="nav-links active" id="nav-Home-tab" data-bs-toggle="tab" data-bs-target="#Home"
                             type="button" role="tab" aria-controls="nav-Home-tab" aria-selected="false">
                             <span class="rr-tab-2">
                                <span class="rr-tab-2__item d-flex justify-content-between align-items-center">
                                   <span class="rr-tab-2__item-info d-flex align-items-center">
                                      <span class="rr-tab-2__item-title m-0">Sambutan Direktur</span>
                                   </span>
                                </span>
                             </span>
                          </button>
                          <button class="nav-links" id="nav-Car-tab" data-bs-toggle="tab" data-bs-target="#Car"
                             type="button" role="tab" aria-controls="nav-Car-tab" aria-selected="true" tabindex="-1">
                             <span class="rr-tab-2">
                                <span class="rr-tab-2__item d-flex justify-content-between align-items-center">
                                   <span class="rr-tab-2__item-info d-flex align-items-center">
                                      <span class="rr-tab-2__item-title m-0">Maklumat</span>
                                   </span>
                                </span>
                             </span>
                          </button>
                          <button class="nav-links" id="nav-Health-tab" data-bs-toggle="tab" data-bs-target="#Health"
                             type="button" role="tab" aria-controls="nav-Health-tab" aria-selected="false"
                             tabindex="-1">
                             <span class="rr-tab-2">
                                <span class="rr-tab-2__item d-flex justify-content-between align-items-center">
                                   <span class="rr-tab-2__item-info d-flex align-items-center">
                                      <span class="rr-tab-2__item-title m-0">Indeks Kepuasan Masyarakat</span>
                                   </span>
                                </span>
                             </span>
                          </button>
                          <button class="nav-links" id="nav-Education-tab" data-bs-toggle="tab"
                             data-bs-target="#Education" type="button" role="tab" aria-controls="nav-Education-tab"
                             aria-selected="false" tabindex="-1">
                             <span class="rr-tab-2">
                                <span class="rr-tab-2__item d-flex justify-content-between align-items-center">
                                   <span class="rr-tab-2__item-info d-flex align-items-center">
                                      <span class="rr-tab-2__item-title m-0">Organisasi</span>
                                   </span>
                                </span>
                             </span>
                          </button>
                       </div>
                    </nav>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <div class="rr-tab-2_content fix mb-100 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
        <div class="container p-0">
           <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12">
                 <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="Home" role="tabpanel" aria-labelledby="nav-Home-tab" tabindex="0">
                       <div class="rr-tab-2__wrapper">
                          <div class="rr-tab-2__section-box">
                             <div class="container p-0">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 mb-3">
                                        <div class="p-3 h-100 d-flex flex-column">
                                            <h2 class="rr-tab-2-title-3">Sambutan Direktur:</h2>
                                            <div class="sambutan-description mb-10">
                                                {!! $sambutan->description !!}
                                            </div>
                                            <a class="mt-auto rr-btn-black btn btn-dark " href="service.html">
                                                <span>Lihat Selengkapnya <i class="fa-sharp fa-solid fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 mb-3">
                                        <div class="p-relative p-3">
                                            <img class="img-fluid"  src="{{ asset('storage/' . $sambutan->banner) }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="tab-pane fade" id="Car" role="tabpanel" aria-labelledby="nav-Car-tab"
                       tabindex="0">
                       <div class="rr-tab-2__wrapper">
                          <div class="rr-tab-2__section-box">
                             <div class="container p-0">
                                <div class="row">
                                   <div class="col-xl-12 col-lg-12 col-md-12">
                                      <div class="rr-tab-2__thumb rr-cursor-point-area text-end p-relative">
                                         <img style="transform: scale(0.8);" class="w-100 img-fluid" src="{{ asset('storage/' . $maklumat->img) }}" alt="img">
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="tab-pane fade" id="Health" role="tabpanel" aria-labelledby="nav-Health-tab"
                       tabindex="0">
                       <div class="rr-tab-2__wrapper">
                          <div class="rr-tab-2__section-box">
                             <div class="container p-0">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12  col-md-12">
                                        <div class="rr-tab-2__thumb rr-cursor-point-area text-end p-relative">
                                           <img style="transform: scale(0.5); margin-top: -400px" class="w-100 " src="{{ asset('storage/' . $rating->img) }}" alt="img">
                                        </div>
                                     </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="tab-pane fade" id="Education" role="tabpanel" aria-labelledby="nav-Education-tab"
                       tabindex="0">
                       <div class="rr-tab-2__wrapper">
                          <div class="rr-tab-2__section-box">
                             <div class="container p-0">
                               <div class="row">
                                <div class="col-xl-12 col-lg-12  col-md-12">
                                    <div class="rr-tab-2__thumb rr-cursor-point-area text-end p-relative">
                                       <img class="w-100 img-fluid" style="transform: scale(0.8);" src="{{ asset('storage/' . $structure->img) }}" alt="img">
                                    </div>
                                 </div>
                               </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- tab area end -->
       <!-- features area start -->
       <section class="rr-features-area pt-90 pb-70 fix">
        <div class="container">
           <div class="row">
              <div class="col-xl-12 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                 <div class="rr-features-title-box text-center mb-45">
                    <h4 class="rr-section-title">LAYANAN</h4>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                 <div class="rr-features-item p-relative wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                    <div class="rr-features-thumb p-relative">
                       <div style="background-color: #A82024; height: 100px !important;"></div>
                       <span>01</span>
                    </div>
                    <div class="rr-features-icon">
                        <i class="fa-solid fa-hand-holding-medical"></i>
                    </div>
                    <div class="rr-features-content text-center">
                       <h3 class="rr-features-title"><a href="{{ route('user.layanan_unggulan.index') }}">Layanan Unggulan</a></h3>
                       <a class="rr-features-btn" href="{{ route('user.layanan_unggulan.index') }}"><span>Lihat Selengkapnya <i class="fa-solid fa-angle-right"></i></span></a>
                    </div>
                 </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                 <div class="rr-features-item p-relative wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
                    <div class="rr-features-thumb p-relative">
                        <div style="background-color: #A82024; height: 100px !important;"></div>
                       <span>02</span>
                    </div>
                    <div class="rr-features-icon">
                        <i class="fa-solid fa-bed-pulse"></i>
                    </div>
                    <div class="rr-features-content text-center">
                        <h3 class="rr-features-title"><a href="{{ route('user.rawat_inap.index') }}">Instalasi Rawat Inap</a></h3>
                        <a class="rr-features-btn" href="{{ route('user.rawat_inap.index') }}"><span>Lihat Selengkapnya <i class="fa-solid fa-angle-right"></i></span></a>
                     </div>
                 </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                 <div class="rr-features-item p-relative wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
                    <div class="rr-features-thumb p-relative">
                        <div style="background-color: #A82024; height: 100px !important;"></div>
                       <span>03</span>
                    </div>
                    <div class="rr-features-icon">
                        <i class="fa-solid fa-hospital"></i>
                    </div>
                    <div class="rr-features-content text-center">
                        <h3 class="rr-features-title"><a href="{{ route('user.rawat_jalan.index') }}">Instalasi Rawat Jalan</a></h3>
                        <a class="rr-features-btn" href="{{ route('user.rawat_jalan.index') }}"><span>Lihat Selengkapnya <i class="fa-solid fa-angle-right"></i></span></a>
                     </div>
                 </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                 <div class="rr-features-item p-relative wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
                    <div class="rr-features-thumb p-relative">
                        <div style="background-color: #A82024; height: 100px !important;"></div>
                       <span>04</span>
                    </div>
                    <div class="rr-features-icon">
                        <i class="fa-solid fa-truck-medical"></i>
                    </div>
                    <div class="rr-features-content text-center">
                        <h3 class="rr-features-title"><a href="{{ route('user.gawat_darurat.index') }}">Instalasi Gawat Darurat</a></h3>
                        <a class="rr-features-btn" href="{{ route('user.gawat_darurat.index') }}"><span>Lihat Selengkapnya <i class="fa-solid fa-angle-right"></i></span></a>
                     </div>
                 </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                 <div class="rr-features-item p-relative wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
                    <div class="rr-features-thumb p-relative">
                        <div style="background-color: #A82024; height: 100px !important;"></div>
                       <span>05</span>
                    </div>
                    <div class="rr-features-icon">
                        <i class="fa-solid fa-microscope"></i>
                    </div>
                    <div class="rr-features-content text-center">
                        <h3 class="rr-features-title"><a href="{{ route('user.laboratorium.index') }}">Laboratorium</a></h3>
                        <a class="rr-features-btn" href="{{ route('user.laboratorium.index') }}"><span>Lihat Selengkapnya <i class="fa-solid fa-angle-right"></i></span></a>
                     </div>
                 </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                 <div class="rr-features-item p-relative wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
                    <div class="rr-features-thumb p-relative">
                        <div style="background-color: #A82024; height: 100px !important;"></div>
                       <span>06</span>
                    </div>
                    <div class="rr-features-icon">
                        <i class="fa-solid fa-suitcase-medical"></i>
                    </div>
                    <div class="rr-features-content text-center">
                        <h3 class="rr-features-title"><a href=" ">Radiology</a></h3>
                        <a class="rr-features-btn" href="service-details.html"><span>Lihat Selengkapnya <i class="fa-solid fa-angle-right"></i></span></a>
                     </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- features area end -->

   <!-- team area start -->
   <section class="rr-team-4-area pt-100 pb-80 fix">
    <div class="container">
       <div class="row mb-40">
          <div class="col-xl-12 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
             <div class="rr-price-2-title-box text-center mb-45">
                <h4 class="rr-section-title rr-section-title-space">Dokter</h4>
             </div>
          </div>
          @foreach ($doctors as $item)
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
            <div class="rr-team-4-item p-relative mb-60">
               <div class="rr-team-4-thumb p-relative ">
                  <div class="rr-team-4-img">
                     <img class="w-100" src="{{ asset('storage/'. $item->doctor->img) }}" alt="img">
                  </div>
               </div>

               <div class="rr-team-4-content text-center p-relative">
                  <h6 class="rr-team-4-title"><a href="{{ route('user.doctor.show', $item->doctor->id) }}">{{ $item->doctor->name }}</a></h6>
                    <p>{{ $item->doctor->field_doctor->name }}</p>
               </div>
               <div class="rr-team-4-arrow"> <a href="{{ route('user.doctor.index') }}"><i class="fa-solid fa-arrow-up"></i></a>
               </div>
            </div>
         </div>
          @endforeach
       </div>
       <div class="row">
          <div class="team-btn text-center wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
             <a class="rr-btn-black" href="team.html"><span>Lihat Semua Dokter <i
                      class="fa-sharp fa-solid fa-plus"></i></span></a>
          </div>
       </div>
    </div>
 </section>
 <!-- team area end -->

     <!-- blog area start -->
     <div class="rr-blog-area pt-90 pb-90 fix">
        <div class="container">
           <div class="row">
              <div class="col-xl-12 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                 <div class="rr-blog-title-box text-center mb-45">
                    <h4 class="rr-section-title">CIMANEWS</h4>
                 </div>
              </div>
              @foreach ($cimanews as $news)
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                    <div class="rr-blog-item">
                    <div class="rr-blog-thumb-main p-relative">
                    <a href="blog-details.html">
                        <div class="rr-blog-thumb">
                            <img src="{{ asset('storage/'. $news->img) }}" alt="img">
                        </div>
                    </a>
                    </div>
                    <div class="rr-blog-content rr-blog-content-opcity p-relative">
                        <div class="rr-blog-content-info d-flex mb-15">
                            <span class=""><i class="fa-regular fa-calendar-days"></i>{{ $news->created_at }}</span>
                        </div>
                        <div class="rr-blog-text">
                            <h4 class="rr-blog-title mb-0 pb-10"><a href="blog-details.html">{{ $news->title }}</a></h4>
                            <p>{{ $news->sub_desc }}</p>
                        </div>
                        <div class="rr-blog-wrap d-flex align-items-center justify-content-between">
                            <div class="rr-blog-item-user d-flex align-items-center">
                                <div class="rr-blog-item-user-thumb">
                                <img src="{{ asset('mekina') }}/assets/img/blog/avada.png" alt="img">
                                </div>
                                <div class="rr-blog-item-user-content">
                                <span class="rr-blog-item-user-title"><a href="blog-details.html">{{ $news->author }}</a></span>
                                </div>
                            </div>
                            <div class="rr-blog-link">
                                <a href="{{ route('user.cimanews.show', $news->slug) }}">Lihat Selengkapnya <i class="fa-light fa-angle-right"></i></a>
                            </div>

                        </div>
                    </div>
                    </div>
                </div>
              @endforeach
              <div class="blog-btn text-center wow rrfadeUp pt-20" data-wow-duration=".9s" data-wow-delay=".9s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.9s; animation-name: rrfadeUp;">
                 <a class="rr-btn-black" href="team.html"><span>Lihat Semua CimaNEWS <i class="fa-sharp fa-solid fa-plus"></i></span></a>
              </div>
           </div>
        </div>
     </div>
     <!-- blog area end -->

      <!-- contact area start -->
      <section class="rr-contact-area fix">
        <div class="container">
           <div class="row gx-0">
            <div class="col-xl-12 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                <div class="rr-blog-title-box text-center mb-45">
                   <h4 class="rr-section-title">LAYANAN PENGADUAN</h4>
                </div>
             </div>
              <div class="col-xl-4 col-lg-4 col-md-12 col-12 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                 <div class="rr-contact-info" >
                    <div class="rr-contact-item d-flex align-items-center p-relative" style="padding-top: 30px !important;">
                        <div class="rr-contact-icon mr-20">
                           <span><i class="fa-solid fa-user"></i></span>
                        </div>
                        <div class="rr-contact-text">
                           <h5 class="rr-contact-info-title">CUSTOMER SERVICE</h5>
                           <span><a href="mailto:robiul@eobi.com">(Gedung B Lantai 3)</a></span>
                        </div>
                     </div>
                    <div class="rr-contact-item d-flex align-items-center p-relative">
                       <div class="rr-contact-icon mr-20">
                          <span><i class="fa-brands fa-chrome"></i></span>
                       </div>
                       <div class="rr-contact-text">
                        <h3 class="rr-contact-info-title">Website</h3>
                          <span><a href="https://www.lapor.go.id/" target="_blank">SP4N LAPOR</a></span>
                       </div>
                    </div>
                    <div class="rr-contact-item d-flex align-items-center p-relative">
                       <div class="rr-contact-icon mr-20">
                          <span><i class="fa-brands fa-whatsapp"></i></span>
                       </div>
                       <div class="rr-contact-text">
                          <h3 class="rr-contact-info-title">Whatsapp</h3>
                          <span><a href="https://api.whatsapp.com/send/?phone=6285864817874&text=Halo+Kak+.+.+.&type=phone_number&app_absent=0">(+62) 858-6481-7874</a></span>
                       </div>
                    </div>
                    <div class="rr-contact-item d-flex align-items-center p-relative">
                       <div class="rr-contact-icon mr-20">
                          <span><i class="fa-solid fa-phone"></i></span>
                       </div>
                       <div class="rr-contact-text">
                          <h3 class="rr-contact-info-title">Nomor Telepon</h3>
                          <span><a href="tel:+09627387877">0263-2956-036</a></span>
                       </div>
                    </div>
                    <div class="rr-contact-item d-flex align-items-center p-relative">
                       <div class="rr-contact-icon mr-20">
                          <span><i class="fa-brands fa-instagram"></i></span>
                       </div>
                       <div class="rr-contact-text">
                          <h3 class="rr-contact-info-title">Insagram</h3>
                          <span><a href="https://www.instagram.com/rsud.cimacan/" target="_blank">Instagram</a></span>
                       </div>
                    </div>
                    <div class="rr-contact-item d-flex align-items-center p-relative">
                       <div class="rr-contact-icon mr-20">
                          <span><i class="fa-solid fa-envelope"></i></span>
                       </div>
                       <div class="rr-contact-text">
                          <h3 class="rr-contact-info-title">Email</h3>
                          <span><a href="mailto:rsud.cimacann@gmail.com">Email</a></span>
                       </div>
                    </div>
                    <div class="rr-contact-item d-flex align-items-center p-relative" style="padding-bottom: 30px !important;">
                       <div class="rr-contact-icon mr-20">
                          <span><i class="fa-brands fa-facebook"></i></span>
                       </div>
                       <div class="rr-contact-text">
                          <h3 class="rr-contact-info-title">Facebook</h3>
                          <span><a href="https://www.facebook.com/profile.php?id=100071691815827" target="">Facebook</a></span>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-xl-8 col-lg-8 col-md-12 col-12 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
                 <div class="rr-contact-form">
                    <div class="rr-contact-form-box text-center">
                       <img style="max-height: 695px; object-fit: cover;" src="{{ asset('assets/images/petugas_khusus.jpg') }}" alt="" class="img-fluid w-100">
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- contact area end -->
     <!-- map area start -->
     <div class="rr-map fix container pt-90 pb-90">
        <div class="row ">
            <div class="col-md-7 col-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.4038199017186!2d107.02980937515613!3d-6.7204789657083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69b3c04cf9e9eb%3A0x2032315f50965be4!2sRSUD%20Cimacan!5e0!3m2!1sid!2sid!4v1721577992569!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-5 col-12">
                <div class="rr-contact-form-box text-center mt-90">
                    <h4 class="rr-section-title">Alamat Kami</h4>
                    <div class="pt-20">
                        <i style="font-size: 50px; color:#A82024" class="fa-solid fa-location-dot mb-20"></i>
                       <h5 style="font-weight: 400">
                        Jl. Raya Cimacan No.17A, Palasari, <br>
                        Kec. Cipanas, Kabupaten Cianjur, <br>
                         Jawa Barat 43253
                       </h5>
                    </div>
                 </div>
            </div>
        </div>
     </div>
     <!-- map area end -->
@endsection

@push('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
     <script>
        var splide = new Splide( '.splide', {
            type  : 'fade',
            rewind: true,
        });

        splide.mount();
     </script>
@endpush
