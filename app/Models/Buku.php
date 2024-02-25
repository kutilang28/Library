<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'bukus';
    protected $primaryKey = "id";
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'foto',
        'tahun_terbit',
    ];
    public function peminjaman() {
        return $this->hasMany(Peminjaman::class);
    }
    
    public function koleksi() {
        return $this->hasMany(Koleksi::class);
    }
    
}
