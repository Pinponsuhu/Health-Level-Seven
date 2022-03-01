@extends('layouts.hospital.app')
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/> --}}
    {{-- <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    {{-- <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
@section('content')
    <main class="w-full">
        @include('layouts.hospital.nav')
        <div class="px-4 md:px-8">
            <div class="p-2 md:p-4 bg-white py-4 mt-4 rounded-md shadow-md">
                <form action="/view/all/patient" class="w-11/12 md:w-8/12 mx-auto grid capitalize grid-cols-4 gap-x-3 items-center my-3" method="post">
                    @csrf
                    <input type="search" id="search" value="@isset($search)
                    {{ $search }}
                    @endisset" name="search" placeholder="Search By Surname, Patient ID, Email or Phone Number" class="bg-green-500 col-span-3 outline-none rounded-md shadow-md px-3 h-12 py-3 text-white placeholder-green-50 block">
                    <button type="submit" class="w-full rounded-md shadow-md bg-green-500 block h-12 text-white">Search</button>
                </form>
                @isset ($search)
                <h1 class="text-xl font-bold text-center text-green-500 my-4">"{{ $search }}"</h1>
                @endisset
                @isset (!$search)
                <h1 class="text-xl font-bold text-center text-green-500 my-4">All Registered Patient</h1>
                @endisset
               <div class="w-full overflow-x-scroll">
                <table class="w-full mx-auto bg-white shadow-md rounded-md mt-2">
                    <thead>
                        <tr class="font-medium text-white text-md border-b-2 border-green-600">
                            <td  class=" py-3 bg-green-500 w-1/6 px-3 text-center border-r-4 border-green-100">Name</td>
                            <td class="py-3 bg-green-500 px-3 w-1/6 text-center border-r-4 border-green-100">Phone Number</td>
                            <td class=" py-3 bg-green-500 px-3 w-1/6 text-center border-r-4 border-green-100">Email Address</td>
                            <td class=" py-3 bg-green-500 px-3 w-1/6 text-center border-r-4 border-green-100">Gender</td>
                            <td class="py-3 bg-green-500 px-3 w-1/6 text-center border-r-4 border-green-100">Next of Kin</td>
                            <td class="py-3 bg-green-500 px-3 w-1/6 text-center border-r-4 border-green-100">Next of Kin Number</td>
                            <td class="py-3 bg-green-500 px-3 w-1/6 text-center border-r-4 border-green-100">Patient ID</td>
                            <td class="py-3 bg-green-500 px-3 w-1/6 text-center border-r-4 border-green-100">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                            <tr>
                                <td class=" py-3 bg-green-100 px-3 text-center capitalize">{{ $patient->surname . ' ' . $patient->othernames }}</td>
                                <td class=" py-3 bg-white px-3 text-center">{{ $patient->phone_number }}</td>
                                <td class=" py-3 bg-green-100 px-3 text-center">{{ $patient->email_address }}</td>
                                <td class=" py-3 bg-white px-3 text-center">{{ $patient->gender }}</td>
                                <td class=" py-3 bg-green-100 px-3 text-center capitalize">{{ $patient->next_of_kin }}</td>
                                <td class=" py-3 bg-white px-3 text-center">{{ $patient->next_of_kin_number1}}</td>
                                <td class=" py-3 bg-green-100 px-3 text-center capitalize">{{ $patient->PID }}</td>
                                <td class="px-3"><a href="/patient/details/{{ Crypt::encrypt($patient->id) }}" class="px-5 py-2 bg-blue-500 text-white rounded-md">More</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
               </div>
            </div>
        </div>
    </main>
@endsection

