@extends('dashboard.nav')

@section('content')
    <h1 class="font-bold text-2xl md:pl-64 p-4 text-center">Ubah Gerakan Latihan</h1>
    <div class="md:pl-72 p-4">
        <form action="/manager/gerakan-latihan/{{ $exercise->slug }}" method="post">
            @method('POST')
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium">Nama Latihan</label>
                <input type="text" id="name" name="name"
                    class="shadow-sm border-gray-300 text-slate-900 border-2 text-sm focus:ring-yellow-300 focus:border-yellow-300 p-2.5 rounded-lg @if ($errors->has('name')) ring-red-500 border-red-500 @endif block w-full p-2.5"
                    value="{{ old('name', $exercise->name) }}" autocomplete="off" required>
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
                    <option value="Dada" {{ old('muscle_group', $exercise->muscle_group) == 'Dada' ? 'selected' : '' }}>
                        Dada</option>
                    <option value="Punggung"
                        {{ old('muscle_group', $exercise->muscle_group) == 'Punggung' ? 'selected' : '' }}>Punggung</option>
                    <option value="Bahu" {{ old('muscle_group', $exercise->muscle_group) == 'Bahu' ? 'selected' : '' }}>
                        Bahu</option>
                    <option value="Kaki" {{ old('muscle_group', $exercise->muscle_group) == 'Kaki' ? 'selected' : '' }}>
                        Kaki</option>
                    <option value="Tangan" {{ old('muscle_group', $exercise->muscle_group) == 'Tangan' ? 'selected' : '' }}>
                        Tangan
                    </option>
                    <option value="Kardiovaskular"
                        {{ old('muscle_group', $exercise->muscle_group) == 'Kardiovaskular' ? 'selected' : '' }}>
                        Kardiovaskular
                    </option>
                </select>
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium">Video Gerakan Latihan (Link Video dari Youtube)</label>
                <div class="flex justify-between">
                    <input type="text" id="video_exercise" name="video_exercise"
                        class="shadow-sm border-gray-300 text-slate-900 border-2 text-sm focus:ring-yellow-300 focus:border-yellow-300 p-2.5 rounded-lg @if ($errors->has('video_exercise')) ring-red-500 border-red-500 @endif block w-full p-2.5"
                        value="{{ old('video_exercise', $exercise_video) }}" autocomplete="off">
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
                @if ($exercise->exercise_video)
                    <iframe class="rounded-xl w-full lg:w-72 h-60 mb-5" id="output_video"
                        src="{{ $exercise->exercise_video }}?autoplay=1" allow="autoplay">
                    </iframe>
                @else
                    <iframe class="hidden rounded-xl w-full lg:w-72 h-60 mb-5" id="output_video"
                        src="">
                    </iframe>
                @endif
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-xl">Ubah
                <svg class="inline w-3 h-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M481.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-30.9 28.1c-7.7 7.1-11.4 17.5-10.9 27.9c.1 2.9 .2 5.8 .2 8.8s-.1 5.9-.2 8.8c-.5 10.5 3.1 20.9 10.9 27.9l30.9 28.1c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-39.7-12.6c-10-3.2-20.8-1.1-29.7 4.6c-4.9 3.1-9.9 6.1-15.1 8.7c-9.3 4.8-16.5 13.2-18.8 23.4l-8.9 40.7c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-8.9-40.7c-2.2-10.2-9.5-18.6-18.8-23.4c-5.2-2.7-10.2-5.6-15.1-8.7c-8.8-5.7-19.7-7.8-29.7-4.6L69.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l30.9-28.1c7.7-7.1 11.4-17.5 10.9-27.9c-.1-2.9-.2-5.8-.2-8.8s.1-5.9 .2-8.8c.5-10.5-3.1-20.9-10.9-27.9L8.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l39.7 12.6c10 3.2 20.8 1.1 29.7-4.6c4.9-3.1 9.9-6.1 15.1-8.7c9.3-4.8 16.5-13.2 18.8-23.4l8.9-40.7c2-9.1 9-16.3 18.2-17.8C213.3 1.2 227.5 0 242 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l8.9 40.7c2.2 10.2 9.4 18.6 18.8 23.4c5.2 2.7 10.2 5.6 15.1 8.7c8.8 5.7 19.7 7.7 29.7 4.6l39.7-12.6c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM242 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                </svg></button>
        </form>
        
        <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
            class="inline-block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm mx-5 px-5 py-2.5 text-center shadow-xl">
            Hapus
            <svg class="inline w-3 h-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path
                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
            </svg>
        </button>
        
        <div id="popup-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-hide="popup-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apa kamu yakin untuk
                            menghapus data gerakan latihan ini?
                        </h3>
                        <form action="/manager/gerakan-latihan/{{ $exercise->slug }}/hapus" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Ya, saya yakin
                            </button>
                            <button data-modal-hide="popup-modal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak,
                                batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

            
            var text = link.replace("watch?v=", "embed/");
            output.contentWindow.location.replace(text + "?autoplay=1");
            output.classList.remove("hidden");
        }
    </script>
@endpush
