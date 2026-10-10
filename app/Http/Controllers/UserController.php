<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::latest()->get();
        return view('admin.user.index', compact('user'));
    }

    public function addEdit($id = null)
    {
        try {
            $user = $id
                ? User::where('id_user', Crypt::decrypt($id))->firstOrFail()
                : null;
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'Data user tidak ditemukan.');
        }

        return view('admin.user.form', compact('user'));
    }

    public function save(Request $request, $id = null)
    {
        if ($id) {
            try {
                $id_decrypt = Crypt::decrypt($id);
                $user = User::where('id_user', $id_decrypt)->firstOrFail();
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.user.index')
                    ->with('error', 'Data user tidak ditemukan.');
            }
        } else {
            $user = new User();
        }

        if ($id) {
            $request->validate([
                'name'     => 'required|string|max:50',
                'username' => 'required|string|max:50|unique:user,username,' . $id_decrypt . ',id_user',
                'password' => 'nullable|string|min:6',
                'role'     => 'required|in:admin,operator',
                'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ], [
                'name.required'     => 'Nama lengkap wajib diisi.',
                'username.required' => 'Username wajib diisi.',
                'username.unique'   => 'Username sudah dipakai.',
                'password.min'      => 'Password minimal 6 karakter.',
                'role.required'     => 'Role wajib dipilih.',
                'role.in'           => 'Role tidak valid.',
                'foto.image'        => 'File harus berupa gambar.',
                'foto.mimes'        => 'Format gambar harus jpg, jpeg, atau png.',
                'foto.max'          => 'Ukuran gambar maksimal 2MB.',
            ]);
        } else {
            $request->validate([
                'name'     => 'required|string|max:50',
                'username' => 'required|string|max:50|unique:user,username',
                'password' => 'required|string|min:6',
                'role'     => 'required|in:admin,operator',
                'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'status'   => 'required|in:aktif,tidak_aktif',
            ], [
                'name.required'     => 'Nama lengkap wajib diisi.',
                'username.required' => 'Username wajib diisi.',
                'username.unique'   => 'Username sudah dipakai.',
                'password.required' => 'Password wajib diisi.',
                'password.min'      => 'Password minimal 6 karakter.',
                'role.required'     => 'Role wajib dipilih.',
                'role.in'           => 'Role tidak valid.',
                'foto.image'        => 'File harus berupa gambar.',
                'foto.mimes'        => 'Format gambar harus jpg, jpeg, atau png.',
                'foto.max'          => 'Ukuran gambar maksimal 2MB.',
            ]);
        }

        $user->name     = $request->name;
        $user->username = $request->username;
        $user->role     = $request->role;
        $user->status   = $request->status;

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

        $user->save();

        return redirect()
            ->route('admin.user.index')
            ->with(
                'success',
                $id
                    ? 'Data user berhasil diperbarui.'
                    : 'Data user berhasil disimpan.'
            );
    }

    public function show($id)
    {
        try {
            $user = User::where('id_user', Crypt::decrypt($id))->firstOrFail();
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'Data user tidak ditemukan.');
        }

        return view('admin.user.show', compact('user'));
    }

    public function destroy($id)
    {
        try {
            $user = User::where('id_user', Crypt::decrypt($id))->firstOrFail();
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'Data user tidak ditemukan.');
        }

        if ($user->id_user == Auth::id()) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        if ($user->foto && file_exists(public_path('assets/admin/images/' . $user->foto))) {
            @unlink(public_path('assets/admin/images/' . $user->foto));
        }

        $user->delete();

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Data user berhasil dihapus.');
    }
}
