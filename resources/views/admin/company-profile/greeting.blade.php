@extends('admin.layouts.main')

@push('vendor_css')
<link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/katex.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/quill.snow.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/quill.bubble.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/plugins/forms/form-quill-editor.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/plugins/forms/form-quill-editor.css') }}">
@endpush

@push('custom_css')

@endpush

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Data Denah</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="#">Daftar Denah</a>
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
                               <form action="{{ route('admin.greeting-directur.update', $data->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                @endif
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-1">
                                                    <label for="description" class="form-label">Deskripsi</label>
                                                    <div id="full-wrapper">
                                                        <div id="full-container">
                                                            <div class="editor">
                                                                {!! old('description', $data->description) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('description')
                                                    <div class="invalid-feedback d-block">{{ $message ?? 'Something error' }}</div>
                                                    @enderror
                                                    <textarea name="description" id="description" cols="30" rows="50" class="form-control d-none"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-1">
                                                    <label for="img" class="form-label">Banner Sambutan Direktur</label>
                                                    <input type="file" accept="image/jpeg, image/png, image/jpg, image/gif" id="img" class="form-control @error('img') is-invalid @enderror" name="img">
                                                    <div id="avatar-content" class="mt-3">
                                                        @if($data->banner)
                                                            <img src="{{ asset('storage/' . $data->banner) }}" alt="{{ $data->type }}" style="max-width: 200px;">
                                                        @else
                                                            -
                                                        @endif
                                                    </div>
                                                    @error('img')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
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
<script src="{{ asset('vuexy/app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
<script src="{{ asset('vuexy/app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
@endpush

@push('custom_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
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
