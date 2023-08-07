<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member Celsy Fitness Center</title>
    @vite('public/css/app.css')
</head>

<body class="bg-slate-800">
    <div class="container">
        {{-- Top Navigation --}}
        <nav class="bg-slate-800 border-gray-200 py-2.5 rounded-t-lg dark:bg-gray-900">
            <div class="md:container flex flex-wrap items-center justify-end mx-auto">
                <div class="w-full md:block md:w-auto" id="navbar-default">
                    <ul
                        class="flex flex-col justify-end p-4 mt-4 border border-yellow-300 rounded-lg bg-slate-600 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium dark:bg-gray-800">
                        <li class="w-full text-right">
                            <a href="https://wa.me/6281563333339"
                                class="block py-2 pl-3 pr-4 text-yellow-300 rounded hover:text-yellow-400 hover:bg-yellow-200">Kontak</a>
                        </li>
                        <li class="flex justify-end w-full hover:bg-yellow-200 rounded ">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit"
                                    class="inline-flex py-2 pl-3 pr-4 text-yellow-300 hover:text-yellow-400 ">
                                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="flex ml-3 whitespace-nowrap" id="NavWord">Keluar</span></button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        {{-- END Top Navigation --}}

        {{-- Weight Information --}}
        <div class="bg-white border-yellow-300 border-2 rounded-lg mb-3">
            <h1 class="text-center font-bold p-3 text-xl md:text-3xl">Selamat Datang {{ $userdata->pengguna->name }}!
            </h1>
            <div class="p-5 justify-around flex-col sm:flex-row items-center flex">
                <div class="bg-yellow-100 p-5 rounded-xl shadow-lg border">
                    <h1 class="md:text-7xl text-5xl mb-3"><span
                            class="{{ $userdata->target === 'jaga' ? 'text-green-600' : 'text-red-600' }}">{{ $userdata->current_weight }}</span><span
                            class="md:text-4xl text-3xl"> kg</span> </h1>
                    <h1 class="text-yellow-700 font-semibold text-center">Berat Badan saat ini </h1>
                </div>
                <div>
                    <img src="{{ asset('img/panahkanan.png') }}" alt="">
                </div>
                <div class="bg-yellow-100 p-5 rounded-xl shadow-lg border">
                    <h1 class="md:text-7xl text-5xl mb-3"><span
                            class="text-green-600">{{ $userdata->target_weight }}</span><span
                            class="md:text-4xl text-3xl"> kg</span></h1>
                    <h1 class="text-yellow-700 font-semibold text-center">Berat Badan yang dituju</h1>
                </div>
            </div>
            <div class="text-center p-5 md:text-xl text-md">
                <h1>Kalori yang Kamu perlukan setiap harinya adalah
                    <span class="text-green-700 font-bold">{{ $userdata->calory_a_day }}</span> kkal
                </h1>
                <h1 class="inline-block">Waktu yang Kamu butuhkan untuk mencapai <i>body goals</i> mu adalah
                    <span class="text-green-700 font-bold">{{ $userdata->week_to_goal }}</span> Minggu
                </h1>
            </div>
        </div>
        {{-- END Weight Information --}}

        {{-- Progress --}}
        @if ($userdata->target !== 'jaga')
            <div class="bg-white rounded-lg border-gray-500 border-2">
                <div class="p-5">
                    <div class="w-full bg-gray-400 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-blue-600 h-2.5 rounded-full"
                            style="width: {{ ($progress / $userdata->week_to_goal) * 100 }}%"></div>
                    </div>
                </div>
                <div class="px-5 pb-5">
                    <div class="flex justify-between">
                        <button data-modal-target="modalProgress{{ $userdata->pengguna->id }}"
                            data-modal-toggle="modalProgress{{ $userdata->pengguna->id }}"
                            class="inline-block bg-yellow-300 p-5 rounded-lg font-semibold text-white hover:bg-yellow-400">Progress</button>
                        <div class="font-semibold">
                            {{ $progress }} / {{ $userdata->week_to_goal }}
                        </div>
                    </div>

                </div>
            </div>
        @else
            <div class="p-5 flex justify-center">
                <button data-modal-target="modalProgress{{ $userdata->pengguna->id }}"
                    data-modal-toggle="modalProgress{{ $userdata->pengguna->id }}"
                    class="bg-yellow-300 p-5 rounded-lg font-semibold text-white hover:bg-yellow-400">Progress</button>
            </div>
        @endif
        {{-- END Progress --}}

        <!-- Modal Progress -->
        <div id="modalProgress{{ $userdata->pengguna->id }}" data-modal-backdrop="static" tabindex="-1"
            aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t bg-yellow-300">
                        <h3 class="text-xl font-semibold text-slate-700">
                            Progress
                        </h3>
                        <button type="button"
                            class="text-slate-700 bg-transparent hover:bg-yellow-400 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-hide="modalProgress{{ $userdata->pengguna->id }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 bg-yellow-400 rounded-b">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Berat Badan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tanggal
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($userProgress as $data)
                                        <tr class="bg-white border-b">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $data->weight }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $data->date }}
                                            </td>
                                            <td class="px-6 py-4">
                                                @if ($data->status == 1)
                                                    Sesuai
                                                @else
                                                    Tidak Sesuai
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                            <th scope="row" colspan="3"
                                                class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Data Belum tersedia
                                            </th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="flex justify-center">
                            <a href="" class="inline-block text-md font-semibold text-white p-3 bg-yellow-700 mt-5 rounded-xl hover:bg-yellow-900">
                                Lihat Selengkapnya
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- if Condition "Tidak Sesuai" > 5 --}}
        @if ($countDataProgress > 5)
            <div class="my-3 p-5 border-yellow-300 border-2 rounded-xl bg-yellow-200">
                <div class="flex justify-between">
                    <h1 class="text-yellow-500 font-bold text-xl">Progress tidak berjalan dengan baik, konsultasikan
                        kepada Personal Trainer kami di Celsy Fitness Center Bandung atau klik Kontak pada bilah
                        navigasi {{ $countDataProgress > 5 }}</h1>
                </div>
            </div>
        @else
            {{-- Breakfast Data (Sarapan) --}}
            <div class="my-3 p-5 border-yellow-300 border-2 rounded-xl bg-yellow-200">
                <div class="flex justify-between">
                    <h1 class="text-yellow-500 font-bold text-xl">Sarapan</h1>
                </div>
                <div class="flex flex-wrap justify-center">
                    @forelse($breakfast as $breakfast)
                        @if ($breakfast->calory <= $userCaloryBreakfast)
                            <div data-modal-target="sarapan{{ $breakfast->id }}"
                                data-modal-toggle="sarapan{{ $breakfast->id }}"
                                class="flex flex-col my-3 md:w-fit h-fit bg-green-500 lg:m-3 rounded-xl shadow-xl overflow-hidden group">
                                <img class="w-72 rounded-t-lg h-72 md:rounded-none md:rounded-l-lg"
                                    src="{{ $breakfast->image ? Storage::url('public/makanan/') . $breakfast->image . '.' . $breakfast->extension : asset('img/kompor.png') }}"
                                    alt="">
                                <div
                                    class="flex flex-col p-4 group-hover:bg-yellow-400  bg-white w-full rounded-b-lg md:rounded-none">
                                    <h5
                                        class="lg:w-48 w-52 mb-2 text-2xl font-bold tracking-tight text-gray-900 group-hover:text-white">
                                        {{ $breakfast->amount }} {{ $breakfast->unit }} {{ $breakfast->name }}</h5>
                                    <p class="font-normal text-gray-700 group-hover:text-white">Kalori:
                                        {{ $breakfast->calory }}
                                        kkal
                                    </p>
                                    <p class="mb-3 font-normal text-gray-700 group-hover:text-white">Karbohidrat:
                                        {{ round($breakfast->carbohydrate) }} gram
                                    </p>
                                </div>
                            </div>
                            <?php $userCaloryBreakfast -= $breakfast->calory; ?>
                        @endif
                        <!-- Breakfast Modal -->
                        <div id="sarapan{{ $breakfast->id }}" data-modal-backdrop="static" tabindex="-1"
                            aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t bg-yellow-300">
                                        <h3 class="text-xl font-semibold text-slate-700">
                                            Sarapan
                                        </h3>
                                        <button type="button"
                                            class="text-slate-700 bg-transparent hover:bg-yellow-400 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                            data-modal-hide="sarapan{{ $breakfast->id }}">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6 bg-yellow-400 rounded-b">
                                        <div class="flex flex-col items-center">
                                            <div class="mb-5">
                                                @if ($breakfast->image)
                                                    <img id="output_img"
                                                        src="{{ Storage::url('public/makanan/' . $breakfast->image . '.' . $breakfast->extension) }}"
                                                        class="w-52 h-52 rounded-full">
                                                @else
                                                    <img src="{{ asset('img/kompor.png') }}"
                                                        class="w-52 h-52 rounded-full">
                                                @endif
                                            </div>
                                            <div class="text-white text-xl font-semibold">{{ $breakfast->amount }}
                                                {{ $breakfast->unit }} {{ $breakfast->name }}</div>
                                        </div>

                                        <div class="text-white text-lg">
                                            {!! $breakfast->recipe !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Breakfast Modal -->
                    @empty
                        <div class="font-bold">
                            Data Makanan belum Tersedia.
                        </div>
                    @endforelse
                </div>
            </div>
            {{-- END Breakfast Data (Sarapan) --}}

            {{-- Lunch Data (Makan Siang) --}}
            <div class="my-3 p-5 border-yellow-300 border-2 rounded-xl bg-yellow-300">
                <div class="flex justify-between">
                    <h1 class="text-yellow-500 font-bold text-xl">Makan Siang</h1>
                </div>
                <div class="flex flex-wrap justify-center">
                    @forelse($lunch as $lunch)
                        @if ($lunch->calory <= $userCaloryLunch)
                            <div data-modal-target="makanSiang{{ $lunch->id }}"
                                data-modal-toggle="makanSiang{{ $lunch->id }}"
                                class="flex flex-col my-3 md:w-fit h-fit bg-green-500 lg:m-3 rounded-xl overflow-hidden group">
                                <img class="w-full rounded-t-lg h-72 md:rounded-none md:rounded-l-lg"
                                    src="{{ $lunch->image ? Storage::url('public/makanan/') . $lunch->image . '.' . $lunch->extension : asset('img/kompor.png') }}"
                                    alt="">
                                <div
                                    class="flex flex-col p-4 bg-white w-full rounded-b-lg md:rounded-none group-hover:bg-yellow-400">
                                    <h5
                                        class="lg:w-48 w-52 mb-2 text-2xl font-bold tracking-tight text-gray-900 group-hover:text-white">
                                        {{ $lunch->amount }} {{ $lunch->unit }} {{ $lunch->name }}</h5>
                                    <p class="font-normal text-gray-700 group-hover:text-white">Kalori:
                                        {{ $lunch->calory }}
                                        kkal
                                    </p>
                                    <p class="mb-3 font-normal text-gray-700 group-hover:text-white">Protein:
                                        {{ round($lunch->protein) }} gram
                                    </p>
                                </div>
                            </div>
                            <?php $userCaloryLunch -= $lunch->calory; ?>
                        @endif
                        <!-- Lunch Modal -->
                        <div id="makanSiang{{ $lunch->id }}" data-modal-backdrop="static" tabindex="-1"
                            aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t bg-yellow-300">
                                        <h3 class="text-xl font-semibold text-slate-700">
                                            Makan Siang
                                        </h3>
                                        <button type="button"
                                            class="text-slate-700 bg-transparent hover:bg-yellow-400 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                            data-modal-hide="makanSiang{{ $lunch->id }}">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6 bg-yellow-400 rounded-b">
                                        <div class="flex flex-col items-center">
                                            <div class="mb-5">
                                                @if ($lunch->image)
                                                    <img id="output_img"
                                                        src="{{ Storage::url('public/makanan/' . $lunch->image . '.' . $lunch->extension) }}"
                                                        class="w-52 h-52 rounded-full">
                                                @else
                                                    <img src="{{ asset('img/kompor.png') }}"
                                                        class="w-52 h-52 rounded-full">
                                                @endif
                                            </div>
                                            <div class="text-white text-xl font-semibold">{{ $lunch->amount }}
                                                {{ $lunch->unit }} {{ $lunch->name }}</div>
                                        </div>

                                        <div class="text-white text-lg">
                                            {!! $lunch->recipe !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Lunch Modal -->
                    @empty
                        <div class="font-bold">
                            Data Makanan belum Tersedia.
                        </div>
                    @endforelse
                </div>
            </div>
            {{-- END Lunch Data (Makan Siang) --}}

            {{-- Dinner Data (Makan Malam) --}}
            <div class="my-3 p-5 border-yellow-300 border-2 rounded-xl bg-yellow-400">
                <div class="flex justify-between">
                    <h1 class="text-yellow-600 font-bold text-xl">Makan Malam</h1>
                </div>
                <div class="flex flex-wrap justify-center">
                    @forelse($dinner as $dinner)
                        @if ($dinner->calory <= $userCaloryDinner)
                            <div data-modal-target="makanMalam{{ $dinner->id }}"
                                data-modal-toggle="makanMalam{{ $dinner->id }}"
                                class="flex flex-col my-3 md:w-fit h-fit bg-green-500 lg:m-3 rounded-xl overflow-hidden group">
                                <img class="w-full rounded-t-lg h-72 md:rounded-none md:rounded-l-lg"
                                    src="{{ $dinner->image ? Storage::url('public/makanan/') . $dinner->image . '.' . $dinner->extension : asset('img/kompor.png') }}"
                                    alt="">
                                <div
                                    class="flex flex-col p-4 bg-white w-full rounded-b-lg md:rounded-none group-hover:bg-yellow-500">
                                    <h5
                                        class="lg:w-48 w-52 mb-2 text-2xl font-bold tracking-tight text-gray-900 group-hover:text-white">
                                        {{ $dinner->amount }} {{ $dinner->unit }} {{ $dinner->name }}</h5>
                                    <p class="font-normal text-gray-700 group-hover:text-white">Kalori:
                                        {{ $dinner->calory }}
                                        kkal
                                    </p>
                                    <p class="mb-3 font-normal text-gray-700 group-hover:text-white">Lemak:
                                        {{ round($dinner->fat) }} gram
                                    </p>
                                </div>
                            </div>
                            <?php $userCaloryDinner -= $dinner->calory; ?>
                        @endif
                        <!-- Dinner Modal -->
                        <div id="makanMalam{{ $dinner->id }}" data-modal-backdrop="static" tabindex="-1"
                            aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t bg-yellow-300">
                                        <h3 class="text-xl font-semibold text-slate-700">
                                            Makan Malam
                                        </h3>
                                        <button type="button"
                                            class="text-slate-700 bg-transparent hover:bg-yellow-400 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                            data-modal-hide="makanMalam{{ $dinner->id }}">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6 bg-yellow-400 rounded-b">
                                        <div class="flex flex-col items-center">
                                            <div class="mb-5">
                                                @if ($dinner->image)
                                                    <img id="output_img"
                                                        src="{{ Storage::url('public/makanan/' . $dinner->image . '.' . $dinner->extension) }}"
                                                        class="w-52 h-52 rounded-full">
                                                @else
                                                    <img src="{{ asset('img/kompor.png') }}"
                                                        class="w-52 h-52 rounded-full">
                                                @endif
                                            </div>
                                            <div class="text-white text-xl font-semibold">{{ $dinner->amount }}
                                                {{ $dinner->unit }} {{ $dinner->name }}</div>
                                        </div>

                                        <div class="text-white text-lg">
                                            {!! $dinner->recipe !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Dinner Modal -->
                    @empty
                        <div class="font-bold">
                            Data Makanan belum Tersedia.
                        </div>
                    @endforelse
                </div>
            </div>
            {{-- END Dinner Data (Makan Malam) --}}

            {{-- Snack Data (Makanan Ringan) --}}
            <div class="my-3 p-5 border-yellow-300 border-2 rounded-xl bg-yellow-500">
                <div class="flex justify-between">
                    <h1 class="text-yellow-700 font-bold text-xl">Makanan Ringan</h1>
                </div>
                <div class="flex flex-wrap justify-center">
                    @forelse($snack as $snack)
                        @if ($snack->calory <= $userCalorySnack)
                            <div data-modal-target="staticModal{{ $snack->id }}"
                                data-modal-toggle="staticModal{{ $snack->id }}"
                                class="flex flex-col my-3 md:w-fit h-fit bg-green-500 lg:m-3 rounded-xl overflow-hidden group">
                                <img class="w-full rounded-t-lg h-72 md:rounded-none md:rounded-l-lg"
                                    src="{{ $snack->image ? Storage::url('public/makanan/') . $snack->image . '.' . $snack->extension : asset('img/kompor.png') }}"
                                    alt="">
                                <div
                                    class="flex flex-col p-4 bg-white w-full rounded-b-lg md:rounded-none group-hover:bg-yellow-600">
                                    <h5
                                        class="lg:w-48 w-52 mb-2 text-2xl font-bold tracking-tight text-gray-900 group-hover:text-white">
                                        {{ $snack->amount }} {{ $snack->unit }} {{ $snack->name }}</h5>
                                    <p class="font-normal text-gray-700 group-hover:text-white">Kalori:
                                        {{ $snack->calory }}
                                        kkal
                                    </p>
                                </div>
                            </div>
                            <?php $userCalorySnack -= $snack->calory; ?>
                        @endif
                        <!-- Snack Modal -->
                        <div id="staticModal{{ $snack->id }}" data-modal-backdrop="static" tabindex="-1"
                            aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t bg-yellow-300">
                                        <h3 class="text-xl font-semibold text-slate-700">
                                            Makanan Ringan
                                        </h3>
                                        <button type="button"
                                            class="text-slate-700 bg-transparent hover:bg-yellow-400 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                            data-modal-hide="staticModal{{ $snack->id }}">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6 bg-yellow-400 rounded-b">
                                        <div class="flex flex-col items-center">
                                            <div class="mb-5">
                                                @if ($snack->image)
                                                    <img id="output_img"
                                                        src="{{ Storage::url('public/makanan/' . $snack->image . '.' . $snack->extension) }}"
                                                        class="w-52 h-52 rounded-full">
                                                @else
                                                    <img src="{{ asset('img/kompor.png') }}"
                                                        class="w-52 h-52 rounded-full">
                                                @endif
                                            </div>
                                            <div class="text-white text-xl font-semibold">{{ $snack->amount }}
                                                {{ $snack->unit }} {{ $snack->name }}</div>
                                        </div>

                                        <div class="text-white text-lg">
                                            {!! $snack->recipe !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Snack Modal -->
                    @empty
                        <div class="font-bold">
                            Data Makanan belum Tersedia.
                        </div>
                    @endforelse
                </div>
            </div>
            {{-- END Snack Data (Makanan Ringan) --}}
        @endif
        {{-- END if Condition "Tidak Sesuai" > 5 --}}

        {{-- Editing Exercise Times  --}}
        @if ($userdata->exercise_times == 0)
            <div>
                <p class="font-semibold text-center p-3 text-white">
                    Mempertimbangkan keaktifanmu sehari-hari, kami menyarankan untuk melakukan program latihan
                </p>
            </div>

            <div>
                <form action="/member/{{ $userdata->id }}" method="post">
                    @csrf
                    <div class="flex justify-evenly">
                        @if ($userdata->target != 'turun' || $userdata->liveliness != 'sangat')
                            <button type="submit" name="action"
                                value="
                        @if ($userdata->liveliness == 'sangat') 2
                        @elseif($userdata->liveliness == 'aktif')
                            3
                        @elseif($userdata->liveliness == 'agak')
                            4       
                        @else
                            5 @endif
                        "
                                class="border text-white bg-yellow-300 px-3 py-2 rounded-xl font-bold mb-3 text-sm hover:bg-yellow-500">
                                @if ($userdata->liveliness == 'sangat')
                                    2
                                @elseif($userdata->liveliness == 'aktif')
                                    3
                                @elseif($userdata->liveliness == 'agak')
                                    4
                                @else
                                    5
                                @endif
                                x
                                perminggu
                            </button>
                        @endif
                        <button type="submit" name="action"
                            value="
                    @if ($userdata->liveliness == 'sangat') 3
                    @elseif($userdata->liveliness == 'aktif')
                        4
                    @elseif($userdata->liveliness == 'agak')
                        5       
                    @else
                        6 @endif
                    "
                            class="border text-white bg-yellow-300 px-3 py-2 rounded-xl font-bold mb-3 text-sm hover:bg-yellow-500">
                            @if ($userdata->liveliness == 'sangat')
                                3
                            @elseif($userdata->liveliness == 'aktif')
                                4
                            @elseif($userdata->liveliness == 'agak')
                                5
                            @else
                                6
                            @endif
                            x perminggu
                        </button>
                    </div>
                </form>
            </div>
        @endif
        {{-- END Editing Exercise Times --}}

        {{-- Exercise Schedule --}}
        @if ($userdata->exercise_times > 0)
            <div class="flex flex-wrap w-full justify-around p-5" id="latihan">
                {{-- Senin --}}
                <div
                    class="bg-slate-700 border-2 border-yellow-300 text-yellow-300 rounded-xl shadow-xl w-full md:w-[30%] m-3">
                    <div class="border-b border-yellow-300 p-3 text-xl font-semibold text-center">
                        Senin
                    </div>
                    <div class="p-3">
                        @forelse($senin as $senin)
                            <input type="radio" class="hidden" id="exercise{{ $senin->exercise->id }}"
                                name="exercise" value="{{ $senin->exercise->name }}"
                                data-modal-target="modalExercise" data-modal-toggle="modalExercise"
                                onclick="display()">
                            <label for="exercise{{ $senin->exercise->id }}"
                                class="hover:underline">{{ $senin->exercise->name }}</label>
                            <p>({{ $senin->sets }} set x
                                {{ $senin->reps }} reps)</p>
                        @empty
                            <h1>*Kosong*</h1>
                        @endforelse
                    </div>
                </div>
                {{-- END Senin --}}

                {{-- Selasa --}}
                <div
                    class="bg-slate-700 border-2 border-yellow-300 text-yellow-300 rounded-xl shadow-xl w-full md:w-[30%] m-3">
                    <div class="border-b border-yellow-300 p-3 text-xl font-semibold text-center">
                        Selasa
                    </div>
                    <div class="p-3">
                        @forelse($selasa as $selasa)
                            @if (empty($selasa->exercise->name))
                                <h1>{{ $selasa }}</h1>
                            @elseif($selasa->exercise->muscle_group == 'Kardiovaskular')
                                <h1>{{ $selasa->exercise->name }} {{ $selasa->duration }} menit</h1>
                            @else
                                <input type="radio" class="hidden" id="exercise{{ $selasa->exercise->id }}"
                                    name="exercise" value="{{ $selasa->exercise->name }}"
                                    data-modal-target="modalExercise" data-modal-toggle="modalExercise"
                                    onclick="display()">
                                <label for="exercise{{ $selasa->exercise->id }}"
                                    class="hover:underline">{{ $selasa->exercise->name }}</label>
                                <p>({{ $selasa->sets }} set x
                                    {{ $selasa->reps }} reps)</p>
                            @endif
                        @empty
                            <h1>*Kosong*</h1>
                        @endforelse
                    </div>
                </div>
                {{-- END Selasa --}}

                {{-- Rabu --}}
                <div
                    class="bg-slate-700 border-2 border-yellow-300 text-yellow-300 rounded-xl shadow-xl w-full md:w-[30%] m-3">
                    <div class="border-b border-yellow-300 p-3 text-xl font-semibold text-center">
                        Rabu
                    </div>
                    <div class="p-3">
                        @forelse($rabu as $rabu)
                            @if ($rabu->exercise->muscle_group == 'Kardiovaskular')
                                <h1>{{ $rabu->exercise->name }} {{ $rabu->duration }} menit</h1>
                            @else
                                <input type="radio" class="hidden" id="exercise{{ $rabu->exercise->id }}"
                                    name="exercise" value="{{ $rabu->exercise->name }}"
                                    data-modal-target="modalExercise" data-modal-toggle="modalExercise"
                                    onclick="display()">
                                <label for="exercise{{ $rabu->exercise->id }}"
                                    class="hover:underline">{{ $rabu->exercise->name }}</label>
                                <p>({{ $rabu->sets }} set x
                                    {{ $rabu->reps }} reps)</p>
                            @endif
                        @empty
                            <h1>*Kosong*</h1>
                        @endforelse
                    </div>
                </div>
                {{-- END Rabu --}}

                {{-- Kamis --}}
                <div
                    class="bg-slate-700 border-2 border-yellow-300 text-yellow-300 rounded-xl shadow-xl w-full md:w-[30%] m-3">
                    <div class="border-b border-yellow-300 p-3 text-xl font-semibold text-center">
                        Kamis
                    </div>
                    <div class="p-3">
                        @forelse($kamis as $kamis)
                            @if (empty($kamis->exercise->name))
                                <h1>{{ $kamis }}</h1>
                            @elseif ($kamis->exercise->muscle_group == 'Kardiovaskular')
                                <h1>{{ $kamis->exercise->name }} {{ $kamis->duration }} menit</h1>
                            @else
                                <input type="radio" class="hidden" id="exercise{{ $kamis->exercise->id }}"
                                    name="exercise" value="{{ $kamis->exercise->name }}"
                                    data-modal-target="modalExercise" data-modal-toggle="modalExercise"
                                    onclick="display()">
                                <label for="exercise{{ $kamis->exercise->id }}"
                                    class="hover:underline">{{ $kamis->exercise->name }}</label>
                                <p>({{ $kamis->sets }} set x
                                    {{ $kamis->reps }} reps)</p>
                            @endif
                        @empty
                            <h1>*Kosong*</h1>
                        @endforelse
                    </div>
                </div>
                {{-- END Kamis --}}

                {{-- Jumat --}}
                <div
                    class="bg-slate-700 border-2 border-yellow-300 text-yellow-300 rounded-xl shadow-xl w-full md:w-[30%] m-3">
                    <div class="border-b border-yellow-300 p-3 text-xl font-semibold text-center">
                        Jum'at
                    </div>
                    <div class="p-3">
                        @forelse($jumat as $jumat)
                            <h1>
                                @if (empty($jumat->exercise->name))
                                    <h1>{{ $jumat }}</h1>
                                @else
                                    <input type="radio" class="hidden" id="exercise{{ $jumat->exercise->id }}"
                                        name="exercise" value="{{ $jumat->exercise->name }}"
                                        data-modal-target="modalExercise" data-modal-toggle="modalExercise"
                                        onclick="display()">
                                    <label for="exercise{{ $jumat->exercise->id }}"
                                        class="hover:underline">{{ $jumat->exercise->name }}</label>
                                    <p>({{ $jumat->sets }} set x
                                        {{ $jumat->reps }} reps)</p>
                                @endif
                            </h1>
                        @empty
                            <h1>*Kosong*</h1>
                        @endforelse
                    </div>
                </div>
                {{-- END Jumat --}}

                {{-- Sabtu --}}
                <div
                    class="bg-slate-700 border-2 border-yellow-300 text-yellow-300 rounded-xl shadow-xl w-full md:w-[30%] m-3">
                    <div class="border-b border-yellow-300 p-3 text-xl font-semibold text-center">
                        Sabtu
                    </div>
                    <div class="p-3">
                        @forelse($sabtu as $sabtu)
                            <h1>
                                @if (empty($sabtu->exercise->name))
                                    <h1>{{ $sabtu }}</h1>
                                @else
                                    <input type="radio" class="hidden" id="exercise{{ $sabtu->exercise->id }}"
                                        name="exercise" value="{{ $sabtu->exercise->name }}"
                                        data-modal-target="modalExercise" data-modal-toggle="modalExercise"
                                        onclick="display()">
                                    <label for="exercise{{ $sabtu->exercise->id }}"
                                        class="hover:underline">{{ $sabtu->exercise->name }}</label>
                                    <p>({{ $sabtu->sets }} set x
                                        {{ $sabtu->reps }} reps)</p>
                                @endif
                            </h1>
                        @empty
                            <h1>*Kosong*</h1>
                        @endforelse
                    </div>
                </div>
                {{-- END Sabtu --}}

                {{-- Minggu --}}
                <div
                    class="bg-slate-700 border-2 border-yellow-300 text-yellow-300 rounded-xl shadow-xl w-full md:w-[30%] m-3">
                    <div class="border-b border-yellow-300 p-3 text-xl font-semibold text-center">
                        Minggu
                    </div>
                    <div class="p-3">
                        <h1>*Rest Day*</h1>
                    </div>
                </div>
                {{-- END Minggu --}}
            </div>
            {{-- Exercise Times Choice --}}
            <form action="/member/{{ $userdata->id }}" method="post">
                @csrf
                <div class="flex flex-wrap w-full p-5 justify-evenly">
                    <div class="w-full md:w-1/2 p-3 flex items-center">
                        <p class="md:text-right text-center w-full text-yellow-300 font-semibold text-lg">Kamu ingin
                            latihan berapa kali dalam seminggu?</p>
                    </div>
                    <div class="w-full md:w-1/2">
                        <select id="action" name="action"
                            class="shadow-md border-gray-300 border-2 text-slate-900 text-sm rounded-lg focus:ring-yellow-300 focus:border-yellow-300 block md:ml-5 mx-auto w-1/2 p-2.5  @if ($errors->has('exercise_times')) ring-red-500 border-red-500 @endif">
                            @if ($userdata->target != 'turun')
                                <option value=2 {{ $userdata->exercise_times == 2 ? 'selected' : '' }}>2x</option>
                            @endif
                            <option value=3 {{ $userdata->exercise_times == 3 ? 'selected' : '' }}>3x</option>
                            <option value=4 {{ $userdata->exercise_times == 4 ? 'selected' : '' }}>4x</option>
                            <option value=5 {{ $userdata->exercise_times == 5 ? 'selected' : '' }}>5x</option>
                            <option value=6 {{ $userdata->exercise_times == 6 ? 'selected' : '' }}>6x</option>
                        </select>
                        @error('exercise_times')
                            <p class="text-sm text-center mt-2 text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class=" flex flex-wrap w-full p-5 justify-evenly">
                    <div class="w-full md:w-1/2  p-3 flex items-center">
                        <p class="md:text-right text-center w-full text-yellow-300 font-semibold text-lg">Kamu ingin
                            latihan dimana?</p>
                    </div>
                    <div class="w-full md:w-1/2">
                        <select id="place" name="place"
                            class="shadow-md border-gray-300 border-2 text-slate-900 text-sm rounded-lg focus:ring-yellow-300 focus:border-yellow-300 block md:ml-5 mx-auto w-1/2 p-2.5  @if ($errors->has('exercise_times')) ring-red-500 border-red-500 @endif">
                            <option value="gym" {{ $userdata->place == 'gym' ? 'selected' : '' }}>Gym</option>
                            <option value="home" {{ $userdata->place == 'home' ? 'selected' : '' }}>Home Workout
                            </option>
                        </select>
                        @error('exercise_times')
                            <p class="text-sm text-center mt-2 text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center">
                    <button type="submit"
                        class="border text-white bg-yellow-300 px-3 py-2 rounded-xl font-bold mb-3 text-sm hover:bg-yellow-500">Pola
                        Latihan</button>
                </div>
            </form>
            {{-- END Exercise Times Choice --}}
        @endif

        {{-- END Exercise Schedule --}}

        <!-- Modal Exercise -->
        <div id="modalExercise" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t bg-yellow-300">
                        <h3 class="text-xl font-semibold text-slate-700" id="exerciseDay">
                            Nama Hari
                        </h3>
                        <button type="button" id="x"
                            class="text-slate-700 bg-transparent hover:bg-yellow-400 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-hide="modalExercise">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6 bg-yellow-400 rounded-b">
                        <div class="flex flex-col items-center">
                            <div class="mb-5">
                                <iframe class="rounded-xl w-full lg:w-72 h-60 mb-5" id="output_video" src=""
                                    allow="autoplay">
                                </iframe>
                            </div>
                            <div class="text-white text-xl font-semibold" id="exerciseName">
                                Nama Latihan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
@vite('public/js/app.js')
<script>
    var x = document.getElementById("x");
    var exerciseName = document.getElementById("exerciseName");
    var exerciseDay = document.getElementById("exerciseDay");
    var output = document.getElementById('output_video');

    function display() {
        let text = document.querySelector('input[name="exercise"]:checked').value;
        var exercises = @json($exercise);
        exercises.forEach(function(exercise) {
            if (exercise.name === text) {
                exerciseDay.innerHTML = exercise.name;
                exerciseName.innerHTML = exercise.name;
                if (exercise.exercise_video === null) {
                    output.contentWindow.location.replace(null);
                    output.classList.add("hidden");
                } else {
                    output.contentWindow.location.replace(exercise.exercise_video + "?rel=0;&autoplay=1");
                    output.classList.remove("hidden");
                }
            }
        });
    }

    x.addEventListener("click", function() {
        output.contentWindow.location.replace(null);
        output.classList.add("hidden");
    });
</script>

</html>
