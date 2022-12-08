@extends('layout.main')

@section('container')
    <div class="container">
        <div class="flex items-center justify-center h-screen">
            <div class="flex w-11/12 lg:w-10/12 h-[80%]  rounded-lg shadow-md justify-center items-center">

                <div class="w-full h-full">
                    <ul class="flex flex-wrap text-lg md:text-sm font-medium text-center text-gray-500 border border-yellow-300 rounded-t-lg bg-slate-700"
                        id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                        <li>
                            <button id="kondisiSaatIni-tab" data-tabs-target="#kondisiSaatIni" type="button" role="tab"
                                aria-controls="kondisiSaatIni" aria-selected="true"
                                class="inline-block p-4 text-yellow-300 rounded-tl-lg hover:bg-slate-800">Kondisi Saat
                                Ini</button>
                        </li>
                        <li>
                            <svg class="w-6 h-6 inline-block text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <button id="sasarDanAktif-tab" data-tabs-target="#sasarDanAktif" type="button" role="tab"
                                aria-controls="sasarDanAktif" aria-selected="false"
                                class="inline-block p-4 hover:text-gray-600 hover:bg-slate-800">Sasaran & Tingkat
                                Aktifitas</button>
                        </li>
                        <li>
                            <svg class="w-6 h-6 inline-block text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <button id="mingguan-tab" data-tabs-target="#mingguan" type="button" role="tab"
                                aria-controls="mingguan" aria-selected="false"
                                class="inline-block p-4 hover:text-gray-600 hover:bg-slate-800">Sasaran Minggguan</button>
                        </li>
                    </ul>

                    <div id="defaultTabContent" class="border-l border-r border-yellow-300">
                        <form action="">
                            <div class="hidden p-4 bg-slate-600 md:p-8 text-white" id="kondisiSaatIni" role="tabpanel"
                                aria-labelledby="kondisiSaatIni-tab">
                                <h2 class="mb-3 text-3xl font-extrabold tracking-tight">Selamat
                                    Datang, {{ Auth::user()->name }}!</h2>
                                <p class="mb-3">Kami ingin mengetahui latar belakang dan goals
                                    yang ingin kamu capai.</p>
                                <div class="mx-auto md:w-2/12 w-1/2 ">
                                    <div class="mb-6">
                                        <label for="tbsi" class="block mb-2 text-sm font-medium">Tinggi
                                            Badan</label>
                                        <input type="number" id="tbsi" name="tbsi" class="input" placeholder="CM"
                                            required>
                                    </div>
                                    <div class="mb-6">
                                        <label for="bbsi" class="block mb-2 text-sm font-medium">Berat Badan saat
                                            ini</label>
                                        <input type="number" id="bbsi" name="bbsi" class="input" placeholder="KG"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden p-4 bg-slate-600 md:p-8 text-white" id="sasarDanAktif" role="tabpanel"
                                aria-labelledby="sasarDanAktif-tab">
                                <div class="mx-auto md:w-8/12 w-full">
                                    <div class="grid grid-cols-3 gap-4">
                                        <div>
                                            <p class="mb-3">Apa sasaranmu?</p>
                                        </div>
                                        <div class="col-span-2">
                                            <div class="flex mb-2">
                                                <input id="turunBerat" type="radio" value="turun" name="sasaran"
                                                    class="radio-btn">
                                                <label for="turunBerat"
                                                    class="ml-2 text-sm font-medium text-white">Turunkan Berat
                                                    Badan</label>
                                            </div>
                                            <div class="flex mb-2">
                                                <input id="jagaBerat" type="radio" value="jaga" name="sasaran"
                                                    class="radio-btn">
                                                <label for="jagaBerat"
                                                    class="ml-2 text-sm font-medium text-white">Jaga Berat Badan</label>
                                            </div>
                                            <div class="flex mb-2">
                                                <input id="tambahBerat" type="radio" value="tambah" name="sasaran"
                                                    class="radio-btn">
                                                <label for="tambahBerat"
                                                    class="ml-2 text-sm font-medium text-white">Tambah Berat
                                                    Badan</label>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="mb-3">Seberapa aktifkah dirimu?</p>
                                        </div>
                                        <div class="col-span-2">
                                            <div class="flex">
                                                <div class="flex items-center h-5">
                                                    <input id="helper-radio" aria-describedby="helper-radio-text"
                                                        type="radio" value="" class="radio-btn"
                                                        name="keaktifan">
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
                                                    <input id="helper-radio" aria-describedby="helper-radio-text"
                                                        type="radio" value="" class="radio-btn"
                                                        name="keaktifan">
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
                                                    <input id="helper-radio" aria-describedby="helper-radio-text"
                                                        type="radio" value="" class="radio-btn"
                                                        name="keaktifan">
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
                                                    <input id="helper-radio" aria-describedby="helper-radio-text"
                                                        type="radio" value="" class="radio-btn"
                                                        name="keaktifan">
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
                                </div>
                            </div>
                            <div class="hidden p-4 bg-slate-600 md:p-8 text-white" id="mingguan" role="tabpanel"
                                aria-labelledby="mingguan-tab">
                                <div class="mx-auto md:w-4/12 w-full">
                                    <div class="bg-red-500 grid grid-cols-2 gap-4">
                                        <label for="countries" class="bg-blue-500">
                                            <p class="mb-3">Jenis Kelamin</p>
                                        </label>
                                        <div class="bg-green-500">
                                            <select id="countries" class="input">
                                                <option value="l">Laki-Laki</option>
                                                <option value="p">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="bg-purple-500">
                                            <p class="mb-3">Tanggal Lahir</p>
                                        </div>
                                        <div class="bg-yellow-500">
                                            <div class="relative">
                                                <div
                                                    class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true"
                                                        class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input datepicker datepicker-format="dd/mm/yyyy" type="text"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Select date">
                                            </div>
                                        </div>
                                        <div id="labelSasar" class="hidden">
                                            <label for="bbs">Berat Badan Sasaran</label>
                                            <div class="flex justify-center">
                                                <div class="w-20 mb-6">

                                                    <input type="number" id="bbs" name="bbs" class="input"
                                                        placeholder="KG" required>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="mb-3" aria-describedby="helper-sasarminggu">Apa sasaran
                                                    mingguanmu?</p>
                                                <p id="helper-sasarminggu" class="text-xs font-normal text-yellow-300">
                                                    Jangan risau, kamu bisa mengubahnya nanti
                                                </p>
                                            </div>
                                            <div>
                                                <div class="flex">
                                                    <div class="flex items-center h-5">
                                                        <input id="helper-radio" aria-describedby="helper-radio-text"
                                                            type="radio" value="" class="radio-btn"
                                                            name="sasarminggu">
                                                    </div>
                                                    <div class="ml-2 text-sm">
                                                        <label for="helper-radio" id="labelSasar"
                                                            class="font-medium text-white"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div
                        class="flex justify-center items-center rounded-b-xl w-full bg-slate-700 border p-2 border-yellow-300">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit"
                                class="flex text-white hover:bg-gradient-to-r hover:from-yellow-300 hover:to-yellow-500 focus:ring-2 bg-yellow-300 focus:outline-none focus:ring-yellow-300 shadow-lg font-medium rounded-lg text-sm px-3 py-2 items-center justify-center mr-2 mb-2 ">
                                <svg aria-hidden="true"
                                    class="flex w-8 h-8 pr-2 items-center justify-center transition duration-75 group-hover:text-slate-900 text-white"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                        clip-rule="evenodd"></path>
                                </svg>Sign Out</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
