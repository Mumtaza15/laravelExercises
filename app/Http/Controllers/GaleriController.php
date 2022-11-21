<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Buku;
use File;
use Image;
use Illuminate\Support\Facades\DB;


class GaleriController extends Controller
{
    //
    public function index(){
        $batas = 4;
        $buku = Buku::all();
        // $galeri = Galeri::orderBy('id', 'desc')->paginate($batas);
        $galeri = Galeri::orderBy('id')->paginate($batas);
        $no = $batas * ($galeri->currentPage() - 1);
        return view ('galeri.index', compact('galeri', 'no', 'buku'));
    }
    
    public function create(){
        $buku = Buku::all();
        return view('galeri.create', compact('buku'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama_galeri' => 'required',
            'keterangan' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png',
        ]);
        $galeri = New Galeri;
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->id_buku = $request->id_buku;
        
        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->resize(200,150)->save('thumb/'.$namafile);
        $foto->move('images/', $namafile);

        $galeri->foto = $namafile;
        $galeri->save();
        return redirect('/galeri')->with('pesan', 'Data Galeri Buku berhasil disimpan');
    }

        public function destroy($id) {
        $galeri = Galeri::find($id);
        $galeri->delete();
        return redirect('/galeri')->with('hapus', 'Data galeri berhasil dihapus');
    }
    
    public function edit($id){
        $galeri = Galeri::find($id);
        return view('galeri.update', compact('galeri'));
    }
    
    public function update(Request $request, $id){
        $galeri = Galeri::find($id);
        $galeri-> update([
            'nama_galeri'=>$request->nama,
            // 'albums->judul'=>$request->judul,
            'id_buku'=>$request->id_buku,
            'foto'=>$request->gambar
        ]);
        return redirect('/galeri')->with('edit', 'Data galeri berhasil diedit');
    }


    
}
