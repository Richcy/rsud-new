@section('seo_keyword', $doctor->name, 'Dokter, rumah sakit umum daerah cimacan, rsud cimacan')
@section('seo_title', 'RSUD Cimacan | ', $doctor->name,)
@section('seo_desc',
'Daftar dokter spesialis Rumah Sakit Daerah Cimacan')
@section('seo_url', route('user.farmasi.index'))
@extends('user.layouts.main')
@push('custom_css')

@endpush

@section('content')
      <!-- doctors details area start -->
      <div class="col-12 container">
        <span><small><a href="">Beranda</a> / <a href="{{ route('user.doctor.index') }}">Dokter</a> / <strong>{{ $doctor->name }}</strong></small></span>
      </div>
      <div id="primary" class="content-area pt-100 pb-100 ">
        <div class="container">
            <div class="col-12"></div>
           <div class="row">
              <div class="col-sm-12 col-xs-12">
                 <div id="main" class="site-main">
                    <div id="post-97"
                       class="rr-team-single">
                       <div class="row">

                          <div class=" col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12">
                             <div class="rr-item-about-team">
                                <img style="transform: scale(1.3)" src="{{ asset('storage/'. $doctor->img) }}" alt="">
                                <div class="rr-item-content mt-20">
                                   {{-- <h5 class="rr-item-text">{{ $doctor->name }}</h5>
                                   <p class="rr-item-designation">{{ $doctor->field_doctor->name }}</p> --}}
                                </div>
                             </div>
                          </div>

                          <div class="col-xl-9 col-lg-8 col-md-8 col-sm-8 col-12">
                             <div class="rr-team-detail-box-layout1">
                                <div class="rr-single-item">
                                   <div class="rr-table-responsive">
                                      <h3 class="rr-item-title">Detail Dokter:</h3>
                                      <div class="d-flex mt-2">
                                        <span>Nama</span>
                                        <span class="mx-2">:</span>
                                        <span>{{ $doctor->name }}</span>
                                      </div>
                                      <div class="d-flex">
                                        <span>Bidang Keahlian</span>
                                        <span class="mx-2">:</span>
                                        <span>{{ $doctor->field_doctor->name }}</span>
                                      </div>
                                        <div class="d-flex">
                                            <span>Kantor/Unit Kerja</span>
                                            <span class="mx-2">:</span>
                                            <span>{{ $doctor->office }}</span>
                                        </div>
                                        <div class="d-flex">
                                            <span>NIP</span>
                                            <span class="mx-2">:</span>
                                            <span>-</span>
                                        </div>
                                        <div class="d-flex">
                                            <span>SIP</span>
                                            <span class="mx-2">:</span>
                                            <span>{{ $doctor->sip }}</span>
                                        </div>
                                   </div>
                                </div>
                                <div class="rr-single-item">
                                   <div class="rr-table-responsive">
                                      <h3 class="rr-item-title">
                                         Jadwal Dokter:</h3>
                                      @if ($doctor->schedule_doctor == null)
                                         <p>Jadwal dokter belum ditentukan.</p>
                                      @else
                                      <table class="table schedule-table">
                                        <thead>
                                           <tr>
                                              <th>Hari</th>
                                              <th>Jam</th>
                                           </tr>
                                        </thead>
                                        <tbody>

                                            @php
                                            $days = [
                                                'senin' => 'Senin',
                                                'selasa' => 'Selasa',
                                                'rabu' => 'Rabu',
                                                'kamis' => 'Kamis',
                                                'jumat' => 'Jumat',
                                                'sabtu' => 'Sabtu',
                                                'minggu' => 'Minggu'
                                            ];
                                        @endphp

                                        @foreach ($days as $key => $day)
                                            @if ($doctor->schedule_doctor->{$key} != null)
                                                <tr>
                                                    <td class="weekday">{{ $day }}</td>
                                                    <td class="weektime">{{ $doctor->schedule_doctor->{$key} }}</td>
                                                </tr>
                                            @endif
                                        @endforeach

                                        </tbody>
                                     </table>
                                      @endif
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-sm-12 col-xs-12">
                <div class="text-left">
                    <h4>
                        Dokter Lainnya
                    </h4>
                </div>
                <div class="py-3">
                    <div class="row">
                        @foreach ($otherDoctor as $item)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 wow rrfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                                <div class="rr-team-4-item p-relative mb-60">
                                    <div class="rr-team-4-thumb p-relative ">
                                        <div class="rr-team-4-img">
                                        <img class="w-100" src="{{ asset('storage/'. $item->img) }}" alt="img">
                                        </div>
                                    </div>
                                    <div class="rr-team-4-content text-center p-relative">
                                        <h6 class="rr-team-4-title"><a href="#">{{ $item->name }}</a></h6>
                                        <p>{{ $item->field_doctor->name }}</p>
                                    </div>
                                    <div class="rr-team-4-arrow"> <a href="{{ route('user.doctor.show', $item->id) }}"><i class="fa-solid fa-arrow-up"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
              </div>
           </div>
        </div>
     </div>
     <!-- doctors details area end -->
@endsection

@push('custom_js')


@endpush
