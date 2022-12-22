@extends('nav.nav')

@section('content')
    <div class="basis-11/12 bg-blue-500 grow p-5">
        User Data

        <div class="w-full">
            <div class="bg-white hidden md:block">
                <div class="grid grid-cols-8 bg-gray-300 h-14 items-center border-b border-slate-400">
                    <div></div>
                    <div class="col-span-3 font-semibold">Nama</div>
                    <div class="col-span-2 font-semibold">Usia</div>
                    <div class="col-span-2 font-semibold">Status</div>
                </div>
                @forelse($user_data as $user_data)
                    <a href="{{ route('pengguna_aplikasi.show', $user_data->id)}}">
                        <div class="grid grid-cols-8 items-center h-fit hover:bg-gray-200">
                            <div class="mx-auto py-3">
                                <img class="w-24 h-24 rounded-full shadow-lg"
                                    src="https://source.unsplash.com/800x800?human" alt="" />
                            </div>
                            <div class="col-span-3">{{ $user_data->pengguna->name }}</div>
                            <div class="col-span-2"><span
                                    class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">{{ \Carbon\Carbon::parse($user_data->date_of_birth)->age }}</span>
                            </div>
                            <div class="col-span-2">
                                @if ($user_data->pengguna->level == 2)
                                    Admin
                                @elseif($user_data->pengguna->level == 1)
                                    Member
                                @else
                                    User
                                @endif
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="font-bold">
                        Data Exercises belum Tersedia.
                    </div>
                @endforelse
            </div>

            {{-- <div class="overflow-auto rounded-lg shadow hidden md:block">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left"></th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Nama</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Usia</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($user_data as $user_data)
                            <tr class="bg-white hover:bg-gray-300">
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <a href="">
                                        <img class="w-24 h-24 rounded-full shadow-lg"
                                            src="https://source.unsplash.com/800x800?human" alt="" />
                                    </a>
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <a href="">
                                        {{ $user_data->pengguna->name }}
                                    </a>
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <a href="">
                                        <span
                                            class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">{{ \Carbon\Carbon::parse($user_data->date_of_birth)->age }}</span>
                                    </a>
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <a href="">
                                        @if ($user_data->pengguna->level == 2)
                                            Admin
                                        @elseif($user_data->pengguna->level == 1)
                                            Member
                                        @else
                                            User
                                        @endif
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <div class="font-bold">
                                Data Exercises belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div> --}}

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden">
                @forelse($user_data_mobile as $user_data)
                    <div class="bg-white space-y-3 p-4 rounded-lg shadow hover:bg-slate-200">
                        <div class="flex w-full justify-around items-center">
                            <div class="flex pr-5">
                                <img class="w-20 h-20 md:w-24 md:h-24  rounded-full shadow-lg"
                                    src="https://source.unsplash.com/800x800?human" alt="" />
                            </div>
                            <div class="flex flex-col justify-between">
                                <h1 class="border-b">{{ $user_data->pengguna->name }}</h1>
                                <h1 class="border-b">{{ \Carbon\Carbon::parse($user_data->date_of_birth)->age }}</h1>
                                <h1 class="border-b">
                                    @if ($user_data->pengguna->level == 2)
                                        Admin
                                    @elseif($user_data->pengguna->level == 1)
                                        Member
                                    @else
                                        User
                                    @endif
                                </h1>
                            </div>
                        </div>
                    @empty
                        <div class="font-bold">
                            Data Exercises belum Tersedia.
                        </div>
                        {{-- <div class="flex items-center space-x-2 text-sm">
                        <div>
                            <a href="#" class="text-blue-500 font-bold hover:underline">#1000</a>
                        </div>
                        <div class="text-gray-500">10/10/2021</div>
                        <div>
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">Delivered</span>
                        </div>
                    </div>
                    <div class="text-sm text-gray-700">
                        Kring New Fit office chair, mesh + PU, black
                    </div>
                    <div class="text-sm font-medium text-black">
                        $200.00
                    </div> --}}
                    </div>
                @endforelse
            </div>
        </div>
    @endsection
