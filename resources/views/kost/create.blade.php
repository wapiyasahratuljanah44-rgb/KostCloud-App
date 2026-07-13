@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white shadow-lg rounded-xl p-8">

        <h1 class="text-2xl font-bold mb-6 text-blue-700">
            Tambah Data Kost
        </h1>

        @if($errors->any())

            <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded mb-5">

                <ul class="list-disc ml-5">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('properties.store') }}" method="POST">

            @csrf

            <div class="mb-4">

                <label class="block font-semibold mb-2">
                    Nama Kost
                </label>

                <input
                    type="text"
                    name="name"
                    class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500"
                    value="{{ old('name') }}"
                >

            </div>

            <div class="mb-4">

                <label class="block font-semibold mb-2">
                    Alamat
                </label>

                <textarea
                    name="address"
                    rows="4"
                    class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500"
                >{{ old('address') }}</textarea>

            </div>

            <div class="mb-6">

                <label class="block font-semibold mb-2">
                    Harga
                </label>

                <input
                    type="number"
                    name="harga"
                    class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500"
                    value="{{ old('harga') }}"
                >

            </div>

            <div class="flex gap-3">

                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

                    Simpan

                </button>

                <a
                    href="{{ route('dashboard') }}"
                    class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-3 rounded-lg">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection