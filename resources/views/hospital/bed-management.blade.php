@extends('layouts.hospital.app')
@section('content')
<main class="w-full h-screen overflow-y-scroll">
    <div>
        <div class="w-full bg-green-600 flex gap-x-3 py-4 px-6 items-center justify-center">
            <img src="" class="w-12 h-12" alt="">
            <h1 class="font-bold text-white text-2xl">Hospital name</h1>
        </div>
    </div>
    <div class="h-80 grid grid-cols-3 gap-x-3 mt-6 px-6">
        <section class="col-span-2 bg-white py-4 px-6 rounded-md h-full shadow-md">
            {!! $chart->container() !!}
        </section>
        <section class="relative col-span-1 overflow-y-scroll rounded-md h-full shadow-md bg-white px-6 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-md font-semibold">Available Beds</h1>
                <h1 class="text-lg font-semibold text-green-600">Number of bed: 50</h1>
            </div>
                <a href="/fill/bed" class="bg-green-500 block text-white py-3 w-24 text-center my-2 rounded-md mx-auto">Add new</a>
            <div class="grid grid-cols-6 justify-center gap-x-3 py-4 w-full flex-wrap gap-y-3">
                @for ($i = 1; $i <= 50; $i++)
                    @if (!in_array($i, $actives))
                        <h1 class="py-2 w-9 h-10 px-2 rounded-md text-center shadow bg-green-500 text-white font-medium">{{ $i }}</h1>
                    @endif
                @endfor
            </div>
        </section>
    </div>
    <div class="w-full px-8 mt-6 ">
        <form action="/bed/search" class="w-8/12 mx-auto grid capitalize grid-cols-4 gap-x-3 items-center my-3" method="post">
            @csrf
            <input type="search" id="search" name="search" placeholder="Search Here" class="bg-green-500 col-span-3 outline-none rounded-md shadow-md px-3 h-12 py-3 text-white placeholder-green-50 block">
            <button type="submit" class="w-full rounded-md shadow-md bg-green-500 block h-12 text-white">Search</button>
        </form>
        <table class="w-full shadow-md">
            <thead>
                <tr class="text-green-500 font-medium text-md">
                    <td class=" py-2 bg-green-100 px-3 text-center">Name</td>
                    <td class=" py-2 bg-white px-3 text-center">Checked In Date</td>
                    <td class=" py-2 bg-green-100 px-3 text-center">Patient Status</td>
                    <td class=" py-2 bg-white px-3 text-center">Bed number</td>
                    <td class=" py-2 bg-green-100 px-3 text-center">Ward</td>
                    <td class=" py-2 bg-white px-3 text-center">Next of Kin</td>
                    <td class=" py-2 bg-green-100 px-3 text-center">Next of Kin Number</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($beds as $bed)
                <tr class="text-green-500 font-medium text-md">
                    <td class=" py-2 bg-green-100 px-3 text-center">{{ $bed->surname . ' ' . $bed->othernames }}</td>
                    <td class=" py-2 bg-white px-3 text-center">{{ $bed->checked_in_date }}</td>
                    <td class="py-2 bg-green-100 px-3 text-center">
                        <form action="/update/bed/{{ $bed->id }}" method="POST" id="update">
                            @csrf
                            <select name="bed_status" onchange="this.form.submit()" class="py-2 w-full" id="bed_status">
                                <option value="{{ $bed->status }}">{{ $bed->status }}</option>
                                @foreach ($status as $stat)
                                    @if ($stat != $bed->status)
                                    <option value="{{ $stat }}">{{ $stat }}</option>
                                    @endif
                                @endforeach
                                </select>
                        </form>
                    </td>
                    <td class=" py-2 bg-white px-3 text-center">{{ $bed->bed_number }}</td>
                    <td class=" py-2 bg-green-100 px-3 text-center">{{ $bed->ward }}</td>
                    <td class=" py-2 bg-white px-3 text-center">{{ $bed->next_of_kin }}</td>
                    <td class=" py-2 bg-green-100 px-3 text-center">{{ $bed->next_of_kin_number }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
        <script src="{{ $chart->cdn() }}"></script>
        {{ $chart->script() }}
        <script>
            function update(){
                document.getElementById('update').submit(); // your form has an id="form"
  }
            }
 }
        </script>
@endsection
