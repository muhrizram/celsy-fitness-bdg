@extends('dashboard.nav')

@section('content')
    <h1 class="font-bold text-2xl md:pl-64 p-4 text-center">Detail Pengguna Aplikasi</h1>
    <div class="md:pl-72 p-4">
        <table>
            <tr>
                <td>Nama:</td>
                <td class="text-right">{{ $user_data->pengguna->name }}</td>
            </tr>
            <tr>
                <td>Tinggi Badan saat ini:</td>
                <td class="text-right">{{ $user_data->current_height }} cm</td>
            </tr>
            <tr>
                <td>Berat Badan saat ini:</td>
                <td class="text-right">{{ $user_data->current_weight }} kg</td>
            </tr>
            <tr>
                <td>Sasaran:</td>
                <td class="text-right">
                    @if ($user_data->target == 'turun')
                        Turunkan Berat Badan
                    @elseif($user_data->target == 'naik')
                        Tambah Berat Badan
                    @else
                        Jaga Berat Badan
                    @endif
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin:</td>
                <td class="text-right">
                    @if ($user_data->gender == 'l')
                        Laki-Laki
                    @else
                        Perempuan
                    @endif
                </td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td class="text-right">
                    {{ date('d F Y', strtotime($user_data->date_of_birth)) }}
                </td>
            </tr>
            <tr>
                <td>Usia</td>
                <td class="text-right">
                    {{ \Carbon\Carbon::parse($user_data->date_of_birth)->age }}
                </td>
            </tr>
            <tr>
                <td>Berat Badan Sasaran:</td>
                <td class="text-right">{{ $user_data->target_weight }} kg</td>
            </tr>
            @if ($user_data->weekly_target > 0)
                <tr>
                    <td>Sasaran Mingguan:</td>
                    <td class="text-right">
                        @if ($user_data->target == 'turun')
                            Turun {{ $user_data->weekly_target }} kg
                        @else
                            Naik {{ $user_data->weekly_target }} kg
                        @endif

                    </td>
                </tr>
            @endif
        </table>
        @if ($user_data->pengguna->level === 1 || $user_data->pengguna->level === 3)
            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                class="inline-block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 my-5 py-2.5 text-center shadow-xl">
                Hapus
                <svg class="inline w-3 h-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                </svg>
            </button>
        @endif

        <div id="popup-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-hide="popup-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apa kamu yakin untuk
                            menghapus data {{ $title }} ini?
                        </h3>
                        <form action="/manager/pengguna-aplikasi/{{ $user_data->pengguna->username }}/hapus" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Ya, saya yakin
                            </button>
                            <button data-modal-hide="popup-modal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak,
                                batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
