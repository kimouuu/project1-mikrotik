<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        //Menampilkan Form Tambah User
        return view('users.create');
    }

    public function store(Request $request)
    {
        //Menyimpan Data User Baru
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'jabatan' => 'required',
        ]);
        $array = $request->only([
            'name', 'email', 'password', 'jabatan'
        ]);
        $array['password'] = bcrypt($array['password']);
        $user = User::create($array);
        return redirect()->route('users.index')
        ->with('success_message', 'Berhasil menambah user baru');
    }
    public function edit($id)
    {
        //Menampilkan Form Edit
        $user = User::find($id);
        if (!$user) return redirect()->route('users.index')->with('error_message', 'User dengan id' . $id . ' tidak ditemukan');
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //Mengedit Data User
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'jabatan' => 'required',
        ]);
        $user->update($request->all());

        return redirect()->route('users.index')->with('success_message', 'Berhasil mengubah user');
    }

    /**
     * Remove the specified resource from storage.
     *
     *  @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //Menghapus User
        $user = User::find($id);

        if ($id == $request->user()->id) return redirect()->route('users.index');

        if ($user) $user->delete();

        return redirect()->route('users.index')->with('success_message', 'Berhasil menghapus user');
    }
}
