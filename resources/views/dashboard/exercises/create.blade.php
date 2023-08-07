@extends('dashboard.nav')

@section('content')
    <h1 class="font-bold text-2xl md:pl-64 p-4 text-center">Tambah Gerakan Latihan</h1>
    <div class="md:pl-72 p-4">
        <form action="/manager/gerakan-latihan/tambah-data" method="post">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium">Nama Latihan</label>
                <input type="text" id="name" name="name"
                    class="shadow-sm border-gray-300 text-slate-900 border-2 text-sm focus:ring-yellow-300 focus:border-yellow-300 p-2.5 rounded-lg @if ($errors->has('name')) ring-red-500 border-red-500 @endif block w-full p-2.5"
                    value="{{ old('name') }}" autocomplete="off" required>
                @error('name')
                    <p class="mt-2 text-sm text-red-500"><span class="font-medium"></span> {{ $message }}
                    </p>
                @enderror
            </div>
            <div>
                <input type="hidden" id="slug" name="slug" value="{{ old('slug') }}">
            </div>
            <div class="flex mb-6">
                <label for="muscle_group" class="block mb-2 text-sm font-medium">Kelompok Otot</label>
                <select id="muscle_group" class="mx-5 makanan rounded-lg w-36" name="muscle_group">
                    <option value="Dada" {{ old('muscle_group') == 'Dada' ? 'selected' : '' }}>Dada</option>
                    <option value="Punggung" {{ old('muscle_group') == 'Punggung' ? 'selected' : '' }}>Punggung</option>
                    <option value="Bahu" {{ old('muscle_group') == 'Bahu' ? 'selected' : '' }}>Bahu</option>
                    <option value="Kaki" {{ old('muscle_group') == 'Kaki' ? 'selected' : '' }}>Kaki</option>
                    <option value="Tangan" {{ old('muscle_group') == 'Tangan' ? 'selected' : '' }}>Tangan
                    </option>
                    <option value="Kardiovaskular" {{ old('muscle_group') == 'Kardiovaskular' ? 'selected' : '' }}>
                        Kardiovaskular
                    </option>
                </select>
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium">Video Gerakan Latihan (Link Video dari Youtube)</label>
                <div class="flex justify-between">
                    <input type="text" id="video_exercise" name="video_exercise"
                        class="shadow-sm border-gray-300 text-slate-900 border-2 text-sm focus:ring-yellow-300 focus:border-yellow-300 p-2.5 rounded-lg @if ($errors->has('video_exercise')) ring-red-500 border-red-500 @endif block w-full p-2.5"
                        value="{{ old('video_exercise') }}" autocomplete="off">
                    <button type="button" onclick="myFunction()"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-xl mx-5">
                        Preview
                    </button>
                </div>
                @error('video_exercise')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6">
                <iframe class="hidden rounded-xl w-full lg:w-72 h-60 mb-5" id="output_video" src="">
                </iframe>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-xl">Tambah
                <svg class="inline w-3 h-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                </svg></button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('keyup', function() {
            fetch('/manager/gerakan-latihan/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        function myFunction() {
            var link = document.getElementById('video_exercise').value;
            var output = document.getElementById('output_video');

            var text = link.replace("watch?v=", "embed/")
            output.src = text+"?autoplay=1";
            output.classList.remove("hidden");
        }
    </script>
@endpush
