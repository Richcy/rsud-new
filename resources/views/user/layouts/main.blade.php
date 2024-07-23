<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>@yield('seo_title', 'Beranda')</title>

   <meta name="keywords" content="@yield('seo_keyword')">
   <meta name="description" content="@yield('seo_desc') ">
   <link rel="canonical" href="@yield('seo_url')">
   <meta property="og:type" content="article" />
   <meta property="og:title" content="@yield('seo_keyword')" />
   <meta property="og:image" content="" />
   <meta property="og:description" content="@yield('seo_desc')" />
   <meta property="og:url" content="@yield('seo_url')" />
   <meta name="twitter:card" content="summary_large_image" />
   <meta name="twitter:title" content="@yield('seo_keyword')" />
   <meta name="twitter:image:src" content="" />
   <meta name="twitter:description" content="@yield('seo_desc')" />
   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo_rsud_hijau.png') }}">

   <!-- CSS here -->
   <link rel="stylesheet" href="{{ asset('mekina') }}/assets/css/bootstrap.css">
   <link rel="stylesheet" href="{{ asset('mekina') }}/assets/css/animate.css">
   <link rel="stylesheet" href="{{ asset('mekina') }}/assets/css/swiper-bundle.css">
   <link rel="stylesheet" href="{{ asset('mekina') }}/assets/css/slick.css">
   <link rel="stylesheet" href="{{ asset('mekina') }}/assets/css/style.css">
   <link rel="stylesheet" href="{{ asset('mekina') }}/assets/css/icofont.css">
   <link rel="stylesheet" href="{{ asset('mekina') }}/assets/css/icofont.min.css">
   <link rel="stylesheet" href="{{ asset('mekina') }}/assets/css/magnific-popup.css">
   <link rel="stylesheet" href="{{ asset('mekina') }}/assets/css/font-awesome-pro.css">
   <link rel="stylesheet" href="{{ asset('mekina') }}/assets/css/spacing.css">
   <link rel="stylesheet" href="{{ asset('mekina') }}/assets/css/custom-animation.css">
   <link rel="stylesheet" href="{{ asset('mekina') }}/assets/css/main.css">

   <style>

.standard-pelayanan img{
    max-width: 65%;
    max-height: auto;
}

/*end standard pelayanan section*/

/*Floating section*/

.icon-bar-share {
  position: fixed;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 0;
  z-index: 1;
}

.st-2{
    top: 81%;
}

.desc-share{
    display: none !important;
}

.icon-bar-share a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.5s ease;
  color: white;
  font-size: 20px;
}

.icon-bar-share a:hover {
  background-color: #000;
  margin-left: -30px;
}

.desc-ambulance{
    display: none !important;
    transition: all 0.5s ease;
}

a:hover .desc-ambulance {
  display: block !important;
}


.google-share {
  background: #dd4b39;
  color: white;
}

.whatsapp-share {
  background: #01923f;
  color: white;
}

.ambulance-share {
  background: #F6511D;
  color: white;
}

#ambulance:hover .new-ambulance{
    opacity: 1;
}

.content-share {
  margin-left: 75px;
  font-size: 30px;
}

.icon-bar-share a:hover{
    color: #fff !important;
}

.icon-bar-share a:active{
    color: #fff !important;
}

.icon-bar-share a:focus{
    color: #fff !important;
}

.icon-bar-share-mob{
position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   /*background-color: red;*/
   color: white;
   text-align: center;
}

.icon-bar-share-mob .icon-ambulance-mob{
    background-color: red;
}

.icon-bar-share-mob .icon-wa-mob{
    background-color: blue;
}


/*End responsive section*/
   </style>
   @stack('custom_css')
</head>

<body>
   <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="htrrs://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->

      <div class="icon-bar-share">
         <a class="ambulance-share" target="_blank" data-bs-toggle="modal" data-bs-target="#ambulance-modal"><i class="old-ambulance fa fa-ambulance"></i></a>
         <a class="whatsapp-share" target="_blank" data-bs-toggle="modal" data-bs-target="#phone-modal"><i class="fa fa-phone"></i></a>
          <a class="google-share" target="_blank" data-bs-toggle="modal" data-bs-target="#google-modal"><i class="fa-brands fa-google-play"></i></a>
       </div>

<!-- preloader start -->
<div id="loading">
   <div class="preloader-close">x</div>
   <div id="loading-center">
      <div id="loading-center-absolute">
         <div class="object" id="object_four"></div>
         <div class="object" id="object_three"></div>
         <div class="object" id="object_two"></div>
         <div class="object" id="object_one"></div>
      </div>
   </div>
