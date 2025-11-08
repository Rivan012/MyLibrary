<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalian';
    protected $fillable = [
        'peminjaman_id',
        'tanggal_pengembalian',
        'kondisi_buku',
        'keterlambatan',
        'denda_id',
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }

    public function denda()
    {
        return $this->belongsTo(Denda::class, 'denda_id');
    }
}
