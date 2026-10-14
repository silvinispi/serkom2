<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Kelas;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    public $timestamps = true;

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'id_kelas',
        'jenis_kelamin',
        'tahun_masuk',
    ];

   
     
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    
    public function getNamaKelasAttribute(): string
    {
        return $this->kelas->nama_kelas ?? '-';
    }
}