</div>
<!-- preloader start -->

   <!-- back to top start -->
   <div class="back-to-top-wrapper">
      <button id="back_to_top" type="button" class="back-to-top-btn">
         <svg width="12" height="7" viewBox="0 0 12 7" fill="none" >
            <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
               stroke-linejoin="round" />
         </svg>
      </button>
   </div>
   <!-- back to top end -->

   <!-- search popup start -->
   <div class="search__popup">
      <div class="container">
         <div class="row">
            <div class="col-xxl-12">
               <div class="search__wrapper">
                  <div class="search__top d-flex justify-content-between align-items-center">
                     <div class="search__logo">
                        <a href="{{ route('user.home') }}">
                           <img style="width: 10%; height: 10%" src="{{ asset('assets/images/rsc_white.png') }}" alt="img">
                        </a>
                     </div>
                     <div class="search__close">
                        <button type="button" class="search__close-btn search-close-btn">
                           <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                              >
                              <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                 stroke-linejoin="round" />
                              <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                 stroke-linejoin="round" />
                           </svg>
                        </button>
                     </div>
                  </div>
                  <div class="search__form">
                    <form action="{{ route('user.doctor.index') }}" method="GET">
                        <div class="search__input">
                            <input class="search-input-field" type="text" name="name" placeholder="Cari Nama Dokter...">
                           <span class="search-focus-border"></span>
                           <button type="submit">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                 <path
                                    d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                 <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                              </svg>
                           </button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- search popup end -->

   <!-- rr-offcanvus-area-start -->
   <div class="rroffcanvas-area">
      <div class="rroffcanvas">
         <div class="rroffcanvas__close-btn">
            <button class="close-btn"><i style="color: #121212;" class="fal fa-times"></i></button>
         </div>
         <div class="rroffcanvas__logo">
            <a href="index.html">
               <img src="{{ asset('assets/images/rsc_white.png') }}" style="width: 20%; height: 20%;" alt="img">
            </a>
         </div>
         <div class="rr-main-menu-mobile d-xl-none"></div>
         <div class="rroffcanvas__contact-info">
            <div class="rroffcanvas__contact-title">
               <h5>Contact us</h5>
            </div>
            <ul>
               <li>
                  <i class="fa-light fa-location-dot"></i>
                  <a href="https://maps.app.goo.gl/mC5wEAztYb3jYmPf6" target="_blank">Jl. Raya Cimacan No.17A, Palasari,
                    Kec. Cipanas, Kabupaten Cianjur,
                    Jawa Barat 43253</a>
               </li>
               <li>
                  <i class="fas fa-envelope"></i>
                  <a href="mailto:">rsud.cimacann@gmail.com</a>
               </li>
               <li>
                  <i class="fal fa-phone-alt"></i>
                  <a href="tel:02632956036">0263-2956-036</a>
               </li>
            </ul>
         </div>
         <div class="rroffcanvas__social">
            <div class="social-icon">
               <a href="https://www.youtube.com/@rsud.cimacan"><i class="fab fa-youtube"></i></a>
               <a href="https://www.instagram.com/rsud.cimacan/"><i class="fab fa-instagram"></i></a>
               <a href="https://www.facebook.com/profile.php?id=100071691815827"><i class="fab fa-facebook-f"></i></a>
               <a href="https://api.whatsapp.com/send/?phone=6285864817874&text=Halo+Kak+.+.+.&type=phone_number&app_absent=0"><i class="fab fa-whatsapp"></i></a>
            </div>
         </div>
      </div>
   </div>
   <div class="body-overlay"></div>
   <!-- rr-offcanvus-area-end -->
   <header class="rr-header-height" style="background: #A82024 !important;">
      <!-- header top area start -->
      <div class="rr-header-2-top d-none d-xl-block grey-bg p-relative">
         <div class="container custom-container-1 z-index-3">
            <div class="rr-header-2-before">
               <div class="row align-items-center">
                  <div class="col-12 ">
                     <div class="rr-header-2-top-info">
                        <marquee behavior="20" direction="left" class="pt-1">
                            <span>{{ $running_text->content }}</span>
                        </marquee>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- header top area end -->
      <!-- header area start -->
    <div id="header-sticky" class="rr-header-area rr-header-3-menu">
         <div class="container custom-container-1">
            <div class="row align-items-center">
               <div class="col-xl-2 col-lg-2 col-md-2 col-5 ps-3">
                  <div class="rr-header-logo">
                     <a href="index.html"><img class="img-fluid" style="width: 45%; height: 45%;" src="{{ asset('assets/images/rsc_white.png') }}" alt="img"></a>
                  </div>
               </div>
               <div class="col-xl-8 col-lg-8 col-md-8 col-8 d-none d-xl-block">
                  <div class="rr-header-main-menu rr-header-menu">
                     <nav class="rr-main-menu-content text-end">
                        <ul>
                            <li><a href="{{ route('user.home') }}">Beranda</a></li>
                           <li class="has-dropdown">
                              <a>Tentang</a>
                              <ul class="submenu rr-submenu">
                                 <li><a href="{{ route('user.profile.index') }}">Profil Rumah Sakit</a></li>
                                 <li><a href="{{ route("user.greeting.index") }}">Sambutan Direktur</a></li>
                                 <li><a href="{{ route('user.structure.index') }}">Struktur Organisasi</a></li>
                                 <li><a href="{{ route('user.sketch.index') }}">Denah Rumah Sakit</a></li>
                                 <li><a href="{{ route('user.quality.index') }}">Penilaian Mutu</a></li>
                                 <li><a href="{{ route('user.hak_kewajiban.index') }}">Hak dan Kewajiban Pasien</a></li>
                                 <li><a href="{{ route('user.maklumat_pelayanan.index') }}">Maklumat Pelayanan</a></li>
                                 <li><a href="{{ route('user.standard_pelayanan.index') }}">Standar Pelayanan</a></li>
                              </ul>
                           </li>
                           <li class="has-dropdown">
                              <a href="#">Layanan</a>
                              <ul class="submenu rr-submenu">
                                 <li><a href="{{ route('user.layanan_unggulan.index') }}">Layanan Unggulan</a></li>
                                 <li><a href="{{ route('user.rawat_jalan.index') }}">Instalasi Rawat Jalan</a></li>
                                 <li><a href="{{ route('user.rawat_inap.index') }}">Instalasi Rawat Inap</a></li>
                                 <li><a href="{{ route('user.gawat_darurat.index') }}">Instalasi Gawat Darurat</a></li>
                                 <li><a href="{{ route('user.laboratorium.index') }}">Laboratorium</a></li>
                                 <li><a href="{{ route('user.hemodialisis.index') }}">Hemodialisis</a></li>
                                 <li><a href="{{ route('user.rehab_medik.index') }}">Rehabilitasi Medik</a></li>
                                 <li><a href="{{ route('user.radiology.index') }}">Radiologi</a></li>
                                 <li><a href="{{ route('user.farmasi.index') }}">Farmasi</a></li>
                                 <li><a href="{{ route('user.ambulance.index') }}">Ambulans</a></li>
                                 <li><a href="{{ route('user.pengaduan.index') }}">Pengaduan</a></li>
                              </ul>
                           </li>
                           <li><a href="{{ route('user.doctor.index') }}">Dokter</a></li>
                           <li><a href="{{ route('user.event.index') }}">Event</a></li>
                           <li class="has-dropdown">
                            <a href="#">Artikel</a>
                            <ul class="submenu rr-submenu">
                               <li><a href="{{ route('user.article.index') }}">Infomasi Kesehatan</a></li>
                               <li><a href="{{ route('user.cimanews.index') }}">Cimanews</a></li>
                            </ul>
                         </li>
                         <li><a href="{{ route('user.career.index') }}">Karir</a></li>
                         <li><a href="{{ route('user.contact.index') }}">Kontak</a></li>
                        </ul>
                     </nav>
                  </div>
               </div>
               <div class="col-xl-2 col-lg-10 col-md-10 col-7">
                  <div class="rr-header-right d-flex align-items-center justify-content-end">
                     <div class="rr-header-2-icon d-none rr-header-2-search d-xl-block">
                        <button class="search-open-btn"><i style="color: #FFFFFF !important;" class="fa-solid fa-magnifying-glass"></i></button>
                     </div>
                     <div class="rr-header-bar">
                        <button class="rr-menu-bar mr-30"><i style="color: #121212 !important;" class="fa-solid fa-bars-staggered"></i></button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- header area end -->


   </header>


   <main>
        @yield('content')
   </main>

   <footer>
      <div class="rr-footer-main p-relative fix">

       <!-- footer area start -->
       <div class="rr-footer-area pt-80 p-relative fix">
         <div class="rr-footer-right-shap d-none d-xl-block">
            {{-- <img src="{{ asset('mekina') }}/assets/img/footer/footer-shap.png" alt="img"> --}}
         </div>
         <div class="container">
            <div class="rr-footer-border">
               <div class="row">
                  <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6 mb-50 wow rrfadeUp" data-wow-duration=".9s"
                     data-wow-delay=".3s">
                     <div class="rr-footer-widget footer-cols-1">
                        <div class="rr-footer-logo pb-35">
                            <h3 style="color: #FFFFFF !important; font-family: Myriad Pro Regular">RSUD CIMACAN</h3>
                        </div>
                        <div class="rr-footer-widget-content-list mb-25">
                           <div class="rr-footer-widget-content-list-item">
                              <a href="">Jl. Raya Cimacan No.17A, Palasari, <br> Kec. Cipanas, Kabupaten Cianjur, <br> Jawa Barat 43253</a>
                           </div>
                        </div>
                        <div class="rr-footer-social mb-25">
                           <a href="https://www.facebook.com/profile.php?id=100071691815827"><i class="fa-brands fa-facebook-f"></i></a>
                           <a href="https://api.whatsapp.com/send/?phone=6285864817874&text=Halo+Kak+.+.+.&type=phone_number&app_absent=0"><i class="fa-brands fa-whatsapp"></i></a>
                           <a href="https://www.youtube.com/@rsud.cimacan"><i class="fa-brands fa-youtube"></i></a>
                           <a href="https://www.instagram.com/rsud.cimacan/"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                        <div class="rr-footer-widget-content mb-25">
                            <div class="rr-footer-widget-content">
                             <h5 class="text-white">
                                 Download Tartimah
                             </h5>
                             <a href="https://play.google.com/store/apps/details?id=com.reservcimacan&hl=in&gl=US" target="_blank">
                                <img class="img-fluid me-4 mt-5" style="margin: 0 20px 0 -15px; padding: 0; height: 55%; width: 55%" src="{{ asset('assets/images/playstore-download-btn.webp') }}" alt="">
                             </a>
                            </div>
                         </div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 mb-50 wow rrfadeUp" data-wow-duration=".9s"
                     data-wow-delay=".5s">
                     <div class="rr-footer-widget footer-cols-2">
                        <h4 class="rr-footer-title">Persingkat Tautan</h4>
                        <div class="rr-footer-list ">
                           <ul>
                              <li><a href="{{ route('user.profile.index') }}l">Profil Rumah Sakit</a></li>
                              <li><a href="{{ route('user.greeting.index') }}">Sambutan Direktur</a></li>
                              <li><a href="{{ route('user.structure.index') }}">Struktur Organisasi</a></li>
                              <li><a href="{{ route('user.standard_pelayanan.index') }}">Standar Pelayanan</a></li>
                              <li><a href="{{ route('user.doctor.index') }}">Dokter</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 mb-50 wow rrfadeUp" data-wow-duration=".9s"
                     data-wow-delay=".7s">
                     <div class="rr-footer-widget footer-cols-3">
                        <h4 class="rr-footer-title">Layanan Kami</h4>
                        <div class="rr-footer-list">
                           <ul>
                              <li><a href="{{ route('user.layanan_unggulan.index') }}">Layanan Unggulan</a></li>
                              <li><a href="{{ route('user.rawat_jalan.index') }}">Instalasi Rawat Jalan</a></li>
                              <li><a href="{{ route('user.rawat_inap.index') }}">Instalasi Rawat Inap</a></li>
                              <li><a href="{{ route('user.gawat_darurat.index') }}">Instalasi Gawat Darurat</a></li>
                              <li><a href="{{ route('user.laboratorium.index') }}">Laboratorium</a></li>
                              <li><a href="{{ route('user.radiology.index') }}">Radiologi</a></li>
                              <li><a href="{{ route('user.hemodialisis.index') }}">Hermodialisis</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 mb-50 wow rrfadeUp" data-wow-duration=".9s"
                     data-wow-delay=".9s">
                     <div class="rr-footer-widget footer-cols-4">
                        <h4 class="rr-footer-title">Lainnya</h4>
                        <div class="rr-footer-list ">
                           <ul>
                                <li><a href="{{ route('user.event.index') }}">Event</a></li>
                                <li><a href="{{ route('user.article.index') }}">Informasi Kesehatan</a></li>
                                <li><a href="{{ route('user.cimanews.index') }}">CimaNEWS</a></li>
                                <li><a href="{{ route('user.career.index') }}">Karir</a></li>
                                <li><a href="{{ route('user.contact.index') }}">Kontak</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 mb-50 wow rrfadeUp" data-wow-duration=".9s"
                     data-wow-delay=".9s">
                     <div class="rr-footer-widget footer-cols-4">
                        <h4 class="rr-footer-title">Pemerintahan</h4>
                        <div class="rr-footer-list ">
                           <ul>
                                <li><a href="https://www.bpjs-kesehatan.go.id/#/" target="_blank">BPJS</a></li>
                                <li><a href="https://www.kemkes.go.id/id/home" target="_blank">Kemenkes</a></li>
                                <li><a href="https://cianjurkab.go.id/" target="_blank">PEMDA Cianjur</a></li>
                                <li><a href="https://dinkes.cianjurkab.go.id/" target="_blank">DINKES Cianjur</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- footer area end -->



         <!-- copy-right area start -->
         <div class="rr-copyright-area p-relative">
            <div class="container rr-copyright-broder rr-copyright-space">
               <div class="row align-items-center">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-12 wow rrfadeUp" data-wow-duration=".9s"
                     data-wow-delay=".3s">
                     <div class="rr-copyright-left text-center text-md-start">
                        <p>Copyright © 2024 <a href="#"> The Prime, </a> All Rights Reserved.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- copy-right area end -->
      </div>
   </footer>


