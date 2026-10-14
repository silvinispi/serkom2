<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Ekstrakurikuler;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\User;
use App\Models\ProfilSekolah;
use App\Models\profilSaya;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $isAdmin = strcasecmp($user->role, 'admin') === 0;

        // Data statistik (semua role lihat angka total yang sama)
        $totalGuru   = Guru::count();
        $totalSiswa  = Siswa::count();
        $totalEkskul = Ekstrakurikuler::count();
        $totalUser   = User::count();
        $totalGaleri = Galeri::count();

        // Statistik berita — admin: semua, operator: cuma miliknya
        if ($isAdmin) {
            $totalBerita = Berita::count();
        } else {
            $totalBerita = Berita::where('id_user', $user->id_user)->count();
        }

        // Siswa per tahun masuk (grafik)
        $siswaPerTahun = Siswa::selectRaw('tahun_masuk, COUNT(*) as total')
            ->groupBy('tahun_masuk')
            ->orderBy('tahun_masuk', 'asc')
            ->get();

        // Berita terbaru — admin: semua, operator: cuma miliknya
        if ($isAdmin) {
            $beritaTerbaru = Berita::with('user')
                ->orderBy('tanggal', 'desc')
                ->limit(5)
                ->get();
        } else {
            $beritaTerbaru = Berita::with('user')
                ->where('id_user', $user->id_user)
                ->orderBy('tanggal', 'desc')
                ->limit(5)
                ->get();
        }

        // Galeri terbaru (semua role lihat sama)
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
            'totalGaleri'   => $totalGaleri,
            'totalUser'     => $totalUser,
        ];

        return view('admin.dashboard', $data);
    }

    public function indexPublic()
    {
        $data = [
            'title'           => 'Dashboard',

            'jumlahSiswa'     => Siswa::count(),
            'jumlahGuru'      => Guru::count(),
            'jumlahEkskul'    => Ekstrakurikuler::count(),
            'jumlahBerita'    => Berita::count(),
            'jumlahGaleri'    => Galeri::count(),

            'guru'            => Guru::latest()->take(4)->get(),
            'ekstrakurikuler' => Ekstrakurikuler::latest()->take(2)->get(),
            'berita'          => Berita::where('status', 'publish')->latest()->take(3)->get(),
            'galeri'          => Galeri::latest()->take(3)->get(),
            'profil'          => ProfilSekolah::first(),
        ];

        return view('public.dashboard', $data);
    }

    public function profilSaya()
    {
        return view('public.saya');
    }
}
    