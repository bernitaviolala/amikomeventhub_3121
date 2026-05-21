@extends('layouts.admin')

@section('content')

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6">
        Edit Partner
    </h1>

    <div class="bg-white shadow rounded-lg p-6">

        <form action="{{ route('admin.partners.update', $partner->id) }}"
              method="POST"
              enctype="multipart/form-data">


            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="block mb-2">
                    Nama Partner
                </label>

                <input type="text"
                       name="name"
                       value="{{ $partner->name }}"
                       class="border rounded px-3 py-2 w-full">

            </div>

            <div class="mb-4">

                <label class="block mb-2">
                    URL Logo
                </label>

                <input type="file"
                name="logo_url"
                    <img src="{{ asset('storage/' . $partner->logo_url) }}"
        class="w-24 mt-3 rounded"
                class="border rounded px-3 py-2 w-full">

            </div>

            <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded">

                Update
            </button>

        </form>

    </div>

</div>

@endsection
