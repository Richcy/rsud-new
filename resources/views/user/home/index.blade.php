@extends('user.layouts.main')
@push('custom_css')
    <style>
          .sambutan-description > h1{
            font-weight: 400 !important;
            font-size: 18px;
            text-align: left !important;
        }
    </style>
@endpush

@section('content')
      <!-- slider area start -->
      <div class="rr-slider-3-area black-bg-2">
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
                 <div class="swiper-slide fix "  >
                    @foreach ($sliders as $slider)
                    <div class="rr-slider-3-height p-relative rr-slider-3-thumb" data-background="{{ asset('storage/' . $slider->img) }}">
                    </div>
                    @endforeach
                 </div>
              </div>
           </div>
        </div>
     </div>
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
                                      <b> <i class="icofont-brain"></i></b>
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
                                      <b><i class="icofont-ambulance-cross"></i></b>
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
                                      <b><i class="icofont-heart-beat-alt"></i></b>
                                      <span class="rr-tab-2__item-title m-0">Rating</span>
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
                                      <b> <i class="icofont-blood"></i></b>
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
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="d-flex flex-column h-100 rr-tab-2__item">
                                          <h2 class="rr-tab-2-title-3">Sambutan Direktur:</h2>
                                          <div class="sambutan-description">
                                            {!! \Illuminate\Support\Str::limit($sambutan->description, 60) !!}
                                          </div>
                                          <a class="mt-auto rr-btn-black" href="service.html">
                                            <span>Lihat Selengkapnya <i class="fa-sharp fa-solid fa-plus"></i></span>
                                          </a>
                                        </div>
                                      </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="rr-tab-2__thumb rr-cursor-point-area text-end p-relative">
                                                <img class="w-100 h-75" src="{{ asset('storage/' .$sambutan->banner) }}" alt="img">
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
                                   <div class="col-xl-12 col-lg-12  col-md-12">
                                      <div class="rr-tab-2__thumb rr-cursor-point-area text-end p-relative">
                                         <img class="w-100 h-100" src="{{ asset('storage/' . $maklumat->img) }}" alt="img">
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
                                           <img class="w-100 h-100" src="{{ asset('storage/' . $rating->img) }}" alt="img">
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
                                       <img class="w-100 h-100" src="{{ asset('storage/' . $structure->img) }}" alt="img">
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
                       <img src="{{ asset('mekina') }}/assets//img/feature/icon-1.png" alt="img">
                    </div>
                    <div class="rr-features-content text-center">
                       <h3 class="rr-features-title"><a href="service-details.html">Layanan Unggulan</a></h3>
                       <a class="rr-features-btn" href="service-details.html"><span>Lihat Selengkapnya <i class="fa-solid fa-angle-right"></i></span></a>
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
                       <img src="{{ asset('mekina') }}/assets//img/feature/icon-2.png" alt="img">
                    </div>
                    <div class="rr-features-content text-center">
                        <h3 class="rr-features-title"><a href="service-details.html">Instalasi Rawat Inap</a></h3>
                        <a class="rr-features-btn" href="service-details.html"><span>Lihat Selengkapnya <i class="fa-solid fa-angle-right"></i></span></a>
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
                       <img src="{{ asset('mekina') }}/assets//img/feature/icon-3.png" alt="img">
                    </div>
                    <div class="rr-features-content text-center">
                        <h3 class="rr-features-title"><a href="service-details.html">Instalas Rawat Jalan</a></h3>
                        <a class="rr-features-btn" href="service-details.html"><span>Lihat Selengkapnya <i class="fa-solid fa-angle-right"></i></span></a>
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
                       <img src="{{ asset('mekina') }}/assets//img/feature/icon-4.png" alt="img">
                    </div>
                    <div class="rr-features-content text-center">
                        <h3 class="rr-features-title"><a href="service-details.html">Instalasi Gawat Darurat</a></h3>
                        <a class="rr-features-btn" href="service-details.html"><span>Lihat Selengkapnya <i class="fa-solid fa-angle-right"></i></span></a>
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
                       <img src="{{ asset('mekina') }}/assets//img/feature/icon-4.png" alt="img">
                    </div>
                    <div class="rr-features-content text-center">
                        <h3 class="rr-features-title"><a href="service-details.html">Labotarium</a></h3>
                        <a class="rr-features-btn" href="service-details.html"><span>Lihat Selengkapnya <i class="fa-solid fa-angle-right"></i></span></a>
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
                       <img src="{{ asset('mekina') }}/assets//img/feature/icon-4.png" alt="img">
                    </div>
                    <div class="rr-features-content text-center">
                        <h3 class="rr-features-title"><a href="service-details.html">Radiology</a></h3>
                        <a class="rr-features-btn" href="service-details.html"><span>Lihat Selengkapnya <i class="fa-solid fa-angle-right"></i></span></a>
                     </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- features area end -->

      <!-- doctor area start -->
      <div class="rr-doctors-area  pb-30 pt-100">
        <div class="container">
           <div class="row">
              <div class="col-xl-12 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                 <div class="rr-doctors-title-box text-center mb-45">
                    <div class="rr-doctors-title-box z-index-2">
                       <h4 class="rr-section-title">Dokter</h4>
                    </div>
                 </div>
              </div>
           </div>
           <div class="row mb-50">
              @foreach ($doctors as $doctor)
              <div class="col-xl-6 col-lg-6 col-md-4 col-12 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                <div class="rr-doctors-item mb-25 d-flex align-items-center justify-content-center">
                   <div class="rr-doctors-img">
                      <img src="{{ asset('storage/'. $doctor->doctor->img) }}" alt="">
                   </div>
                   <div class="rr-doctors-content">
                      <h4 class="rr-doctors-name"><a href="doctor-details.html">{{ $doctor->doctor->name }}</a></h4>
                      <p>{{ $doctor->doctor->field_doctor->name }}</p>
                      <a class="rr-doctors-button" href="doctor-details.html">Lihat Selengkapnya </a>
                   </div>
                </div>
             </div>
              @endforeach
              <div class="text-center">
                 <a class="rr-btn" href="doctor.html">Lihat Semua Dokter <i class="fa-solid fa-arrow-right"></i></a>
              </div>
           </div>
        </div>
     </div>
     <!-- doctor area end -->

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
                                <a href="blog-details.html">Lihat Selengkapnya <i class="fa-light fa-angle-right"></i></a>
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
           <div class="row">
              <div class="col-xl-4 col-lg-4 col-md-12 col-12 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                 <div class="rr-contact-info">
                    <div class="rr-contact-item d-flex align-items-center p-relative">
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
                          <span><a href="tel:+09627387877">SP4N LAPOR</a></span>
                       </div>
                    </div>
                    <div class="rr-contact-item d-flex align-items-center p-relative">
                       <div class="rr-contact-icon mr-20">
                          <span><i class="fa-brands fa-whatsapp"></i></span>
                       </div>
                       <div class="rr-contact-text">
                          <h3 class="rr-contact-info-title">Whatsapp</h3>
                          <span><a href="tel:+09627387877">+09627387877</a></span>
                       </div>
                    </div>
                    <div class="rr-contact-item d-flex align-items-center p-relative">
                       <div class="rr-contact-icon mr-20">
                          <span><i class="fa-solid fa-phone"></i></span>
                       </div>
                       <div class="rr-contact-text">
                          <h3 class="rr-contact-info-title">Nomor Telepon</h3>
                          <span><a href="tel:+09627387877">+09627387877</a></span>
                       </div>
                    </div>
                    <div class="rr-contact-item d-flex align-items-center p-relative">
                       <div class="rr-contact-icon mr-20">
                          <span><i class="fa-brands fa-instagram"></i></span>
                       </div>
                       <div class="rr-contact-text">
                          <h3 class="rr-contact-info-title">Insagram</h3>
                          <span><a href="tel:+09627387877">Instagram</a></span>
                       </div>
                    </div>
                    <div class="rr-contact-item d-flex align-items-center p-relative">
                       <div class="rr-contact-icon mr-20">
                          <span><i class="fa-solid fa-envelope"></i></span>
                       </div>
                       <div class="rr-contact-text">
                          <h3 class="rr-contact-info-title">Email</h3>
                          <span><a href="tel:+09627387877">Email</a></span>
                       </div>
                    </div>
                    <div class="rr-contact-item d-flex align-items-center p-relative">
                       <div class="rr-contact-icon mr-20">
                          <span><i class="fa-brands fa-facebook"></i></span>
                       </div>
                       <div class="rr-contact-text">
                          <h3 class="rr-contact-info-title">Facebook</h3>
                          <span><a href="tel:+09627387877">Facebook</a></span>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-xl-8 col-lg-8 col-md-12 col-12 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
                 <div class="rr-contact-form">
                    <div class="rr-contact-form-box text-center">
                       <h4 class="rr-section-title">LAYANAN PENGADUAN</h4>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- contact area end -->
     <!-- map area start -->
     <div class="rr-map fix container pt-90 pb-90">
        <div class="row">
            <div class="col-md-7 col-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.4038199017186!2d107.02980937515613!3d-6.7204789657083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69b3c04cf9e9eb%3A0x2032315f50965be4!2sRSUD%20Cimacan!5e0!3m2!1sid!2sid!4v1721577992569!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-5 col-12">
                <div class="rr-contact-form-box text-center mt-90">
                    <h4 class="rr-section-title">Alamat Kami</h4>
                    <div class="pt-20">
                        <i style="font-size: 50px" class="fa-solid fa-location-dot mb-20"></i>
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

@endpush
