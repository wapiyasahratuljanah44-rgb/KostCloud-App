@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-xl shadow-lg p-8">

        <h1 class="text-2xl font-bold text-yellow-600 mb-6">
            Edit Data Kost
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

        <form action="{{ route('properties.update',$property->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="block font-semibold mb-2">

                    Nama Kost

                </label>

                <input
                    type="text"
                    name="name"
                    class="w-full border rounded-lg px-4 py-3"
                    value="{{ old('name',$property->name) }}"
                >

            </div>

            <div class="mb-4">

                <label class="block font-semibold mb-2">

                    Alamat

                </label>

                <textarea
                    name="address"
                    rows="4"
                    class="w-full border rounded-lg px-4 py-3"
                >{{ old('address',$property->address) }}</textarea>

            </div>

            <div class="mb-6">

                <label class="block font-semibold mb-2">

                    Harga

                </label>

                <input
                    type="number"
                    name="harga"
                    class="w-full border rounded-lg px-4 py-3"
                    value="{{ old('harga',$property->harga) }}"
                >

            </div>

            <div class="flex gap-3">

                <button
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-lg">

                    Update Data

                </button>

                <a href="{{ route('dashboard') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection