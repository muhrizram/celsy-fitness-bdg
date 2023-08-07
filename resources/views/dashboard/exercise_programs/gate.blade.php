@extends('dashboard.nav')

@section('content')
    <h1 class="font-bold text-2xl md:pl-64 p-4 text-center">Program Latihan</h1>
    <div class="md:pl-72 p-4">
        {{-- Content --}}
        <div class="flex flex-wrap lg:justify-center justify-between my-5 w-full h-fit">
            <a href="/manager/program-latihan/push-1"
                class="bg-yellow-300 p-3 font-semibold shadow-xl border-gray-400 rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Push
                1</a>
            <a href="/manager/program-latihan/push-2"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Push
                2</a>
            <a href="/manager/program-latihan/pull-1"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Pull
                1</a>
            <a href="/manager/program-latihan/pull-2"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Pull
                2</a>
            <a href="/manager/program-latihan/leg-1"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Leg
                1</a>
            <a href="/manager/program-latihan/leg-2"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Leg
                2</a>
            <a href="/manager/program-latihan/upper-1"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Upper
                1</a>
            <a href="/manager/program-latihan/upper-2"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Upper
                2</a>
            <a href="/manager/program-latihan/lower-1"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Lower
                1</a>
            <a href="/manager/program-latihan/lower-2"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Lower
                2</a>
            <a href="/manager/program-latihan/full-body-1"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Full
                Body
                1</a>
            <a href="/manager/program-latihan/full-body-2"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Full
                Body
                2</a>
            <a href="/manager/program-latihan/home-push-1"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Home
                Push
                1</a>
            <a href="/manager/program-latihan/home-push-2"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Home
                Push
                2</a>
            <a href="/manager/program-latihan/home-pull-1"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Home
                Pull
                1</a>
            <a href="/manager/program-latihan/home-pull-2"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Home
                Pull
                2</a>
            <a href="/manager/program-latihan/home-leg-1"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Home
                Leg
                1</a>
            <a href="/manager/program-latihan/home-leg-2"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Home
                Leg
                2</a>
            <a href="/manager/program-latihan/home-upper"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Home
                Upper
            </a>
            <a href="/manager/program-latihan/home-full-body-1"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Home
                Full Body
                1</a>
            <a href="/manager/program-latihan/home-full-body-2"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Home
                Full Body
                2</a>
            <a href="/manager/program-latihan/kardio"
                class="bg-yellow-300 p-3 font-semibold rounded-xl hover:bg-yellow-400 hover:text-white group text-slate-900 mx-3 lg:w-fit w-[40%] text-center m-2 h-fit">Kardio</a>
        </div>
        {{-- END Content --}}
    </div>
@endsection
