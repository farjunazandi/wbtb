<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/user_admin', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'username' => 'required|unique:users'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'password' => Hash::make(123)
        ]);

        return redirect('/admin/user')->with('success', 'Data user berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        User::where('id', $request->id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role
        ]);

        return redirect('/admin/user')->with('success', 'Data user berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        User::destroy($request->id);

        return redirect('/admin/user')->with('success', 'Data user berhasil dihapus!');
    }

    public function activate(Request $request)
    {
        User::where('id', $request->id)->update(['aktif' => '1']);

        return redirect('/admin/user')->with('success', 'Data user berhasil diaktifkan!');
    }

    public function deactivate(Request $request)
    {
        User::where('id', $request->id)->update(['aktif' => '0']);

        return redirect('/admin/user')->with('success', 'Data user berhasil dinonaktifkan!');
    }

    public function changePasswordView()
    {
        return view('admin/changePassword_admin', [
            'users' => User::all()
        ]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'newPassword' => 'required',
            'password' => 'required|same:newPassword'
        ]);

        $password = Hash::make($request->password);
        User::where('id', $request->id)->update(['password' => $password]);

        return redirect('/admin/changePasswordView')->with('success', 'Password berhasil diubah!');
    }
}
