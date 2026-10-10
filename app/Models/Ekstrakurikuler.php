<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $table = 'ekstrakurikuler';
    protected $primaryKey = 'id_ekskul';
    public $timestamps = true;

    protected $fillable = [
        'nama_ekskul',
        'id_guru',
        'jadwal_latihan',
        'deskripsi',
        'gambar',
    ];

    public function guru()
    {
        return $this->belongsTo(\App\Models\Guru::class, 'id_guru', 'id_guru');
    }
}
