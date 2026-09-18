@section('seo_keyword', 'dokumen pelayanan publik Rumah Sakit, rumah sakit umum daerah cimacan, rsud cimacan, rsd cimacan')
@section('seo_title', 'RSUD Cimacan | Dokumen Pelayanan Publik')
@section('seo_desc',
'Dokumen Pelayanan Publik Rumah Sakit Daerah Cimacan')
@section('seo_url', route('user.dokumen_pelayanan_publik.index'))
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
            <span><small><a href="">Beranda</a> / <a href="">Tentang</a> / <strong>Dokumen Pelayanan Publik</strong></small></span>
            <div class="text-left">
                <h3>Dokumen Pelayanan Publik RSUD CIMACAN</h3>
            </div>
            <div class="text-center">
                <img style="" src="" alt="">
            </div>
            <div class="accordion" id="accordionExample">
                <!-- Item 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 1. Renja
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <iframe
                                src="{{ asset('assets/pdf/RENJA 2025 Perubahan.pdf') }}"
                                width="100%"
                                style="height:clamp(500px,75dvh,850px);">
                            </iframe>
                            <div class="mb-3">
                                <a href="{{ asset('assets/pdf/RENJA 2025 Perubahan.pdf') }}"
                                    target="_blank"
                                    class="btn btn-primary">
                                    📄 Buka PDF di Tab Baru
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 2. Renstra
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <iframe
                                src="{{ asset('assets/pdf/RENSTRA DINAS KESEHATAN 2025-2029.pdf') }}"
                                width="100%"
                                style="height:clamp(500px,75dvh,850px);">
                            </iframe>
                            <div class="mb-3">
                                <a href="{{ asset('assets/pdf/RENSTRA DINAS KESEHATAN 2025-2029.pdf') }}"
                                    target="_blank"
                                    class="btn btn-primary">
                                    📄 Buka PDF di Tab Baru
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 3. SK Kompensasi
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <iframe
                                src="{{ asset('assets/pdf/SK KOMPENSASI PELAYANAN 2026.pdf') }}"
                                width="100%"
                                style="height:clamp(500px,75dvh,850px);">
                            </iframe>
                            <div class="mb-3">
                                <a href="{{ asset('assets/pdf/SK KOMPENSASI PELAYANAN 2026.pdf') }}"
                                    target="_blank"
                                    class="btn btn-primary">
                                    📄 Buka PDF di Tab Baru
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                            <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 4. SK SP4N Lapor
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <iframe
                                src="{{ asset('assets/pdf/SK SP4N Lapor.pdf') }}"
                                width="100%"
                                style="height:clamp(500px,75dvh,850px);">
                            </iframe>
                            <div class="mb-3">
                                <a href="{{ asset('assets/pdf/SK SP4N Lapor.pdf') }}"
                                    target="_blank"
                                    class="btn btn-primary">
                                    📄 Buka PDF di Tab Baru
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                            <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 5. SPO Customer Service & Handling Complaint
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <iframe
                                src="{{ asset('assets/pdf/SPO Customer Service & Handling Complaint.pdf') }}"
                                width="100%"
                                style="height:clamp(500px,75dvh,850px);">
                            </iframe>
                            <div class="mb-3">
                                <a href="{{ asset('assets/pdf/SPO Customer Service & Handling Complaint.pdf') }}"
                                    target="_blank"
                                    class="btn btn-primary">
                                    📄 Buka PDF di Tab Baru
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 6 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                            <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 6. SK Tim Pengelola Pengaduan Pelayanan dan Administrator SP4N-Lapor
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <iframe
                                src="{{ asset('assets/pdf/SK PEMBENTUKAN TIM PENGELOLA PENGADUAN.pdf') }}"
                                width="100%"
                                style="height:clamp(500px,75dvh,850px);">
                            </iframe>
                            <div class="mb-3">
                                <a href="{{ asset('assets/pdf/SK PEMBENTUKAN TIM PENGELOLA PENGADUAN.pdf') }}"
                                    target="_blank"
                                    class="btn btn-primary">
                                    📄 Buka PDF di Tab Baru
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 7 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                            <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 7. Alur Pengelolaan Pengaduan
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <iframe
                                src="{{ asset('assets/pdf/Alur pengaduan.pdf') }}"
                                width="100%"
                                style="height:clamp(500px,75dvh,850px);">
                            </iframe>
                            <div class="mb-3">
                                <a href="{{ asset('assets/pdf/Alur pengaduan.pdf') }}"
                                    target="_blank"
                                    class="btn btn-primary">
                                    📄 Buka PDF di Tab Baru
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 8 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingEight">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                            <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 8. Peraturan Bupati Tentang Tarif RSUD Cimacan
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <iframe
                                src="{{ asset('assets/pdf/PB 3 2025 TARIF KLS C terupdate.pdf') }}"
                                width="100%"
                                style="height:clamp(500px,75dvh,850px);">
                            </iframe>
                            <div class="mb-3">
                                <a href="{{ asset('assets/pdf/PB 3 2025 TARIF KLS C terupdate.pdf') }}"
                                    target="_blank"
                                    class="btn btn-primary">
                                    📄 Buka PDF di Tab Baru
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 9 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingNine">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                            <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 9. Juknis Inovasi Mulih Sae
                    </h2>
                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <iframe
                                src="{{ asset('assets/pdf/Juknis Mulih Sae.pdf') }}"
                                width="100%"
                                style="height:clamp(500px,75dvh,850px);">
                            </iframe>
                            <div class="mb-3">
                                <a href="{{ asset('assets/pdf/Juknis Mulih Sae.pdf') }}"
                                    target="_blank"
                                    class="btn btn-primary">
                                    📄 Buka PDF di Tab Baru
                                </a>
                            </div>
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