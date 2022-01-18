@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layouts.hospital.nav')
        <div class="px-8 mt-4">
            <div class="p-6 rounded-md shadow-md bg-white">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-2xl text-green-600 my-5">Routine Appointments</h1>
                    <div class="flex items-center gap-x-3">
                        <a href="/routine/appointment/{{ Crypt::encrypt('Cancelled') }}" class="py-2 px-4 rounded-md text-white bg-yellow-400">Cancelled</a>
                        <a href="/routine/appointment/{{ Crypt::encrypt('Active') }}" class="py-2 px-4 rounded-md text-white bg-green-400">Active</a>
                        <a href="/routine/appointment/{{ Crypt::encrypt('Missed') }}" class="py-2 px-4 rounded-md text-white bg-red-400">Missed</a>
                    </div>
                </div>
                <p class="text-center text-green-500 font-medium my-2 text-xl">Status: {{ $statuss }}</p>
        <table class="w-full shadow-md display" id="basic-1">
            <thead>
                <tr class="text-green-50 border-b-2 border-gray-300 font-medium text-md">
                    <td class="w-1/5 py-4 bg-green-400 border-r-4 border-green-200 px-3 text-center">Name</td>
                    <td class="w-1/5 py-4 bg-green-400 border-r-4 border-green-200 px-3 text-center">Date</td>
                    <td class="w-1/5 py-4 bg-green-400 border-r-4 border-green-200 px-3 text-center">Status</td>
                    <td class="w-1/5 py-4 bg-green-400 border-r-4 border-green-200 px-3 text-center">Type</td>
                    <td class="w-1/5 py-4 bg-green-400 px-3 text-center">Phone number</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                <tr class="text-green-500 font-medium text-md">
                    <td class="w-1/5 py-2 bg-green-100 px-3 text-center">{{ $appointment->surname . ' ' . $appointment->othernames }}</td>
                    <td class="w-1/5 py-2 bg-gray-100 px-3 text-center">{{ $appointment->preferred_date }}</td>
                    <td class="w-1/5 py-2 bg-green-100 px-3 text-center">
                        <form action="/update/appointment/{{ Crypt::encrypt($appointment->id) }}" method="post">
                            @csrf
                        <select name="status" onchange="this.form.submit()" class="py-3 w-full" id="status">
                        <option value="{{ $appointment->status }}">{{ $appointment->status }}</option>
                        @foreach ($status as $stat)
                            @if ($stat != $appointment->status)
                            <option value="{{ $stat }}">{{ $stat }}</option>
                            @endif
                        @endforeach
                        </select>
                            </form>
                    </td>
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
