@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto space-y-8">

    <div>
        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-slate-800 transition">
            ⬅️ Kembali ke Dashboard
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 space-y-6">
            
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="relative h-96 bg-slate-900 flex items-center justify-center overflow-hidden">
                    @if(!empty($property->image))
                        <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->name }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=800&q=80" alt="Placeholder Kamar Kost" class="w-full h-full object-cover opacity-80">
                    @endif
                    
                    <span class="absolute top-4 left-4 bg-emerald-500 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-md">
                        ✓ Tersedia / Aktif
                    </span>
                </div>
                <div class="p-6">
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight">{{ $property->name }}</h1>
                    <p class="text-slate-500 text-sm mt-2 flex items-start gap-2">
                        📍 <span class="leading-relaxed">{{ $property->address }}</span>
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 space-y-6">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900">Ulasan Penghuni Kost</h3>
                        <p class="text-xs text-slate-400">Apa kata mereka yang tinggal di sini?</p>
                    </div>
                    <div class="flex items-center gap-1 bg-amber-50 text-amber-600 px-3 py-1.5 rounded-xl text-sm font-bold">
                        ⭐ 4.8 <span class="text-xs text-slate-400 font-normal">(3 Ulasan)</span>
                    </div>
                </div>

                <div class="divide-y divide-slate-100 space-y-4">
                    
                    <div class="pt-2">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-blue-100 text-blue-600 font-bold rounded-full flex items-center justify-center text-sm">
                                    AM
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-800">Andi Pratama</h4>
                                    <p class="text-[11px] text-slate-400">Mahasiswa • Tinggal 6 Bulan</p>
                                </div>
                            </div>
                            <span class="text-xs text-amber-500 font-medium">⭐⭐⭐⭐⭐</span>
                        </div>
                        <p class="text-slate-600 text-xs mt-2 leading-relaxed">
                            "Kamarnya bersih banget, sirkulasi udara bagus. Pemilik kosnya juga ramah dan kalau ada fasilitas rusak langsung diperbaiki hari itu juga. Recommended!"
                        </p>
                    </div>

                    <div class="pt-4">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-purple-100 text-purple-600 font-bold rounded-full flex items-center justify-center text-sm">
                                    SR
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-800">Siti Rahma</h4>
                                    <p class="text-[11px] text-slate-400">Karyawati • Tinggal 1 Tahun</p>
                                </div>
                            </div>
                            <span class="text-xs text-amber-500 font-medium">⭐⭐⭐⭐⭐</span>
                        </div>
                        <p class="text-slate-600 text-xs mt-2 leading-relaxed">
                            "Lingkungannya tenang, cocok buat yang butuh fokus belajar atau wfh. Cari makan deket, wifi kenceng gak pernah rewel."
                        </p>
                    </div>

                    <div class="pt-4">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-emerald-100 text-emerald-600 font-bold rounded-full flex items-center justify-center text-sm">
                                    RF
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-800">Rian Faisal</h4>
                                    <p class="text-[11px] text-slate-400">Mahasiswa • Tinggal 2 Bulan</p>
                                </div>
                            </div>
                            <span class="text-xs text-amber-500 font-medium">⭐⭐⭐⭐</span>
                        </div>
                        <p class="text-slate-600 text-xs mt-2 leading-relaxed">
                            "Secara keseluruhan oke banget dengan harga segini. Parkiran motor aman ada kanopinya. Cuma token listrik bayar masing-masing ya."
                        </p>
                    </div>

                </div>
            </div>

        </div>

        <div class="space-y-6">
            
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 space-y-6 sticky top-6">
                
                <div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block">Harga Sewa</span>
                    <p class="text-3xl font-black text-emerald-600 mt-1">
                        Rp {{ number_format($property->harga, 0, ',', '.') }}<span class="text-sm text-slate-400 font-normal"> / bulan</span>
                    </p>
                </div>

                <hr class="border-slate-100">

                <div class="space-y-4 text-sm">
                    <div class="flex justify-between">
                        <span class="text-slate-400">ID Unit</span>
                        <span class="font-semibold text-slate-800">#{{ $property->id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-400">Terdaftar</span>
                        <span class="font-semibold text-slate-800">{{ $property->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-400">Update Terakhir</span>
                        <span class="font-semibold text-slate-800">{{ $property->updated_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-400">Kontak Owner</span>
                        <span class="font-semibold text-slate-800">{{ $property->phone ?? '0812-3456-7890' }}</span>
                    </div>
                </div>

                <hr class="border-slate-100">

                <div class="space-y-3">
                    
                    @php
                        // Membersihkan karakter non-angka pada nomor handphone agar valid untuk link wa.me
                        $cleanPhone = preg_replace('/[^0-9]/', '', $property->phone ?? '628123456789');
                        // Pastikan nomor diawali angka 62 (Kode Negara Indonesia) jika user menginputnya pakai 08
                        if (str_starts_with($cleanPhone, '0')) {
                            $cleanPhone = '62' . substr($cleanPhone, 1);
                        }
                    @endphp
                    
                    <a href="https://wa.me/{{ $cleanPhone }}?text=Halo%20Pemilik%20Kost,%20saya%20tertarik%20ingin%20bertanya%20mengenai%20unit%20*{{ urlencode($property->name) }}*%20yang%20beralamat%20di%20{{ urlencode($property->address) }}." 
                       target="_blank" 
                       class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-3 px-4 rounded-xl shadow-sm text-center transition flex items-center justify-center gap-2 text-sm">
                        💬 Hubungi Pemilik via WA
                    </a>

                    <div class="grid grid-cols-2 gap-2 pt-2">
                        <a href="{{ route('properties.edit', $property->id) }}"
                           class="bg-amber-50 hover:bg-amber-100 text-amber-700 border border-amber-200 font-bold py-2.5 px-4 rounded-xl text-center transition text-xs">
                            ✏️ Edit Data
                        </a>
                        
                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus properti ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 font-bold py-2.5 px-4 rounded-xl text-center transition text-xs">
                                🗑️ Hapus Unit
                            </button>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
@endsection