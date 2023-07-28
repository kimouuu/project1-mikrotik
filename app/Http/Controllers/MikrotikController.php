<?php

namespace App\Http\Controllers;

use App\Models\Multiro;
use App\Models\RouterosAPI;
use Illuminate\Http\Request;

class MikrotikController extends Controller
{
    //
    public function index(Request $request, Multiro $multiro)
    {
        $ip = $multiro->host;
        $user = $multiro->username;
        $pass = $multiro->password; 
        $API = new RouterosAPI();
        $API->debug('true');


        if ($API->connect($ip, $user, $pass)) {
            $entity = $API->comm('/system/identity/print');
            // $result = $API->comm($request->comm);
        }  else {
            var_dump($API->error);
            return 'Koneksi Gagal';
        }

        return view('mikrotik', compact('entity'));
        // return view('mikrotik');
    }

    public function store(Request $request, Multiro $multiro)
    {

        // $router = Multiro::where('id', $multiro)->first();

        if (!$multiro) {
            return redirect()->route('home')->with('error', 'Failed Connection');
        }

        $ip = $multiro->host;
        $user = $multiro->username;
        $pass = $multiro->password; 
        $API = new RouterosAPI();
        $API->debug('true');


        if ($API->connect($ip, $user, $pass)) {
            $entity = $API->comm('/system/identity/print');
            $result = $API->comm($request->comm);
        }  else {
            var_dump($API->error);
            return 'Koneksi Gagal';
        }

        return view('mikrotik', compact('result', 'entity'));
    }
}
