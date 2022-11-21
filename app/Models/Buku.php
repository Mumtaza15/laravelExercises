<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'book';
    
    protected $fillable = ['judul', 'penulis', 'harga', 'tgl_terbit'];

    public function photos(){
        return $this->hasMany('App\Buku', 'id_buku', 'id');
    }
}
