<?php

namespace App\Http\Controllers;

use App\Models\Multiro;
use App\Models\Nservice;
use Illuminate\Http\Request;


class MultiroController extends Controller
{
    public function __construct() {

    }

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
    public function connect($multiroId, $service)
    {
        // Ambil data router berdasarkan ID
        $router = Multiro::find($multiroId);

        if (!$router) {
            return redirect()->route('multiro.index')->with('error', 'Router not found.');
        }

        // Di sini, Anda bisa menggunakan nilai $service dan melakukan tindakan sesuai dengan bisnis Anda.
        // Misalnya, Anda dapat menggunakan nilai $service untuk menghubungkan router ke layanan tertentu.
        // Lakukan tindakan yang sesuai untuk melakukan koneksi sesuai dengan ID dan service yang diberikan.
        // Misalnya, Anda dapat menggunakan ID dan service untuk mengidentifikasi router yang ingin terhubung
        // dan melakukan koneksi dengan algoritma atau skenario bisnis yang sesuai.

        // Contoh: Menampilkan pesan bahwa router dengan ID tertentu berhasil terhubung ke layanan tertentu.
        return redirect()->route('login');
    }
}
