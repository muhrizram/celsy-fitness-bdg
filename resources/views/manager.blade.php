@extends('dashboard.nav')

@section('content')
    <h1 class="font-bold text-2xl md:pl-64 p-4 text-center">Dashboard</h1>
    <div class="flex justify-center items-center flex-wrap md:pl-64 p-4">
        <a href="/manager/makanan">
            <div class="sm:w-56 w-52 bg-yellow-300 text-slate-800 p-5 text-xl font-bold rounded-xl m-5">
                <div class="flex flex-col justify-center items-center">
                    <img src="{{ asset('img/diet.png') }}" class="w-20 h-20" alt="">
                    <p class="text-center">Makanan</p>
                    <p class="text-sm">Jumlah Data: {{ $foods }}</p>
                </div>
            </div>
        </a>
        <a href="/manager/gerakan-latihan">
            <div class="sm:w-56 w-52 bg-yellow-300 text-slate-800 p-5 text-xl font-bold rounded-xl m-5">
                <div class="flex flex-col justify-center items-center">
                    <img src="{{ asset('img/exercise.png') }}" class="w-20 h-20" alt="">
                    <p class="text-center">Gerakan Latihan</p>
                    <p class="text-sm">Jumlah Data: {{ $exercises }}</p>
                </div>
            </div>
        </a>
        <a href="/manager/pengguna-aplikasi">
            <div class="sm:w-56 w-52 bg-yellow-300 text-slate-800 p-5 text-xl font-bold rounded-xl m-5">
                <div class="flex flex-col justify-center items-center">
                    <img src="{{ asset('img/man.png') }}" class="w-20 h-20" alt="">
                    <p class="text-center">Pengguna Aplikasi</p>
                    <p class="text-sm">Jumlah Data: {{ $users }}</p>
                </div>
            </div>
        </a>
    </div>
@endsection
