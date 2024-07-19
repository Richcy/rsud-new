@extends('admin.layouts.main')

@push('vendor_css')
@endpush

@push('custom_css')

@endpush

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Data Running Text</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="#">Daftar Running Text</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
            {{--  --}}
        </div>
    </div>
    <div class="content-body">
        <section id="basic-example">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                               <form action="{{ route('admin.running-text.update', $data->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <label for="content" class="form-label">Running Text</label>
                                            <textarea name="content" id="content" cols="5" rows="5" class="form-control">{{ $data->content }}</textarea>
                                            @error('content')
                                                <div class="invalid-feedback d-block">{{ $message ?? 'Something error' }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('vendor_js')
@endpush

@push('custom_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

</script>
@endpush
