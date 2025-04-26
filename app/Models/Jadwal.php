<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal_akademik';
    protected $guarded = [];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public $incrementing = false;

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_gol', 'id_gol');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruang', 'id_ruang');
    }

    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
    }
}
