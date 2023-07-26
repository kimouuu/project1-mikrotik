<?php

namespace App\Http\Controllers;

use App\Models\multiro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
         return view ('login');
    }

     public function store(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'name' => 'required',
        ]);

        $email = $request->post('email');
        $name = $request->post('name');
        $pass = $request->post('pass');

        $data = [
            'email' => $email,
            'name' => $name,
            'pass' => $pass,
        ];

        if (Auth::attempt(['email' => $email, 'password' => $pass], false)) {
            $request->session()->put($data);


            return redirect()->route('multiro.index');
        }

        return back();
}
}
