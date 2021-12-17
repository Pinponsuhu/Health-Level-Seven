@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layouts.hospital.nav')
        <div class="px-8 mt-3">
            <div class="p-8 bg-white rounded-md shadow-md">
                <h1 class="text-2xl font-bold text-green-500 text-center">Test Details</h1>
                <div class="w-full h-full grid col-span-2 items-center gap-x-4">
                    <h1 class="text-3xl font-bold col-span-2 text-gray-900">{{ $upload->full_name}}</h1>

                    <div class="flex gap-x-2 mt-4">
                        <label class="text-green-500 text-md font-semibold">Patient ID: </label>
                        <p class="text-md font-medium">@if ( $upload->PID == NULL)
                            Not registered as a patient
                        @else
                        {{ $upload->PID }}
                        @endif</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Gender: </label>
                        <p class="text-md font-medium">{{ $upload->gender }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Test Type: </label>
                        <p class="text-md font-medium">{{ $upload->test_type }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Email Address: </label>
                        <p class="text-md font-medium">{{ $upload->email_address }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Phone Number: </label>
                        <p class="text-md font-medium">{{ $upload->phone_number }}</p>
                    </div>
                    <div class="flex gap-x-2 mt-2">
                        <label class="text-green-500 text-md font-semibold">Initiated Date: </label>
                        <p class="text-md font-medium">{{ date() }}</p>
                    </div>

                    <h1 class="col-span-2">Result Section</h1>
                    
                </div>
            </div>
        </div>

    </main>
@endsection
