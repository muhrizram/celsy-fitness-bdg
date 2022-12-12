@extends('nav.nav')

@section('content')
    <div class="basis-11/12 bg-blue-500 grow p-5">
        <h1 class="text-xl font-bold mb-5">Makanan</h1>
        <a href="/makanan/create"
            class="bg-red-500 p-2 rounded-lg shadow-xl hover:ring-1 hover:ring-green-500 hover:border-green-500 hover:border-2">Tambah
            Makanan</a>
        <div class="w-full mt-5 flex flex-wrap">
            @foreach($foods as $food)
                <a href="{{ route('makanan.edit', $food->id) }}"
                    class="flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row md:max-w-xl hover:bg-gray-100 mr-2 mb-2">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                        src="https://source.unsplash.com/800x800?foods" alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $food->name }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Kalori: {{ $food->calory }}
                            Protein: {{ $food->protein }}</p>
                    </div>
                </a>
                @endforeach
                {{ $foods->links() }}
        </div>
    </div>
@endsection
