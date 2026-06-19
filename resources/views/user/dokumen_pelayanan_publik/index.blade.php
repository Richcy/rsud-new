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
                            <embed
                                src="{{ asset('assets/images/stadartd_pelayanan/GL M IQBAL.pdf') }}"
                                type="application/pdf"
                                width="100%"
                                height="700px">
                        </div>
                    </div>
                </div>
                <!-- Item 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 2. Renstra
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <embed
                                src="{{ asset('assets/images/stadartd_pelayanan/GL M IQBAL.pdf') }}"
                                type="application/pdf"
                                width="100%"
                                height="700px">
                        </div>
                    </div>
                </div>
                <!-- Item 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            <i style="color: #A82024; font-size: 20px;" class="fa-solid fa-square-plus me-3"></i> 3. SK Kompensasi
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <embed
                                src="{{ asset('assets/images/stadartd_pelayanan/GL M IQBAL.pdf') }}"
                                type="application/pdf"
                                width="100%"
                                height="700px">
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