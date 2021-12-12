@extends('layouts.hospital.app')
@section('content')
<main class="w-full h-screen">

            @include('layouts.hospital.nav')
    <div class="px-8 mt-6 flex justify-end">
        <a href="#" class="py-3 px-8 bg-green-500 w-36 text-white rounded-full shadow-md text-center">Update</a>
    </div>
   <div class="px-8 mt-2">
    <div class="flex gap-x-4 bg-white shadow-md rounded-md px-6 py-4 mt-4">
        <div class="w-72 h-full">
            <img src="{{ asset('/storage/patients/' . $patient->passport) }}" class="w-72 block rounded shadow-md h-auto" alt="">
            <a href="#" class="text-md font-medium block mt-2 text-center text-green-500">Change Passport photograph</a>
        </div>
        <div class="w-full h-full">
            <h1 class="text-3xl font-bold text-gray-900">{{ $patient->surname . ' ' . $patient->othernames }}</h1>
            <p class="flex items-center gap-x-2 mt-1"><i class="fa fa-map-marked-alt text-xl text-green-500"></i> <span class="text-md">{{ $patient->resident_address }}</span></p>

            <div class="flex gap-x-2 mt-4">
                <label class="text-green-500 text-md font-semibold">Patient ID: </label>
                <p class="text-md font-medium">{{ $patient->PID }}</p>
            </div>
            <div class="flex gap-x-2 mt-2">
                <label class="text-green-500 text-md font-semibold">Email: </label>
                <p class="text-md font-medium">{{ $patient->email_address }}</p>
            </div>
            <div class="flex gap-x-2 mt-2">
                <label class="text-green-500 text-md font-semibold">Date of Birth: </label>
                <p class="text-md font-medium">{{ $patient->date_of_birth }}</p>
            </div>
            <div class="flex gap-x-2 mt-2">
                <label class="text-green-500 text-md font-semibold">Gender: </label>
                <p class="text-md font-medium">{{ $patient->gender }}</p>
            </div>
            <div class="flex gap-x-2 mt-2">
                <label class="text-green-500 text-md font-semibold">State: </label>
                <p class="text-md font-medium">{{ $patient->state_of_origin }}</p>
            </div>
            <p class="mt-4 font-bold text-gray-900 text-xl">Next of Kin</p>
            <div class="flex gap-x-2 mt-2">
                <label class="text-green-500 text-md font-semibold">Name: </label>
                <p class="text-md font-medium">{{ $patient->next_of_kin }}</p>
            </div>
            <div class="flex gap-x-2 mt-2">
                <label class="text-green-500 text-md font-semibold">Phone Number #1: </label>
                <p class="text-md font-medium">{{ $patient->next_of_kin_number1 }}</p>
            </div>
            <div class="flex gap-x-2 mt-2">
                <label class="text-green-500 text-md font-semibold">Phone Number #2: </label>
                <p class="text-md font-medium">{{ $patient->next_of_kin_number2 }}</p>
            </div>
            <h1 class="mt-4 py-2 shadow-md text-xl w-56 px-5 flex justify-between items-center">History <i class="fa fa-caret-up text-gray-500"></i></h1>
        </div>
    </div>
   </div>
</main>
@endsection
