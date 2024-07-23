
@section('seo_keyword', 'Tentang RSUD CIMACAN, Biodata RSUD CIMACAN, rumah sakit umum daerah cimacan, rsud cimacan, rsd cimacan')
@section('seo_title', 'RSUD Cimacan | Beranda')
@section('seo_desc',
    'Rumah Sakit Umum Daerah Cimacan pada awalnya adalah Puskesmas Pacet (Cimacan) yang sudah berdiri
    sejak tahun 1953, kemudian pada tahun 1981 statusnya meningkat menjadi Puskesmas DTP dan berubah status menjadi Rumah
    Sakit dengan ditetapkannya Surat Keputusan Bupati Cianjur atas nama Pemerintah Daerah Kabupaten Cianjur Nomor 19 Tahu…')
@section('seo_url', route('user.standard_pelayanan.index'))
@extends('user.layouts.main')
@push('custom_css')
    <style>
    .accordion-item {
        border: none !important;
    }
     .accordion-button {
        color: #121212 !important;
        background: transparent !important;
        box-shadow: none !important;
        border: none !important;
     }
    </style>
@endpush

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <span><small><a href="">Beranda</a> / <a href="">Tentang</a> / <strong>Standard Pelayanan</strong></small></span>
                <div class="text-left">
                    <h3>STANDARD PELAYANAN RSUD CIMACAN</h3>
                </div>
                <div class="text-center">
                    <img style="" src="{{ asset('storage/'. $standard_pelayanan->img) }}" alt="">
                </div>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 1. Bank Darah
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <img style="width: 70%; height: 70%;" src="{{ asset('assets/images/stadartd_pelayanan/BankDarah.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                  <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 2. Bedah Sentral
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <img style="width: 70%; height: 70%;" src="{{ asset('assets/images/stadartd_pelayanan/BedahSentral.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Item 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                  <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 3. CSSD
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <img style="width: 70%; height: 70%;" src="{{ asset('assets/images/stadartd_pelayanan/CSSD.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Item 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                  <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 4. Farmasi
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <img style="width: 70%; height: 70%;" src="{{ asset('assets/images/stadartd_pelayanan/Farmasi.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Item 5 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                  <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 5. Gizi
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <img style="width: 70%; height: 70%;" src="{{ asset('assets/images/stadartd_pelayanan/Gizi.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Item 6 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                  <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 6. Hemodialisa
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <img style="width: 70%; height: 70%;" src="{{ asset('assets/images/stadartd_pelayanan/Hemodialisa.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Item 7 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                  <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 7. IGD
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <img style="width: 70%; height: 70%;" src="{{ asset('assets/images/stadartd_pelayanan/IGD.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Item 8 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingEight">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                                  <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 8. IPSRS
                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <img style="width: 70%; height: 70%;" src="{{ asset('assets/images/stadartd_pelayanan/IPSRS.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Item 9 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingNine">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                                  <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 9. Laboratorium
                            </button>
                        </h2>
                        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <img style="width: 70%; height: 70%;" src="{{ asset('assets/images/stadartd_pelayanan/Laboratorium.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Item 10 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTen">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                                  <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 10. Laundry
                            </button>
                        </h2>
                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <img style="width: 70%; height: 70%;" src="{{ asset('assets/images/stadartd_pelayanan/Laundry.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Item 11 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingEleven">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
                                  <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 11. Radiologi
                            </button>
                        </h2>
                        <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <img style="width: 70%; height: 70%;" src="{{ asset('assets/images/stadartd_pelayanan/Radiologi.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Item 12 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwelve">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="true" aria-controls="collapseTwelve">
                                <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 12. Rawat Inap
                            </button>
                        </h2>
                        <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <img style="width: 70%; height: 70%;" src="{{ asset('assets/images/stadartd_pelayanan/Rawatinap.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Item 13 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThirteen">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThirteen" aria-expanded="true" aria-controls="collapseThirteen">
                                  <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 13. Rawat Jalan
                            </button>
                        </h2>
                        <div id="collapseThirteen" class="accordion-collapse collapse" aria-labelledby="headingThirteen" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <img style="width: 70%; height: 70%;" src="{{ asset('assets/images/stadartd_pelayanan/Rawatjalan.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Item 14 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFourteen">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourteen" aria-expanded="true" aria-controls="collapseFourteen">
                                  <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 14. Rehab Medik
                            </button>
                        </h2>
                        <div id="collapseFourteen" class="accordion-collapse collapse" aria-labelledby="headingFourteen" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <img style="width: 70%; height: 70%;" src="{{ asset('assets/images/stadartd_pelayanan/RehabMedik.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Item 15 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFifteen">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifteen" aria-expanded="true" aria-controls="collapseFifteen">
                                  <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 15. Rekam Medik
                            </button>
                        </h2>
                        <div id="collapseFifteen" class="accordion-collapse collapse" aria-labelledby="headingFifteen" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <img style="width: 70%; height: 70%;" src="{{ asset('assets/images/stadartd_pelayanan/RekamMedik.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('custom_js')
@endpush
