<!DOCTYPE html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

<p align="left"><a href="{{ route('buku.create')}}">Tambah Buku</a></p>


<!-- <h3>Jumlah Data : {{$buku->count('id')}}</h3>

<h3>Jumlah Total Harga Buku : {{"RP ".number_format($buku->sum('harga'))}}</h3> -->