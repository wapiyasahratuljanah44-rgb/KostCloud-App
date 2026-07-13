<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Room;
use App\Models\Tenant;
use App\Models\Booking;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $userId = auth()->id();

        $query = Property::where('user_id', $userId);

        if ($keyword) {
            $query->where('name', 'like', "%{$keyword}%");
        }

        $properties = $query->latest()->paginate(10);

        $statistics = [
            'total' => Property::where('user_id', $userId)->count(),
            'average' => Property::where('user_id', $userId)->avg('harga') ?? 0,
            'minimum' => Property::where('user_id', $userId)->min('harga') ?? 0,
            'maximum' => Property::where('user_id', $userId)->max('harga') ?? 0,
            'rooms' => Room::whereHas('property', fn ($q) => $q->where('user_id', $userId))->count(),
            'tenants' => Tenant::count(),
            'bookings' => Booking::whereHas('room.property', fn ($q) => $q->where('user_id', $userId))->count(),
        ];

        return view('kost.index', compact(
            'properties',
            'statistics',
            'keyword'
        ));
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

        return redirect()->route('dashboard')
            ->with('success', 'Data kost berhasil ditambahkan.');
    }

    public function show($id)
    {
        $property = Property::where('user_id', auth()->id())
            ->findOrFail($id);

        return view('kost.show', compact('property'));
    }

    public function edit($id)
    {
        $property = Property::where('user_id', auth()->id())
            ->findOrFail($id);

        return view('kost.edit', compact('property'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'harga' => 'required|numeric|min:0',
        ]);

        $property = Property::where('user_id', auth()->id())
            ->findOrFail($id);

        $property->update([
            'name' => $request->name,
            'address' => $request->address,
            'harga' => $request->harga,
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Data kost berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $property = Property::where('user_id', auth()->id())
            ->findOrFail($id);

        $property->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Data kost berhasil dihapus.');
    }
}