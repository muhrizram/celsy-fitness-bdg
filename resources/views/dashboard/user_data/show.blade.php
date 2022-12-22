@extends('nav.nav')

@section('content')
    <div class="basis-11/12 bg-blue-500 grow p-5">
        <h1 class="text-xl font-bold mb-5">Detail Pengguna Aplikasi</h1>

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
                        @if($user_data->target == "turun")
                            Turun {{ $user_data->weekly_target }} kg
                        @else
                            Naik {{ $user_data->weekly_target }} kg
                        @endif
                        
                    </td>
                </tr>
            @endif
        </table>
    </div>
@endsection
