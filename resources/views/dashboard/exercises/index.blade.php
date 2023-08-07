@extends('dashboard.nav')

@section('content')
    <div id="content">
        <h1 class="font-bold text-2xl md:pl-64 p-4 text-center">Gerakan Latihan</h1>
        <div class="md:pl-72 p-4">
            {{-- Header --}}
            <div class="flex flex-wrap md:flex-nowrap mb-5 justify-between items-center w-full">

                {{-- Button Tambah --}}
                <a href="/manager/gerakan-latihan/tambah-data">
                    <div
                        class="bg-yellow-400 text-slate-700 font-semibold p-3 rounded-lg shadow-xl text-center md:text-left hover:ring-1 hover:ring-yellow-500 hover:border-yellow-500 hover:bg-yellow-500 hover:text-white w-full md:w-fit">
                        Tambah
                        Gerakan Latihan
                        <svg class="inline ml-3 w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                        </svg>
                    </div>
                </a>
                {{-- END Button Tambah --}}

                {{-- Section Search --}}
                <div class="w-full flex justify-end relative md:w-fit mt-10 md:mt-0">
                    <form class="w-full flex justify-end" action="/manager/gerakan-latihan">
                        <button type="submit"
                            class="bg-yellow-300 text-yellow-700 hover:text-yellow-300 p-3 hover:bg-yellow-600 absolute left-1 shadow-xl md:-left-14 rounded-full mt-0 mr-4">
                            <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                            </svg>
                        </button>

                        {{-- Search Column --}}
                        <div class="relative z-0 group w-3/4 md:w-full mr-4 md:mr-0 ">
                            <input type="text" name="search" id="search"
                                class="block py-2.5 px-0 w-full text-sm text-yellow-300 bg-transparent border-0 border-b-2 border-yellow-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-400 peer"
                                placeholder=" " value="{{ request('search') }}" />
                            <label for="search"
                                class="peer-focus:font-medium absolute text-sm text-yellow-300 duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-10">Search</label>
                        </div>
                        {{-- END Search Column --}}
                    </form>
                </div>
                {{-- END Section Search --}}

            </div>
            {{-- END Header --}}

            {{-- Content for PC --}}
            <div class="hidden lg:block rounded-md overflow-hidden border-gray-400 shadow-xl">
                <div class="grid grid-cols-7 bg-slate-900 h-14 items-center border-b-4 border-yellow-300">
                    <div class="font-semibold text-center">No</div>
                    <div class="col-span-3 font-semibold">Nama</div>
                    <div class="col-span-3 font-semibold">Kelompok Otot</div>
                </div>
                @forelse($exercises as $exercise)
                    <a href="/manager/gerakan-latihan/{{ $exercise->slug }}/ubah-data">
                        <div class="grid grid-cols-7 items-center h-fit bg-gray-600 hover:bg-slate-800">
                            <div class="text-center">
                                {{ $loop->iteration + $number }}
                            </div>
                            <div class="col-span-3 py-5">{{ $exercise->name }}</div>
                            <div class="col-span-3"><span
                                    class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">{{ $exercise->muscle_group }}
                            </div>
                            <div class="col-span-2">
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="bg-gray-600 font-bold text-center p-3">
                        Data Gerakan Latihan tidak Tersedia.
                    </div>
                @endforelse
            </div>
            {{-- END Content for PC --}}

            {{-- Content for Mobile --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:hidden">
                @forelse($exercises_mobile as $mobile)
                    <a href="/manager/gerakan-latihan/{{ $exercise->slug }}/ubah-data">
                        <div
                            class="bg-yellow-300 space-y-3 p-4 rounded-lg shadow hover:bg-yellow-400 hover:text-white text-slate-800 group font-semibold">
                            <div class="flex w-full justify-start items-center">
                                <div class="px-5">
                                    {{ $loop->iteration + $number }}
                                </div>
                                <div class="flex flex-col justify-between">
                                    <h1 class="border-b border-slate-800 group-hover:border-white">
                                        {{ $mobile->name }}</h1>
                                    <h1 class="border-b border-slate-800 group-hover:border-white">
                                        {{ $mobile->muscle_group }}</h1>
                                    <h1 class="border-b border-slate-800 group-hover:border-white">
                                    </h1>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="font-bold">
                            Data Gerakan Latihan tidak Tersedia.
                        </div>
                    </a>
                @endforelse
            </div>
            {{-- END Content for Mobile --}}

            {{-- Pagination --}}
            <div class="my-5 w-fit mx-auto">
                {{ $exercises->links('pagination::tailwind') }}
            </div>
            {{-- END Pagination --}}

            {{-- Section Modals CRUD --}}
            @if (Session::has('success') || Session::has('info') || Session::has('danger'))
                <div class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-center md:items-center pt-10 md:pt-0"
                    id="init_modal">
                    <div class="opacity-0 transform relative -translate-y-full scale-150  relative w-10/12 sm:w-1/2 h-fit md:h-fit bg-white rounded-xl shadow-lg transition-opacity transition-transform duration-1000"
                        id="modal">
                        {{-- Main Modal  --}}
                        <div class="p-5 text-right relative">
                            <button type="button"
                                class="absolute z-10 right-5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm"
                                id="close_modal" onclick="openModal(false)">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="absolute -top-5 md:-top-14 w-full">
                            @if (Session::has('info'))
                                <svg class="shadow-xl w-20 md:w-28 h-20 md:h-28 left-0 right-0 mx-auto bg-blue-500 rounded-full text-white p-5"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M481.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-30.9 28.1c-7.7 7.1-11.4 17.5-10.9 27.9c.1 2.9 .2 5.8 .2 8.8s-.1 5.9-.2 8.8c-.5 10.5 3.1 20.9 10.9 27.9l30.9 28.1c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-39.7-12.6c-10-3.2-20.8-1.1-29.7 4.6c-4.9 3.1-9.9 6.1-15.1 8.7c-9.3 4.8-16.5 13.2-18.8 23.4l-8.9 40.7c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-8.9-40.7c-2.2-10.2-9.5-18.6-18.8-23.4c-5.2-2.7-10.2-5.6-15.1-8.7c-8.8-5.7-19.7-7.8-29.7-4.6L69.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l30.9-28.1c7.7-7.1 11.4-17.5 10.9-27.9c-.1-2.9-.2-5.8-.2-8.8s.1-5.9 .2-8.8c.5-10.5-3.1-20.9-10.9-27.9L8.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l39.7 12.6c10 3.2 20.8 1.1 29.7-4.6c4.9-3.1 9.9-6.1 15.1-8.7c9.3-4.8 16.5-13.2 18.8-23.4l8.9-40.7c2-9.1 9-16.3 18.2-17.8C213.3 1.2 227.5 0 242 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l8.9 40.7c2.2 10.2 9.4 18.6 18.8 23.4c5.2 2.7 10.2 5.6 15.1 8.7c8.8 5.7 19.7 7.7 29.7 4.6l39.7-12.6c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM242 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                                </svg>
                            @elseif(Session::has('success'))
                                <svg class="shadow-xl w-20 md:w-28 h-20 md:h-28 left-0 right-0 mx-auto bg-green-500 rounded-full text-white p-5"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M493.3 128l-22.6 22.6-256 256L192 429.3l-22.6-22.6-128-128L18.7 256 64 210.7l22.6 22.6L192 338.7 425.4 105.4 448 82.7 493.3 128z" />
                                </svg>
                            @elseif(Session::has('danger'))
                                <svg class="shadow-xl w-20 md:w-28 h-20 md:h-28 left-0 right-0 mx-auto bg-red-500 text-white p-5 rounded-full"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="-120 -100 700 700">
                                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                </svg>
                            @endif
                        </div>
                        <div class="p-5 text-center justify-center flex">
                            <svg class="w-40 md:w-48 h-40 md:h-48" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M112 96c0-17.7 14.3-32 32-32h16c17.7 0 32 14.3 32 32V224v64V416c0 17.7-14.3 32-32 32H144c-17.7 0-32-14.3-32-32V384H64c-17.7 0-32-14.3-32-32V288c-17.7 0-32-14.3-32-32s14.3-32 32-32V160c0-17.7 14.3-32 32-32h48V96zm416 0v32h48c17.7 0 32 14.3 32 32v64c17.7 0 32 14.3 32 32s-14.3 32-32 32v64c0 17.7-14.3 32-32 32H528v32c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32V288 224 96c0-17.7 14.3-32 32-32h16c17.7 0 32 14.3 32 32zM416 224v64H224V224H416z" />
                            </svg>
                        </div>
                        <div class="px-5 pt-5 pb-12 text-center">
                            <h1 class="text-3xl md:text-4xl lg:text-5xl  inline-block font-bold">
                                @if (Session::has('success'))
                                    Data <span class="font-extrabold text-green-500">
                                        {{ Session::get('success') }} </span> Ditambahkan !
                                @elseif (Session::has('info'))
                                    Data <span class="font-extrabold text-blue-500">
                                        {{ Session::get('info') }} </span> Diubah !
                                @elseif (Session::has('danger'))
                                    Data <span class="font-extrabold text-red-500">
                                        {{ Session::get('danger') }} </span> Dihapus !
                                @endif
                            </h1>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const modal_overlay = document.querySelector('#init_modal');
        const modal = document.querySelector('#modal');
        const content = document.querySelector('#content');

        function openModal(value) {
            const modalCl = modal.classList
            const overlayCl = modal_overlay

            if (value) {
                content.classList.add('overflow-hidden')
                content.classList.add('h-screen')
                overlayCl.classList.remove('hidden')
                setTimeout(() => {
                    modalCl.remove('opacity-0')
                    modalCl.remove('-translate-y-full')
                    modalCl.remove('scale-150')
                }, 100);
            } else {
                modalCl.add('-translate-y-full')
                setTimeout(() => {
                    content.classList.remove('overflow-hidden')
                    content.classList.remove('h-screen')
                    modalCl.add('opacity-0')
                    modalCl.add('scale-150')
                }, 1000);
                setTimeout(() => overlayCl.classList.add('hidden'), 1000);
            }
        }
    </script>
@endpush
