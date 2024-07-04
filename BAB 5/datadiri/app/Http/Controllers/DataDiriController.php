<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiri;

class DataDiriController extends Controller
{
    public function index()
    {
        $dataDiris = DataDiri::all();
        return view('datadiri.index', compact('dataDiris'));
    }

    public function create()
    {
        return view('datadiri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:datadiri',
            'address' => 'required',
        ]);

        DataDiri::create($request->all());
        return redirect()->route('datadiri.index')->with('success', 'Data diri berhasil disimpan.');
    }
}
