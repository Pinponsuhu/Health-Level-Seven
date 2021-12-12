@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layouts.hospital.nav')
        <div class="px-8 mt-4">
            <div class="p-6 rounded-md shadow-md bg-white">
                <h1 class="text-center font-bold text-2xl text-green-600 my-5">Pre-Booked Appointments</h1>
        <table class="w-full shadow-md display" id="basic-1">
            <thead>
                <tr class="text-green-500 border-b-2 border-gray-300 font-medium text-md">
                    <td class="w-1/5 py-2 bg-green-100 px-3 text-center">Name</td>
                    <td class="w-1/5 py-2 bg-gray-100 px-3 text-center">Date</td>
                    <td class="w-1/5 py-2 bg-green-100 px-3 text-center">Status</td>
                    <td class="w-1/5 py-2 bg-gray-100 px-3 text-center">Type</td>
                    <td class="w-1/5 py-2 bg-green-100 px-3 text-center">Phone number</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                <tr class="text-green-500 font-medium text-md">
                    <td class="w-1/5 py-2 bg-green-100 px-3 text-center">{{ $appointment->surname . ' ' . $appointment->othernames }}</td>
                    <td class="w-1/5 py-2 bg-gray-100 px-3 text-center">{{ $appointment->preferred_date }}</td>
                    <td class="w-1/5 py-2 bg-green-100 px-3 text-center">{{ $appointment->status }}</td>
                    <td class="w-1/5 py-2 bg-gray-100 px-3 text-center">{{ $appointment->appointment_type }}</td>
                    <td class="w-1/5 py-2 bg-green-100 px-3 text-center">{{ $appointment->phone_number }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
            </div>
        </div>
    </main>
@endsection
