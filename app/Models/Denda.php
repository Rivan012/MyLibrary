<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;

    protected $table = 'denda';
    protected $fillable = [
        'nama_denda',
        'nominal_per_hari',
        'keterangan',
    ];

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class, 'denda_id', 'id');
    }
}
