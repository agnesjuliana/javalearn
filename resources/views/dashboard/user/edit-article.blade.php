@extends('layout.master-dashboard')

@section('title', 'Edit Article')

@section('css')
    <link href="{{ asset('admin-asset/css/custom-editor.css') }}" rel="stylesheet">

    <!-- include libraries(jQuery, bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

@endsection

@section('content')

    <div class="container mt-5">
        <h2 class="mb-4">Edit Article</h2>
        <form method="post" action="{{ route('dashboard.user.article.update', $article->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="articleTitle">Judul:</label>
                <input type="text" class="form-control" id="articleTitle" name="articleTitle"
                    placeholder="Masukkan judul artikel" value="{{ $article->judul }}">
            </div>
            <div class="form-group">
                <label for="articleCategory">Kategori:</label>
                <select class="form-control" id="articleCategory" name="articleCategory">
                    <option value="">Pilih kategori</option>
                    <option value="sejarah" {{ $article->kategori == 'sejarah' ? 'selected' : '' }}>Sejarah Jawa</option>
                    <option value="bahasa" {{ $article->kategori == 'bahasa' ? 'selected' : '' }}>Bahasa Jawa</option>
                    <option value="seni" {{ $article->kategori == 'seni' ? 'selected' : '' }}>Seni dan Budaya Jawa</option>
                    <option value="budaya" {{ $article->kategori == 'budaya' ? 'selected' : '' }}>Budaya Jawa</option>
                    <option value="literatur" {{ $article->kategori == 'literatur' ? 'selected' : '' }}>Literatur Jawa</option>
                    <!-- Tambahkan opsi kategori lainnya sesuai kebutuhan -->
                </select>
            </div>
            <div class="form-group">
                <textarea name="summernote" id="summernote" cols="100" rows="10">{{ $article->konten }}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

@section('js')
    <script>
        $('#summernote').summernote({
            placeholder: 'Tulis artikel disini...',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],

            callbacks: {
                onImageUpload: function(files) {
                    for (let i = 0; i < files.length; i++) {
                        $.upload([i]);

                    }
                },
                onMediaDelete: function(target) {
                    $.delete(target[0].src);

                }
            }
        });
    </script>
@endsection
