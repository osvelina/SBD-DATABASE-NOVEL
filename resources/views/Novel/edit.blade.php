@extends('novel.layout')

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

        <h5 class="card-title fw-bolder mb-3">Ubah Data Novel</h5>

		<form method="post" action="{{ route('novel.update', $data->id_novel) }}">
			@csrf
            <div class="mb-3">
                <label for="id_novel" class="form-label">ID Novel</label>
                <input type="text" class="form-control" id="id_novel" name="id_novel" value="{{ $data->id_novel }}">
            </div>
			<div class="mb-3">
                <label for="pengarang" class="form-label">pengarang</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ $data->pengarang }}">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ $data->harga }}">
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $data->penerbit }}">
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">judul</label>
                <input type="text" class="form-control" id="judul" name="judul">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop