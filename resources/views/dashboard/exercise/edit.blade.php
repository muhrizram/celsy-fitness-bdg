@extends('nav.nav')

@section('content')
    <div class="basis-11/12 bg-blue-500 grow p-5">
        <h1 class="text-xl font-bold mb-5">Latihan</h1>

        <form action="{{ route('exercises.update', $exercise->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Latihan</label>
                <input type="text" id="name" name="name" value="{{ old('name', $exercise->name) }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
            </div>
            <div class="mb-6">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <input type="text" id="category" name="category" value="{{ old('category', $exercise->category) }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required>
            </div>
            <button type="submit"
                class="float-left w-fit text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ubah</button>
        </form>

        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('exercises.destroy', $exercise->id) }}"
            method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="inline-block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm mx-5 px-5 py-2.5 text-center ">Hapus</button>
        </form>

    </div>
@endsection
