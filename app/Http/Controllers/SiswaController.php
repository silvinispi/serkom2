<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SiswaController extends Controller
{
    /**
     * Tampilkan daftar siswa
     */
    public function index()
    {
        // Eager loading relasi kelas biar query efisien
        $siswa = Siswa::with('kelas')->latest()->get();
        return view('admin.siswa.index', compact('siswa'));
    }

    /**
     * Form tambah / edit siswa
     */
    public function addEdit($id = null)
    {
        try {
            $siswa = $id
                ? Siswa::where('id_siswa', Crypt::decrypt($id))->firstOrFail()
                : null;
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.siswa.index')
                ->with('error', 'Data siswa tidak ditemukan.');
        }

        // Ambil semua kelas untuk dropdown
        $kelas = Kelas::orderBy('nama_kelas')->get();

        return view('admin.siswa.form', compact('siswa', 'kelas'));
    }

    /**
     * Simpan / update siswa
     */
    public function save(Request $request, $id = null)
    {
        $id_decrypt = null;

        if ($id) {
            try {
                $id_decrypt = Crypt::decrypt($id);
                $siswa = Siswa::where('id_siswa', $id_decrypt)->firstOrFail();
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.siswa.index')
                    ->with('error', 'Data siswa tidak ditemukan.');
            }
        } else {
            $siswa = new Siswa();
        }

        $request->validate([
            'nisn'          => 'required|string|max:10|unique:siswa,nisn,' . ($id_decrypt ?? 'NULL') . ',id_siswa',
            'nama_siswa'    => 'required|string|max:40',
            'id_kelas'      => 'required|exists:kelas,id_kelas',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk'   => 'required|digits:4',
        ], [
            'nisn.required'          => 'NISN wajib diisi.',
            'nisn.max'               => 'NISN maksimal 10 karakter.',
            'nisn.unique'            => 'NISN sudah terdaftar pada siswa lain.',
            'nama_siswa.required'    => 'Nama siswa wajib diisi.',
            'nama_siswa.max'         => 'Nama siswa maksimal 40 karakter.',
            'id_kelas.required'      => 'Kelas wajib dipilih.',
            'id_kelas.exists'        => 'Kelas yang dipilih tidak valid.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in'       => 'Jenis kelamin tidak valid.',
            'tahun_masuk.required'   => 'Tahun masuk wajib diisi.',
            'tahun_masuk.digits'     => 'Tahun masuk harus 4 digit.',
        ]);

        $siswa->nisn          = $request->nisn;
        $siswa->nama_siswa    = $request->nama_siswa;
        $siswa->id_kelas      = $request->id_kelas;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tahun_masuk   = $request->tahun_masuk;

        $siswa->save();

        return redirect()
            ->route('admin.siswa.index')
            ->with(
                'success',
                $id
                    ? 'Data siswa berhasil diperbarui.'
                    : 'Data siswa berhasil disimpan.'
            );
    }

    /**
     * Detail siswa
     */
    public function show($id)
    {
        try {
            $siswa = Siswa::with('kelas')
                ->where('id_siswa', Crypt::decrypt($id))
                ->firstOrFail();
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.siswa.index')
                ->with('error', 'Data siswa tidak ditemukan.');
        }

        return view('admin.siswa.show', compact('siswa'));
    }

    /**
     * Hapus siswa
     */
    public function destroy($id)
    {
        try {
            $siswa = Siswa::where('id_siswa', Crypt::decrypt($id))->firstOrFail();
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.siswa.index')
                ->with('error', 'Data siswa tidak ditemukan.');
        }

        $siswa->delete();

        return redirect()
            ->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }

}
