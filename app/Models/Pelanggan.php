<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    
    use HasFactory;
    
    protected $table = "pelanggan";
    public function cucian(): HasMany

    {
        return $this->hasMany(Cucian::class, 'nama_id');
    }
}
