@extends('layouts.app')

@section('content')

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex justify-between items-center">
        <div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Properti</p>
            <p class="text-3xl font-black text-slate-900 mt-1">{{ $statistics['total'] }}</p>
            <span class="text-[11px] text-blue-600 font-semibold mt-1 block">✓ Properti Aktif</span>
        </div>
        <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">🏢</div>
    </div>
    
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex justify-between items-center">
        <div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Rata-rata Harga</p>
            <p class="text-2xl font-black text-emerald-600 mt-1">Rp {{ number_format($statistics['average'],0,',','.') }}</p>
            <span class="text-[11px] text-slate-400 mt-1 block">Per bulan</span>
        </div>
        <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl">💰</div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex justify-between items-center">
        <div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Harga Terendah</p>
            <p class="text-2xl font-black text-amber-600 mt-1">Rp {{ number_format($statistics['minimum'],0,',','.') }}</p>
            <span class="text-[11px] text-amber-600 font-medium mt-1 block">★ Ekonomis</span>
        </div>
        <div class="p-3 bg-amber-50 text-amber-600 rounded-xl">📉</div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex justify-between items-center">
        <div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Harga Tertinggi</p>
            <p class="text-2xl font-black text-rose-600 mt-1">Rp {{ number_format($statistics['maximum'],0,',','.') }}</p>
            <span class="text-[11px] text-slate-400 mt-1 block">Eksklusif</span>
        </div>
        <div class="p-3 bg-rose-50 text-rose-600 rounded-xl">📈</div>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
    <a href="{{ route('rooms.index') }}" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex justify-between items-center hover:border-blue-300 transition">
        <div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Kamar</p>
            <p class="text-3xl font-black text-slate-900 mt-1">{{ $statistics['rooms'] }}</p>
            <span class="text-[11px] text-blue-600 font-semibold mt-1 block">Kelola kamar →</span>
        </div>
        <div class="p-3 bg-indigo-50 text-indigo-600 rounded-xl">🔑</div>
    </a>

    <a href="{{ route('tenants.index') }}" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex justify-between items-center hover:border-blue-300 transition">
        <div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Penyewa</p>
            <p class="text-3xl font-black text-slate-900 mt-1">{{ $statistics['tenants'] }}</p>
            <span class="text-[11px] text-blue-600 font-semibold mt-1 block">Kelola penyewa →</span>
        </div>
        <div class="p-3 bg-purple-50 text-purple-600 rounded-xl">👥</div>
    </a>

    <a href="{{ route('bookings.index') }}" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex justify-between items-center hover:border-blue-300 transition">
        <div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Booking</p>
            <p class="text-3xl font-black text-slate-900 mt-1">{{ $statistics['bookings'] }}</p>
            <span class="text-[11px] text-blue-600 font-semibold mt-1 block">Kelola booking →</span>
        </div>
        <div class="p-3 bg-teal-50 text-teal-600 rounded-xl">💳</div>
    </a>
</div>

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="p-6 border-b border-slate-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h3 class="text-lg font-bold text-slate-900">Manajemen Unit Properti</h3>
            <p class="text-xs text-slate-500">Kelola informasi publik, sarana penunjang, dan harga sewa properti.</p>
        </div>
        <a href="{{ route('properties.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium text-xs rounded-xl shadow-sm transition">
            ➕ Tambah Properti
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 text-slate-500 uppercase text-[11px] font-bold border-b border-slate-200">
                    <th class="px-6 py-4">Nama Kost</th>
                    <th class="px-6 py-4">Alamat</th>
                    <th class="px-6 py-4">Harga Bulanan</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-600 bg-white">
                @forelse($properties as $property)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-6 py-4 font-bold text-slate-900">{{ $property->name }}</td>
                    <td class="px-6 py-4 text-xs text-slate-500">{{ $property->address }}</td>
                    <td class="px-6 py-4 font-semibold text-slate-900">Rp {{ number_format($property->harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center gap-2">
                            <a href="{{ route('properties.show',$property->id) }}" class="px-2.5 py-1 bg-slate-100 text-slate-700 rounded-lg text-xs font-medium hover:bg-slate-200 transition">Detail</a>
                            <a href="{{ route('properties.edit',$property->id) }}" class="px-2.5 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-medium hover:bg-blue-100 transition">Edit</a>
                            <form action="{{ route('properties.destroy',$property->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data?')">
                                @csrf @method('DELETE')
                                <button class="px-2.5 py-1 bg-red-50 text-red-600 rounded-lg text-xs font-medium hover:bg-red-100 transition">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-12 text-slate-400 text-xs">Belum ada data properti.</td>
                </tr>
                @endempty
            </tbody>
        </table>
    </div>
</div>

@endsection