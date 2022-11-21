<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

@if(count($data_buku))
    <div class="alert alert-success">
        Ditemukan <strong>{{count($data_buku)}}</strong> data dengan kata : <strong>{{ $cari }}</strong>
    </div>

@if(Session::has('tambah'))
    <div class="alert alert-success">{{ Session::get('tambah') }}</div>
@endif

@if(Session::has('edit'))
    <div class="alert alert-success">{{ Session::get('edit') }}</div>
@endif

@if(Session::has('hapus'))
    <div class="alert alert-danger">{{ Session::get('hapus') }}</div>
@endif

<form action="{{route('buku.search')}}" method="GET">@csrf
    <input type="text" name="kata" class="form-control" placeholder="Cari ...." style="width: 30%; 
    display: inline; margin-top: 10px; margin-bottom: 10px; float: lefr;" >
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tgl. Terbit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

        @foreach($data_buku as $buku)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ "Rp ".number_format($buku->harga, 2, ',','.') }}</td>
                <td>{{ $buku->tgl_terbit}}</td>
                <td>
                    <a href="{{route('buku.edit', $buku->id)}}">
                        <button>Update</button>
                    </a>
                    <br>
                    <form action="{{route('buku.destroy', $buku->id)}}" method="post">
                        @csrf
                        <button onClick="return confirm('Yakin mau dihapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div>{{ $data_buku->links("pagination::bootstrap-5")}}</div>

<div><strong>Jumlah Buku:{{ $jumlah_buku }}</strong></div>

<p>Total harga Buku : {{"Rp. ".number_format($buku->sum('harga'))}}</p>

<p align="left"><a href="{{ route('buku.create')}}">Tambah Buku</a></p>

@else
    <div class="alert alert-warning"><h4>Data {{ $cari }} tidak ditemukan</h4>
    <a href="/buku" class="btn btn-warning">Kembali</a></div>
@endif