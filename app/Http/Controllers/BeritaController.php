<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::with('user')->latest()->get();
        return view('admin.berita.index', compact('berita'));
    }

    public function addEdit($id = null)
    {
        try {
            $berita = $id
                ? Berita::where('id_berita', Crypt::decrypt($id))->firstOrFail()
                : null;
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
                $berita = Berita::where('id_berita', $id_decrypt)->firstOrFail();
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
            'slug.unique' => 'Slug berita sudah digunakan. Silahkan gunakan judul yang berbeda'
        ]);

        $berita->judul   = $request->judul;
        $berita->slug    = $slug;
        $berita->isi     = $request->isi;
        $berita->tanggal = $request->tanggal;
        $berita->id_user = $request->id_user;
        $berita->status = $request->status;

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
            $berita = Berita::with('user')
                ->where('id_berita', Crypt::decrypt($id))
                ->firstOrFail();
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
            $berita = Berita::where('id_berita', Crypt::decrypt($id))->firstOrFail();
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

    // Buat dashboard (3 berita)
    public function beritaDashboard()
    {
        $berita = Berita::latest()->take(3)->get();
        return $berita;
    }

    // Buat halaman berita (semua berita)
    public function beritaPublic()
    {
        $berita = \App\Models\Berita::where('status', 'publish')->latest()->get();
        $title = 'Berita';
        // $berita = Berita::latest()->get();
        return view('public.berita.berita', compact('title', 'berita'));
    }

    public function beritaShowPublic($slug)
    {
        $berita = \App\Models\Berita::where('slug', $slug)->firstOrFail();

        $title = $berita->judul;

        return view('public.berita.show', compact('berita', 'title'));
    }
}
