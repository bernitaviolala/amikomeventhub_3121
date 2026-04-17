@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Manajemen Kategori</h1>

    <!-- Tombol Tambah -->
    <button class="bg-blue-500 text-white px-4 py-2 rounded mb-4 hover:bg-blue-600">
        + Tambah Kategori
    </button>

    <!-- Tabel Kategori -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama Kategori</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data dummy dulu -->
                <tr class="border-t">
                    <td class="px-4 py-2">1</td>
                    <td class="px-4 py-2">Seminar</td>
                    <td class="px-4 py-2">
                        <button class="bg-yellow-400 px-3 py-1 rounded text-white hover:bg-yellow-500">
                            Edit
                        </button>
                        <button class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">
                            Hapus
                        </button>
                    </td>
                </tr>

                <tr class="border-t">
                    <td class="px-4 py-2">2</td>
                    <td class="px-4 py-2">Konser</td>
                    <td class="px-4 py-2">
                        <button class="bg-yellow-400 px-3 py-1 rounded text-white">Edit</button>
                        <button class="bg-red-500 px-3 py-1 rounded text-white">Hapus</button>
                    </td>
                </tr>

                <tr class="border-t">
                    <td class="px-4 py-2">3</td>
                    <td class="px-4 py-2">Workshop</td>
                    <td class="px-4 py-2">
                        <button class="bg-yellow-400 px-3 py-1 rounded text-white">Edit</button>
                        <button class="bg-red-500 px-3 py-1 rounded text-white">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
