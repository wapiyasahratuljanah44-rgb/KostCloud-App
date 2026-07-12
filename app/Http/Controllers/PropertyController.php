<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();

        return view('kost.index', compact('properties'));
    }

    public function create()
    {
        return view('kost.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'harga' => 'required|numeric',
        ]);

        Property::create($request->only('name', 'address', 'harga'));

        return redirect('/')->with('success', 'Properti berhasil disimpan.');
    }
}