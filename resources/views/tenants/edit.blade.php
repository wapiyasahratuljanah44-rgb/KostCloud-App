@extends('layouts.app')

@section('content')
<div class="max-w-xl bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
    <h3 class="text-lg font-bold text-slate-900 mb-4">Edit Data Penyewa</h3>

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl mb-4 text-sm">
            <ul class="list-disc ml-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tenants.update', $tenant->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name', $tenant->name) }}" required class="w-full p-3 border border-slate-200 rounded-xl text-sm focus:outline-blue-500 bg-slate-50">
        </div>
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">No. WhatsApp/Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $tenant->phone) }}" required class="w-full p-3 border border-slate-200 rounded-xl text-sm focus:outline-blue-500 bg-slate-50">
        </div>
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">Alamat Email</label>
            <input type="email" name="email" value="{{ old('email', $tenant->email) }}" required class="w-full p-3 border border-slate-200 rounded-xl text-sm focus:outline-blue-500 bg-slate-50">
        </div>
        <div class="flex gap-3">
            <button type="submit" class="flex-1 bg-blue-600 text-white p-3 rounded-xl text-sm font-bold shadow-lg shadow-blue-500/20 hover:bg-blue-700 transition">
                Perbarui Data
            </button>
            <a href="{{ route('tenants.index') }}" class="px-5 py-3 bg-slate-200 text-slate-700 rounded-xl text-sm font-semibold hover:bg-slate-300 transition">Batal</a>
        </div>
    </form>
</div>
@endsection
