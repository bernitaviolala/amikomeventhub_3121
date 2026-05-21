@extends('layouts.admin')

@section('content')

<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">
        Manajemen Kategori
    </h1>

    {{-- ALERT SUCCESS --}}


    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-6">

        <h2 class="text-xl font-bold">
            Data Kategori
        </h2>

        <button onclick="document.getElementById('formTambah').classList.toggle('hidden')"
                class="bg-indigo-600 text-white px-4 py-2 rounded-xl font-semibold hover:bg-indigo-700 transition">

            + Tambah Kategori
        </button>

    </div>

    {{-- FORM TAMBAH --}}
    <div id="formTambah"
        class="hidden bg-white shadow-lg rounded-2xl p-6 mb-6 w-full max-w-md">

        <form action="{{ route('admin.categories.store') }}"
            method="POST">

            @csrf

            <div class="mb-4">

                <label class="block mb-2 font-semibold text-gray-700">
                    Nama Kategori
                </label>

                <input type="text"
                    name="name"
                    placeholder="Contoh: Seminar"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <div class="flex justify-end gap-2">

                <button type="button"
                        onclick="document.getElementById('formTambah').classList.add('hidden')"
                        class="px-4 py-2 rounded-xl bg-gray-200 hover:bg-gray-300">

                    Batal
                </button>

                <button type="submit"
                        class="bg-green-500 text-white px-4 py-2 rounded-xl hover:bg-green-600">

                    Simpan
                </button>

            </div>

        </form>

    </div>

            {{-- ERROR VALIDATION --}}
            @error('name')
                <small class="text-red-500">
                    {{ $message }}
                </small>
            @enderror

        </form>

    </div>

    {{-- SEARCH --}}
    <div class="bg-white p-4 rounded-2xl shadow mb-4">

        <form action="{{ route('admin.categories.index') }}"
            method="GET">

            <div class="flex gap-3">

                <input type="text"
                    name="search"
                    placeholder="Cari kategori..."
                    value="{{ request('search') }}"
                    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                <button type="submit"
                        class="bg-indigo-600 text-white px-5 py-2 rounded-xl hover:bg-indigo-700">

                    Cari
                </button>

            </div>

        </form>

    </div>

    {{-- TABEL --}}
    <div class="bg-white shadow rounded-lg overflow-hidden">

        <table class="min-w-full text-left">

            <thead class="bg-gray-100">

                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama Kategori</th>
                    <th class="px-4 py-3">Slug</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($categories as $category)

                <tr class="border-t">

                    <td class="px-4 py-3">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $category->name }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $category->slug }}
                    </td>

                    <td class="px-4 py-3 flex gap-2">

                        {{-- EDIT --}}
                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                           class="bg-yellow-400 px-3 py-1 rounded text-white hover:bg-yellow-500">

                            Edit
                        </a>

                        {{-- DELETE --}}
                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Yakin hapus data?')"
                                    class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">

                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="4"
                        class="text-center px-4 py-4 text-gray-500">

                        Data kategori kosong

                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
