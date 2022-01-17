@extends('layouts.hospital.app')
@section('content')
    <main class="w-full">
            @include('layouts.hospital.nav')
        <div class="px-8 mt-3">
            <div class="p-8 bg-white rounded-md shadow-md">
                <div class="flex justify-end">
                    <a href="/delete/bed/details/{{ $patient->id }}" class="py-3 px-7 rounded-full bg-red-400 text-white">Delete</a>
                </div>
                <h1 class="text-2xl font-bold text-green-500 text-center">Patient in bed</h1>
                <div class="w-full h-full grid col-span-2 items-center gap-x-4">
                    <h1 class="text-3xl font-bold col-span-2 text-gray-900">{{ $patient->surname . ' ' . $patient->othernames }}</h1>

                    <div class="flex gap-x-2 mt-4">
                        <label class="text-green-500 text-md font-semibold">Patient ID: </label>
                        <p class="text-md font-medium">@if ( $patient->PID == NULL)
                            Emergency patient
                        @else
                        {{ $patient->PID }}
                        @endif</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Gender: </label>
                        <p class="text-md font-medium">{{ $patient->gender }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Patient Status: </label>
                        <p class="text-md font-medium">{{ $patient->status }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Reason For Admission: </label>
                        <p class="text-md font-medium">{{ $patient->reason }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Check In Date: </label>
                        <p class="text-md font-medium">{{ $patient->checked_in_date }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Check In Time: </label>
                        <p class="text-md font-medium">{{ $patient->checked_in_time }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Check In Time: </label>
                        <p class="text-md font-medium">{{ $patient->checked_in_time }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Ward: </label>
                        <p class="text-md font-medium">{{ $patient->ward }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Bed Number: </label>
                        <p class="text-md font-medium">{{ $patient->bed_number }}</p>
                    </div>
                    <p class="mt-4 font-bold col-span-2 text-gray-900 text-xl">Next of Kin</p>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Name: </label>
                        <p class="text-md font-medium">{{ $patient->next_of_kin }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Phone Number: </label>
                        <p class="text-md font-medium">{{ $patient->next_of_kin_number }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
