<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::with('guru')->latest()->get();
        return view('admin.ekstrakurikuler.index', compact('ekstrakurikuler'));
    }

    public function addEdit($id = null)
    {
        try {
            $ekstrakurikuler = $id
                ? Ekstrakurikuler::where('id_ekskul', Crypt::decrypt($id))->firstOrFail()
                : null;
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.ekstrakurikuler.index')
                ->with('error', 'Data ekstrakurikuler tidak ditemukan.');
        }

        $guru = Guru::orderBy('nama_guru', 'asc')->get();

        return view('admin.ekstrakurikuler.form', compact('ekstrakurikuler', 'guru'));
    }

    public function save(Request $request, $id = null)
    {
        if ($id) {
            try {
                $id_decrypt = Crypt::decrypt($id);
                $ekstrakurikuler = Ekstrakurikuler::where('id_ekskul', $id_decrypt)->firstOrFail();
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.ekstrakurikuler.index')
                    ->with('error', 'Data ekstrakurikuler tidak ditemukan.');
            }
        } else {
            $ekstrakurikuler = new Ekstrakurikuler();
        }

        $request->validate([
            'nama_ekskul'    => 'required|string|max:40',
            'id_guru'        => 'required|exists:guru,id_guru',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi'      => 'required|string',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama_ekskul.required'    => 'Nama ekstrakurikuler wajib diisi.',
            'nama_ekskul.max'         => 'Nama ekstrakurikuler maksimal 40 karakter.',
            'id_guru.required'        => 'Pembina wajib dipilih.',
            'id_guru.exists'          => 'Pembina yang dipilih tidak valid.',
            'jadwal_latihan.required' => 'Jadwal latihan wajib diisi.',
            'jadwal_latihan.max'      => 'Jadwal latihan maksimal 40 karakter.',
            'deskripsi.required'      => 'Deskripsi wajib diisi.',
            'gambar.image'            => 'File harus berupa gambar (JPG, PNG).',
            'gambar.max'              => 'Ukuran gambar maksimal 2MB.',
        ]);

        $ekstrakurikuler->nama_ekskul    = $request->nama_ekskul;
        $ekstrakurikuler->id_guru        = $request->id_guru;
        $ekstrakurikuler->jadwal_latihan = $request->jadwal_latihan;
        $ekstrakurikuler->deskripsi      = $request->deskripsi;

        $guru = Guru::where('id_guru', $request->id_guru)->first();
        $ekstrakurikuler->pembina = $guru ? $guru->nama_guru : '-';

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();

            if ($ekstrakurikuler->gambar && file_exists(public_path('assets/admin/images/' . $ekstrakurikuler->gambar))) {
                @unlink(public_path('assets/admin/images/' . $ekstrakurikuler->gambar));
            }

            $file->move(public_path('assets/admin/images'), $filename);
            $ekstrakurikuler->gambar = $filename;
        }

        $ekstrakurikuler->save();

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with(
                'success',
                $id
                    ? 'Data ekstrakurikuler berhasil diperbarui.'
                    : 'Data ekstrakurikuler berhasil disimpan.'
            );
    }

    public function show($id)
    {
        try {
            $ekstrakurikuler = Ekstrakurikuler::with('guru')
                ->where('id_ekskul', Crypt::decrypt($id))
                ->firstOrFail();
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.ekstrakurikuler.index')
                ->with('error', 'Data ekstrakurikuler tidak ditemukan.');
        }

        return view('admin.ekstrakurikuler.show', compact('ekstrakurikuler'));
    }

    public function destroy($id)
    {
        try {
            $ekstrakurikuler = Ekstrakurikuler::where('id_ekskul', Crypt::decrypt($id))->firstOrFail();
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.ekstrakurikuler.index')
                ->with('error', 'Data ekstrakurikuler tidak ditemukan.');
        }

        if ($ekstrakurikuler->gambar && file_exists(public_path('assets/admin/images/' . $ekstrakurikuler->gambar))) {
            @unlink(public_path('assets/admin/images/' . $ekstrakurikuler->gambar));
        }

        $ekstrakurikuler->delete();

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil dihapus.');
    }

    public function ekstrakurikulerPublic()
    {
        $title = 'ekstrakurikuler';
        $ekstrakurikuler = \App\Models\Ekstrakurikuler::latest()->get();

        return view('public.ekstrakurikuler.ekstrakurikuler', compact('title', 'ekstrakurikuler'));
    }

    public function ekstrakurikulerShowPublic($id)
    {
        $ekstrakurikuler = \App\Models\Ekstrakurikuler::findOrFail($id);
        $title = $ekstrakurikuler->nama_ekskul;

        return view('public.ekstrakurikuler.show', compact('ekstrakurikuler', 'title'));
    }
}
