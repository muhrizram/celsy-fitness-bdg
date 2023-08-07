@extends('dashboard.nav')

@section('content')
    <h1 class="font-bold text-2xl md:pl-64 p-4 text-center">Tambah Program {{ $title }}</h1>
    <div class="md:pl-72 p-4">
        <form action="" method="post">
            @csrf
            <div class="mb-6 flex-wrap sm:flex">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium">Nama Latihan</label>
                    <select id="name" class="makanan rounded-lg lg:w-64 w-full" name="name" onchange="loadFile(event)">
                        @forelse($exercise as $data)
                            @if ($title !== 'Kardio')
                                @if ($data->muscle_group !== 'Kardiovaskular')
                                    <option value="{{ $data->id }}" {{ old('name') == $data->id ? 'selected' : '' }}>
                                        {{ $data->name }}</option>
                                @endif
                            @else
                                @if ($data->muscle_group === 'Kardiovaskular')
                                    <option value="{{ $data->id }}" {{ old('name') == $data->id ? 'selected' : '' }}>
                                        {{ $data->name }}</option>
                                @endif
                            @endif
                        @empty
                            <option disabled>Data Tidak Ditemukan</option>
                        @endforelse
                    </select>
                </div>
                <div class="sm:mx-5 my-3">
                    <iframe class="hidden rounded-xl w-full lg:w-72 h-60 mb-5" id="output_video" src="">
                    </iframe>
                </div>
            </div>
            @if ($program_id !== 'kardio')
                <div class="mb-6">
                    <label for="reps" class="block mb-2 text-sm font-medium">Jumlah Repetisi</label>
                    <input type="number" id="reps" name="reps"
                        class="shadow-sm border-gray-300 text-slate-900 border-2 text-sm focus:ring-yellow-300 focus:border-yellow-300 p-2.5 rounded-lg @if ($errors->has('sets')) ring-red-500 border-red-500 @endif block w-64 p-2.5"
                        value="{{ old('sets') }}" autocomplete="off" required>
                </div>
                <div class="mb-6">
                    <label for="sets" class="block mb-2 text-sm font-medium">Jumlah Set</label>
                    <input type="number" id="sets" name="sets"
                        class="shadow-sm border-gray-300 text-slate-900 border-2 text-sm focus:ring-yellow-300 focus:border-yellow-300 p-2.5 rounded-lg @if ($errors->has('sets')) ring-red-500 border-red-500 @endif block w-64 p-2.5"
                        value="{{ old('sets') }}" autocomplete="off">
                </div>
            @else
                <div class="mb-6">
                    <label for="duration" class="block mb-2 text-sm font-medium">Durasi (Menit)</label>
                    <input type="number" id="duration" name="duration"
                        class="shadow-sm border-gray-300 text-slate-900 border-2 text-sm focus:ring-yellow-300 focus:border-yellow-300 p-2.5 rounded-lg @if ($errors->has('sets')) ring-red-500 border-red-500 @endif block w-64 p-2.5"
                        value="{{ old('sets') }}" autocomplete="off">
                </div>
            @endif
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-xl">Tambah
                <svg class="inline w-3 h-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                </svg></button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output_video');
            var exercises = @json($exercise);
            var sel = document.getElementById("name");
            var text = sel.options[sel.selectedIndex].text;
            exercises.forEach(function(exercise) {
                if (exercise.name === text) {
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
        loadFile(event);
    </script>
@endpush
