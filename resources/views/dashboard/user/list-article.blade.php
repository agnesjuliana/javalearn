@extends('layout.master-dashboard')

@section('title', 'List Article')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">My Artikel</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-primary mb-3">
                    <a href="{{ route('dashboard.user.article.create') }}" style="text-decoration: none; color: white;"
                        class="tambah">
                        <i class="fas fa-plus-circle"></i> Tambah Artikel
                    </a>
                </button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Tanggal publikasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artikels as $artikel)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $artikel->judul }}</td>
                                    <td>{{ $artikel->kategori }}</td>
                                    <td>{{ $artikel->tanggal_pembuatan }}</td>
                                    <td>
                                        @if ($artikel->status == 'Published')
                                            <span class="badge badge-success">Published</span>
                                        @elseif ($artikel->status == 'Review')
                                            <span class="badge badge-warning">Review</span>
                                        @else
                                            <span class="badge badge-secondary">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Icon untuk membaca, mengedit, dan menghapus artikel -->
                                        <a href="#articleModal{{ $artikel->id }}" class="btn btn-info btn-sm" data-toggle="modal">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('dashboard.user.article.edit', ['id' => $artikel->id]) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('dashboard.user.article.destroy', $artikel->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk menampilkan konten artikel -->
    @foreach ($artikels as $article)
        <div class="modal fade" id="articleModal{{ $article->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel"><strong>{{ $article->judul }}</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                            {!! $article->konten !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
