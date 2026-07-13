<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // Hanya kamar yang berada di properti milik user yang login
    private function ownedRoom($id)
    {
        return Room::whereHas('property', function ($q) {
            $q->where('user_id', auth()->id());
        })->findOrFail($id);
    }

    public function index()
    {
        $rooms = Room::with('property')
            ->whereHas('property', function ($q) {
                $q->where('user_id', auth()->id());
            })
            ->latest()
            ->paginate(10);

        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        $properties = Property::where('user_id', auth()->id())->get();

        return view('rooms.create', compact('properties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'room_number' => 'required|string|max:255',
            'status' => 'required|in:available,occupied',
        ]);

        // Pastikan properti memang milik user yang login
        Property::where('user_id', auth()->id())->findOrFail($request->property_id);

        Room::create([
            'property_id' => $request->property_id,
            'room_number' => $request->room_number,
            'status' => $request->status,
        ]);

        return redirect()->route('rooms.index')
            ->with('success', 'Data kamar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $room = $this->ownedRoom($id);
        $properties = Property::where('user_id', auth()->id())->get();

        return view('rooms.edit', compact('room', 'properties'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'room_number' => 'required|string|max:255',
            'status' => 'required|in:available,occupied',
        ]);

        Property::where('user_id', auth()->id())->findOrFail($request->property_id);

        $room = $this->ownedRoom($id);
        $room->update([
            'property_id' => $request->property_id,
            'room_number' => $request->room_number,
            'status' => $request->status,
        ]);

        return redirect()->route('rooms.index')
            ->with('success', 'Data kamar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->ownedRoom($id)->delete();

        return redirect()->route('rooms.index')
            ->with('success', 'Data kamar berhasil dihapus.');
    }
}
