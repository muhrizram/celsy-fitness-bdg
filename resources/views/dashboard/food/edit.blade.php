@extends('nav.nav')

@section('content')
    <div class="basis-11/12 bg-blue-500 grow p-5">
        <h1 class="text-xl font-bold mb-5">Ubah Makanan</h1>

        <form action="{{ route('food.update', $food->id) }}" method="post">
        @csrf
        @method('PUT')
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Makanan</label>
                <input type="text" id="name" name="name" value="{{ old('name', $food->name) }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>
            <div class="mb-6">
                <label for="calory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kalori per 100 gram</label>
                <input type="number" id="calory" name="calory" value="{{ old('calory', $food->calory) }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required>
            </div>
            <div class="mb-6">
                <label for="protein" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Protein per 100 gram</label>
                <input type="number" id="protein" name="protein" value="{{ old('protein', $food->protein) }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required>
            </div>
            <button type="submit"
                class="float-left text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
        </form>

        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('food.destroy', $food->id) }}"
            method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="inline-block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm mx-5 px-5 py-2.5 text-center ">Hapus</button>
        </form>
    </div>
@endsection
