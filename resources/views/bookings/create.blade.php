@extends('layouts.app')

@section('content')
<div class="max-w-xl bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
    <h3 class="text-lg font-bold text-slate-900 mb-4">Form Transaksi Sewa Kamar</h3>

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl mb-4 text-sm">
            <ul class="list-disc ml-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($tenants->isEmpty())
        <div class="bg-amber-50 border border-amber-200 text-amber-700 p-4 rounded-xl text-sm mb-3">
            Belum ada penyewa. Tambahkan penyewa dulu di menu Daftar Penyewa.
        </div>
    @endif
    @if($rooms->isEmpty())
        <div class="bg-amber-50 border border-amber-200 text-amber-700 p-4 rounded-xl text-sm">
            Tidak ada kamar berstatus "Tersedia". Tambahkan kamar atau bebaskan kamar dulu di menu Data Kamar.
        </div>
    @else
    <form action="{{ route('bookings.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Pilih Penyewa</label>
            <select name="tenant_id" required class="w-full p-3 border border-slate-200 rounded-xl text-sm bg-slate-50 focus:outline-blue-500">
                <option value="">-- Pilih Orang --</option>
                @foreach($tenants as $tenant)
                    <option value="{{ $tenant->id }}" {{ old('tenant_id') == $tenant->id ? 'selected' : '' }}>{{ $tenant->name }} ({{ $tenant->phone }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Pilih Kamar Kos Kosong</label>
            <select name="room_id" required class="w-full p-3 border border-slate-200 rounded-xl text-sm bg-slate-50 focus:outline-blue-500">
                <option value="">-- Pilih Unit Kamar Tersedia --</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>{{ $room->property->name }} - {{ $room->room_number }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Mulai Sewa</label>
                <input type="date" name="start_date" value="{{ old('start_date') }}" required class="w-full p-3 border border-slate-200 rounded-xl text-sm bg-slate-50 focus:outline-blue-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Selesai Sewa</label>
                <input type="date" name="end_date" value="{{ old('end_date') }}" required class="w-full p-3 border border-slate-200 rounded-xl text-sm bg-slate-50 focus:outline-blue-500">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Status Pembayaran Pertama</label>
            <select name="payment_status" required class="w-full p-3 border border-slate-200 rounded-xl text-sm bg-slate-50 focus:outline-blue-500">
                <option value="unpaid" {{ old('payment_status') == 'unpaid' ? 'selected' : '' }}>Belum Bayar (Keep Kamar)</option>
                <option value="paid" {{ old('payment_status') == 'paid' ? 'selected' : '' }}>Lunas (Sudah Bayar Kos)</option>
            </select>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="flex-1 bg-blue-600 text-white p-3 rounded-xl text-sm font-bold shadow-lg shadow-blue-500/20 hover:bg-blue-700 transition">
                Konfirmasi Check-In / Booking
            </button>
            <a href="{{ route('bookings.index') }}" class="px-5 py-3 bg-slate-200 text-slate-700 rounded-xl text-sm font-semibold hover:bg-slate-300 transition">Batal</a>
        </div>
    </form>
    @endif
</div>
@endsection
