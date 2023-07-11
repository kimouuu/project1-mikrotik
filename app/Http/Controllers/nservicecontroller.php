<?php

namespace App\Http\Controllers;

use App\Models\Nservice;
use Illuminate\Http\Request;

class NserviceController extends Controller
{
    public function index()
    {
        $nservice = Nservice::all();
        return view('nservice.index', [
            'nservice' => $nservice
        ]);
    }

    public function create()
    {
        return view('nservice.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service' => 'required',
        ]);

        Nservice::create($request->all());

        return redirect()->route('nservice.index')->with('success', 'nservices created successfully.');
    }

    public function edit($id)
    {

        $nservice = Nservice::find($id);
        if (!$nservice) return redirect()->route('nservice.index');
        return view('nservice.edit', [
            'nservice' => $nservice
        ]);
    }

    public function update(Request $request, Nservice $nservice)
    {
        $request->validate([
            'service' => 'required',
        ]);

        $nservice->update($request->all());

        return redirect()->route('nservice.index')->with('success', 'nservices updated successfully.');
    }

    public function show()
    {
    }
    public function destroy(Nservice $nservice)
    {
        $nservice->delete();

        return redirect()->route('nservice.index')->with('success', 'nservices deleted successfully.');
    }
}
