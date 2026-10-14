<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (strcasecmp($user->role, 'admin') === 0) {
            $berita = Berita::with('user')->latest()->get();
        } else {
            $berita = Berita::with('user')
                ->where('id_user', $user->id_user)
                ->latest()
                ->get();
        }

        return view('admin.berita.index', compact('berita'));
    }

    public function addEdit($id = null)
    {
        try {
            if ($id) {
                $id_decrypt = Crypt::decrypt($id);
                $query = Berita::where('id_berita', $id_decrypt);

                if (strcasecmp(Auth::user()->role, 'admin') !== 0) {
                    $query->where('id_user', Auth::user()->id_user);
                }

                $berita = $query->firstOrFail();
            } else {
                $berita = null;
            }
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.berita.index')
                ->with('error', 'Data berita tidak ditemukan.');
        }

        $users = User::orderBy('name', 'asc')->get();

        return view('admin.berita.form', compact('berita', 'users'));
    }

    public function save(Request $request, $id = null)
    {
        $slug = Str::slug($request->judul);
        $request->merge(['slug' => $slug]);

        if ($id) {
            try {
                $id_decrypt = Crypt::decrypt($id);
                $query = Berita::where('id_berita', $id_decrypt);

                if (strcasecmp(Auth::user()->role, 'admin') !== 0) {
                    $query->where('id_user', Auth::user()->id_user);
                }

                $berita = $query->firstOrFail();
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.berita.index')
                    ->with('error', 'Data berita tidak ditemukan.');
            }
        } else {
            $berita = new Berita();
        }

        $request->validate([
            'judul'   => 'required|string|max:50',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'id_user' => 'required|exists:user,id_user',
            'status'  => 'required|in:draft,publish',
            'slug'    => 'required|unique:berita,slug,' . ($id_decrypt ?? 'NULL') . ',id_berita',
        ], [
            'judul.required'   => 'Judul wajib diisi.',
            'judul.max'        => 'Judul maksimal 50 karakter.',
            'isi.required'     => 'Isi berita wajib diisi.',
            'tanggal.required' => 'Tanggal wajib diisi.',
            'gambar.image'     => 'File harus berupa gambar (JPG, PNG).',
            'gambar.max'       => 'Ukuran gambar maksimal 2MB.',
            'id_user.required' => 'Penulis wajib dipilih.',
            'id_user.exists'   => 'Penulis yang dipilih tidak valid.',
            'slug.unique'      => 'Slug berita sudah digunakan. Silakan gunakan judul yang berbeda.',
        ]);

        $berita->judul   = $request->judul;
        $berita->slug    = $slug;
        $berita->isi     = $request->isi;
        $berita->tanggal = $request->tanggal;
        $berita->status  = $request->status;

        // Operator otomatis jadi penulis, admin bisa pilih
        if (strcasecmp(Auth::user()->role, 'admin') === 0) {
            $berita->id_user = $request->id_user;
        } else {
            $berita->id_user = Auth::user()->id_user;
        }

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();

            if ($berita->gambar && file_exists(public_path('assets/admin/images/' . $berita->gambar))) {
                @unlink(public_path('assets/admin/images/' . $berita->gambar));
            }

            $file->move(public_path('assets/admin/images'), $filename);
            $berita->gambar = $filename;
        }

        $berita->save();

        return redirect()
            ->route('admin.berita.index')
            ->with(
                'success',
                $id
                    ? 'Data berita berhasil diperbarui.'
                    : 'Data berita berhasil disimpan.'
            );
    }

    public function show($id)
    {
        try {
            $query = Berita::with('user')
                ->where('id_berita', Crypt::decrypt($id));

            if (strcasecmp(Auth::user()->role, 'admin') !== 0) {
                $query->where('id_user', Auth::user()->id_user);
            }

            $berita = $query->firstOrFail();
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.berita.index')
                ->with('error', 'Data berita tidak ditemukan.');
        }

        return view('admin.berita.show', compact('berita'));
    }

    public function destroy($id)
    {
        try {
            $query = Berita::where('id_berita', Crypt::decrypt($id));

            if (strcasecmp(Auth::user()->role, 'admin') !== 0) {
                $query->where('id_user', Auth::user()->id_user);
            }

            $berita = $query->firstOrFail();
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.berita.index')
                ->with('error', 'Data berita tidak ditemukan.');
        }

        if ($berita->gambar && file_exists(public_path('assets/admin/images/' . $berita->gambar))) {
            @unlink(public_path('assets/admin/images/' . $berita->gambar));
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Data berita berhasil dihapus.');
    }

    public function beritaDashboard()
    {
        $berita = Berita::latest()->take(3)->get();
        return $berita;
    }

    public function beritaPublic()
    {
        $berita = Berita::where('status', 'publish')->latest()->get();
        $title = 'Berita';

        return view('public.berita.berita', compact('title', 'berita'));
    }

    public function beritaShowPublic($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();

        $title = $berita->judul;

        return view('public.berita.show', compact('berita', 'title'));
    }
}
