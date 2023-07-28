<?php

namespace App\Http\Controllers;

use App\Models\RouterosAPI;
use App\Models\Multiro;
use App\Models\Nservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MultiroController extends Controller
{
    public function index()
    {
        $multiro = Multiro::all();
        return view('multiro.index', [
            'multiro' => $multiro
        ]);
    }

    public function create()
    {
        return view('multiro.create', [
            'nservice' => Nservice::all(),
        ]);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        //Menyimpan Data Baru
        $request->validate([
            'host' => 'required',
            'username' => 'required',
            // 'password' => 'required|confirmed',
            'router' => 'required',
            'service_id' => 'required',
        ]);
        $array = $request->only([
            'host', 'username', 'password', 'router', 'service_id'
        ]);

        $multiro = Multiro::create($array);
        return redirect()->route('multiro.index')
            ->with('success_message', 'Berhasil menambah user baru');
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //Menampilkan Form Edit multiro
        $multiro = Multiro::find($id);
        if (!$multiro) return redirect()->route('multiro.index')
            ->with('error_message', 'multiro dengan id = ' . $id . ' tidak ditemukan');
        return view('multiro.edit', [
            'multiro' => $multiro,
            'nservice' => Nservice::all()
        ]);
    }

    // public function edit(multiro $multiro)
    // {
    //     return view('multiro.edit');
    // }

    public function update(Request $request, Multiro $multiro)
    {
        $request->validate([
            'host' => 'required',
            'username' => 'required',
            'password' => 'required',
            'router' => 'required',
            'service_id' => 'required',
        ]);

        $multiro->update($request->all());

        return redirect()->route('multiro.index')->with('success', 'Router updated successfully.');
    }

    public function destroy(Multiro $multiro)
    {
        $multiro->delete();

        return to_route('multiro.index')->with('success', 'Router deleted successfully.');
    }
    public function connect(Request $request, Multiro $multiro, $service)
    {
        if (!$multiro) {
            return redirect()->route('multiro.index')->with('error', 'Router not found.');
        }

        // rest api
        // $restApiTest =  Http::withBasicAuth($multiro->username, $multiro->password)->get('http://'.$multiro->host.'/rest/interface/ether1');
        // return $restApiTest->body();

        $ip = $multiro->host;
        $user = $multiro->username;
        $pass = $multiro->password; 
        $API = new RouterosAPI();
        $API->debug('true');

        if ($API->connect($ip, $user, $pass)) {
            $result = $API->comm('/system/identity/print');
            // $result = $API->comm('/interface/print');
        } else {
            var_dump($API->error);
            return 'Koneksi Gagal';
        }

        return $result;
        // return redirect()->route('home');
    }
}
