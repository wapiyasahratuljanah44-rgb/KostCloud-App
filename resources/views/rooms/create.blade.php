@extends('layouts.app')

@section('content')
<div class="max-w-xl bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
    <h3 class="text-lg font-bold text-slate-900 mb-4">Tambah Kamar Baru</h3>

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl mb-4 text-sm">
            <ul class="list-disc ml-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($properties->isEmpty())
        <div class="bg-amber-50 border border-amber-200 text-amber-700 p-4 rounded-xl text-sm">
            Anda belum punya properti/kost. Silakan tambah properti dulu di menu Manajemen Kost.
        </div>
    @else
    <form action="{{ route('rooms.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Properti / Kost</label>
            <select name="property_id" required class="w-full p-3 border border-slate-200 rounded-xl text-sm bg-slate-50 focus:outline-blue-500">
                <option value="">-- Pilih Properti --</option>
                @foreach($properties as $property)
                    <option value="{{ $property->id }}" {{ old('property_id') == $property->id ? 'selected' : '' }}>{{ $property->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Nomor Kamar</label>
            <input type="text" name="room_number" value="{{ old('room_number') }}" placeholder="Contoh: Kamar 01" required class="w-full p-3 border border-slate-200 rounded-xl text-sm bg-slate-50 focus:outline-blue-500">
        </div>
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Status</label>
            <select name="status" required class="w-full p-3 border border-slate-200 rounded-xl text-sm bg-slate-50 focus:outline-blue-500">
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                <option value="occupied" {{ old('status') == 'occupied' ? 'selected' : '' }}>Terisi</option>
            </select>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="flex-1 bg-blue-600 text-white p-3 rounded-xl text-sm font-bold shadow-lg shadow-blue-500/20 hover:bg-blue-700 transition">
                Simpan Kamar
            </button>
            <a href="{{ route('rooms.index') }}" class="px-5 py-3 bg-slate-200 text-slate-700 rounded-xl text-sm font-semibold hover:bg-slate-300 transition">Batal</a>
        </div>
    </form>
    @endif
</div>
@endsection
