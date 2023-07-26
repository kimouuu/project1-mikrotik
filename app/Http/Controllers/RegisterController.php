<?php

namespace App\Http\Controllers;

use App\Models\multiro;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
         return view ('register');
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

        $request->session()->put($data);


        return redirect()->route('multiro.index');

}
}
