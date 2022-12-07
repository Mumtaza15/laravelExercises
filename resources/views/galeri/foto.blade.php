@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

@push('isi')
<link href="{{ asset('lightbox2-dev/dist/css/lightbox.min.css') }}" rel="stylesheet">
<script src="{{ asset('lightbox2-dev/dist/js/lightbox-plus-jquery.min.js') }}"></script>
@endpush

@section('content')
<section id="album" class="py-1 text-center bg-light">
    <div class="container">
        <h2>Buku: {{ $buku->judul }}</h2>
        <hr>
        <div class="row">
            @foreach ($galeris as $data)
            <div class="col-md-4">

            <a href="{{ asset('images/'.$data->foto) }}"

            data-lightbox="image-1" data-title="{{ $data->keterangan }}">
                <img src="{{ asset('images/'.$data->foto) }}" style="width:200px; height:150px"></a>
                <p><h5>{{ $data->nama_galeri }}</h5></p>
            </div>
            @endforeach
            </div>
        </div>
        <div>{{ $galeris->links() }}</div>
    </div>
</section>
    <hr>
<!-- 
<section class="container-xl">
  <form action="{{ route('komentar.store', $buku->id) }}" method="POST">
    @csrf
    <div class="my-3">
      <label for="komentar" class="form-label">Komentar</label>
      <textarea class="form-control @error('komentar') is-invalid @enderror" id="komentar" name="komentar" rows="3"></textarea>
      @error('komentar')<div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
    </div>
    <button type="submit" class="btn btn-success">Kirim</button>
    <a href="/buku" class="btn btn-warning">Batal</a>
  </form>
</section> -->

<section class="container-xl">
<div class="">
<form action="{{ route('komentar.store', $buku->id) }}" method="POST">
    @csrf
        <h3 align="left">Kirim Komentar</h3>
        <div class="form-group">
            <label for="keterangan"></label>
            <textarea id="komentar" name="komentar" class="form-control"></textarea>
        </div>
        <div class="form-group" align="left">
            <button type="submit" class="btn btn-success">Kirim</button>
            <a href="/buku" class="btn btn-warning">Batal</a>
        </div>
    </form>
    </div>
</section>
<hr>
<section class="container-xl mb-3">
  <h3 align="left">Komentar Terkirim</h3>
  @foreach($data_komentar as $komentar)
  <div class="card mt-3">
    <div class="card-body">
      <h5 class="card-title">{{ $komentar->user->name }}</h5>
      <p class="card-text">{{ $komentar->comment }}</p>
    </div>
  </div>
  @endforeach
</section>

<!-- <div>{{ $data_komentar->links('pagination::bootstrap-5') }}</div> -->

@endsection