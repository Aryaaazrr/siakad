<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'Mahasiswa';
    protected $primaryKey = 'nim';
    protected $guarded = [];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function golongan()
    {
        return $this->belongsTo(MataKuliah::class, 'id_gol', 'id_gol');
    }
}
