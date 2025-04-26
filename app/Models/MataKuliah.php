<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    protected $primaryKey = 'kode_mk';
    protected $guarded = [];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public $incrementing = false;

    public function pengampu()
    {
        return $this->hasMany(Pengampu::class, 'kode_mk', 'kode_mk');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'kode_mk', 'kode_mk');
    }

    public function krs()
    {
        return $this->hasMany(KRS::class, 'kode_mk', 'kode_mk');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'kode_mk', 'kode_mk');
    }
}
