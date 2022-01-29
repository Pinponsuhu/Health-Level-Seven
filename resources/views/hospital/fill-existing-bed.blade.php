@extends('layouts.hospital.app')
@section('content')
    <main class="w-full">
            @include('layouts.hospital.nav')
        <div class="px-8 mt-3">
            <div class="bg-white rounded-md shadow-md p-4">
                <div>
                    <h1 class="text-xl text-green-500 text-center font-bold mt-4">Confirm Patient Identity</h1>
                    <form action="/confirm/patient" method="get" class="w-11/12 md:w-8/12 mx-auto mt-2 flex gap-x-3">
                        @csrf
                        <input type="text" class="shadow-md rounded-md flex w-9/12 bg-white py-2 px-3" name="search" placeholder="Search By Patient ID or Fullname" id="">
                        <button type="submit" class="shadow-md bg-green-500 hover:bg-green-600 text-white rounded-md py-3 px-4">Confirm</button>
                    </form>
                </div>

                <div>
                    <div>
                        @isset($patients)
                            @if ($patient_count > 0)
                            <div class="px-8 mt-3 overflow-x-scroll">
                                <table class="w-full mx-auto bg-white shadow-md rounded-md mt-2">
                                    <thead>
                                        <tr class="font-medium text-white text-md border-b-2 border-green-600">
                                            <td  class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Name</td>
                                            <td class="py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Phone Number</td>
                                            <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Email Address</td>
                                            <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Gender</td>
                                            <td class="py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Next of Kin</td>
                                            <td class="py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Next of Kin Number</td>
                                            <td class="py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Patient ID</td>
                                            <td class="py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Action</td>
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
                                                <td class="px-3"><a href="/use/existing/{{ Crypt::encrypt($patient->id) }}" class="px-5 py-2 bg-blue-500 text-white rounded-md">Use</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <h1 class="font-bold mt-3 italic text-2xl text-center">No Result Found</h1>
                            @endif
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
