<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@extends('layouts.app')

@section('content')

    @if (count($errors) > 0)
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

<div class="mr-5 ml-5">
<form action="{{ route('galeri.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="nama_galeri">Judul</label>
            <input type="text" class="form-control" name="nama_galeri">
        </div> 
        <div class="form-group">
            <label for="id_buku">Buku</label>
            <select name="id_buku" class = "form-control">
                <option value="" selected>Pilih Buku</option>
                @foreach ($buku as $data)
                    <option value="{{ $data->id }}">{{ $data->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="foto">Upload Foto</label>
            <input type="file" class="form-control" name ="foto">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success"> Simpan</button>
            <a href="/galeri" class="btn btn-warning">Batal</a>
        </div>
    </form>
    </div>
    @endsection


