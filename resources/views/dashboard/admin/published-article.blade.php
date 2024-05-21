@extends('layout.master-dashboard')

@section('title', 'Published Artikel')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Artikel Terpublish</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Tanggal Terbit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artikels as $key => $article)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $article->judul }}</td>
                                    <td>{{ $article->kategori }}</td>
                                    <td>{{ $article->tanggal_terbit }}</td>
                                    <td>
                                        <a href="#articleModal{{ $article->id }}" class="btn btn-info btn-sm"
                                            data-toggle="modal">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('dashboard.admin.article.unpublish', $article->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                {{-- Start modal --}}
                                <div class="modal fade" id="articleModal{{ $article->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="exampleModalLabel">
                                                    <strong>{{ $article->judul }}</strong></h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="articleContent">
                                                    <!-- Konten artikel akan ditampilkan di sini -->
                                                    <p><b>Kategori:</b> {{ $article->kategori }}</p>
                                                    <p><b>Tanggal Publikasi:</b> {{ $article->tanggal_pembuatan }}</p>
                                                    <hr>
                                                    <br>
                                                    <p><b>Isi Konten:</b></p>
                                                    {!! $article->konten !!}
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
