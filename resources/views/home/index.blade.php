@extends('layout.main')

@section('container')
    <div class="container">
        <div class="flex items-center justify-center">
            <div class="bg-slate-600 rounded-xl text-white shadow-lg md:w-1/2 h-fit py-10 my-10 border-yellow-300 border-2">
                <div class="w-full mb-10">
                    <h1 class="text-4xl text-center mb-3 font-orbitron font-extrabold">
                        <span class="text-yellow-300">Celsy</span> Fitness Centre
                    </h1>
                    <h2 class="text-center text-md font-semibold">Registrasi Akun</h2>
                </div>

                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-1/2 px-5 md:px-5">
                            <div class="mb-6">
                                <label for="name" class="block mb-2 text-sm text-center font-medium">Nama
                                    Lengkap</label>
                                <input type="text" id="name" name="name" class="input" required>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                            <div class="mb-6">
                                <label for="username" class="block mb-2 text-sm text-center font-medium">Nama
                                    Pengguna</label>
                                <input type="text" id="username" name="username" class="input" required>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 px-5 md:px-5">
                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm text-center font-medium">Email</label>
                                <input type="email" id="email" name="email" class="input"
                                    placeholder="nama@email.com" required>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                            <div class="mb-6">
                                <label for="password" class="block mb-2 text-sm text-center font-medium">Kata
                                    Sandi</label>
                                <input type="password" id="password" name="password" class="input" required>
                            </div>
                        </div>
                    </div>
                    <hr class="my-8 h-px bg-yellow-300 border-0">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-1/2 px-5 md:px-5">
                            <p class="mb-3 text-center">Berapa Tinggi Badanmu?</p>
                        </div>
                        <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                            <input type="number" id="current_height" name="current_height" class="shadow-sm-light border-gray-300 border-2 text-slate-900 text-sm rounded-lg focus:ring-yellow-300 focus:border-yellow-300 block w-1/2 mx-auto p-2.5" placeholder="CM" required>
                        </div>
                    </div>
                    <div class="flex flex-wrap my-8">
                        <div class="w-full md:w-1/2 px-5 md:px-5">
                            <p class="mb-3 text-center">Berapa Berat Badanmu?</p>
                        </div>
                        <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                            <input type="number" id="current_weight" name="current_weight" class="shadow-sm-light border-gray-300 border-2 text-slate-900 text-sm rounded-lg focus:ring-yellow-300 focus:border-yellow-300 block w-1/2 mx-auto p-2.5" placeholder="KG" required>
                        </div>
                    </div>
                    <input type="hidden" name="level" value="1">
                    <hr class="my-8 h-px bg-yellow-300 border-0">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-1/2 px-5 md:px-5">
                            <p class="mb-3 text-center">Apa sasaranmu?</p>
                        </div>
                        <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                            <div class="flex mb-2">
                                <input id="turun" type="radio" value="turun" name="target" class="radio-btn">
                                <label for="turun" class="ml-2 text-sm font-medium text-white">Turunkan Berat
                                    Badan</label>
                            </div>
                            <div class="flex mb-2">
                                <input id="jaga" type="radio" value="jaga" name="target" class="radio-btn">
                                <label for="jaga" class="ml-2 text-sm font-medium text-white">Jaga Berat
                                    Badan</label>
                            </div>
                            <div class="flex mb-2">
                                <input id="naik" type="radio" value="naik" name="target" class="radio-btn">
                                <label for="naik" class="ml-2 text-sm font-medium text-white">Tambah Berat
                                    Badan</label>
                            </div>
                        </div>
                    </div>
                    <hr class="my-8 h-px bg-yellow-300 border-0">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-1/2 px-5 md:px-5">
                            <p class="mb-3 text-center">Seberapa aktifkah dirimu?</p>
                        </div>
                        <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                            <div class="flex">
                                <div class="flex items-center h-5">
                                    <input id="helper-radio" aria-describedby="helper-radio-text" type="radio"
                                        value="tidakterlalu" class="radio-btn" name="liveliness">
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
                                        value="agak" class="radio-btn" name="liveliness">
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
                                        value="aktif" class="radio-btn" name="liveliness">
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
                                        value="sangat" class="radio-btn" name="liveliness">
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
                    </div>
                    <hr class="my-8 h-px bg-yellow-300 border-0">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-1/2 px-5 md:px-5">
                            <p class="mb-3 text-center">Jenis Kelamin</p>
                        </div>
                        <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                            <select id="gender" name="gender" class="input">
                                <option value="l">Laki-Laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-wrap my-8">
                        <div class="w-full md:w-1/2 px-5 md:px-5">
                            <p class="mb-3 text-center">Tanggal Lahir</p>
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
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date">
                            </div>
                        </div>
                    </div>
                    <div id="labelSasarTurun" class="hidden">
                        <hr class="my-8 h-px bg-yellow-300 border-0">
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/2 px-5 md:px-5">
                                <p class="mb-3 text-centera align-middle">Berapa Berat Badan sasaranmu?</p>
                            </div>
                            <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                                <input type="number" id="target_weight" name="target_weight_decrease" class="input" placeholder="KG">
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
                                    <input id="turunseperempat" type="radio" value="0.25" name="wt_decrease"
                                        class="radio-btn">
                                    <label for="turunseperempat" class="ml-2 text-sm font-medium text-white">Turun 0,25 kg
                                        per minggu</label>
                                </div>
                                <div class="flex mb-2">
                                    <div class="flex items-center h-5">
                                        <input id="turunsetengah" aria-describedby="helper-radio-text" type="radio"
                                            value="0.5" class="radio-btn" name="wt_decrease" checked>
                                    </div>
                                    <div class="ml-2 text-sm">
                                        <label for="turunsetengah" class="font-medium text-white">Turun 0,5 kg per
                                            minggu</label>
                                        <p id="turunsetengah-text" class="text-xs font-normal text-yellow-300">
                                            Disarankan
                                        </p>
                                    </div>
                                </div>
                                <div class="flex mb-2">
                                    <input id="turuntigaperempat" type="radio" value="0.5" name="wt_decrease"
                                        class="radio-btn">
                                    <label for="turuntigaperempat" class="ml-2 text-sm font-medium text-white">Turun 0,75
                                        kg per minggu</label>
                                </div>
                                <div class="flex mb-2">
                                    <input id="turunsatu" type="radio" value="1" name="wt_decrease"
                                        class="radio-btn">
                                    <label for="turunsatu" class="ml-2 text-sm font-medium text-white">Turun 1 kg per
                                        minggu</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="labelSasarNaik" class="hidden">
                        <hr class="my-8 h-px bg-yellow-300 border-0">
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/2 px-5 md:px-5">
                                <p class="mb-3 text-centera align-middle">Berapa Berat Badan sasaranmu?</p>
                            </div>
                            <div class="w-full md:w-1/2 px-5 md:pr-5 md:px-0">
                                <input type="number" id="target_weight" name="target_weight_increase" class="input" placeholder="KG">
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
                                    <input id="naikseperempat" type="radio" value="0.25" name="wt_increase"
                                        class="radio-btn">
                                    <label for="naikseperempat" class="ml-2 text-sm font-medium text-white">Naik 0,25 kg
                                        per minggu</label>
                                </div>
                                <div class="flex mb-2">
                                    <div class="flex items-center h-5">
                                        <input id="naiksetengah" aria-describedby="helper-radio-text" type="radio"
                                            value="0.5" class="radio-btn" name="wt_increase" checked>
                                    </div>
                                    <div class="ml-2 text-sm">
                                        <label for="naiksetengah" class="font-medium text-white">Naik 0,5 kg per
                                            minggu</label>
                                        <p id="naiksetengah-text" class="text-xs font-normal text-yellow-300">
                                            Disarankan
                                        </p>
                                    </div>
                                </div>
                                <div class="flex mb-2">
                                    <input id="naiktigaperempat" type="radio" value="0.5" name="wt_increase"
                                        class="radio-btn">
                                    <label for="naiktigaperempat" class="ml-2 text-sm font-medium text-white">Naik 0,75
                                        kg per minggu</label>
                                </div>
                                <div class="flex mb-2">
                                    <input id="naiksatu" type="radio" value="1" name="wt_increase"
                                        class="radio-btn">
                                    <label for="naiksatu" class="ml-2 text-sm font-medium text-white">Naik 1 kg per
                                        minggu</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid w-full place-items-center">
                        <button type="submit"
                            class="border bg-yellow-300 px-3 py-2 rounded-xl font-bold mb-3 text-sm hover:bg-yellow-500">Submit</button>
                        <h2 class="text-center text-sm font-semibold">Sudah punya akun? <a href="{{ route('login') }}"
                                class="text-yellow-300 hover:underline">Login</a>
                        </h2>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
