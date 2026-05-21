@extends('layouts.admin')

@section('content')

<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">
        Manajemen Partner
    </h1>

    {{-- FORM TAMBAH --}}
    <div class="bg-white shadow rounded-lg p-4 mb-6">

        <form action="{{ route('admin.partners.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="grid grid-cols-2 gap-3">

                <input type="text"
                       name="name"
                       placeholder="Nama Partner"
                       class="border rounded px-3 py-2">

                <input type="file"
                       name="logo_url"
                       placeholder="URL Logo"
                       class="border rounded px-3 py-2">

            </div>

            <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded mt-3">

                Simpan
            </button>

        </form>

    </div>

    {{-- SEARCH --}}
    <div class="bg-white p-4 rounded-2xl shadow mb-4">

        <form action="{{ route('admin.partners.index') }}"
            method="GET">

            <div class="flex gap-3">

                <input type="text"
                    name="search"
                    placeholder="Cari partner..."
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
                    <th class="px-4 py-3">Logo</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($partners as $partner)

                <tr class="border-t">

                    <td class="px-4 py-3">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-4 py-3">
                        <img src="{{ asset('storage/' . $partner->logo_url) }}"
     class="w-16 h-16 object-cover rounded">
                    </td>

                    <td class="px-4 py-3">
                        {{ $partner->name }}
                    </td>

                    <td class="px-4 py-3 flex gap-2">

                        <a href="{{ route('admin.partners.edit', $partner->id) }}"
                           class="bg-yellow-400 px-3 py-1 rounded text-white">

                            Edit
                        </a>

                        <form action="{{ route('admin.partners.destroy', $partner->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Yakin hapus data?')"
                                    class="bg-red-500 px-3 py-1 rounded text-white">

                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="4"
                        class="text-center py-4 text-gray-500">

                        Data partner kosong

                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
