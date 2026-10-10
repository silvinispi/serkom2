<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    /** @use HasFactory<\Database\Factories\ProfilSekolahFactory> */
    use HasFactory;
    protected $table = 'profil_sekolah';
    protected $primaryKey = 'id_profil';

    protected $fillable = [
        'nama_sekolah',
        'kepala_sekolah',
        'nip',
        'foto',
        'logo',
        'npsn',
        'alamat',
        'kontak',
        'youtube',
        'instagram',
        'facebook',
        'visi_misi',
        'tahun_berdiri',
        'deskripsi',
        'banner',
        'text'
    ];
}
