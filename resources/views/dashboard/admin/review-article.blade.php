@extends('layout.master-dashboard')

@section('title', 'Tinjauan Artikel')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tinjauan Artikel</h1>

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
                                <th>Tanggal Upload</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artikels as $key => $article)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $article->judul }}</td>
                                    <td>{{ $article->kategori }}</td>
                                    <td>{{ $article->tanggal_pembuatan }}</td>
                                    <td>
                                        @if ($article->status_tinjau == 'approved')
                                            <span class="badge badge-success">Disetujui</span>
                                        @elseif ($article->status_tinjau == 'rejected')
                                            <span class="badge badge-danger">Ditolak</span>
                                        @else
                                            <span class="badge badge-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#articleModal{{ $article->id }}" class="btn btn-info btn-sm"
                                            data-toggle="modal">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#articlePublishModal{{ $article->id }}" class="btn btn-success btn-sm"
                                            data-toggle="modal"><i class="fas fa-paper-plane"></i></a>
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
                                                    <hr>
                                                    <p><b>Form Review:</b></p>
                                                    <form
                                                        action="{{ route('dashboard.admin.article.update', $article->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <select class="form-control" name="status" id="status">
                                                                <option value="approved"
                                                                    {{ $article->status_tinjau == 'approved' ? 'selected' : '' }}>
                                                                    Setujui</option>
                                                                <option value="rejected"
                                                                    {{ $article->status_tinjau == 'rejected' ? 'selected' : '' }}>
                                                                    Tolak</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="reviewer">Nama Reviewer</label>
                                                            <input class="form-control" name="reviewer" id="reviewer"
                                                                rows="3" value={{ $article->reviewer }}></input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="komentar">Komentar</label>
                                                            <textarea class="form-control" name="komentar" id="komentar" rows="3">{{ $article->komentar }}</textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="articlePublishModal{{ $article->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="exampleModalLabel"><strong>{{ $article->judul }}</strong></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body
                                            ">
                                                <div id="articleContent">
                                                    <form action="{{ route('dashboard.admin.article.publish', $article->id) }}" method="POST">
                                                        @csrf
                                                        @method('POST')
                                                        <input class="form-control" hidden name="id_artikel" id="id_artikel" rows="3"
                                                            value={{ $article->id_artikel }}></input>
                                                        <div class="form-group">
                                                            <label for="penerbit">Penerbit</label>
                                                            <input class="form-control" name="penerbit" id="penerbit" rows="3"></input>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                                    </form>
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
