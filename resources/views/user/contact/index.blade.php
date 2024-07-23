
@section('seo_keyword', 'Layanan Unggulan RSUD Cimacan, Rumah Sakit Di Cianjur, rumah sakit umum daerah cimacan, rsud cimacan, rsd cimacan')
@section('seo_title', 'RSUD Cimacan | Beranda')
@section('seo_desc',
    'Rumah Sakit Umum Daerah Cimacan pada awalnya adalah Puskesmas Pacet (Cimacan) yang sudah berdiri
    sejak tahun 1953, kemudian pada tahun 1981 statusnya meningkat menjadi Puskesmas DTP dan berubah status menjadi Rumah
    Sakit dengan ditetapkannya Surat Keputusan Bupati Cianjur atas nama Pemerintah Daerah Kabupaten Cianjur Nomor 19 Tahu…')
@section('seo_url', route('user.contact.index'))
@extends('user.layouts.main')
@push('custom_css')

@endpush

@section('content')
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

@endpush
