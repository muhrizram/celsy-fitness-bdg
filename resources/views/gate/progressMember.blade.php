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
                        <h2 class="text-center text-md font-semibold">Catat Progress mu</h2>
                    </div>

                    <form action="/member/progress/tambah" method="post">
                        @csrf
                        <div class="flex flex-wrap">
                            <div class="w-full px-5 lg:px-36">
                                <div class="mb-6">
                                    <label for="bbterkini" class="block mb-2 text-sm font-medium">Berat Badan
                                        terkini</label>
                                    <input type="number" id="bbterkini" name="bbterkini"
                                        class="shadow-sm border-gray-300 text-slate-900 border-2 text-sm focus:ring-yellow-300 focus:border-yellow-300 p-2.5 rounded-lg w-full @if ($errors->has('bbterkini')) ring-red-500 border-red-500 @endif"
                                        value="{{ old('bbterkini') }}" step="any" required>
                                    @error('bbterkini')
                                        <p class="mt-2 text-sm text-red-500"><span class="font-medium"></span>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="grid w-full place-items-center">
                            <button type="submit"
                                class="border bg-yellow-300 px-3 py-2 rounded-xl font-bold mb-3 text-sm hover:bg-yellow-500">Masukkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
