<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PapanBunga extends Model
{
    use HasFactory;

    protected $table = 'papan_bunga'; 

    protected $fillable = [
        'nama', 
        'harga',
        'deskripsi',
        'gambar',
        'user_id',
        'kategori_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
