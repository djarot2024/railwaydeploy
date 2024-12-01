<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = "pengeluaran";
    protected $dates = ['tanggal_pengeluaran'];
    protected $casts = ['tanggal_pengeluaran' => 'datetime',];
}
