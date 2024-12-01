<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cucian extends Model
{
    use HasFactory;

    // Daftar atribut yang dapat diisi (mass assignable)
    protected $table = 'cucian';
    protected $fillable = [
        'pelanggan_id',
        'barang',
        'jumlah_kilo',
        'kategory',
        'jenis_cucian',
        'pelayanan',
        'harga',
        'tanggal_masuk',
        'tanggal_keluar',
        'status_pembayaran',
        'status',
        'nota',
    ];

    // Default attribute values
    protected $attributes = [
        'status' => 'sedang dicuci',
    ];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class, 'nama_id', 'id');
    }
}