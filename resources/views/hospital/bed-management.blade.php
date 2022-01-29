@extends('layouts.hospital.app')
@section('content')
<main class="w-full h-screen overflow-y-scroll">
    @include('layouts.hospital.nav')
    <div class="h-72 md:h-96 mb-4 grid md:grid-cols-3 gap-x-3 mt-3 px-6">
        <section class="md:col-span-2 bg-white py-4 px-6 rounded-md h-full shadow-md">
            {!! $chart->container() !!}
        </section>
        <section class="relative mt-3 md:mt-0 md:col-span-1 overflow-y-scroll rounded-md h-28 md:h-full shadow-md bg-white px-6 py-2">
                <h1 class="text-md mb-2 font-bold">Add new</h1>
                <div class="flex gap-x-3 justify-center mt-2">
                    <a href="/fill/existing/patient" class="bg-green-500 hover:bg-green-600 px-3 text-white py-2 rounded-md">Existing Patient</a>
                    <a href="/fill/bed" class="bg-red-500 hover:bg-red-600 rounded-md text-white px-4 py-2">Emergency</a>
                </div>
                <div class="flex mt-2 justify-between items-center">
                    <h1 class="text-md font-semibold">Available Beds: {{ $free_bed }}</h1>
                </div>
            <div class="grid grid-cols-6 justify-center gap-x-3 py-4 w-full flex-wrap gap-y-3">
                @for ($i = 1; $i <= auth()->user()->bed_number; $i++)
                    @if (!in_array($i, $actives))
                        <h1 class="py-2 w-9 h-10 px-2 rounded-md text-center shadow bg-green-500 text-white font-medium">{{ $i }}</h1>
                    @endif
                @endfor
            </div>
        </section>
    </div>
    <div class="px-6 mt-14 md:mt-3">
       <div  class="w-full bg-white px-4 py-3 rounded-md shadow-md mb-5">
        <form action="/bed/search" class="md:w-8/12 w-11/12 mx-auto grid capitalize grid-cols-4 gap-x-3 items-center my-3" method="get">
            @csrf
            <input type="search" id="search" name="search" placeholder="Search By Surname, Ward, Status or Bed Number" class="bg-green-500 col-span-3 outline-none rounded-md shadow-md px-3 h-12 py-3 text-white placeholder-green-50 block">
            <button type="submit" class="w-full rounded-md shadow-md bg-green-500 block h-12 text-white">Search</button>
        </form>
        {{-- <h1 class="text-xl font-semibold text-green-500 text-center">Patients In Bed</h1> --}}
        <div class="w-full overflow-x-scroll">
            <table class="w-full shadow-md bg-white">
                <thead>
                    <tr class="text-green-50 font-medium text-md">
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-200">Name</td>
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-200">Checked In Date</td>
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-200">Patient Status</td>
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-200">Bed number</td>
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-200">Ward</td>
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-200">Next of Kin</td>
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-200">Next of Kin Number</td>
                        <td class=" py-3 bg-green-500 px-3 text-center">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beds as $bed)
                    <tr class="text-green-500 font-medium text-md">
                        <td class=" py-3 bg-green-100 px-3 text-center">{{ $bed->surname . ' ' . $bed->othernames }}</td>
                        <td class=" py-3 bg-white px-3 text-center">{{ $bed->checked_in_date }}</td>
                        <td class="py-3 bg-green-100 px-3 text-center">
                            <form action="/update/bed/{{ Crypt::encrypt($bed->id) }}" method="POST" id="update">
                                @csrf
                                <select name="bed_status" onchange="this.form.submit()" class="py-3 w-full" id="bed_status">
                                    <option value="{{ $bed->status }}">{{ $bed->status }}</option>
                                    @foreach ($status as $stat)
                                        @if ($stat != $bed->status)
                                        <option value="{{ $stat }}">{{ $stat }}</option>
                                        @endif
                                    @endforeach
                                    </select>
                            </form>
                        </td>
                        <td class=" py-3 bg-white px-3 text-center">{{ $bed->bed_number }}</td>
                        <td class=" py-3 bg-green-100 px-3 text-center">{{ $bed->ward }}</td>
                        <td class=" py-3 bg-white px-3 text-center">{{ $bed->next_of_kin }}</td>
                        <td class=" py-3 bg-green-100 px-3 text-center">{{ $bed->next_of_kin_number }}</td>
                        <td class="px-3"><a href="/bed/detail/{{ Crypt::encrypt($bed->id) }}" class="px-5 rounded-md py-3 bg-blue-500 text-white">More</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       </div>
    </div>
</main>
        <script src="{{ asset('js/apexcharts.js') }}"></script>
        {{ $chart->script() }}
        <script>
            function update(){
                document.getElementById('update').submit(); // your form has an id="form"
  }
            }
 }
        </script>
@endsection
