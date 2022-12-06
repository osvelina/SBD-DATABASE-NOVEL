@extends('novel.layout')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<h2 class="mt-5 p-2 bg-white text-dark rounded-2">Kotak Sampah (Data novel)</h2>


@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table text-center table-hover mt-2 mb-4 bg-light p-2 rounded-2" >
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
                
                <a href="{{ route('novel.restore', $data->id_novel) }}" type="button" class="btn btn-warning rounded-3"><i class="fa fa-pencil"></i>Restore</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_novel }}"> 
                        <i class="fa fa-trash"></i>Hapus
                    </button>
            

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_novel }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data {{ $data->id_novel }} ?
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
<div class="card-footer ">
    <a href="{{ route('novel.index') }}" type="button" class="btn btn-primary p-2 rounded-3">Kembali</a>
</div>
@stop