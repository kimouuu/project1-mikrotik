<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class GuzzleController extends Controller
{
    //
    public function index()
    {
        $response = Http::withBasicAuth('admin', 'rahasia')->get('http://lab-api.cigs.net.id/rest/ip/hotspot/user'
            // 'id' => '2',
            // 'name' => 'users1',
            // 'password' => '123'
        );
        // $response = Http::withBasicAuth('admin', 'rahasia')->put('http://lab-api.cigs.net.id/rest/ip/hotspot/user', [
        //     // 'id' => '2',
        //     'name' => 'users1',
        //     'password' => '123'
        // ]);
        // $response = Http::withBasicAuth('admin', 'rahasia')->patch('http://lab-api.cigs.net.id/rest/ip/hotspot/user/*6', [
        //     // 'id' => '2',
        //     'name' => 'users10',
        //     'password' => '123'
        // ]);
        // $response = Http::withBasicAuth('admin', 'rahasia')->delete('http://lab-api.cigs.net.id/rest/ip/hotspot/user/*6', [
        //     // 'id' => '2',
        //     // 'name' => 'users1',
        //     // 'password' => '123'
        // ]);
 

        return $response;

    }
}
