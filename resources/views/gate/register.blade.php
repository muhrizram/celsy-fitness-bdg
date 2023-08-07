@extends('layout.gate')

@section('container')
    <div class="bg-[url('../../public/img/background.jpg')] bg-cover bg-repeat bg-center">
        <div class="container">
            <div class="flex items-center justify-center">
                <div
                    class="bg-slate-600 rounded-xl text-white shadow-lg md:w-1/2 h-fit py-10 my-10 border-yellow-300 border-2">
                    <div class="w-full">
                        <h1 class="text-4xl text-center mb-3 font-orbitron font-extrabold">
                            <span class="text-yellow-300">Celsy</span> Fitness Center
                        </h1>
                        <h2 class="text-center text-md font-semibold">Daftar</h2>
                        <h2 class="text-sm font-semibold mx-5 my-5">(<span class="text-red-500">*</span>) Wajib diisi</h2>
                        @error('failed')
                            <div class="p-4 m-2 text-sm text-red-700 bg-red-100 rounded-lg text-center" role="alert">
                                <span class="font-medium">Perhatian!</span> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <form action="{{ route('post_register') }}" method="post">
                        @csrf
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/2 px-5 md:px-5">
                                <div class="mb-6">
                                    <label for="name" class="block mb-2 text-sm text-center font-medium"><span
                                            class="text-sm font-semibold text-red-500">*</span> Nama
                                        Lengkap</label>
                                    <input type="text" id="name" name="name"
                                        class="shadow-md border-gray-300 border-2 text-slate-900 text-sm rounded-lg focus:ring-yellow-300 focus:border-yellow-300 block w-full focus:outline-none p-2.5  @if ($errors->has('name')) ring-red-500 border-red-500 @endif"
                                        value="{{ old('name') }}" autocomplete="off" required>
                                    @error('name')
                                        <p class="text-sm text-center mt-2 text-red-500 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                                <div class="mb-6">
                                    <label for="username" class="block mb-2 text-sm text-center font-medium"><span
                                            class="text-sm font-semibold text-red-500">*</span> Nama
                                        Pengguna</label>
                                    <input type="text" id="username" name="username"
                                        class="shadow-md border-gray-300 border-2 text-slate-900 text-sm rounded-lg focus:ring-yellow-300 focus:border-yellow-300 block w-full focus:outline-none p-2.5  @if ($errors->has('username')) ring-red-500 border-red-500 @endif"
                                        value="{{ old('username') }}" autocomplete="off" required>
                                    @error('username')
                                        <p class="text-sm text-center mt-2 text-red-500 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-5 md:px-5">
                                <div class="mb-6">
                                    <label for="email" class="block mb-2 text-sm text-center font-medium"><span
                                            class="text-sm font-semibold text-red-500">*</span> Email</label>
                                    <input type="email" id="email" name="email"
                                        class="shadow-md border-gray-300 border-2 text-slate-900 text-sm rounded-lg focus:ring-yellow-300 focus:border-yellow-300 block w-full focus:outline-none p-2.5  @if ($errors->has('email')) ring-red-500 border-red-500 @endif"
                                        placeholder="nama@email.com" value="{{ old('email') }}" autocomplete="off"
                                        required>
                                    @error('email')
                                        <p class="text-sm text-center mt-2 text-red-500 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                                <div class="mb-6" x-data="{ show: true }">
                                    <label for="password" class="block mb-2 text-sm text-center font-medium"><span
                                            class="text-sm font-semibold text-red-500">*</span> Kata
                                        Sandi</label>
                                    <div class="relative">
                                        <input :type="show ? 'password' : 'text'" id="password" id="password"
                                            name="password"
                                            class="shadow-md border-gray-300 border-2 text-slate-900 text-sm rounded-lg focus:ring-yellow-300 focus:border-yellow-300 block w-full focus:outline-none p-2.5  @if ($errors->has('password')) ring-red-500 border-red-500 @endif"
                                            required>
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

                                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                                :class="{ 'hidden': !show, 'block': show }"
                                                xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                                <path fill="currentColor"
                                                    d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                                </path>
                                            </svg>

                                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                                :class="{ 'block': !show, 'hidden': show }"
                                                xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                                <path fill="currentColor"
                                                    d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                                </path>
                                            </svg>

                                        </div>
                                    </div>
                                    @error('password')
                                        <p class="text-sm text-center mt-2 text-red-500 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                            </div>
                            <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                                <div class="mb-6" x-data="{ show: true }">
                                    <label for="password_confirmation"
                                        class="block mb-2 text-sm text-center font-medium"><span
                                            class="text-sm font-semibold text-red-500">*</span> Konfirmasi Kata
                                        Sandi</label>
                                    <div class="relative">
                                        <input :type="show ? 'password' : 'text'" id="password" id="password_confirmation"
                                            name="password_confirmation"
                                            class="shadow-md border-gray-300 border-2 text-slate-900 text-sm rounded-lg focus:ring-yellow-300 focus:border-yellow-300 block w-full focus:outline-none p-2.5 @if ($errors->has('password')) ring-red-500 border-red-500 @endif"
                                            required>
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

                                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                                :class="{ 'hidden': !show, 'block': show }"
                                                xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                                <path fill="currentColor"
                                                    d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                                </path>
                                            </svg>

                                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                                :class="{ 'block': !show, 'hidden': show }"
                                                xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                                <path fill="currentColor"
                                                    d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                                </path>
                                            </svg>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-8 h-px bg-yellow-300 border-0">
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/2 px-5 md:px-5">
                                <p class="mb-3 text-center"><span class="text-sm font-semibold text-red-500">*</span>
                                    Berapa Tinggi Badanmu?</p>
                            </div>
                            <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                                <input type="number" id="current_height" name="current_height"
                                    class="shadow-md border-gray-300 border-2 text-slate-900 text-sm rounded-lg focus:ring-yellow-300 focus:border-yellow-300 block w-1/2 mx-auto p-2.5 @if ($errors->has('current_height')) ring-red-500 border-red-500 @endif"
                                    placeholder="CM" value="{{ old('current_height') }}" required>
                                @error('current_height')
                                    <p class="text-sm text-center mt-2 text-red-500 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap my-8">
                            <div class="w-full md:w-1/2 px-5 md:px-5">
                                <p class="mb-3 text-center"><span class="text-sm font-semibold text-red-500">*</span>
                                    Berapa Berat Badanmu?</p>
                            </div>
                            <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                                <input type="number" id="current_weight" name="current_weight"
                                    class="shadow-md border-gray-300 border-2 text-slate-900 text-sm rounded-lg focus:ring-yellow-300 focus:border-yellow-300 block w-1/2 mx-auto p-2.5  @if ($errors->has('current_weight')) ring-red-500 border-red-500 @endif"
                                    placeholder="KG" value="{{ old('current_weight') }}" required>
                                @error('current_weight')
                                    <p class="text-sm text-center mt-2 text-red-500 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="level" value="1">
                        <hr class="my-8 h-px bg-yellow-300 border-0">
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/2 px-5 md:px-5">
                                <p class="mb-3 text-center"><span class="text-sm font-semibold text-red-500">*</span> Apa
                                    sasaranmu?</p>
                            </div>
                            <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                                <div class="flex mb-2">
                                    <input id="turun" type="radio" value="turun" name="target"
                                        class="radio-btn" {{ old('target') == 'turun' ? 'checked' : '' }}>
                                    <label for="turun" class="ml-2 text-sm font-medium text-white">Turunkan Berat
                                        Badan</label>
                                </div>
                                <div class="flex mb-2">
                                    <input id="jaga" type="radio" value="jaga" name="target"
                                        class="radio-btn" {{ old('target') == 'jaga' ? 'checked' : '' }}>
                                    <label for="jaga" class="ml-2 text-sm font-medium text-white">Jaga Berat
                                        Badan</label>
                                </div>
                                <div class="flex mb-2">
                                    <input id="naik" type="radio" value="naik" name="target"
                                        class="radio-btn" {{ old('target') == 'naik' ? 'checked' : '' }}>
                                    <label for="naik" class="ml-2 text-sm font-medium text-white">Tambah Berat
                                        Badan</label>
                                </div>
                            </div>
                            @error('target')
                                <p class="text-sm mx-auto mt-2 text-red-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <hr class="my-8 h-px bg-yellow-300 border-0">
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/2 px-5 md:px-5">
                                <p class="mb-3 text-center"><span class="text-sm font-semibold text-red-500">*</span>
                                    Seberapa aktifkah dirimu?</p>
                            </div>
                            <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                                <div class="flex">
                                    <div class="flex items-center h-5">
                                        <input id="helper-radio" aria-describedby="helper-radio-text" type="radio"
                                            value="tidakterlalu" class="radio-btn" name="liveliness" {{ old('liveliness') == 'tidakterlalu' ? 'checked' : '' }}>
                                    </div>
                                    <div class="ml-2 text-sm">
                                        <label for="helper-radio" class="font-medium text-white">Tidak
                                            Terlalu Aktif</label>
                                        <p id="helper-radio-text" class="text-xs font-normal text-yellow-300">
                                            Hampir seharian penuh duduk (cth, teller bank, kerja kantoran)
                                        </p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex items-center h-5">
                                        <input id="helper-radio" aria-describedby="helper-radio-text" type="radio"
                                            value="agak" class="radio-btn" name="liveliness" {{ old('liveliness') == 'agak' ? 'checked' : '' }}>
                                    </div>
                                    <div class="ml-2 text-sm">
                                        <label for="helper-radio" class="font-medium text-white">Agak
                                            Aktif</label>
                                        <p id="helper-radio-text" class="text-xs font-normal text-yellow-300">
                                            Menghabiskan sebagian hari berdiri (misalnya, guru, penjual)
                                        </p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex items-center h-5">
                                        <input id="helper-radio" aria-describedby="helper-radio-text" type="radio"
                                            value="aktif" class="radio-btn" name="liveliness" {{ old('liveliness') == 'aktif' ? 'checked' : '' }}>
                                    </div>
                                    <div class="ml-2 text-sm">
                                        <label for="helper-radio" class="font-medium text-white">Aktif</label>
                                        <p id="helper-radio-text" class="text-xs font-normal text-yellow-300">
                                            Menghabiskan sebagian hari dengan beraktifitas fisik (misalnya,
                                            pramusaji, tukang pos)
                                        </p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex items-center h-5">
                                        <input id="helper-radio" aria-describedby="helper-radio-text" type="radio"
                                            value="sangat" class="radio-btn" name="liveliness" {{ old('liveliness') == 'sangat' ? 'checked' : '' }}>
                                    </div>
                                    <div class="ml-2 text-sm">
                                        <label for="helper-radio" class="font-medium text-white">Sangat
                                            Aktif</label>
                                        <p id="helper-radio-text" class="text-xs font-normal text-yellow-300">
                                            Menghabiskan hampir sepanjang hari melakukan aktifitas fisik
                                            yang berat (misalnya, pengirim pesan sepeda, tukang kayu)
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @error('liveliness')
                                <p class="text-sm mx-auto mt-2 text-red-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <hr class="my-8 h-px bg-yellow-300 border-0">
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/2 px-5 md:px-5">
                                <p class="mb-3 text-center"><span class="text-sm font-semibold text-red-500">*</span>
                                    Jenis Kelamin</p>
                            </div>
                            <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                                <select id="gender" name="gender"
                                    class="shadow-md border-gray-300 border-2 text-slate-900 text-sm rounded-lg focus:ring-yellow-300 focus:border-yellow-300 block w-1/2 mx-auto p-2.5  @if ($errors->has('gender')) ring-red-500 border-red-500 @endif">
                                    <option value="l" {{ old('gender') == 'l' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="p" {{ old('gender') == 'p' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('gender')
                                    <p class="text-sm text-center mt-2 text-red-500 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap my-8">
                            <div class="w-full md:w-1/2 px-5 md:px-5">
                                <p class="mb-3 text-center"><span class="text-sm font-semibold text-red-500">*</span>
                                    Tanggal Lahir</p>
                            </div>
                            <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                                <div class="relative">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input datepicker datepicker-format="yyyy-mm-dd" type="text" name="date_of_birth"
                                        class="shadow-md border-gray-300 border-2 text-slate-900 text-sm rounded-lg focus:ring-yellow-300 focus:border-yellow-300 block w-full focus:outline-none pl-10  @if ($errors->has('date_of_birth')) ring-red-500 border-red-500 @endif"
                                        placeholder="Select date" value="{{ old('date_of_birth') }}" autocomplete="off">
                                </div>
                                @error('date_of_birth')
                                    <p class="text-sm text-center mt-2 text-red-500 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div id="labelSasar" class="hidden">
                            <hr class="my-8 h-px bg-yellow-300 border-0">
                            <div class="flex flex-wrap">
                                <div class="w-full md:w-1/2 px-5 md:px-5">
                                    <p class="mb-3 text-centera align-middle">Berapa Berat Badan sasaranmu?</p>
                                </div>
                                <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                                    <input type="number" id="target_weight" name="target_weight"  value="{{ old('target_weight') }}" class="shadow-md border-gray-300 border-2 text-slate-900 text-sm rounded-lg focus:ring-yellow-300 focus:border-yellow-300 block w-1/2 mx-auto p-2.5 @if ($errors->has('target_weight')) ring-red-500 border-red-500 @endif"
                                        placeholder="KG">
                                    @error('target_weight')
                                        <p class="text-sm text-center mt-2 text-red-500 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-wrap my-8">
                                <div class="w-full md:w-1/2 px-5 md:px-5">
                                    <p class="text-center" aria-describedby="helper-sasarminggu">Apa sasaran
                                        mingguanmu?</p>
                                    <p id="helper-sasarminggu" class="text-xs font-normal text-yellow-300 text-center">
                                        Jangan risau, kamu bisa mengubahnya nanti
                                    </p>
                                </div>
                                <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                                    <div class="flex mb-2">
                                        <input id="turunseperempat" type="radio" value="0.25" name="weekly_target"
                                            class="radio-btn" {{ old('weekly_target') == 0.25 ? 'checked' : '' }}>
                                        <label for="turunseperempat" class="ml-2 text-sm font-medium text-white"><span
                                                id="ket1">Turun</span> 0,25 kg
                                            per minggu</label>
                                    </div>
                                    <div class="flex mb-2">
                                        <div class="flex items-center h-5">
                                            <input id="turunsetengah" aria-describedby="helper-radio-text" type="radio"
                                                value="0.5" class="radio-btn" name="weekly_target" {{ old('weekly_target') == 0.5 ? 'checked' : '' }}>
                                        </div>
                                        <div class="ml-2 text-sm">
                                            <label for="turunsetengah" class="font-medium text-white"><span
                                                    id="ket2">Turun</span> 0,5 kg per
                                                minggu</label>
                                            <p id="turunsetengah-text" class="text-xs font-normal text-yellow-300">
                                                Disarankan
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex mb-2">
                                        <input id="turuntigaperempat" type="radio" value="0.75" name="weekly_target"
                                            class="radio-btn" {{ old('weekly_target') == 0.75 ? 'checked' : '' }}>
                                        <label for="turuntigaperempat" class="ml-2 text-sm font-medium text-white"><span
                                                id="ket3">Turun</span> 0,75
                                            kg per minggu</label>
                                    </div>
                                    <div class="flex mb-2">
                                        <input id="turunsatu" type="radio" value="1" name="weekly_target"
                                            class="radio-btn" {{ old('weekly_target') == 1 ? 'checked' : '' }}>
                                        <label for="turunsatu" class="ml-2 text-sm font-medium text-white"><span
                                                id="ket4">Turun</span> 1 kg per
                                            minggu</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid w-full place-items-center">
                            <button type="submit"
                                class="border bg-yellow-300 px-3 py-2 rounded-xl font-bold mb-3 text-sm hover:bg-yellow-500">Daftar</button>
                            <h2 class="text-center text-sm font-semibold">Sudah punya akun? <a href="/login"
                                    class="text-yellow-300 hover:underline">Masuk</a>
                            </h2>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite('node_modules/flowbite/dist/datepicker.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("input[name=target]").change(function() {
                [...]
                //localStorage:
                localStorage.setItem("option", value);
            });
            //localStorage:
            var itemValue = localStorage.getItem("option");
            if (itemValue !== null) {

                $("input[value=\"" + itemValue + "\"]").change();
            }
        });
    </script>

    <script>
        var toggleElements = function() {
            if ($("#turun").is(':checked')) {
                $("#labelSasar").show();
                $('#ket1').text("Turun");
                $('#ket2').text("Turun");
                $('#ket3').text("Turun");
                $('#ket4').text("Turun");
            } else if ($("#naik").is(':checked')) {
                $("#labelSasar").show();
                $('#ket1').text("Naik");
                $('#ket2').text("Naik");
                $('#ket3').text("Naik");
                $('#ket4').text("Naik");
            } else {
                $("#labelSasar").hide();
            }
        };

        // set the handler
        $("input[name=target]").on('change', toggleElements);

        // execute the function when the page loads
        $(document).ready(toggleElements);
    </script>
@endpush
