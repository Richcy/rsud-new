@extends('admin.layouts.main')

@push('vendor_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/quill.bubble.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/plugins/forms/form-quill-editor.css') }}">
@endpush

@push('custom_css')
@endpush

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Data Cimanews</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="{{ route('admin.cimanews.index') }}">Daftar Cimanews</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="#">Edit Cimanews</a>
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
                        <h2>Form Edit Cimanews</h2>
                    </div>
                    <div class="card-body" style="padding-top: 6px !important;">
                        <form action="{{ route('admin.cimanews.update', $cimanews->slug) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="title" class="form-label">Judul Cimanews</label>
                                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" onkeyup="createSlug()" placeholder="Masukan Nama Judul" value="{{ old('title', $cimanews->title) }}">

                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" placeholder="Slug akan otomatis di isi sesuai dengan judul" value="{{ old('slug', $cimanews->slug) }}" readonly>

                                        @error('slug')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label" for="author">Author: </label>
                                        <input type="text" id="author" class="form-control @error('author') is-invalid @enderror" name="author" placeholder="Masukan Nama Author" value="{{ old('author', $cimanews->author) }}">
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
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label>Pratinjau Foto</label>
                                        <br>
                                        <div id="avatar-content">
                                            @if ($cimanews->img)
                                                <img src="{{ Storage::url($cimanews->img) }}" id="avatar-image" style="width: 200px;">
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            <div class="col-md-12">
                                <div class="mb-1">
                                    <label for="sub_desc" class="form-label">Sub Deskripsi</label>
                                    <textarea name="sub_desc" id="sub_desc" cols="5" rows="2" class="form-control">{{ old('sub_desc', $cimanews->sub_desc) }}</textarea>
                                    @error('sub_desc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-1">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <div id="full-wrapper">
                                        <div id="full-container">
                                            <div class="editor">
                                                {!! old('description', $cimanews->description) !!}
                                            </div>
                                        </div>
                                    </div>
                                    @error('description')
                                        <div class="invalid-feedback d-block">{{ $message ?? 'Something error' }}
                                        </div>
                                    @enderror
                                    <textarea name="description" id="description" cols="30" rows="50" class="form-control d-none">{{ old('description', $cimanews->description) }}</textarea>
                                </div>
                            </div>
                            {{-- button submit --}}
                            <div class="d-flex justify-content-end mt-2">
                                <a href="{{ route('admin.cimanews.index') }}"
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
@endpush

@push('custom_js')
    <script>
         function createSlug() {
            var title = $('#title').val();
            var slug = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            $('#slug').val(slug);
        }
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
        });
    </script>
@endpush
