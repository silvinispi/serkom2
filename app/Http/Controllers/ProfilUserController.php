<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilUserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $title = 'Profil Saya';

        return view('admin.profilUser.index', compact('user', 'title'));
    }

    public function edit()
    {
        $user = Auth::user();
        $title = 'Edit Profil Saya';

        return view('admin.profilUser.edit', compact('user', 'title'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'     => 'required|string|max:50',
            'username' => 'required|string|max:50|unique:user,username,' . $user->id_user . ',id_user',
            'password' => 'nullable|string|min:6',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'name.required'     => 'Nama lengkap wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique'   => 'Username sudah dipakai.',
            'password.min'      => 'Password minimal 6 karakter.',
            'foto.image'        => 'File harus berupa gambar.',
            'foto.mimes'        => 'Format gambar harus jpg, jpeg, atau png.',
            'foto.max'          => 'Ukuran gambar maksimal 2MB.',
        ]);

        $user->name     = $request->name;
        $user->username = $request->username;

        if ($request->filled('password')) {
            $user->password = $request->password;
        }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_user.' . $file->getClientOriginalExtension();

            if ($user->foto && file_exists(public_path('assets/admin/images/' . $user->foto))) {
                @unlink(public_path('assets/admin/images/' . $user->foto));
            }

            $file->move(public_path('assets/admin/images'), $filename);
            $user->foto = $filename;
        }

        // $user->save();

        return redirect()
            ->route('admin.profilUser.index')
            ->with('success', 'Profil berhasil diperbarui.');
    }

    
}
