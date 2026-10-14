<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::latest()->get();
        return view('admin.guru.index', compact('guru'));
    }

    public function addEdit($id = null)
    {
        try {
            $guru = $id
                ? Guru::where('id_guru', Crypt::decrypt($id))->firstOrFail()
                : null;
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.guru.index')
                ->with('error', 'Data guru tidak ditemukan.');
        }

        return view('admin.guru.form', compact('guru'));
    }

    public function save(Request $request, $id = null)
    {
        if ($id) {
            try {
                $id_decrypt = Crypt::decrypt($id);
                $guru = Guru::where('id_guru', $id_decrypt)->firstOrFail();
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.guru.index')
                    ->with('error', 'Data guru tidak ditemukan.');
            }
        } else {
            $guru = new Guru();
        }

        $slug = Str::slug($request->nama_guru);

        $query = Guru::where('slug', $slug);
        if ($id_decrypt ?? false) {
            $query->where('id_guru', '!=', $id_decrypt);
        }
        if ($query->exists()) {
            $slug = $slug . '-' . time();
        }

        $request->merge(['slug' => $slug]);

        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'mapel'     => 'required|string|max:40',
            'nip'       => 'nullable|unique:guru,nip,' . ($id_decrypt ?? 'NULL') . ',id_guru',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'slug'      => 'required|unique:guru,slug,' . ($id_decrypt ?? 'NULL') . ',id_guru',
        ], [
            'nama_guru.required' => 'Nama guru wajib diisi.',
            'mapel.required'     => 'Mata pelajaran wajib diisi.',
            'nip.unique'         => 'NIP sudah terdaftar pada guru lain.',
            'foto.image'         => 'Foto harus berupa file gambar (JPG, PNG).',
            'foto.max'           => 'Ukuran foto maksimal 2MB.',
            'slug.unique'        => 'Slug guru sudah digunakan. Silakan gunakan nama yang berbeda.',
        ]);

        $guru->nama_guru = $request->nama_guru;
        $guru->slug      = $slug;
        $guru->nip       = $request->nip;
        $guru->mapel     = $request->mapel;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $guru->id_guru . '_' . $file->getClientOriginalName();

            if ($guru->foto && $guru->foto !== $filename && file_exists(public_path('assets/admin/images/' . $guru->foto))) {
                @unlink(public_path('assets/admin/images/' . $guru->foto));
            }

            if (!file_exists(public_path('assets/admin/images/' . $filename))) {
                $file->move(public_path('assets/admin/images'), $filename);
            }

            $guru->foto = $filename;
        }

        $guru->save();

        return redirect()
            ->route('admin.guru.index')
            ->with(
                'success',
                $id
                    ? 'Data guru berhasil diperbarui.'
                    : 'Data guru berhasil disimpan.'
            );
    }

    public function show($id_guru)
    {
        try {
            $guru = Guru::where('id_guru', Crypt::decrypt($id_guru))->firstOrFail();
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.guru.index')
                ->with('error', 'Data guru tidak ditemukan.');
        }

        return view('admin.guru.show', compact('guru'));
    }

    public function destroy($id)
    {
        try {
            $guru = Guru::where('id_guru', Crypt::decrypt($id))->firstOrFail();
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.guru.index')
                ->with('error', 'Data guru tidak ditemukan.');
        }

        if ($guru->foto && file_exists(public_path('assets/admin/images/' . $guru->foto))) {
            @unlink(public_path('assets/admin/images/' . $guru->foto));
        }

        $guru->delete();

        return redirect()
            ->route('admin.guru.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }

    public function guruPublic()
    {
        $title = 'Guru & Staf';
        $guru = Guru::latest()->get();

        return view('public.guru.guru', compact('title', 'guru'));
    }

    public function guruShowPublic($slug)
    {
        $guru = Guru::where('slug', $slug)->firstOrFail();

        $title = $guru->nama_guru;

        return view('public.guru.show', compact('guru', 'title'));
    }
}
