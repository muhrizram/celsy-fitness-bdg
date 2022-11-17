@extends('layout.main')

@section('container')
    <div class="bg-[url('../../public/img/background.jpg')] bg-cover bg-repeat bg-center">
        <div class="container">
            <div class="flex items-center justify-center h-screen">
                <div class="w-10/12 mx-auto h-fit bg-white border rounded-lg shadow-md">
                    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                        id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                        <li class="mr-2">
                            <button id="about-tab" data-tabs-target="#about" type="button" role="tab"
                                aria-controls="about" aria-selected="true"
                                class="inline-block p-4 text-yellow-300 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">About</button>
                        </li>
                        <li class="mr-2">
                            <svg class="w-6 h-6 inline-block text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <button id="services-tab" data-tabs-target="#services" type="button" role="tab"
                                aria-controls="services" aria-selected="false"
                                class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Services</button>
                        </li>
                        <li class="mr-2">
                            <svg class="w-6 h-6 inline-block text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <button id="statistics-tab" data-tabs-target="#statistics" type="button" role="tab"
                                aria-controls="statistics" aria-selected="false"
                                class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Facts</button>
                        </li>
                    </ul>
                    <div id="defaultTabContent">
                        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel"
                            aria-labelledby="about-tab">
                            <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Selamat
                                Datang, {{ Auth::user()->name }}!</h2>
                            <p class="mb-3 text-gray-500 dark:text-gray-400">Kami ingin mengetahui latar belakang dan goals
                                yang ingin anda capai.</p>
                            <a href="#"
                                class="inline-flex items-center font-medium text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-700">
                                Learn more
                                <svg class="w-6 h-6 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services" role="tabpanel"
                            aria-labelledby="services-tab">
                            <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">We invest
                                in the
                                world’s potential</h2>
                            <!-- List -->
                            <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
                                <li class="flex space-x-2">
                                    <!-- Icon -->
                                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="font-light leading-tight">Dynamic reports and dashboards</span>
                                </li>
                                <li class="flex space-x-2">
                                    <!-- Icon -->
                                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="font-light leading-tight">Templates for everyone</span>
                                </li>
                                <li class="flex space-x-2">
                                    <!-- Icon -->
                                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="font-light leading-tight">Development workflow</span>
                                </li>
                                <li class="flex space-x-2">
                                    <!-- Icon -->
                                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="font-light leading-tight">Limitless business automation</span>
                                </li>
                            </ul>
                        </div>
                        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="statistics"
                            role="tabpanel" aria-labelledby="statistics-tab">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-center h-screen">
                <div
                    class="bg-slate-600 rounded-xl text-white shadow-lg lg:w-1/2 w-fit h-fit py-10 my-10 border-yellow-300 border-2">
                    <div class="w-full mb-10 md:px-10">
                        <h1 class="text-4xl text-center mb-3 font-orbitron font-extrabold">
                            <span class="text-yellow-300">Celsy</span> Fitness Centre
                        </h1>
                        <h2 class="text-center text-md font-semibold">Login</h2>
                    </div>

                    <form action="/login" method="post">
                        @csrf
                        <div class="flex flex-wrap">
                            <div class="w-full px-5 lg:px-36">
                                <div class="mb-6">
                                    <label for="email" class="block mb-2 text-sm font-medium">Email</label>
                                    <input type="email" id="email" name="email" class="input"
                                        placeholder="nama@email.com" required>
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
