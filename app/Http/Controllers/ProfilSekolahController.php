<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilSekolah;
use Illuminate\Support\Facades\Crypt;

class ProfilSekolahController extends Controller
{
    public function index()
    {
        $title = 'Profil Sekolah';
        $profil = ProfilSekolah::first() ?? new ProfilSekolah();

        return view('admin.profil.index', compact('title', 'profil'));
    }

    public function edit($id)
    {
        try {
            $id_decrypt = Crypt::decrypt($id);
            $profil = ProfilSekolah::findOrFail($id_decrypt);
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.profil.index')
                ->with('error', 'Data profil tidak ditemukan.');
        }

        $title = 'Edit Profil Sekolah';

        return view('admin.profil.edit', compact('title', 'profil'));
    }

    public function update(Request $request, $id)
    {
        try {
            $id_decrypt = Crypt::decrypt($id);
            $profil = ProfilSekolah::findOrFail($id_decrypt);
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.profil.index')
                ->with('error', 'Data profil tidak ditemukan.');
        }

        $data = [
            'nama_sekolah'   => $request->nama_sekolah,
            'kepala_sekolah' => $request->kepala_sekolah,
            'nip'            => $request->nip,
            'npsn'           => $request->npsn,
            'alamat'         => $request->alamat,
            'kontak'         => $request->kontak,
            'youtube'        => $request->youtube,
            'instagram'      => $request->instagram,
            'facebook'       => $request->facebook,
            'tahun_berdiri'  => $request->tahun_berdiri,
            'visi_misi'      => $request->visi_misi,
            'deskripsi'      => $request->deskripsi,
            'text'           => $request->text,
        ];

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_logo.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/images'), $filename);

            if ($profil->logo && file_exists(public_path('assets/admin/images/' . $profil->logo))) {
                @unlink(public_path('assets/admin/images/' . $profil->logo));
            }

            $data['logo'] = $filename;
        }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_foto.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/images'), $filename);

            if ($profil->foto && file_exists(public_path('assets/admin/images/' . $profil->foto))) {
                @unlink(public_path('assets/admin/images/' . $profil->foto));
            }

            $data['foto'] = $filename;
        }

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $filename = time() . '_banner.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/images'), $filename);

            if ($profil->banner && file_exists(public_path('assets/admin/images/' . $profil->banner))) {
                @unlink(public_path('assets/admin/images/' . $profil->banner));
            }

            $data['banner'] = $filename;
        }


        $profil->update($data);

        return redirect()->route('admin.profil.index')->with('success', 'Profil sekolah berhasil diperbarui!');
    }
    public function profilPublic()
    {
        $title = 'Profil Sekolah';
        $profil = ProfilSekolah::first() ?? new ProfilSekolah();

        return view('public.profil', compact('title', 'profil'));
    }

    public function store(Request $request) {}
    public function show(string $id) {}
    public function destroy(string $id) {}
}
