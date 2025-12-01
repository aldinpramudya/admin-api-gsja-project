<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Halaman Index
    public function index(Request $request)
    {
        $roles = Role::all();
        $query = User::with('role')
            ->where('id', '!=', auth()->id());

        // If Filter Role
        if ($request->role_id && $request->role_id !== 'all') {
            $query->where('role_id', $request->role_id);
        }

        $users = $query->latest()->paginate(10)->withQueryString();

        return view('user.index', compact('users', 'roles'));
    }

    // Halaman Create User
    public function create()
    {
        $roles = Role::all();
        return view('user.createUser', compact('roles'));
    }

    // Halaman Edit User
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('user.editUser', compact('user', 'roles'));
    }

    // Simpan User Baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ]);

        return redirect()->route('admin.user.index')->with(
            'success',
            'User Berhasil Dibuat !'
        );
    }

    // Update User Lama
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role_id'   => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'role_id'  => $request->role_id,
        ]);

        // Update password
        if ($request->password) {
            $request->validate(['password' => 'min:6']);
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.user.index')->with(
            'success',
            'User Berhasil Diupdate !'
        );
    }

    // Delete Akun
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.user.index')->with(
            'success',
            'User Berhasil Didelete !'
        );
    }
}
