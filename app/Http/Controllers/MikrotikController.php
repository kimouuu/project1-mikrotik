<?php

namespace App\Http\Controllers;

use App\Models\RouterosAPI;
use Illuminate\Http\Request;

class MikrotikController extends Controller
{
    //
    public function index()
    {
        return view('mikrotik');
    }
    public function store(Request $request)
    {
        $ip = session('ip');
        $user = session('user');
        $pass = session('pass'); 
        $API = new RouterosAPI();
        $API->debug('false');


        if ($API->connect($ip, $user, $pass)) {
            $result = $API->comm($request->comm);

     } 
        else {
            return 'Koneksi Gagal';
     }

    


        return $result;
    }
}
