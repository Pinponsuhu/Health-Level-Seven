@extends('layouts.hospital.app')
@section('content')
<main class="w-full overflow-y-scroll h-screen">
        @include('layouts.hospital.nav')
        <div class="px-8">
            <div class="p-6 mt-6 bg-white rounded-md shadow-md">
            <h1 class="text-xl font-bold text-center text-green-500 my-4">All Registered Staffs</h1>
        <table class="w-full mx-auto bg-white shadow-md rounded-md mt-2">
            <thead>
                <tr class="font-medium text-white text-md border-b-2 border-green-600">
                    <td class="py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Staff ID</td>
                    <td  class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Full Name</td>
                    <td class="py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Phone Number</td>
                    <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Email Address</td>
                    <td class=" py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Gender</td>
                    <td class="py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Next of Kin</td>
                    <td class="py-3 bg-green-500 px-3 text-center border-r-4 border-green-100">Next of Kin Number</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $staff)
                    <tr>
                        <td class=" py-3 bg-green-100 px-3 text-center capitalize"><a href="/staff/details/{{ $staff->id }}" class="italic underline">{{ $staff->staff_id }}</a></td>
                        <td class=" py-3 bg-green-100 px-3 text-center capitalize">{{ $staff->fullname }}</td>
                        <td class=" py-3 bg-white px-3 text-center">{{ $staff->phone_number }}</td>
                        <td class=" py-3 bg-green-100 px-3 text-center">{{ $staff->email_address }}</td>
                        <td class=" py-3 bg-white px-3 text-center">{{ $staff->gender }}</td>
                        <td class=" py-3 bg-green-100 px-3 text-center capitalize">{{ $staff->next_of_kin }}</td>
                        <td class=" py-3 bg-white px-3 text-center">{{ $staff->next_of_kin_number}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $staffs->links() }}
        </div>
            </div>
        </div>
</main>
@endsection
