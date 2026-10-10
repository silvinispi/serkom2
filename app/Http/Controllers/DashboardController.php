<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Ekstrakurikuler;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Data statistik
        $totalGuru   = Guru::count();
        $totalSiswa  = Siswa::count();
        $totalEkskul = Ekstrakurikuler::count();
        $totalBerita = Berita::count();
        $totalUser = User::count();
        $totalGaleri = Galeri::count();

        // Siswa per tahun masuk (buat grafik)
        $siswaPerTahun = Siswa::selectRaw('tahun_masuk, COUNT(*) as total')
            ->groupBy('tahun_masuk')
            ->orderBy('tahun_masuk', 'asc')
            ->get();

        // Berita terbaru (5)
        $beritaTerbaru = Berita::with('user')
            ->orderBy('tanggal', 'desc')
            ->limit(5)
            ->get();

        // Galeri terbaru (5)
        $galeriTerbaru = Galeri::orderBy('tanggal', 'desc')
            ->limit(4)
            ->get();

        $data = [
            'title'         => 'Dashboard',
            'totalGuru'     => $totalGuru,
            'totalSiswa'    => $totalSiswa,
            'totalEkskul'   => $totalEkskul,
            'totalBerita'   => $totalBerita,
            'siswaPerTahun' => $siswaPerTahun,
            'beritaTerbaru' => $beritaTerbaru,
            'galeriTerbaru' => $galeriTerbaru,
            'totalGaleri' => $totalGaleri,
            'totalUser'  => $totalUser,
        ];

        return view('admin.dashboard', $data);
    }

    public function indexPublic()
    {
    $data = [
        'title'           => 'Dashboard',

        'jumlahSiswa'     => \App\Models\Siswa::count(),
        'jumlahGuru'      => \App\Models\Guru::count(),
        'jumlahEkskul'    => \App\Models\Ekstrakurikuler::count(),
        'jumlahBerita'    => \App\Models\Berita::count(),
        'jumlahGaleri'    => \App\Models\Galeri::count(),

        'guru'            => \App\Models\Guru::latest()->take(4)->get(),
        'ekstrakurikuler' => \App\Models\Ekstrakurikuler::latest()->take(2)->get(),
        'berita'          => \App\Models\Berita::where('status', 'publish')->latest()->take(3)->get(),
        'galeri'          => \App\Models\Galeri::latest()->take(3)->get(),
        'profil'          => \App\Models\ProfilSekolah::first(),
    ];

        return view('public.dashboard', $data);
    }
}
