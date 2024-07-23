@extends('admin.layouts.main')

@push('vendor_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/quill.bubble.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/plugins/forms/form-quill-editor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/plugins/forms/form-quill-editor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/vendors/css/forms/select/select2.min.css">
@endpush

@push('custom_css')
@endpush

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Data Artikel</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="{{ route('admin.article.index') }}">Daftar Artikel</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="#">Tambah Artikel</a>
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
                        <h2>Form Tambah Artikel</h2>
                    </div>
                    <div class="card-body" style="padding-top: 6px !important;">
                        <form action="{{ route('admin.article.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="title" class="form-label">Judul Artikel</label>
                                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" onkeyup="createSlug()" placeholder="Masukan Judul Artikel" value="{{ old('title') }}">

                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" name="slug"  placeholder="Slug akan otomatis di isi sesuai dengan judul" value="{{ old('slug') }}" readonly>

                                        @error('slug')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label" for="article_category_id">Kategori Acara: </label>
                                        <select name="article_category_id" id="article_category_id"
                                            class="form-select @error('article_category_id') is-invalid @enderror">
                                            <option selected disabled>Silakan Pilih Kategori Acara</option>
                                            @foreach ($categoryArticle as $item)
                                                <option value="{{ $item->id }}" @selected(old('article_category_id') == $item->id)>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('article_category_id')
                                            <div class="invalid-feedback d-block">{{ $message ?? 'Something error' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label" for="author">Author: </label>
                                        <input type="text" id="author" class="form-control @error('author') is-invalid @enderror" name="author" placeholder="Masukan Nama Author" value="{{ old('author') }}">
                                        @error('author')
                                            <div class="invalid-feedback d-block">{{ $message ?? 'Something error' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="img" class="form-label">Foto</label>
                                        <input type="file" accept="image/jpeg, image/png, image/jpg, image/gif" id="img"
                                            class="form-control @error('img') is-invalid @enderror"
                                            name="img" value="{{ old('img') }}">

                                        @error('img')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label>Pratinjau Foto</label>
                                        <br>
                                        <div id="avatar-content">
                                            -
                                        </div>
                                    </div>
                                </div>
                            <div class="col-md-12">
                                <div class="mb-1">
                                    <label for="sub_desc" class="form-label">Sub Deskripsi</label>
                                    <textarea name="sub_desc" id="sub_desc" cols="5" rows="2" class="form-control"></textarea>
                                    @error('sub_desc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-1">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea name="description" id="description" cols="30" rows="50" class="form-control tinymce">{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback d-block">{{ $message ?? 'Something error' }}</div>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            {{-- button submit --}}
                            <div class="d-flex justify-content-end mt-2">
                                <a href="{{ route('admin.article.index') }}"
                                    class="btn btn-secondary me-1">Kembali</a>
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
    <script src="{{ asset('vuexy/app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('vuexy/app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('vuexy/app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('vuexy') }}/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
@endpush

@push('custom_js')
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

        document.addEventListener('DOMContentLoaded', function() {
            // Image preview
            $(document).on('change', '#img', function() {
                var file = $(this)[0].files[0];

                // Check if a file is selected
                if(file) {
                    // Create a FileReader object
                    var reader = new FileReader();

                    // Set up onload function
                    reader.onload = function(e){
                        // Set the background image of the avatar content
                        let src = e.target.result;
                        $('#avatar-content').html('<img src="'+src+'" id="avatar-image" style="width: 200px;">');
                    };

                    // Read the file as data URL
                    reader.readAsDataURL(file);
                }
            });

            $('#article_category_id').select2();
        });
    </script>
@endpush
