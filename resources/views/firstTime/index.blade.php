@extends('layout.main')

@section('container')
    <div class="bg-[url('../../public/img/background.jpg')] bg-cover bg-repeat bg-center">
        <div class="container">
            <div class="flex items-center justify-center h-screen">
                <div
                    class="bg-slate-600 rounded-xl text-white shadow-lg lg:w-1/2 w-fit h-fit py-10 my-10 border-yellow-300 border-2">
                    <div class="w-full mb-5 md:px-10">
                        <h1 class="text-4xl text-center mb-3 font-orbitron font-extrabold">
                            <span class="text-yellow-300">Celsy</span> Fitness Centre
                        </h1>
                        <h2 class="text-center text-md font-semibold mb-5">Akun sudah terdaftar</h2>
                        <p class="font-medium text-md px-5">Cara mengaktifkan Akun:</p>
                        <ol class="list-decimal font-medium text-md list-outside px-10 text-justify">
                            <li>Datang ke Celsy Fitness Centre yang berlokasi di:</li>
                            <div class="text-sm text-yellow-300 font-medium bg-slate-800 p-2 rounded-lg">Jl. Rumah Sakit No.52, Pakemitan, Kec.
                                Cinambo, Kota Bandung, Jawa Barat 45474</div>
                            <li>Minta penjaga gym untuk mengaktifkan akunmu sekaligus mendaftarkan membership</li>
                            <li>Selamat berlatih bersama kami</li>
                        </ol>
                        <h1 class="text-4xl text-center my-5 font-extrabold">
                            Sampai jumpa!
                        </h1>
                    </div>

                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <div class="grid w-full place-items-center">
                            <button type="submit"
                                class="border bg-yellow-300 px-3 py-2 rounded-xl font-bold mb-3 text-sm hover:bg-yellow-500">Keluar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
