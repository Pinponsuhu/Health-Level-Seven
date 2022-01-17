@extends('layouts.hospital.app')
@section('content')
    <main class="w-full">
            @include('layouts.hospital.nav')
        <section class="mt-4 px-8">
            <a href="/bed/management" class="block w-28 text-lg text-center ml-6 rounded-full py-3 shadow-md bg-green-500 text-white"><i class="fa fa-arrow-left text-sm mr-1"></i> Back</a>
            <h1 class="mt-4 mb-2 text-center text-xl font-semibold text-green-500">Search Result for: {{ $search }}</h1>
            <form action="/bed/search" class="w-8/12 mx-auto grid capitalize grid-cols-4 gap-x-3 items-center my-3" method="post">
                @csrf
                <input type="search" id="search" value="{{ $search }}" name="search" placeholder="Search By Surname, Ward, Status or Bed Number" class="bg-green-500 col-span-3 outline-none rounded-md shadow-md px-3 h-12 py-3 text-white placeholder-green-50 block">
                <button type="submit" class="w-full rounded-md shadow-md bg-green-500 block h-12 text-white">Search</button>
            </form>
            <table class="w-full shadow-md">
                <thead>
                    <tr class="text-white font-medium text-md">
                        <td class=" py-2 bg-green-500 px-3 text-center border-r-4 border-green-200">Name</td>
                        <td class=" py-2 bg-green-500 px-3 text-center border-r-4 border-green-200">Checked In Date</td>
                        <td class=" py-2 bg-green-500 px-3 text-center border-r-4 border-green-200">Patient Status</td>
                        <td class=" py-2 bg-green-500 px-3 text-center border-r-4 border-green-200">Bed number</td>
                        <td class=" py-2 bg-green-500 px-3 text-center border-r-4 border-green-200">Ward</td>
                        <td class=" py-2 bg-green-500 px-3 text-center border-r-4 border-green-200">Next of Kin</td>
                        <td class=" py-2 bg-green-500 px-3 text-center border-r-4 border-green-200">Next of Kin Number</td>
                        <td class=" py-2 bg-green-500 px-3 text-center">Action</td>
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
                        <td class=" py-2 bg-white px-2"><a class="bg-blue-500 rounded-md text-white py-2 px-4" href="/bed/detail/{{ $bed->id }}">More</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection
