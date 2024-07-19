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
                    <h2 class="content-header-title float-start mb-0">Data Struktur Organisasi</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="#">Daftar Struktur Organisasi</a>
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
                               @if ($data != null)
                               <form action="{{ route('admin.structure.update', $data->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                @endif
                                    <div class="col-12">
                                        <div class="col-md-12">
                                            <div class="mb-1">
                                                <label for="img" class="form-label">Stuktur Organisasi</label>
                                                <input type="file" accept="image/jpeg, image/png, image/jpg, image/gif" id="img" class="form-control @error('img') is-invalid @enderror" name="img">
                                                <div id="avatar-content" class="mt-3">
                                                    @if($data->img)
                                                        <img src="{{ asset('storage/' . $data->img) }}" alt="{{ $data->title }}" style="max-width: 200px;">
                                                    @else
                                                        -
                                                    @endif
                                                </div>
                                                @error('img')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
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
    document.addEventListener('DOMContentLoaded', function() {
        // Image preview
        $(document).on('change', '#img', function() {
            var file = $(this)[0].files[0];

            // Check if a file is selected
            if (file) {
                // Create a FileReader object
                var reader = new FileReader();

                // Set up onload function
                reader.onload = function(e) {
                    // Set the background image of the avatar content
                    let src = e.target.result;
                    $('#avatar-content').html('<img src="' + src + '" id="avatar-image" style="width: 200px;">');
                };

                // Read the file as data URL
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endpush
