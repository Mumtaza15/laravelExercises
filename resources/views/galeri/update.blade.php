<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

@extends('layouts.app')

@section('content')

    @if (count($errors) > 0)
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

<div class="container">
    <h4>Update Galeri</h4>

    <div class="mr-5 ml-5">
    <form method="post" action="{{ route('galeri.update', $galeri->id) }}">
    @csrf
        <div>Nama <input type="text" name="nama" value="{{$galeri->nama_galeri}}"></div>
        <div>Judul <input type="text" name="judul" value="{{$galeri->albums->judul}}"></div>
        <div>Gambar  <input type="text" name="foto" value="{{$galeri->foto}}"></div>

        <div><button type="submit">Simpan</button>
        <a href="/galeri">Batal</a></div>
    </form>
  </div>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

@endsection