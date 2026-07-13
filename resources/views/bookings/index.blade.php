@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h3 class="text-lg font-bold text-slate-900">Transaksi Booking Aktif</h3>
            <p class="text-xs text-slate-500">Log penempatan kamar dan sewa kosan</p>
        </div>
        <a href="{{ route('bookings.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-xl text-sm font-semibold transition flex items-center gap-2">
            🔑 Check-in / Booking Baru
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-200 text-slate-400 text-xs font-semibold uppercase bg-slate-50">
                    <th class="p-4">Penyewa</th>
                    <th class="p-4">Kos & No. Kamar</th>
                    <th class="p-4">Masa Sewa</th>
                    <th class="p-4">Status Bayar</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-slate-100">
                @forelse($bookings as $booking)
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="p-4 font-semibold text-slate-800">{{ $booking->tenant->name ?? '-' }}</td>
                        <td class="p-4 text-slate-600">
                            {{ $booking->room->property->name ?? '-' }} - <span class="font-bold text-blue-600">{{ $booking->room->room_number ?? '-' }}</span>
                        </td>
                        <td class="p-4 text-slate-500 text-xs">
                            📆 {{ $booking->start_date?->format('d M Y') }} s/d {{ $booking->end_date?->format('d M Y') }}
                        </td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $booking->payment_status == 'paid' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                                {{ $booking->payment_status == 'paid' ? 'Lunas' : 'Belum Bayar' }}
                            </span>
                        </td>
                        <td class="p-4 text-center">
                            <div class="flex justify-center items-center gap-2">
                                <a href="{{ route('bookings.edit', $booking->id) }}" class="px-2.5 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-medium hover:bg-blue-100 transition">Edit</a>
                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="inline" onsubmit="return confirm('Check-out / hapus booking ini?')">
                                    @csrf @method('DELETE')
                                    <button class="px-2.5 py-1 bg-red-50 text-red-600 rounded-lg text-xs font-medium hover:bg-red-100 transition">Check-out</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-slate-400">Belum ada transaksi sewa/booking berjalan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $bookings->links() }}
    </div>
</div>
@endsection
