@extends('layouts.admin')

@section('content')

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6">
        Edit Kategori
    </h1>

    <div class="bg-white shadow rounded-lg p-6">

        <form action="{{ route('admin.categories.update', $category->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="block mb-2 font-semibold">
                    Nama Kategori
                </label>

                <input type="text"
                       name="name"
                       value="{{ $category->name }}"
                       class="border rounded px-3 py-2 w-full">

            </div>

            <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">

                Update
            </button>

            <a href="{{ route('admin.categories.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded">

                Kembali
            </a>

        </form>

    </div>

</div>

@endsection
