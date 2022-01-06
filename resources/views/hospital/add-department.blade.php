@extends('layouts.hospital.app')
@section('content')
    <main class="w-full h-screen overflow-y-scroll">
        @include('layouts.hospital.nav')
        <div class="mt-5 px-6">
            <div class="bg-white p-6 rounded-md shadow-md">
                <h1 class="text-2xl font-bold text-green-500">Add Department</h1>

                <form action="/store/deparment" class="w-11/12 mb-6 grid gap-y-3 grid-cols-2 mx-auto gap-x-5 mt-4" method="post">
                    @csrf
                    <div>
                        <label  class="font-semibold text-md block mb-1">Name</label>
                        <input type="text" autocomplete="off" name="name" value="{{ old('name') }}" placeholder="Department" class="capitalize border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                        @error('name')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="font-semibold text-md block mb-1">Password</label>
                        <input type="password" autocomplete="off" name="password" placeholder="password"  class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                        @error('password')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="font-semibold text-md block mb-1">Confirm Password</label>
                        <input type="password" autocomplete="off" name="password_confirmation" placeholder="password" class="border-l-4 border-green-500 w-full rounded-md p-3 shadow-md outline-none block">
                    </div>
                    <h1 class="text-2xl font-bold text-green-500 col-span-2 my-3">Permission</h1>
                    <div class="col-span-2 flex gap-x-4">
                        <div class="flex gap-x-3 items-center">
                            <label>Radiology</label>
                            <input type="checkbox" name="radiology" id="">
                        </div>
                        <div class="flex gap-x-3 items-center">
                            <label>Patient Management</label>
                            <input type="checkbox" name="patient" id="">
                        </div>
                        <div class="flex gap-x-3 items-center">
                            <label>Appointment Management</label>
                            <input type="checkbox" name="appointment" id="">
                        </div>
                        <div class="flex gap-x-3 items-center">
                            <label>Bed Management</label>
                            <input type="checkbox" name="bed" id="">
                        </div>
                        <div class="flex gap-x-3 items-center">
                            <label>Inventory Management</label>
                            <input type="checkbox" name="inventory" id="">
                        </div>
                    </div>
                    <input type="submit" class="block col-span-2 bg-green-500 rounded-md shadow-md text-center text-white w-32 py-3" value="submit">
                </form>
            </div>
        </div>
    </main>
@endsection
