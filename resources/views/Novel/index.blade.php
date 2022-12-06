@extends('novel.layout')

@section('content')

<h4 class="mt-3">Data Novel</h4>

<div class="row justify-content-center">
    <div class="col-md-6">
        <form method="GET" action="/novel.search">        
        @csrf
        <div class="input-group mb-3">
            <input type="search" name="search" class="form-control" placeholder="Cari ID Novel">
                <button type="submit" class="btn btn-danger">
                    <i class="fas">Search</i>
                </button>
            </div>
        </form>
    </div>
</div>

<a href="{{ route('novel.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<a href="{{ route('novel.trash') }}" type="button" class="btn btn-secondary rounded-3">Kotak Sampah</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
      <th>pengarang</th>
        <th>harga</th>
        <th>penerbit</th>
        <th>judul</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
            <td>{{ $data->id_novel }}</td>
                <td>{{ $data->pengarang }}</td>
                <td>{{ $data->harga }}</td>
                <td>{{ $data->penerbit }}</td>
                <td>{{ $data->judul }}</td>
                <td>
                    <a href="{{ route('novel.edit', $data->id_novel) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_novel }}"> 
                        <i class="fa"></i>Buang
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_novel }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('novel.softDeleted', $data->id_novel) }}">
                                    @csrf
                                    <div class="modal-body">
                                        {{ $data->id_novel }} akan dipindahkan ke kotak sampah ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop