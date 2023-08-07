@extends('layout.gate')

@section('container')
    <div class="bg-[url('../../public/img/background.jpg')] bg-cover bg-repeat bg-center">
        <div class="container">

            <div class="flex items-center justify-center h-screen">
                <div
                    class="bg-slate-600 rounded-xl text-white shadow-lg lg:w-1/2 w-fit h-fit py-10 my-20 border-yellow-300 border-2">
                    <div class="w-full mb-10 md:px-10">
                        <h1 class="text-4xl text-center mb-3 font-orbitron font-extrabold">
                            <span class="text-yellow-300">Celsy</span> Fitness Center
                        </h1>
                        <h2 class="text-center text-md font-semibold">Masuk</h2>
                        @error('msg')
                            <div class="p-4 m-2 text-sm text-red-700 bg-red-100 rounded-lg text-center" role="alert">
                                <span class="font-medium">Perhatian!</span> {{ $message }}
                            </div>
                        @enderror
                        @if ($message = Session::get('info'))
                            <div class="p-4 m-2 text-sm text-green-700 bg-green-100 rounded-lg text-center" role="alert">
                                <span class="font-medium">Perhatian</span> {{ $message }}
                            </div>
                        @endif
                    </div>

                    <form action="/login" method="post">
                        @csrf
                        <div class="flex flex-wrap">
                            <div class="w-full px-5 lg:px-36">
                                <div class="mb-6">
                                    <label for="username" class="block mb-2 text-sm font-medium">Nama Pengguna</label>
                                    <input type="text" id="username" name="username" class="input"
                                        value="{{ old('username') }}" required>
                                </div>
                                <div class="mb-6" x-data="{ show: true }">
                                    <label for="password" class="block mb-2 text-sm font-medium">Kata Sandi</label>
                                    <div class="relative">
                                        <input :type="show ? 'password' : 'text'" id="password" name="password"
                                            class="input" required>
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
                        <div class="grid w-full place-items-center">
                            <button type="submit"
                                class="border bg-yellow-300 px-3 py-2 rounded-xl font-bold mb-3 text-sm hover:bg-yellow-500">Masuk</button>
                            <h2 class="text-center text-sm font-semibold">Belum punya akun? <a href="/register"
                                    class="text-yellow-300 hover:underline">Daftar</a></h2>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if (Session::has('success'))
            <div class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0"
                id="init_modal">
                <div class="opacity-0 transform -translate-y-full scale-150  relative w-10/12 md:w-1/2 h-fit md:h-fit bg-white rounded-xl shadow-lg transition-opacity transition-transform duration-1000"
                    id="modal">
                    {{-- Main Modal  --}}
                    <div class="p-5 text-right">
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm"
                            id="close_modal" onclick="openModal(false)">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-5 text-center justify-center flex">
                        <img src="https://img.icons8.com/fluency/144/null/checked.png" />
                    </div>
                    <div class="px-5 pt-5 pb-12 text-center">
                        <h1 class="lg:text-5xl text-3xl">Register Berhasil</h1>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        const modal_overlay = document.querySelector('#init_modal');
        const modal = document.querySelector('#modal');

        function openModal(value) {
            const modalCl = modal.classList
            const overlayCl = modal_overlay

            if (value) {
                overlayCl.classList.remove('hidden')
                setTimeout(() => {
                    modalCl.remove('opacity-0')
                    modalCl.remove('-translate-y-full')
                    modalCl.remove('scale-150')
                }, 100);
            } else {
                modalCl.add('-translate-y-full')
                setTimeout(() => {
                    modalCl.add('opacity-0')
                    modalCl.add('scale-150')
                }, 1000);
                setTimeout(() => overlayCl.classList.add('hidden'), 1000);
            }
        }
        openModal(true);
    </script>
@endpush
