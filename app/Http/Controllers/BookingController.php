<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\Tenant;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Booking hanya untuk kamar di properti milik user yang login
    private function ownedBooking($id)
    {
        return Booking::whereHas('room.property', function ($q) {
            $q->where('user_id', auth()->id());
        })->findOrFail($id);
    }

    public function index()
    {
        $bookings = Booking::with(['tenant', 'room.property'])
            ->whereHas('room.property', function ($q) {
                $q->where('user_id', auth()->id());
            })
            ->latest()
            ->paginate(10);

        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $tenants = Tenant::orderBy('name')->get();

        // Kamar tersedia milik user yang login
        $rooms = Room::with('property')
            ->where('status', 'available')
            ->whereHas('property', function ($q) {
                $q->where('user_id', auth()->id());
            })
            ->get();

        return view('bookings.create', compact('tenants', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'room_id' => 'required|exists:rooms,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'payment_status' => 'required|in:paid,unpaid',
        ]);

        // Pastikan kamar milik user yang login
        $room = Room::whereHas('property', function ($q) {
            $q->where('user_id', auth()->id());
        })->findOrFail($request->room_id);

        Booking::create($request->only(
            'tenant_id',
            'room_id',
            'start_date',
            'end_date',
            'payment_status'
        ));

        // Tandai kamar jadi terisi
        $room->update(['status' => 'occupied']);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking berhasil dibuat.');
    }

    public function edit($id)
    {
        $booking = $this->ownedBooking($id);
        $tenants = Tenant::orderBy('name')->get();

        // Kamar tersedia + kamar yang sedang dipakai booking ini
        $rooms = Room::with('property')
            ->whereHas('property', function ($q) {
                $q->where('user_id', auth()->id());
            })
            ->where(function ($q) use ($booking) {
                $q->where('status', 'available')
                    ->orWhere('id', $booking->room_id);
            })
            ->get();

        return view('bookings.edit', compact('booking', 'tenants', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $booking = $this->ownedBooking($id);

        $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'room_id' => 'required|exists:rooms,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'payment_status' => 'required|in:paid,unpaid',
        ]);

        // Pastikan kamar baru milik user yang login
        Room::whereHas('property', function ($q) {
            $q->where('user_id', auth()->id());
        })->findOrFail($request->room_id);

        // Jika pindah kamar, bebaskan kamar lama & isi kamar baru
        if ($booking->room_id != $request->room_id) {
            $booking->room?->update(['status' => 'available']);
            Room::find($request->room_id)?->update(['status' => 'occupied']);
        }

        $booking->update($request->only(
            'tenant_id',
            'room_id',
            'start_date',
            'end_date',
            'payment_status'
        ));

        return redirect()->route('bookings.index')
            ->with('success', 'Booking berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $booking = $this->ownedBooking($id);

        // Bebaskan kamar saat booking dihapus (check-out)
        $booking->room?->update(['status' => 'available']);
        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking berhasil dihapus (check-out).');
    }
}
