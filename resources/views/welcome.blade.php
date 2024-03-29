<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Celsy Fitness Center</title>

    {{-- Requirement --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    {{-- App CSS --}}
    @vite('public/css/app.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
</head>

<body class="text-gray-800 antialiased">
    <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 ">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                    href="">Celsy
                    Fitness</a><button
                    class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                    type="button" onclick="toggleNavbar('example-collapse-navbar')">
                    <i class="text-white fas fa-bars"></i>
                </button>
            </div>
            <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
                id="example-collapse-navbar">
                <ul class="flex flex-col lg:flex-row list-none mr-auto">
                    <li class="flex items-center">
                    </li>
                </ul>
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                    <li class="flex items-center">
                        <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="https://www.facebook.com/celsyfitness/"><i
                                class="lg:text-gray-300 text-gray-500 fab fa-facebook text-lg leading-lg "></i><span
                                class="lg:hidden inline-block ml-2">Facebook</span></a>
                    </li>
                    <li class="flex items-center">
                        <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="https://www.instagram.com/celsyfitnes_bdg/"><i
                                class="lg:text-gray-300 text-gray-500 fab fa-instagram text-lg leading-lg "></i><span
                                class="lg:hidden inline-block ml-2">Instagram</span></a>
                    </li>
                    <li class="flex items-center">
                        <a href="/login"
                            class="bg-yellow-300 hover:bg-yellow-500 hover:text-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                            type="button" style="transition: all 0.15s ease 0s;">
                            <i class="fa-solid fa-right-to-bracket"></i> Masuk
                        </a>
                    </li>
                    <li class="flex items-center">
                        <a href="/register"
                            class="bg-yellow-300 hover:bg-yellow-500 hover:text-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                            type="button" style="transition: all 0.15s ease 0s;">
                            <i class="fa-solid fa-id-card"></i> Daftar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
            <div class="absolute top-0 w-full h-full bg-center bg-cover"
                style='background-image: url("{{ asset('img/cover.jpg') }}");'>
                <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
            </div>
            <div class="container relative mx-auto">
                <div class="items-center flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                        <div class="pr-12">
                            <h1 class="font-orbitron font-semibold text-5xl text-yellow-300 shadow-xl">
                                Celsy Fitness Center
                            </h1>
                            <p class="mt-4 text-lg text-gray-300">
                                Pusat Kebugaran yang berlokasi di Jl. Rumah Sakit No.52, Pakemitan, Kec. Cinambo, Kota Bandung, Jawa Barat 45474
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                style="height: 70px;">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-yellow-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <section class="pb-20 bg-yellow-300 -mt-24">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap">
                    <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                                    <i class="fas fa-award"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Tempat Nyaman</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Tempat yang nyaman penting bagi sebagian orang, kami memiliki tempat yang cukup luas dengan begitu cukup banyak space yang bisa digunakan untukmu
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-4/12 px-4 text-center">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400">
                                    <i class="fas fa-retweet"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Personal Trainer Professional</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Pelatih yang berpengalaman dapat membantumu tidak hanya untuk mencapai tubuh impianmu tetapi menghantarkanmu ke berbagai kompetisi yang ingin kamu ikuti
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400">
                                    <i class="fas fa-fingerprint"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Lingkungan Mendukung</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Suasana yang akan memberikanmu motivasi untuk menjadi lebih baik setiap harinya
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap items-center mt-32">
                    <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                        <div
                            class="text-white p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-yellow-700">
                            <i class="fas fa-user-friends text-xl"></i>
                        </div>
                        <h3 class="text-3xl mb-2 text-yellow-600 font-semibold leading-normal">
                            Mencoba memudahkanmu untuk mendapatkan tubuh impian
                        </h3>

                        <p class="text-lg leading-relaxed mt-4 mb-4 text-yellow-600 ">
                            No PT No Problem
                        </p>
                        <p class="text-lg leading-relaxed mt-0 mb-4 text-yellow-600 ">
                            Kami akan merekomendasikan program latihan yang cocok dengan kesibukanmu dan asupan makanan yang kamu butuhkan agar mendapatkan progress yang signifikan
                        </p>
                    </div>
                    <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-gray-300 w-full mb-6 shadow-lg rounded-lg">
                            <img alt="..." src="{{ asset('img/cover2.jpg') }}"
                                class="w-full align-middle rounded-t-lg" />
                            <blockquote class="relative p-8 mb-4">
                                <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 583 95" class="absolute left-0 w-full block"
                                    style="height: 95px; top: -94px;">
                                    <polygon points="-30,95 583,95 583,65" class="text-gray-300 fill-current">
                                    </polygon>
                                </svg>
                                <h4 class="text-xl font-bold text-yellow-600">
                                    Layanan Terbaik
                                </h4>
                                <p class="text-md mt-2 text-yellow-600">
                                    Hindari cedera dengan berlatih bersama kami
                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative py-20">
            <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
                style="height: 80px;">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
            <div class="container mx-auto px-4">
                <div class="items-center flex flex-wrap">
                    <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
                        <img alt="..." class="max-w-full rounded-lg shadow-lg"
                            src="{{ asset('img/cover3.jpg') }}" />
                    </div>
                    <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                        <div class="md:pr-12">
                            <div
                                class="text-yellow-300 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-yellow-100">
                                <i class="fas fa-rocket text-xl"></i>
                            </div>
                            <h3 class="text-3xl font-semibold">Komunitas yang berkembang</h3>
                            <p class="mt-4 text-lg leading-relaxed text-gray-600">
                                Kamu bersama puluhan orang lainnya yang berjuang untuk mendapatkan Body Goals nya masing-masing
                            </p>
                            {{-- <ul class="list-none mt-6">
                                <li class="py-2">
                                    <div class="flex items-center">
                                        <div>
                                            <span
                                                class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-yellow-300 bg-yellow-100 mr-3"><i
                                                    class="fas fa-fingerprint"></i></span>
                                        </div>
                                        <div>
                                            <h4 class="text-gray-600">
                                                Carefully crafted components
                                            </h4>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="flex items-center">
                                        <div>
                                            <span
                                                class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-yellow-300 bg-yellow-100 mr-3"><i
                                                    class="fab fa-html5"></i></span>
                                        </div>
                                        <div>
                                            <h4 class="text-gray-600">Amazing page examples</h4>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="flex items-center">
                                        <div>
                                            <span
                                                class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-yellow-300 bg-yellow-100 mr-3"><i
                                                    class="far fa-paper-plane"></i></span>
                                        </div>
                                        <div>
                                            <h4 class="text-gray-600">Dynamic components</h4>
                                        </div>
                                    </div>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="relative bg-gray-300 pt-8 pb-6">
        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
            style="height: 80px;">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4">
                    <h4 class="text-3xl font-semibold">Mari tetap terhubung!</h4>
                    <h5 class="text-lg mt-0 mb-2 text-gray-700">
                        Temukan kami di salah satu platform ini, kami merespons 1-2 hari kerja.
                    </h5>
                    <div class="mt-6">
                        <a href="https://www.instagram.com/celsyfitnes_bdg/"
                            class="bg-white text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                            type="button">
                            <i class="flex fab fa-instagram"></i></a><a href="https://www.facebook.com/celsyfitness/"
                            class="bg-white text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                            type="button">
                            <i class="flex fab fa-facebook-square"></i></a>
                        </button>
                    </div>
                </div>
                {{-- <div class="w-full lg:w-6/12 px-4">
                    <div class="flex flex-wrap items-top mb-6">
                        <div class="w-full lg:w-4/12 px-4 ml-auto">
                            <span class="block uppercase text-gray-600 text-sm font-semibold mb-2">Useful Links</span>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                        href="https://www.creative-tim.com/presentation">About Us</a>
                                </li>
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                        href="https://blog.creative-tim.com">Blog</a>
                                </li>
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                        href="https://www.github.com/creativetimofficial">Github</a>
                                </li>
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                        href="https://www.creative-tim.com/bootstrap-themes/free">Free Products</a>
                                </li>
                            </ul>
                        </div>
                        <div class="w-full lg:w-4/12 px-4">
                            <span class="block uppercase text-gray-600 text-sm font-semibold mb-2">Other
                                Resources</span>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                        href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md">MIT
                                        License</a>
                                </li>
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                        href="https://creative-tim.com/terms">Terms &amp; Conditions</a>
                                </li>
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                        href="https://creative-tim.com/privacy">Privacy Policy</a>
                                </li>
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                        href="https://creative-tim.com/contact-us">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
            <hr class="my-6 border-gray-400" />
            <div class="flex flex-wrap items-center md:justify-between justify-center">
                <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                    <div class="text-sm text-gray-600 font-semibold py-1">
                        Copyright © 2023 Celsy Fitness Center Bandung
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

{{-- App JS --}}
@vite('public/js/app.js')

<script>
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("block");
    }
</script>

</html>
