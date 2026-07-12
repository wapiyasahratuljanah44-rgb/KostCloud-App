@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8">
    <h1 class="text-2xl font-bold mb-6">Profil Saya</h1>

    @if(session('success'))
        <div class="mb-6 rounded-lg bg-green-50 border border-green-200 p-4 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile') }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full rounded border px-3 py-2" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full rounded border px-3 py-2" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Password Baru (opsional)</label>
            <input type="password" name="password" class="w-full rounded border px-3 py-2" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" class="w-full rounded border px-3 py-2" />
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan Profil</button>
            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
