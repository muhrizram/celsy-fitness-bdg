@extends('dashboard.nav')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        trix-toolbar [data-trix-button-group] {
            background-color: #fde047;
        }

        .trix-editor {
            width: 100%;
        }

        .trix-editor h1 {
            font-size: 1.25rem !important;
            line-height: 1.25rem !important;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .trix-editor a:not(.no-underline) {
            text-decoration: underline;
        }

        .trix-editor a:visited {
            color: #1d4ed8;
        }

        .trix-editor ul {
            list-style-type: disc;
            padding-left: 1rem;
        }

        .trix-editor ol {
            list-style-type: decimal;
            padding-left: 1rem;
        }

        .trix-editor pre {
            display: inline-block;
            width: 100%;
            vertical-align: top;
            font-family: monospace;
            font-size: 1.5em;
            padding: 0.5em;
            white-space: pre;
            background-color: #eee;
            overflow-x: auto;
        }

        .trix-editor blockquote {
            border: 0 solid #ccc;
            border-left-width: 0px;
            border-left-width: 0.3em;
            margin-left: 0.3em;
            padding-left: 0.6em;
        }
    </style>
@endpush

@section('content')
    <h1 class="font-bold text-2xl md:pl-64 p-4 text-center">Tambah Makanan</h1>
    <div class="md:pl-72 p-4">
        <form action="/manager/makanan/tambah-data" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium">Nama
                    Makanan</label>
                <input type="text" id="name" name="name"
                    class="shadow-sm border-gray-300 text-slate-900 border-2 text-sm focus:ring-yellow-300 focus:border-yellow-300 p-2.5 rounded-lg @if ($errors->has('name')) ring-red-500 border-red-500 @endif block w-full p-2.5"
                    value="{{ old('name') }}" autocomplete="off" required>
                @error('name')
                    <p class="mt-2 text-sm text-red-500"><span class="font-medium"></span> {{ $message }}
                    </p>
                @enderror
            </div>
            <input type="hidden" id="slug" name="slug" value="{{ old('slug') }}">
            <div class="mb-6">
                <label for="amount" class="block mb-2 text-sm font-medium">Satuan
                    Makanan</label>
                <div class="flex">
                    <input type="number" id="amount " name="amount"
                        class="shadow-sm border-gray-300 text-slate-900 border-2 text-sm focus:ring-yellow-300 focus:border-yellow-300 p-2.5 rounded-l-lg w-1/2 @if ($errors->has('amount')) ring-red-500 border-red-500 @endif"
                        value="{{ old('amount') }}" autocomplete="off" step=".01" required>
                    <select id="unit"
                        class="makanan rounded-r-lg w-36 @if ($errors->has('amount')) ring-red-500 border-red-500 @endif"
                        name="unit">
                        <option value="gram" {{ old('unit') == 'gram' ? 'selected' : '' }}>gram</option>
                        <option value="porsi" {{ old('unit') == 'porsi' ? 'selected' : '' }}>porsi</option>
                        <option value="butir" {{ old('unit') == 'butir' ? 'selected' : '' }}>butir</option>
                        <option value="sendok takar" {{ old('unit') == 'sendok takar' ? 'selected' : '' }}>sendok takar
                        </option>
                        <option value="sendok makan"{{ old('unit') == 'sendok makan' ? 'selected' : '' }}>sendok makan
                        </option>
                        <option value="sendok teh" {{ old('unit') == 'sendok teh' ? 'selected' : '' }}>sendok teh</option>
                        <option value="botol" {{ old('unit') == 'botol' ? 'selected' : '' }}>botol</option>
                    </select>
                </div>
                @error('amount')
                    <p class="mt-2 text-sm text-red-500"><span class="font-medium"></span>
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="calory" class="block mb-2 text-sm font-medium">Kalori (kkal)</label>
                <input type="number" id="calory" name="calory"
                    class="shadow-sm border-gray-300 text-slate-900 border-2 text-sm focus:ring-yellow-300 focus:border-yellow-300 p-2.5 rounded-lg w-full @if ($errors->has('calory')) ring-red-500 border-red-500 @endif"
                    value="{{ old('calory') }}" autocomplete="off" step=".01" required>
                @error('calory')
                    <p class="mt-2 text-sm text-red-500"><span class="font-medium"></span>
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="protein" class="block mb-2 text-sm font-medium">Protein (gr)</label>
                <input type="number" id="protein" name="protein"
                    class="shadow-sm border-gray-300 text-slate-900 border-2 text-sm focus:ring-yellow-300 focus:border-yellow-300 p-2.5 rounded-lg w-full @if ($errors->has('protein')) ring-red-500 border-red-500 @endif"
                    value="{{ old('protein') }}" autocomplete="off" step=".01" required>
                @error('protein')
                    <p class="mt-2 text-sm text-red-500"><span class="font-medium"></span>
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="fat" class="block mb-2 text-sm font-medium">Lemak (gr)</label>
                <input type="number" id="fat" name="fat"
                    class="shadow-sm border-gray-300 text-slate-900 border-2 text-sm focus:ring-yellow-300 focus:border-yellow-300 p-2.5 rounded-lg w-full @if ($errors->has('fat')) ring-red-500 border-red-500 @endif"
                    value="{{ old('fat') }}" autocomplete="off" step=".01" required>
                @error('fat')
                    <p class="mt-2 text-sm text-red-500"><span class="font-medium"></span>
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="carbohydrate" class="block mb-2 text-sm font-medium">Karbohidrat (gr)</label>
                <input type="number" id="carbohydrate" name="carbohydrate"
                    class="shadow-sm border-gray-300 text-slate-900 border-2 text-sm focus:ring-yellow-300 focus:border-yellow-300 p-2.5 rounded-lg w-full @if ($errors->has('carbohydrate')) ring-red-500 border-red-500 @endif"
                    value="{{ old('carbohydrate') }}" autocomplete="off" step=".01" required>
                @error('carbohydrate')
                    <p class="mt-2 text-sm text-red-500"><span class="font-medium"></span>
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="classification" class="block mb-2 text-sm font-medium">Klasifikasi
                    Makanan</label>
                <select id="classification" class="makanan rounded-lg w-1/2" name="classification">
                    <option value="sarapan" {{ old('classification') == 'sarapan' ? 'selected' : '' }}>Sarapan</option>
                    <option value="makan siang" {{ old('classification') == 'makan siang' ? 'selected' : '' }}>Makan Siang
                    </option>
                    <option value="makan malam" {{ old('classification') == 'makan malam' ? 'selected' : '' }}>Makan Malam
                    </option>
                    <option value="snack" {{ old('classification') == 'snack' ? 'selected' : '' }}>
                        Makanan Ringan</option>
                </select>
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium">Upload
                    file</label>
                <input type="file"
                    class="shadow-sm border-gray-300 rounded-lg w-full bg-yellow-200 text-slate-900 border-2 text-sm focus:ring-yellow-300 focus:border-yellow-300 @if ($errors->has('image')) ring-red-500 border-red-500 @endif" accept='image/jpeg , image/jpg, image/gif, image/png'
                    aria-describedby="food_pic_help" name="image" onchange="loadFile(event)">
                @error('image')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6">
                <img src="" id="output_img" class="hidden w-52 h-52 rounded-xl">
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium">Resep Makanan</label>
                <input id="recipe" type="hidden" name="recipe">
                <trix-editor class="trix-editor bg-white text-black focus:border-4 border-yellow-300" input="recipe">
                </trix-editor>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-xl">Tambah
                <svg class="inline w-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                </svg>
            </button>
        </form>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('keyup', function() {
            fetch('/manager/makanan/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        var loadFile = function(event) {
            var output = document.getElementById('output_img');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.classList.remove("hidden");
        }

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>
@endpush
