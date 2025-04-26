<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KRS extends Model
{
    use HasFactory;
    protected $table = 'krs';
    protected $primaryKey = 'kode_mk';
    protected $guarded = [];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nip', 'nip');
    }

    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
    }
}
