<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Siswa;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    public $timestamps = true;

    protected $fillable = [
        'nama_kelas',
    ];

    public function siswa(): HasMany
    {
        // foreign key di tabel siswa = 'id_kelas'
        // local key di tabel kelas    = 'id_kelas'
        return $this->hasMany(Siswa::class, 'id_kelas', 'id_kelas');
    }
}