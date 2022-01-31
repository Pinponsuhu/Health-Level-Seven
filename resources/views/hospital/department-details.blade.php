@extends('layouts.hospital.app')
@section('content')
    <main class="w-full">
            @include('layouts.hospital.nav')
        <div class="px-4 md:px-8 mt-3">
            <div class="p-3 md:p-6 bg-white rounded-md shadow-md">
                <div class="flex gap-x-3 justify-end">
                    <a href="/hospital/change/password/department/{{ Crypt::encrypt($department->id) }}" class="py-2 px-4 rounded-md bg-green-400 text-white">Change Password</a>
                    <a href="/hospital/edit/department/{{ Crypt::encrypt($department->id) }}" class="py-2 px-4 rounded-md bg-blue-400 text-white">Edit</a>
                    <a href="/hospital/delete/department/{{ Crypt::encrypt($department->id) }}" class="py-2 px-6 rounded-md bg-red-400 text-white">Delete</a>
                </div>
                <h1 class="capitalize mt-3 md:mt-0 text-xl md:text-2xl font-bold text-green-500">department details</h1>
                <div class="w-full h-full grid md:col-span-2 items-center gap-x-4">
                    <h1 class="text-2xl mt-3 md:mt-0 md:text-3xl font-bold md:col-span-2 text-gray-900">{{ $department->name }}</h1>
                    <div class="md:col-span-2 flex flex-col md:flex-row gap-x-4">
                        <div class="flex gap-x-3 items-center">
                            <label>Radiology</label>
                            <input disabled type="checkbox" @if ($department->radiology_permission == 'on')
                            checked
                            @endif name="radiology" id="">
                        </div>
                        <div class="flex gap-x-3 items-center">
                            <label>Patient Management</label>
                            <input disabled type="checkbox" @if ($department->patient_permission)
                            checked
                            @endif name="patient" id="">
                        </div>
                        <div class="flex gap-x-3 items-center">
                            <label>Appointment Management</label>
                            <input disabled type="checkbox" @if ($department->appointment_permission)
                            checked
                            @endif name="appointment" id="">
                        </div>
                        <div class="flex gap-x-3 items-center">
                            <label>Bed Management</label>
                            <input disabled type="checkbox" @if ($department->bed_permission)

                            @endif name="bed" id="">
                        </div>
                        <div class="flex gap-x-3 items-center">
                            <label>Inventory Management</label>
                            <input disabled type="checkbox" @if ($department->inventory_permission)
                            checked
                            @endif name="inventory" id="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
