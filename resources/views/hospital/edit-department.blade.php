@extends('layouts.hospital.app')
@section('content')
    <main class="w-full">
            @include('layouts.hospital.nav')
        <div class="px-4 md:px-8 mt-3">
            <div class="p-3 md:p-6 bg-white rounded-md shadow-md">
                <form action="/hospital/edit/department/{{ Crypt::encrypt($department->id) }}" class="w-11/12 mb-6 grid gap-y-3 md:grid-cols-2 mx-auto gap-x-5 mt-4" method="post">
                    @csrf
                    <div>
                        <label  class="font-semibold text-md block mb-1">Name</label>
                        <input type="text" autocomplete="off" name="name" value="{{ $department->name }}" placeholder="Department" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                        @error('name')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <h1 class="text-2xl font-bold text-green-500 md:col-span-2 my-3">Permission</h1>
                    <div class="md:col-span-2 flex flex-col md:flex-row gap-x-4">
                        <div class="flex gap-x-3 items-center">
                            <label>Radiology</label>
                            <input type="checkbox" @if ($department->radiology_permission == 'on')
                            checked
                            @endif name="radiology" id="">
                        </div>
                        <div class="flex gap-x-3 items-center">
                            <label>Patient Management</label>
                            <input type="checkbox" @if ($department->patient_permission == 'on')
                            checked
                            @endif name="patient" id="">
                        </div>
                        <div class="flex gap-x-3 items-center">
                            <label>Appointment Management</label>
                            <input type="checkbox" @if ($department->appointment_permission == 'on')
                            checked
                            @endif name="appointment" id="">
                        </div>
                        <div class="flex gap-x-3 items-center">
                            <label>Bed Management</label>
                            <input type="checkbox" @if ($department->bed_permission == 'on')
                                checked
                            @endif name="bed" id="">
                        </div>
                        <div class="flex gap-x-3 items-center">
                            <label>Inventory Management</label>
                            <input type="checkbox" @if ($department->inventory_permission)
                            checked
                            @endif name="inventory" id="">
                        </div>
                    </div>
                    <input type="submit" class="block md:col-span-2 bg-green-500 rounded-md shadow-md text-center text-white w-32 py-3" value="submit">
                </form>
            </div>
        </div>
    </main>
@endsection
