<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    // public function addKomen(Request $request, $id)
    // {
    //     $this->validate($request, ['comment' =>'required|string']);
    //     $komen = new Koment;
    //     $komen->id_users = $id_users;
    //     $komen->id_buku = $id_buku;
    //     $komen->comment = $request->comment;
    //     $komen->save();
    // }

    public function store(Request $request, $bukuId)
    {
        $this->validate($request, [
            'komentar' => 'required|string',
        ]);

        Komentar::create([
            'id_user' => Auth::id(),
            'id_buku' => $bukuId,
            'comment' => $request->komentar,
        ]);

        return Back();
    }
}