<!-- ambulance Modal -->
<div class="modal fade" id="ambulance-modal" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-10">
              <!-- <h4>Call Ambulance</h4> -->
            </div>
            <div class="col-md-2 close-modal">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          </div>
          <div class="text-center">
            <h2>Kontak Ambulance :</h2>
            <p>(+62) 811-2465-888</p>
            <a href="tel:+628112465888" class="btn btn-warning call-ambulance hidden-lg hidden-md">Telepon Ambulans</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Phone Modal -->
  <div class="modal fade" id="phone-modal" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-10">
              <!-- <h4>Call Ambulance</h4> -->
            </div>
            <div class="col-md-2 close-modal">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          </div>
          <div class="contact-ambulance text-center">
            <h2>Kontak RSUD Cimacan :</h2>
            <div class="phone-number-modal"><span> 0263 2956 036 </span></div>
            <div class="clock-title-modal"><span> Jam Operasional :</span></div>
            <div class="detail-clock-modal"><span> 08.00 - 20.00 WIB</span></div>
            <a href="tel:+622632956036" class="btn btn-warning call-ambulance hidden-lg hidden-md">Call Contact</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Google Playstore Modal -->
  <div class="modal fade" id="google-modal" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-10">
              <!-- <h4>Call Ambulance</h4> -->
            </div>
            <div class="col-md-2 close-modal">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          </div>
          <div class="google-play-content text-center">
            <h2>Pasien Umum :</h2>
            <div class="tartimah-modal">
                <a href="https://play.google.com/store/apps/details?id=com.reservcimacan" target="_blank" class="btn btn-info">Tartimah</a>
            </div>
            <h2>Pasien BPJS :</h2>
            <div class="jkn-modal">
                <a href="https://play.google.com/store/apps/details?id=app.bpjs.mobile" target="_blank" class="btn btn-info">Mobile JKN</a>
                <br>
                <a href="https://www.youtube.com/watch?v=ML2vGaaiQK8&ab_channel=BPJSKesehatan" target="_blank" class="btn btn-info mt-15 pt-5"> Tutorial Mobile JKN</a>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





   <!-- JS here -->
   <script src="{{ asset('mekina') }}/assets/js/vendor/jquery.js"></script>
   <script src="{{ asset('mekina') }}/assets/js/vendor/waypoints.js"></script>
   <script src="{{ asset('mekina') }}/assets/js/bootstrap-bundle.js"></script>
   <script src="{{ asset('mekina') }}/assets/js/ajax-form.js"></script>
   <script src="{{ asset('mekina') }}/assets/js/imagesloaded-pkgd.js"></script>
   <script src="{{ asset('mekina') }}/assets/js/isotope-pkgd.js"></script>
   <script src="{{ asset('mekina') }}/assets/js/jarallax.js"></script>
   <script src="{{ asset('mekina') }}/assets/js/magnific-popup.js"></script>
   <script src="{{ asset('mekina') }}/assets/js/nice-select.js"></script>
   <script src="{{ asset('mekina') }}/assets/js/purecounter.js"></script>
   <script src="{{ asset('mekina') }}/assets/js/jquery-knob.js"></script>
   <script src="{{ asset('mekina') }}/assets/js/jquery-appear.js"></script>
   <script src="{{ asset('mekina') }}/assets/js/range-slider.js"></script>
   <script src="{{ asset('mekina') }}/assets/js/wow.js"></script>
   <script src="{{ asset('mekina') }}/assets/js/slick.js"></script>
   <script src="{{ asset('mekina') }}/assets/js/swiper-bundle.js"></script>
   <script src="{{ asset('mekina') }}/assets/js/main.js"></script>

   @stack('custom_js')

</body>

</html>
