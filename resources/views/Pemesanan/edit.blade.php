@extends('pemesanan.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data Pemesanan</h5>

		<form method="post" action="{{ route('pemesanan.update', $data->id_pemesanan) }}">
			@csrf
            <div class="mb-3">
                <label for="id_pemesanan" class="form-label">ID Pemesanan</label>
                <input type="text" class="form-control" id="id_pemesanan" name="id_pemesanan" value="{{ $data->id_pemesanan }}">
            </div>
			<div class="mb-3">
                <label for="id_pembeli" class="form-label">Id Pembeli</label>
                <input type="text" class="form-control" id="id_pembeli" name="id_pembeli" value="{{ $data->id_pembeli }}">
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ $data->jumlah }}">
            </div>
            <div class="mb-3">
                <label for="id_novel" class="form-label">Id Novel</label>
                <input type="text" class="form-control" id="id_novel" name="id_novel" value="{{ $data->id_novel }}">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop