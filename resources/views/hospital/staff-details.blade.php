@extends('layouts.hospital.app')
@section('content')
<main class="w-full overflow-y-scroll h-screen">
    @include('layouts.hospital.nav')
    <div class="px-5">
        <div class="p-6 mt-6 bg-white rounded-md shadow-md">
            <div class="flex gap-x-2 justify-end">
                <a href="/staff/change/passport/{{ $staff->id }}" class="px-8 py-3 text-white rounded-full bg-blue-400">Change Passport</a>
                <a href="/edit/staff/{{ $staff->id }}" class="px-8 py-3 text-white rounded-full bg-green-400">Edit</a>
                <a href="/delete/staff/{{ $staff->id }}" class="px-8 py-3 text-white rounded-full bg-red-400">Delete</a>
            </div>
            <div class="flex gap-x-4 bg-white shadow-md rounded-md px-6 py-4 mt-4">
                <div class="w-72 h-full">
                    <img src="{{ asset('/storage/staffs/' . $staff->passport) }}" class="w-72 block rounded shadow-md h-auto" alt="">
                </div>
                <div class="w-full h-full">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $staff->fullname }} - <span class="text-green-500">{{ $staff->department }}</span></h1>
                    <p class="flex items-center gap-x-2 mt-1"><i class="fa fa-map-marked-alt text-xl text-green-500"></i> <span class="text-md">{{ $staff->house_address }}</span></p>

                    <div class="flex gap-x-2 mt-4">
                        <label class="text-green-500 text-md font-semibold">Staff ID: </label>
                        <p class="text-md font-medium">{{ $staff->staff_id }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Phone Number: </label>
                        <p class="text-md font-medium">{{ $staff->phone_number }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Email: </label>
                        <p class="text-md font-medium">{{ $staff->email_address }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Date of Birth: </label>
                        <p class="text-md font-medium">{{ $staff->date_of_birth }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Gender: </label>
                        <p class="text-md font-medium">{{ $staff->gender }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">State: </label>
                        <p class="text-md font-medium">{{ $staff->state_of_origin }}</p>
                    </div>
                    <p class="mt-4 font-bold text-gray-900 text-xl">Next of Kin</p>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Name: </label>
                        <p class="text-md font-medium">{{ $staff->next_of_kin }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Phone Number: </label>
                        <p class="text-md font-medium">{{ $staff->next_of_kin_number }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
