<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::where('user_id', auth()->id())->get();

        $statistics = [
            'total' => $properties->count(),
            'average' => $properties->avg('harga') ? round($properties->avg('harga'), 0) : 0,
            'minimum' => $properties->min('harga') ?? 0,
            'maximum' => $properties->max('harga') ?? 0,
        ];

        return view('kost.index', compact('properties', 'statistics'));
    }

    public function create()
    {
        return view('kost.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'harga' => 'required|numeric|min:0',
        ]);

        Property::create([
            'name' => $request->name,
            'address' => $request->address,
            'harga' => $request->harga,
            'user_id' => auth()->id(),
        ]);

        return redirect('/dashboard')->with('success', 'Kost berhasil ditambah!');
    }

    public function show($id)
    {
        $property = Property::where('user_id', auth()->id())->findOrFail($id);
        return view('kost.show', compact('property'));
    }

    public function edit($id)
    {
        $property = Property::where('user_id', auth()->id())->findOrFail($id);
        return view('kost.edit', compact('property'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'harga' => 'required|numeric|min:0',
        ]);

        $property = Property::where('user_id', auth()->id())->findOrFail($id);
        $property->update([
            'name' => $request->name,
            'address' => $request->address,
            'harga' => $request->harga,
        ]);

        return redirect('/dashboard')->with('success', 'Kost berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $property = Property::where('user_id', auth()->id())->findOrFail($id);
        $property->delete();

        return redirect('/dashboard')->with('success', 'Kost berhasil dihapus!');
    }
}
