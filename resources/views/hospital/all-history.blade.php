@extends('layouts.hospital.app')
@section('content')
<main class="w-full h-screen overflow-y-scroll">
    @include('layouts.hospital.nav')
    <div class="mt-5 px-6">
        <h1 class="text-xl font-semibold text-green-500 text-center my-4 drop-shadow-sm">All Bed Space History</h1>
        <form action="/bed/search" class="w-11/12 md:w-8/12 mx-auto flex capitalize gap-x-2 items-center my-3" method="get">
            @csrf
            <input type="search" id="search" name="search" placeholder="Search Here" class="bg-white w-9/12 flex outline-none rounded-md shadow-md px-3 h-12 py-3">
            <button type="submit" class=" rounded-md shadow-md bg-green-500 flex px-5 py-3 text-center text-white">Search</button>
        </form>
        <div class="w-full overflow-x-scroll">
            <table class="w-full shadow-md bg-white">
                <thead>
                    <tr class="font-medium text-white text-md border-b-2 border-green-600">
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Name</td>
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Checked In Date</td>
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Patient Status</td>
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Bed number</td>
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Ward</td>
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Next of Kin</td>
                        <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Next of Kin Number</td>
                        <td class=" py-3 bg-green-500 px-3 text-center">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beds as $bed)
                    <tr class="text-green-500 font-medium text-md">
                        <td class=" py-3 bg-green-100 px-3 text-center capitalize">{{ $bed->surname . ' ' . $bed->othernames }}</td>
                        <td class=" py-3 bg-white px-3 text-center">{{ $bed->checked_in_date }}</td>
                        <td class="py-3 bg-green-100 px-3 text-center capitalize"><form action="/update/bed/{{ Crypt::encrypt($bed->id) }}" method="POST" id="update">
                            @csrf
                            <select name="bed_status" onchange="this.form.submit()" class="py-3 w-full" id="bed_status">
                                <option value="{{ $bed->status }}">{{ $bed->status }}</option>
                                @foreach ($status as $stat)
                                    @if ($stat != $bed->status)
                                    <option value="{{ $stat }}">{{ $stat }}</option>
                                    @endif
                                @endforeach
                                </select>
                        </form></td>
                        <td class=" py-3 bg-white px-3 text-center">{{ $bed->bed_number }}</td>
                        <td class=" py-3 bg-green-100 px-3 text-center capitalize">{{ $bed->ward }}</td>
                        <td class=" py-3 bg-white px-3 text-center capitalize">{{ $bed->next_of_kin }}</td>
                        <td class=" py-3 bg-green-100 px-3 text-center">{{ $bed->next_of_kin_number }}</td>
                        <td class="px-2"><a href="/bed/detail/{{ Crypt::encrypt($bed->id) }}" class="px-5 rounded-md py-3 bg-blue-500 text-white">More</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="my-4">
            {{ $beds->links() }}
        </div>
    </div>
</main>
@endsection
