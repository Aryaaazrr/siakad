<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;

    protected $table = 'golongan';
    protected $primaryKey = 'id_gol';
    protected $guarded = [];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_gol', 'id_gol');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_gol', 'id_gol');
    }
}
