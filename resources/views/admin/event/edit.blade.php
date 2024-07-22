@extends('admin.layouts.main')

@push('vendor_css')
<link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/clock-picker/clockpicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/clock-picker/standalone.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endpush

@push('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/plugins/forms/pickers/form-pickadate.css') }}">
<style>
    table.dataTable.no-footer {
        border-bottom: none !important;
    }
</style>
@endpush

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Data Beranda</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('admin.event.index') }}">Daftar Acara</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="#">Edit Acara</a>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Form Edit Acara</h2>
                    </div>
                    <div class="card-body" style="padding-top: 6px !important;">
                        <form action="{{ route('admin.event.update', $event->slug) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="title" class="form-label">Judul Acara</label>
                                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" onkeyup="createSlug()" placeholder="Masukan Nama Diskon" value="{{ old('title', $event->title) }}">

                                        @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" placeholder="Slug akan otomatis di isi sesuai dengan judul" value="{{ old('slug', $event->slug) }}" readonly>

                                        @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label" for="event_category_id">Kategori Acara: </label>
                                        <select name="event_category_id" class="form-select @error('event_category_id') is-invalid @enderror">
                                            <option selected disabled>Silakan Pilih Kategori Acara</option>
                                            @foreach ($categoryEvent as $item)
                                            <option value="{{ $item->id }}" {{ old('event_category_id', $event->event_category_id) == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('event_category_id')
                                        <div class="invalid-feedback d-block">{{ $message ?? 'Something error' }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="url" class="form-label">URL</label>
                                        <input type="text" id="url" class="form-control @error('url') is-invalid @enderror" name="url" onkeyup="createSlug()" placeholder="Masukan Nama Diskon" value="{{ old('url', $event->url) }}">

                                        @error('url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                                        <input type="text" id="start_date" name="start_date" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" value="{{ old('start_date', $event->start_date) }}" />
                                        @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="end_date" class="form-label">Tanggal Selesai</label>
                                        <input type="text" id="end_date" name="end_date" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" value="{{ old('end_date', $event->end_date) }}" />
                                        @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="start_time" class="form-label">Jam Mulai</label>
                                        <div class="input-group clockpicker">
                                            <input type="text" class="form-control" id="start_time" name="start_time" value="{{ old('start_time', $event->start_time) }}" autocomplete="off">
                                            <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                        </div>
                                        @error('start_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="end_time" class="form-label">Jam Selesai</label>
                                        <div class="input-group clockpicker">
                                            <input type="text" class="form-control" id="end_time" name="end_time" value="{{ old('end_time', $event->end_time) }}" autocomplete="off">
                                            <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                        </div>
                                        @error('end_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="img" class="form-label">Foto</label>
                                        <input type="file" accept="image/jpeg, image/png, image/jpg, image/gif" id="img" class="form-control @error('img') is-invalid @enderror" name="img">
                                        @error('img')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">

                                        <label for="img" class="form-label">Pratinjau Foto</label>
                                        <br>
                                        <div id="avatar-content">
                                            @if($event->img)
                                                <img src="{{ asset('storage/' . $event->img) }}" alt="{{ $event->title }}" style="max-width: 200px;">
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label for="location" class="form-label">Lokasi Acara</label>
                                        <input type="text" id="location" class="form-control @error('location') is-invalid @enderror" name="location" placeholder="Lokasi Acara" value="{{ old('location', $event->location) }}">
                                        @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label for="sub_desc" class="form-label">Sub Deskripsi</label>
                                        <textarea name="sub_desc" id="sub_desc" cols="5" rows="2" class="form-control">{{ old('sub_desc', $event->sub_desc) }}</textarea>
                                        @error('sub_desc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label for="description" class="form-label">Deskripsi</label>
                                        <textarea name="description" id="description" cols="30" rows="50" class="form-control tinymce">{{ old('description', $event->description) }}</textarea>
                                        @error('description')
                                        <div class="invalid-feedback d-block">{{ $message ?? 'Something error' }}</div>
                                        @enderror
                                    </div>
                                </div>
                                </div>
                            </div>

                            {{-- Tombol submit --}}
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.event.index') }}" class="btn btn-secondary me-1">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('vendor_js')
<script src="{{ asset('vuexy/app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/js/clock-picker/clockpicker.js') }}"></script>
@endpush

@push('custom_js')
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.css">
<script src="{{ asset('vuexy/app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
        selector: ".tinymce",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste",
            "textcolor image"
        ],
        toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor | image",
        relative_urls: false,
        forced_root_block: false,
        height: 500,
        automatic_uploads: true,
        images_upload_url: '{{ route("admin.upload") }}',
        paste_data_images: true,
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                    var id = 'post-image-' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var blobInfo = blobCache.create(id, file, reader.result);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
            };
            input.click();
        },
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '{{ route("admin.upload") }}');

            xhr.setRequestHeader("X-CSRF-Token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
        image_dimensions: true  // Enable image dimensions editing
    });
    </script>
<script>
    function createSlug() {
        var title = $('#title').val();
        var slug = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        $('#slug').val(slug);
    }

    $(document).ready(function() {

        $('#start_time').clockpicker({
            donetext: 'Done',
            autoclose: true
        });

        $('#end_time').clockpicker({
            autoclose: true,
            donetext: 'Done'
        });

    });

    var quill = new Quill('#full-container .editor', {
        bounds: '#full-container .editor',
        modules: {
            formula: true,
            syntax: true,
            toolbar: [
                [{
                        font: []
                    },
                    {
                        size: []
                    }
                ],
                ['bold', 'italic', 'underline', 'strike'],
                [{
                        color: []
                    },
                    {
                        background: []
                    }
                ],
                [{
                        script: 'super'
                    },
                    {
                        script: 'sub'
                    }
                ],
                [{
                        header: '1'
                    },
                    {
                        header: '2'
                    },
                    'blockquote',
                    'code-block'
                ],
                [{
                        list: 'ordered'
                    },
                    {
                        list: 'bullet'
                    },
                    {
                        indent: '-1'
                    },
                    {
                        indent: '+1'
                    }
                ],
                [
                    'direction',
                    {
                        align: []
                    }
                ],
                ['link', 'image', 'video', 'formula'],
                ['clean']
            ]
        },
        theme: 'snow',
        placeholder: 'Tulis kontent disini ...',
        readOnly: false,
        scrollingContainer: '#full-wrapper',
    });

    quill.root.style.height = '300px'; //

    var form = document.querySelector('form');
    form.onsubmit = function() {
        // Populate hidden form on submit
        var about = document.querySelector('#description');
        about.value = quill.root.innerHTML;
        // console.log(about.value);
        // return false;
    };


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
