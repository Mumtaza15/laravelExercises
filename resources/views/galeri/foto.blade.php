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

@endsection