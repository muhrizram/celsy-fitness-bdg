@extends('layout.main')

@section('container')
<div class="bg-[url('../../public/img/background.jpg')] bg-cover bg-repeat bg-center">
    <div class="container">
        <div class="flex items-center justify-center h-screen">
            <div
                class="bg-slate-600 rounded-xl text-white shadow-lg lg:w-1/2 w-fit h-fit py-10 my-10 border-yellow-300 border-2">
                <div class="w-full mb-10 md:px-10">
                    <h1 class="text-4xl text-center mb-3 font-orbitron font-extrabold">
                        <span class="text-yellow-300">Celsy</span> Fitness Centre
                    </h1>
                    <h2 class="text-center text-md font-semibold">Login</h2>
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

                <form action="{{ route('process_login') }}" method="post">
                    @csrf
                    <div class="flex flex-wrap">
                        <div class="w-full px-5 lg:px-36">
                            <div class="mb-6">
                                <label for="username" class="block mb-2 text-sm font-medium">Username</label>
                                <input type="text" id="username" name="username" class="input" required>
                            </div>
                            <div class="mb-6">
                                <label for="password" class="block mb-2 text-sm font-medium">Kata Sandi</label>
                                <input type="password" id="password" name="password" class="input" required>
                            </div>
                        </div>
                    </div>
                    <div class="grid w-full place-items-center">
                        <button type="submit"
                            class="border bg-yellow-300 px-3 py-2 rounded-xl font-bold mb-3 text-sm hover:bg-yellow-500">Submit</button>
                        <h2 class="text-center text-sm font-semibold">Belum punya akun? <a href="/"
                                class="text-yellow-300 hover:underline">Register</a></h2>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
