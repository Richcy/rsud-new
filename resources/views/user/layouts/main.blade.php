<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <title>Mekina - Medical & Health HTML5 Template</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('mekina') }}/assets/img/logo/favicon.png">

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

   @stack('custom_css')
</head>

<body>
   <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="htrrs://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->


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
                        <a href="index.html">
                           <img src="{{ asset('mekina') }}/assets/img/logo/logo-white.png" alt="img">
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
                     <form action="#">
                        <div class="search__input">
                           <input class="search-input-field" type="text" placeholder="Type here to search...">
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
            <button class="close-btn"><i class="fal fa-times"></i></button>
         </div>
         <div class="rroffcanvas__logo">
            <a href="index.html">
               <img src="{{ asset('mekina') }}/assets/img/logo/logo-white.png" alt="img">
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
                  <a href="htrrs://www.google.com/maps/@23.8223586,90.3661283,15z" target="_blank">Melbone st,
                     Australia, Ny 12099</a>
               </li>
               <li>
                  <i class="fas fa-envelope"></i>
                  <a href="mailto:rubelmah55@gmail.com">rubelmah55@gmail.com</a>
               </li>
               <li>
                  <i class="fal fa-phone-alt"></i>
                  <a href="tel:+48555223224">+48 555 223 224</a>
               </li>
            </ul>
         </div>
         <div class="rroffcanvas__social">
            <div class="social-icon">
               <a href="#"><i class="fab fa-twitter"></i></a>
               <a href="#"><i class="fab fa-instagram"></i></a>
               <a href="#"><i class="fab fa-facebook-f"></i></a>
               <a href="#"><i class="fab fa-pinterest-p"></i></a>
            </div>
         </div>
      </div>
   </div>
   <div class="body-overlay"></div>
   <!-- rr-offcanvus-area-end -->
   <header class="rr-header-height" style="background: #A82024 !important;">
      <!-- header top area start -->
      <div class="rr-header-2-top d-none d-xxl-block grey-bg p-relative">
         <div class="container custom-container-1 z-index-3">
            <div class="rr-header-2-before">
               <div class="row align-items-center">
                  <div class="col-xxl-6 col-xl-4">
                     <div class="rr-header-2-top-info text-end">
                        <ul class="d-flex align-items-center">
                           <li>
                              <a href="mailto:support@gmail.com "><span><i class="fa-solid fa-envelope"></i></span>
                                 support@gmail.com </a>
                           </li>
                           <li class="ml-50">
                            <span><i class="fa-solid fa-clock"></i>Sun - Fri:6.00am -
                              02.00pm</span>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-xxl-6 col-xl-8">
                     <div class="rr-header-2-top-info d-flex align-items-center justify-content-end text-end">
                        <div class="rr-header-2-menu">
                           <ul>
                              <li>
                                 <a href="#">Login/</a>
                                 <a href="#">Registar/</a>
                                 <a href="#">Support</a>
                              </li>
                           </ul>
                        </div>
                        <div class="rr-header-2-lang d-none d-md-block ml-60">
                           <select style="display: none;">
                              <option>English</option>
                              <option>Bangla</option>
                              <option>French</option>
                           </select>
                           <div class="nice-select" tabindex="0"><span class="current"><img
                                    src="{{ asset('mekina') }}/assets/img/header/avata.png" alt="img"> English</span>
                              <ul class="list z-index-2">
                                 <li data-value="English" class="option selected focus">English</li>
                                 <li data-value="Bangla" class="option">Bangla</li>
                                 <li data-value="French" class="option">French</li>
                              </ul>
                           </div>
                        </div>
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
               <div class="col-xl-1 col-lg-2 col-md-2 col-5 d-xl-none d-xxl-none">
                  <div class="rr-header-logo">
                     <a href="index.html"><img class="img-fluid" style="width: 45%; height: 45%;" src="{{ asset('assets/images/rsc_white.png') }}" alt="img"></a>
                  </div>
               </div>
               <div class="col-xl-8 col-lg-8 col-md-8 col-8 d-none d-xl-block">
                  <div class="rr-header-main-menu rr-header-menu">
                     <nav class="rr-main-menu-content text-end">
                        <ul>
                            <li><a href="about.html">Beranda</a></li>
                           <li class="has-dropdown">
                              <a href="service.html">Tentang</a>
                              <ul class="submenu rr-submenu">
                                 <li><a href="service.html">Profil Rumah Sakit</a></li>
                                 <li><a href="service.html">Sambutan Direktur</a></li>
                                 <li><a href="service.html">Struktur Organisasi</a></li>
                                 <li><a href="service.html">Denah Rumah Sakit</a></li>
                                 <li><a href="service.html">Penilaian Mutu</a></li>
                                 <li><a href="service.html">Hak dan Kewajiban Pasien</a></li>
                                 <li><a href="service.html">Maklumat Pelayanan</a></li>
                                 <li><a href="service.html">Standar Pelayanan</a></li>
                              </ul>
                           </li>
                           <li class="has-dropdown">
                              <a href="#">Layanan</a>
                              <ul class="submenu rr-submenu">
                                 <li><a href="team.html">Layanan Unggulan</a></li>
                                 <li><a href="team.html">Instalasi Rawat Jalan</a></li>
                                 <li><a href="team.html">Instalasi Rawat Inap</a></li>
                                 <li><a href="team.html">Instalasi Gawat Darurat</a></li>
                                 <li><a href="team.html">Labotarium</a></li>
                                 <li><a href="team.html">Hemodialisis</a></li>
                                 <li><a href="team.html">Rehabilitasi Medik</a></li>
                                 <li><a href="team.html">Radiologi</a></li>
                                 <li><a href="team.html">Farmasi</a></li>
                                 <li><a href="team.html">Ambulans</a></li>
                                 <li><a href="team.html">Pengaduan</a></li>
                              </ul>
                           </li>
                           <li><a href="contact.html">Dokter</a></li>
                           <li><a href="contact.html">Event</a></li>
                           <li class="has-dropdown">
                            <a href="#">Artikel</a>
                            <ul class="submenu rr-submenu">
                               <li><a href="team.html">Infomasi Kesehatan</a></li>
                               <li><a href="team.html">Cimanews</a></li>
                            </ul>
                         </li>
                         <li><a href="contact.html">Karir</a></li>
                         <li><a href="contact.html">Kontak</a></li>
                        </ul>
                     </nav>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-10 col-md-10 col-7">
                  <div class="rr-header-right d-flex align-items-center justify-content-end">
                     <div class="rr-header-2-icon d-none rr-header-2-search d-xl-block">
                        <button class="search-open-btn"><i style="color: #FFFFFF !important;" class="fa-solid fa-magnifying-glass"></i></button>
                     </div>
                     <div class="rr-header-bar">
                        <button class="rr-menu-bar mr-30"><i style="color: #121212 !important;" class="fa-solid fa-bars-staggered"></i></button>
                     </div>
                     <div class="d-none d-xxl-block">
                        <div class="rr-header-2-contat d-flex align-items-center">
                           <div class="rr-header-2-contat-icon p-relative">
                              <span><i class="fa-solid fa-phone"></i></span>
                           </div>
                           <div class="rr-header-2-contat-text ml-20">
                              <h4>Emergency Call</h4>
                              <b><a href="tel:+99584554">24/7 – +99584554</a></b>
                           </div>
                        </div>
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
      <div class="rr-footer-main p-relative fix" data-background="{{ asset('mekina') }}/assets/img/footer/footer-bg.jpg">

       <!-- footer area start -->
       <div class="rr-footer-area pt-80 p-relative fix">
         <div class="rr-footer-right-shap d-none d-xl-block">
            <img src="{{ asset('mekina') }}/assets/img/footer/footer-shap.png" alt="img">
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
                           <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                           <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                           <a href="#"><i class="fa-brands fa-youtube"></i></a>
                           <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                        <div class="rr-footer-widget-content mb-25">
                            <div class="rr-footer-widget-content">
                             <h5 class="text-white">
                                 Download Tartimah
                             </h5>
                             <a href="">
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
                              <li><a href="service.html">Profil Rumah Sakit</a></li>
                              <li><a href="service.html">Sambutan Direktur</a></li>
                              <li><a href="service.html">Struktur Organisasi</a></li>
                              <li><a href="service.html">Standar Pelayanan</a></li>
                              <li><a href="service.html">Dokter</a></li>
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
                              <li><a href="service.html">Layanan Unggulan</a></li>
                              <li><a href="service.html">Instalasi Rawat Jalan</a></li>
                              <li><a href="service.html">Instalasi Rawat Inap</a></li>
                              <li><a href="service.html">Instalasi Gawat Darurat</a></li>
                              <li><a href="service.html">Labotarium</a></li>
                              <li><a href="service.html">Radiologi</a></li>
                              <li><a href="service.html">Hermodialisis</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 mb-50 wow rrfadeUp" data-wow-duration=".9s"
                     data-wow-delay=".9s">
                     <div class="rr-footer-widget footer-cols-4">
                        <h4 class="rr-footer-title">Lainnya</h4>
                        <div class="rr-footer-contact">
                           <ul>
                                <li><a href="service.html">Event</a></li>
                                <li><a href="service.html">Informasi Kesehatan</a></li>
                                <li><a href="service.html">CimaNEWS</a></li>
                                <li><a href="service.html">Karir</a></li>
                                <li><a href="service.html">Kontak</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 mb-50 wow rrfadeUp" data-wow-duration=".9s"
                     data-wow-delay=".9s">
                     <div class="rr-footer-widget footer-cols-4">
                        <h4 class="rr-footer-title">Pemerintahan</h4>
                        <div class="rr-footer-contact">
                           <ul>
                                <li><a href="service.html">BPJS</a></li>
                                <li><a href="service.html">Kemenkes</a></li>
                                <li><a href="service.html">PEMDA Cianjur</a></li>
                                <li><a href="service.html">DINKES Cianjur</a></li>
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
