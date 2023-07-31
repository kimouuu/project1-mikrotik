<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        //Menampilkan Profil
        $user = User::where('name', Auth::user()->email)->first();
        return view('profile.index', ['users' => $user]);
    }
}
