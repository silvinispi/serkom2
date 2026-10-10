<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->get();
        return view('admin.galeri.index', compact('galeri'));
    }

    public function addEdit($id = null)
    {
        try {
            $galeri = $id
                ? Galeri::where('id_galeri', Crypt::decrypt($id))->firstOrFail()
                : null;
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.galeri.index')
                ->with('error', 'Data galeri tidak ditemukan.');
        }

        return view('admin.galeri.form', compact('galeri'));
    }

    public function save(Request $request, $id = null)
    {
        $slug = Str::slug($request->judul);
        $request->merge(['slug' => $slug]);

        if ($id) {
            try {
                $id_decrypt = Crypt::decrypt($id);
                $galeri = Galeri::where('id_galeri', $id_decrypt)->firstOrFail();
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.galeri.index')
                    ->with('error', 'Data galeri tidak ditemukan.');
            }
        } else {
            $galeri = new Galeri();
        }

        $request->validate([
            'judul'      => 'required|string|max:50',
            'keterangan' => 'required|string',
            'file'       => ($id ? 'nullable' : 'required') . '|file|mimes:jpeg,png,jpg,mp4|max:15240',
            'kategori'   => 'required|in:Foto,Video',
            'tanggal'    => 'required|date',
            'slug'    => 'required|unique:galeri,slug,' . ($id_decrypt ?? 'NULL') . ',id_galeri',
        ], [
            'judul.required'      => 'Judul wajib diisi.',
            'judul.max'           => 'Judul maksimal 50 karakter.',
            'keterangan.required' => 'Keterangan wajib diisi.',
            'file.required'       => 'File wajib diupload.',
            'file.mimes'          => 'File harus berupa JPG, PNG, atau MP4.',
            'file.max'            => 'Ukuran file maksimal 15MB.',
            'kategori.required'   => 'Kategori wajib dipilih.',
            'tanggal.required'    => 'Tanggal wajib diisi.',
            'slug.unique' => 'Slug berita sudah digunakan. Silahkan gunakan judul yang berbeda'
        ]);

        $galeri->judul      = $request->judul;
        $galeri->slug     = $slug;
        $galeri->keterangan = $request->keterangan;
        $galeri->kategori   = $request->kategori;
        $galeri->tanggal    = $request->tanggal;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            if ($galeri->file && file_exists(public_path('assets/admin/images/' . $galeri->file))) {
                @unlink(public_path('assets/admin/images/' . $galeri->file));
            }

            $file->move(public_path('assets/admin/images'), $filename);
            $galeri->file = $filename;
        }

        $galeri->save();

        return redirect()
            ->route('admin.galeri.index')
            ->with(
                'success',
                $id
                    ? 'Data galeri berhasil diperbarui.'
                    : 'Data galeri berhasil disimpan.'
            );
    }

    public function show($id)
    {
        try {
            $galeri = Galeri::where('id_galeri', Crypt::decrypt($id))->firstOrFail();
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.galeri.index')
                ->with('error', 'Data galeri tidak ditemukan.');
        }

        return view('admin.galeri.show', compact('galeri'));
    }

    public function destroy($id)
    {
        try {
            $galeri = Galeri::where('id_galeri', Crypt::decrypt($id))->firstOrFail();
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.galeri.index')
                ->with('error', 'Data galeri tidak ditemukan.');
        }

        if ($galeri->file && file_exists(public_path('assets/admin/images/' . $galeri->file))) {
            @unlink(public_path('assets/admin/images/' . $galeri->file));
        }

        $galeri->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil dihapus.');
    }

    public function galeriPublic()
    {
        $title = 'Galeri';
        $galeri = \App\Models\Galeri::latest()->get();

        return view('public.galeri.galeri', compact('title', 'galeri'));
    }

    public function galeriShowPublic($slug)
    {
        $galeri = \App\Models\Galeri::where('slug', $slug)->firstOrFail();

        $title = $galeri->judul;

        return view('public.galeri.show', compact('galeri', 'title'));
    }
}

