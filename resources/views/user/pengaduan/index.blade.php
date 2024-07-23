
@section('seo_keyword', 'Pengaduan RSUD Cimacan')
@section('seo_title', 'RSUD Cimacan | Pengaduan')
@section('seo_desc',
    'Layanan Pengaduan di RSUD Cimacan.....')
@section('seo_url', route('user.pengaduan.index'))
@extends('user.layouts.main')
@push('custom_css')

@endpush

@section('content')
     <!-- contact area start -->
     <section class="rr-contact-area fix py-5">
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
@endsection

@push('custom_js')

@endpush
