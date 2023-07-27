<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        //Menampilkan Profil

        $user = user::where('name', Auth::user()->email)->first();
        return view('profile.index', ['user' => $user]);
    }

    public function edit($id)
    {
        //Menampilkan Form Edit
        $user = user::find($id);
        if (!$user) return redirect()->route('profile.index')->with('error_message', 'user dengan id = ' . $id . ' tidak ditemukan');
        return view('profile.edit', [
            'user' => $user

        ]);
    }
    public function update(Request $request, User $profile)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'jabatan' => 'required',
        ]);
        $profile->update($request->all());

        return redirect()->route('profile.index')->with('success_message', 'Berhasil');
    }
}
